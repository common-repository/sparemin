<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'SPAREMIN__INIT' ) ) {
	exit;
}

$sparemin = SpareMin::get_instance();

class SpareMin
{
	private static $instance;

	private function __construct() {

		require_once( SPAREMIN__PLUGIN_DIR . '/includes/class-sparemin-oembed.php' );
		require_once( SPAREMIN__PLUGIN_DIR . '/includes/class-sparemin-button.php' );
		require_once( SPAREMIN__PLUGIN_DIR . '/includes/class-sparemin-widget.php' );
	}

	public static function get_instance() {

		if ( ! is_object( self::$instance ) ) {
			self::$instance = new SpareMin();
		}

		return self::$instance;
	}

	public static function load_common_styles() {
		
		wp_enqueue_style( 'sparemin_common_styles', SPAREMIN__PLUGIN_URL . 'styles/common.css', true, SPAREMIN__VERSION );
	}
}
