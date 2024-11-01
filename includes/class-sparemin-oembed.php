<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'SPAREMIN__INIT' ) ) {
	exit;
}

add_action( 'plugins_loaded', SpareMin_Embed::initialize() );

class SpareMin_Embed
{
	private static $oe_provider = 'https://call-media-service.sparemin.com/api/v1/call-media/oembed';
	
	public static function initialize() {
		wp_oembed_add_provider( '#https?://www\.sparemin\.com/myrecording/\d+#i', self::$oe_provider, true );
		wp_oembed_add_provider( '#https?://share\.sparemin\.com/recording-\d+#i', self::$oe_provider, true );
	}
}