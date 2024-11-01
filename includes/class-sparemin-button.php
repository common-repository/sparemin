<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'SPAREMIN__INIT' ) ) {
	exit;
}

add_action( 'plugins_loaded', SpareMin_Button::initialize() );

class SpareMin_Button
{
	
	private static $api_url = 'https://user-service.sparemin.com/api/v1/user/profile';

	public static $counter = 1;


	public function get_user_info( $handle ) {

		$transient_name = 'sparemin_api_user_' . md5( $handle );
		$user_info = get_transient( $transient_name );

		if ( false == $user_info ) {
			$response = json_decode( file_get_contents( add_query_arg( 'handle', $handle, self::$api_url ) ), true );

			if ( ! empty( $response['count'] ) ) {
				$user_info = array(
					'handle'	=> $response['data'][0]['handle'],
					'firstName' => $response['data'][0]['firstName'],
					'lastName'  => $response['data'][0]['lastName'],
					'imageUrl'  => $response['data'][0]['imageUrl'],
					'bio'       => $response['data'][0]['bio'],
					'shareUrl'  => $response['data'][0]['shareUrl'],
				);

				set_transient( $transient_name, $user_info, 60 * 60 * 24 );	
			}
		}

		return $user_info;
	}

	public static function initialize() {

		add_shortcode( 'sparemin', array( new SpareMin_Button, 'shortcode' ) );
	}

	private function output( $variables, $user_info ) {

		ob_start();
			include SPAREMIN__PLUGIN_DIR . 'parts/button.php';
			$button = ob_get_contents();
		ob_end_clean();
		
		SpareMin_Button::$counter++;
		
		SpareMin::load_common_styles();

		return $button;
	}

	public static function shortcode( $atts ) {
		
		$variables = shortcode_atts(array(
			'float'   => 'none',
			'handle'  => '',
			'message' => '',
			'style'   => 'dark'
		), $atts);	

		$button = new SpareMin_Button();
		$user_info = $button->get_user_info( $variables[ 'handle' ] );

		if ( $user_info ) {
			return $button->output( $variables, $user_info );
		}

		return null;
	}
}
