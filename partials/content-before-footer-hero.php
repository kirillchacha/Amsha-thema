<?php global $amsha_options; ?>
<?php if(!empty($amsha_options['before_footer_headline']) && !empty($amsha_options['before_footer_parahraph']) && !empty($amsha_options['before_footer_button_text'])) { ?>
<?php $class_name = '';
if (is_page_template('template-homepage.php') || is_page_template('template-services-separate.php')) {
    $class_name = 'before-footer--home';
} else {
    $class_name = 'before-footer--about';
} ?>
<section class="page__before-footer before-footer <?php echo esc_attr($class_name); ?>">
	<div class="before-footer__some-content">
		<div class="before-footer__block">
			<div class="before-footer__title-block">
				<?php if($amsha_options['before_footer_headline']) { ?>
				<h2 class="before-footer__title title-headline title-headline--headline-xl"><?php echo esc_html($amsha_options['before_footer_headline']); ?></h2>
				<?php } ?>
				<?php if($amsha_options['before_footer_parahraph']) { ?>
				<div class="before-footer__parahraph body-text body-text--text-s">
					<p class="before-footer__text"><?php echo esc_html($amsha_options['before_footer_parahraph']); ?></p>
				</div>
				<?php } ?>
			</div>
			<?php if(!empty($amsha_options['before_footer_button_link_text']) && !empty($amsha_options['before_footer_button_text'])) { ?>
			<div class="before-footer__actions actions-hero">
				<a href="<?php echo esc_attr($amsha_options['before_footer_button_link_text']); ?>" class="actions-hero__button button body-text <?php echo esc_attr($amsha_options['before_footer_color_list']); ?>"><?php echo esc_html($amsha_options['before_footer_button_text']); ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>