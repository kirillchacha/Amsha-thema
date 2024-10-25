<?php $text_our_service = get_post_meta(get_the_ID(), 'amsha_our_services_text_metaboxes', true); ?>
<?php $button_our_service = get_post_meta(get_the_ID(), 'amsha_our_services_button_metaboxes', true); ?>
<?php $button_link_our_service = get_post_meta(get_the_ID(), 'amsha_our_services_button_link_metaboxes', true); ?>
<?php $media_our_service = get_post_meta(get_the_ID(), 'amsha_our_services_media_metaboxes', true); ?>
<?php $media_link_our_service = get_post_meta(get_the_ID(), 'amsha_our_services_media_link_metaboxes', true); ?>
<?php $media_alt_our_service = get_post_meta(get_the_ID(), 'amsha_our_services_media_alt_metaboxes', true); ?>
	<div class="content-services__item">
		<div class="content-services__text-block">
			<div class="content-services__block">
				<h2 class="content-services__headline title-headline title-headline--headline-l"><?php the_title(); ?></h2>
				<?php if($text_our_service) { ?>
				<div class="content-services__parahraph body-text body-text--text-s">
					<p class="content-services__text"><?php echo esc_html($text_our_service); ?></p>
				</div>
				<?php } ?>
			</div>
			<?php if (!empty($media_link_our_service) && !empty($media_our_service) && !empty($media_alt_our_service)) { ?>
			<div class="content-services__image-block-mobile">
				<a href="<?php echo esc_attr($media_link_our_service); ?>" class="content-services__link"><img class="content-services__image ibg" src="<?php echo esc_url($media_our_service); ?>" alt="<?php echo esc_attr($media_alt_our_service); ?>"></a>
			</div>
			<?php } ?>
			<?php if (!empty($media_link_our_service) && !empty($media_our_service) && !empty($media_alt_our_service)) { ?>
			<div class="content-services__actions">
				<a href="<?php echo esc_attr($button_link_our_service); ?>" class="button body-text body-text--text-xs button--blue"><?php echo esc_html($button_our_service); ?></a>
			</div>
			<?php } ?>
		</div>
		<?php if (!empty($media_link_our_service) && !empty($media_our_service) && !empty($media_alt_our_service)) { ?>
		<div class="content-services__image-block">
			<a href="<?php echo esc_attr($media_link_our_service); ?>" class="content-services__link"><img class="content-services__image ibg" src="<?php echo esc_url($media_our_service); ?>" alt="<?php echo esc_attr($media_alt_our_service); ?>"></a>
		</div>
		<?php } ?>
	</div>