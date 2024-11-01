<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e( 'Title:', 'sparemin' ); ?>
	</label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo sanitize_text_field($title); ?>" />
	<label for="<?php echo $this->get_field_id( 'handle' ); ?>">
		<?php _e('SpareMin Handle:', 'sparemin'); ?>
	</label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'handle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'handle' ) ); ?>" type="text" value="<?php echo sanitize_text_field($handle); ?>" />
	<label for="<?php echo $this->get_field_id( 'message' ); ?>">
		<?php _e('Message:', 'sparemin'); ?>
	</label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'message' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'message' ) ); ?>" type="text" value="<?php echo sanitize_text_field($message); ?>" />
	<label for="<?php echo $this->get_field_id( 'style' ); ?>">
		<?php _e('Style:', 'sparemin'); ?>
	</label>
	<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat" style="width:100%;">
		<option <?php if ( 'Dark' == $instance['style'] ) echo 'selected="selected"'; ?>>Dark</option>
		<option <?php if ( 'Light' == $instance['style'] ) echo 'selected="selected"'; ?>>Light</option>
	</select>
</p>