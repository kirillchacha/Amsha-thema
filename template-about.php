<?php
/**
 * Template name: About Template
 */

get_header(); ?>

		<main class="about-us">
		<?php global $amsha_options; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'partials/content', 'herosection' ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
		<?php endif; ?>
			<?php 
			$has_content_services_block = !empty($amsha_options['about_headline']) || !empty($amsha_options['content_services_parahraph']);
			$has_services_image = !empty($amsha_options['content_services_pictures_link']) && !empty($amsha_options['content_services_pictures_image']) && !empty($amsha_options['content_services_pictures_alt']);
			$has_services_actions = !empty($amsha_options['content_services_button_link_text']) && !empty($amsha_options['content_services_button_text']) && !empty($amsha_options['content_services_color_list']);
			$has_content_services_text_block = $has_content_services_block || $has_services_image || $has_services_actions;
			if ($has_content_services_text_block) { ?>
			<section class="about-us__our-services our-services our-services--about">
				<div class="our-services__some-content">
					<div class="our-services__content content-services">
						<div class="content-services__item">
							<div class="content-services__text-block">
								<?php if ($has_content_services_block) { ?>
								<div class="content-services__block">
									<?php if ($amsha_options['about_headline']) { ?>
									<div class="content-services__title-block">
										<h2 class="content-services__headline--about-us title-headline title-headline--headline-l"><?php if($amsha_options['about_headline_span']) { ?><span class="title-headline__color"><?php echo esc_html($amsha_options['about_headline_span']); ?> </span><?php } ?></h2>
										<h2 class="content-services__headline--about-us title-headline title-headline--headline-l"><?php echo esc_html($amsha_options['about_headline']); ?></h2>
									</div>
									<?php } ?>
									<?php if ($amsha_options['content_services_parahraph']) { ?>
									<div class="content-services__parahraph body-text body-text--text-s">
										<p class="content-services__text"><?php echo esc_html($amsha_options['content_services_parahraph']); ?></p>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
								<?php 
								if ($has_services_image) { ?>
								<div class="content-services__image-block-mobile">
									<a href="<?php echo esc_attr($amsha_options['content_services_pictures_link']); ?>" class="content-services__link"><img class="content-services__image--about ibg" src="<?php echo esc_url($amsha_options['content_services_pictures_image']['url']); ?>" alt="<?php echo esc_attr($amsha_options['content_services_pictures_alt']); ?>"></a>
								</div>
								<?php } ?>
								<?php if ($has_services_actions) { ?>
								<div class="content-services__actions">
									<a href="<?php echo esc_attr($amsha_options['content_services_button_link_text']); ?>" class="body-text body-text--text-xs <?php echo esc_attr($amsha_options['content_services_color_list']); ?>"><?php echo esc_html($amsha_options['content_services_button_text']); ?></a>
								</div>
								<?php } ?>
							</div>
							<?php if ($has_services_image) { ?>
							<div class="content-services__image-block">
								<a href="<?php echo esc_attr($amsha_options['content_services_pictures_link']); ?>" class="content-services__link"><img class="content-services__image--about ibg" src="<?php echo esc_url($amsha_options['content_services_pictures_image']['url']); ?>" alt="<?php echo esc_attr($amsha_options['content_services_pictures_alt']); ?>"></a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<?php } ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/content', 'our-sertification' ); ?>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
			<?php endif; ?>
			<?php
			$has_about_pride = !empty($amsha_options['about_pride_headline']) || !empty($amsha_options['about_pride_parahraph']);
			$has_about_pride_action = !empty($amsha_options['about_pride_button_link_text']) && !empty($amsha_options['about_pride_color_list']) && !empty($amsha_options['about_pride_button_text']);
			$has_about_pride_section = $has_about_pride || $has_about_pride_action;
			if ($has_about_pride_section) { ?>
			<section class="about-us__pride hero-section hero-section--pride">
				<div class="hero-section__some-content">
					<?php if ($has_about_pride) { ?>
					<div class="hero-section__title-block">
						<?php if ($amsha_options['about_pride_headline']) { ?>
						<h2 class="hero-section__title title-headline title-headline--headline-xl"><?php echo esc_html($amsha_options['about_pride_headline']); ?><?php if ($amsha_options['about_pride_headline_span']) { ?><span class="title-headline__color"> <?php echo esc_html($amsha_options['about_pride_headline_span']); ?></span><?php } ?></h2>
						<?php } ?>
						<?php if ($amsha_options['about_pride_parahraph']) { ?>
						<div class="hero-section__parahraph body-text body-text--text-m">
							<p class="hero-section__text"><?php echo esc_html($amsha_options['about_pride_parahraph']); ?></p>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					<?php 
					if ($has_about_pride_action) { ?>
					<div class="hero-section__actions actions-hero">
						<a href="<?php echo esc_attr($amsha_options['about_pride_button_link_text']); ?>" class="body-text body-text--text-xs <?php echo esc_attr($amsha_options['about_pride_color_list']); ?>"><?php echo esc_html($amsha_options['about_pride_button_text']); ?></a>
					</div>
					<?php } ?>
				</div>
			</section>
			<?php } ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/content', 'before-footer-hero' ); ?>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
			<?php endif; ?>
		</main>

<?php get_footer();