<?php $text_active_accordion = get_post_meta(get_the_ID(), 'amsha_active_accordion_text_metaboxes', true); ?>
<?php $media_active_accordion = get_post_meta(get_the_ID(), 'amsha_active_accordion_media_metaboxes', true); ?>
<?php $media_alt_active_accordion = get_post_meta(get_the_ID(), 'amsha_active_accordion_media_alt_metaboxes', true); ?>
<div class="items-choose__item active-accordion items-choose__item">
	<?php if (!empty($media_active_accordion) && !empty($media_alt_active_accordion)) { ?>
	<div class="items-choose__bg-block">
		<div class="items-choose__bg">
			<img class="items-choose__image ibg" src="<?php echo esc_url($media_active_accordion); ?>" alt="<?php echo esc_attr($media_alt_active_accordion); ?>">
		</div>
	</div>
	<?php } ?>
	<div class="items-choose__block-text">
		<div class="items-choose__block">
			<h2 class="items-choose__headline title-headline title-headline--headline-l"><?php the_title(); ?></h2>
			<?php if($text_active_accordion) { ?>
			<div class="items-choose__parahraph body-text body-text--text-m">
				<p class="items-choose__text"><?php echo esc_html($text_active_accordion); ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</div>