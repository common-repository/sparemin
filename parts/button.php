<?php if ( ! empty( $variables['handle'] ) ) : ?>
<div id="sparemin_button_<?php echo SpareMin_Button::$counter; ?>" class="sparemin-button sparemin-button--style-<?php echo sanitize_title( $variables['style'] ) ?> sparemin-float-<?php echo $variables['float']; ?>">
	<a href="<?php echo $user_info['shareUrl'];?>" class="sparemin-button--link">
		<div class="sparemin-button--inner">
			<img class="sparemin-avatar" src="<?php echo $user_info['imageUrl'];?>" />
			<?php if ( ! empty( $variables['message'] ) ) : ?>
				<span class="sparemin-message"><?php echo sanitize_text_field( $variables['message'] ); ?></span>
			<?php endif; ?>
		</div>
		<img class="sparemin-power" src="<?php echo SPAREMIN__PLUGIN_URL . '/images/poweredbysparemin.png';?>" />
	</a>
</div>
<?php endif;