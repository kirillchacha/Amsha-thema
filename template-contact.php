<?php
/**
 * Template name: Contact Template
 */

get_header(); ?>
<?php global $amsha_options; ?>
		<?php 
		$has_info_contact_phone = !empty($amsha_options['contact_left_link']) && !empty($amsha_options['contact_left_text_link']);
		$has_info_contact_phone_two = !empty($amsha_options['contact_left_link_two']) && !empty($amsha_options['contact_left_text_link_two']);
		$has_info_contact_phone_three = !empty($amsha_options['contact_left_link_three']) && !empty($amsha_options['contact_left_text_link_three']);
		$has_left_contact_us_info = $has_info_contact_phone || $has_info_contact_phone_two || $has_info_contact_phone_three;
		$has_contact_us_left = !empty($amsha_options['contact_left_headline']) || !empty($amsha_options['contact_left_parahraph']) || $has_left_contact_us_info;
		$has_contact_us_right = !empty($amsha_options['contact_right_headline']) || '[custom_contact_form]';
		$has_contact_us = $has_contact_us_left || $has_contact_us_right;
		if($has_contact_us) { ?>
		<main class="contact-us">
			<div class="contact-us__some-content">
				<?php if($has_contact_us_left) { ?>
				<div class="contact-us__left left-contact-us">
					<?php if($amsha_options['contact_left_headline']) { ?>
					<div class="left-contact-us__headline-block">
						<h2 class="left-contact-us__headline title-headline title-headline--headline-xl"><?php echo esc_html($amsha_options['contact_left_headline']); ?></h2>
					</div>
					<?php } ?>
					<?php if($amsha_options['contact_left_parahraph']) { ?>
					<div class="left-contact-us__parahraph body-text body-text--text-s">
						<p class="left-contact-us__text"><?php echo esc_html($amsha_options['contact_left_parahraph']); ?></p>
					</div>
					<?php } ?>
					<?php 
					if ($has_left_contact_us_info) { ?>
					<div class="left-contact-us__info info-l-contact">
						<?php 
						if (!empty($amsha_options['contact_left_title']) || $has_info_contact_phone) { ?>
						<div class="info-l-contact__title-block">
							<?php if($amsha_options['contact_left_title']) { ?>
							<h3 class="info-l-contact__title title-headline--headline-m"><?php echo esc_html($amsha_options['contact_left_title']); ?></h3>
							<?php } ?>
							<?php if ($has_info_contact_phone) { ?>
							<a href="tel:<?php echo esc_attr($amsha_options['contact_left_link']); ?>" class="info-l-contact__phone body-text body-text--text-s"><?php echo esc_html($amsha_options['contact_left_text_link']); ?></a>
							<?php } ?>
						</div>
						<?php } ?>
						<?php 
						if (!empty($amsha_options['contact_left_title_two']) || $has_info_contact_phone_two) { ?>
						<div class="info-l-contact__title-block">
							<?php if($amsha_options['contact_left_title_two']) { ?>
							<h3 class="info-l-contact__title title-headline--headline-m"><?php echo esc_html($amsha_options['contact_left_title_two']); ?></h3>
							<?php } ?>
							<?php if ($has_info_contact_phone_two) { ?>
							<a href="mailto:<?php echo esc_attr($amsha_options['contact_left_link_two']); ?>" class="info-l-contact__email body-text body-text--text-s"><?php echo esc_html($amsha_options['contact_left_text_link_two']); ?></a>
							<?php } ?>
						</div>
						<?php } ?>
						<?php 
						if (!empty($amsha_options['contact_left_title_three']) || $has_info_contact_phone_three) { ?>
						<div class="info-l-contact__title-block">
							<?php if($amsha_options['contact_left_title_three']) { ?>
							<h3 class="info-l-contact__title title-headline--headline-m"><?php echo esc_html($amsha_options['contact_left_title_three']); ?></h3>
							<?php } ?>
							<?php if ($has_info_contact_phone_three) { ?>
							<a href="<?php echo esc_attr($amsha_options['contact_left_link_three']); ?>" class="info-l-contact__adress body-text body-text--text-s"><?php echo esc_html($amsha_options['contact_left_text_link_three']); ?></a>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if($has_contact_us_right) { ?>
				<div class="contact-us__right right-contact-us">
					<?php	if($amsha_options['contact_right_headline']) { ?>
					<div class="right-contact-us__headline-block">
						<h2 class="right-contact-us__headline title-headline title-headline--headline-l"><?php echo esc_html($amsha_options['contact_right_headline']); ?></h2>
					</div>
					<?php } ?>
					<?php if('[custom_contact_form]') { ?>
					<?php echo do_shortcode('[custom_contact_form]'); ?>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</main>
		<?php } ?>
<?php get_footer();