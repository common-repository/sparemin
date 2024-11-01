<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'SPAREMIN__INIT' ) ) {
	exit;
}

class SpareMin_Widget extends WP_Widget
{
	
	public function __construct() {
		
		$widget_ops = array(
			'classname'   => 'widget_sparemin',
			'description' => __( 'Display a SpareMin button and link to your SpareMin profile', 'sparemin' )
		);
		
		$control_ops = array(
			'width'  => 400,
			'height' => 350
		);
		
		parent::__construct( 'sparemin', __( 'SpareMin', 'sparemin' ), $widget_ops, $control_ops );
	}
	
	public function widget( $args, $instance ) {
		
		// Copy $instance to $variables for use with button.
		$variables = $instance;
		
		// Extract $args for use in this function
		extract($args);
		
		$title   = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance );
		$handle  = $instance['handle'];
		$message = $instance['message'];
		$style   = $instance['style'];
		
		echo $before_widget;
		
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		
		echo SpareMin_Button::shortcode( $variables );
		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title']   = strip_tags( $new_instance['title'] );
		$instance['handle']  = strip_tags( $new_instance['handle'] );
		$instance['message'] = strip_tags( $new_instance['message'] );
		$instance['style']   = strip_tags( $new_instance['style'] );
		
		return $instance;
	}
	
	public function form( $instance ) {
		
		$instance = wp_parse_args( (array)$instance, array(
			'title'   => '',
			'handle'  => '',
			'message' => 'Speak to me for 5 minutes on SpareMin',
			'style'   => 'dark'
		));

		$title    = strip_tags( $instance['title'] );
		$handle   = strip_tags( $instance['handle'] );
		$message  = strip_tags( $instance['message'] );
		$style    = strip_tags( $instance['style'] );
		
		include SPAREMIN__PLUGIN_DIR . 'parts/widget-form.php';
	}
}

add_action( 'widgets_init', function() {
	register_widget('SpareMin_Widget');
});