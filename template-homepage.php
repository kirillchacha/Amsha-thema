<?php
/**
 * Template name: Homepage Template
 */

get_header(); ?>

		<main class="page">
		<?php global $amsha_options; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'partials/content', 'herosection' ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
		<?php endif; ?>
		<?php 
		$has_hero_pictures_item_one = !empty($amsha_options['hero_pictures_link_one']) && !empty($amsha_options['hero_pictures_image_one']) && !empty($amsha_options['hero_pictures_alt_one']);
		$has_hero_pictures_item_two = !empty($amsha_options['hero_pictures_link_two']) && !empty($amsha_options['hero_pictures_image_two']) && !empty($amsha_options['hero_pictures_alt_two']);
		$has_hero_picture = $has_hero_pictures_item_one || $has_hero_pictures_item_two;
			if ($has_hero_picture) { ?>
			<section class="page__hero-pictures hero-pictures">
				<div class="hero-pictures__some-content">
					<div class="hero-pictures__block">
						<?php if ($has_hero_pictures_item_one) { ?>
						<div class="hero-pictures__item">
							<a href="<?php echo esc_attr($amsha_options['hero_pictures_link_one']); ?>" class="hero-pictures__link"><img class="hero-pictures__image ibg ibg--contain" src="<?php echo esc_url($amsha_options['hero_pictures_image_one']['url']); ?>" alt="<?php echo esc_attr($amsha_options['hero_pictures_alt_one']); ?>"></a>
						</div>
						<?php } ?>
						<?php if ($has_hero_pictures_item_two) { ?>
						<div class="hero-pictures__item">
							<a href="<?php echo esc_attr($amsha_options['hero_pictures_link_two']); ?>" class="hero-pictures__link"><img class="hero-pictures__image ibg ibg--contain" src="<?php echo esc_url($amsha_options['hero_pictures_image_two']['url']); ?>" alt="<?php echo esc_attr($amsha_options['hero_pictures_alt_two']); ?>"></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</section>
			<?php } ?>
			<section class="page__considering considering">
				<div class="considering__some-content">
					<?php if($amsha_options['considering_headline_one']) { ?>
					<div class="considering__headline-block">
						<h2 class="considering__headline title-headline title-headline--headline-xl"><?php echo $amsha_options['considering_headline_one']; ?><?php if($amsha_options['considering_headline_span_one']) { ?><span class="title-headline__color"> <?php echo $amsha_options['considering_headline_span_one']; ?></span><?php } ?> <?php echo $amsha_options['considering_headline_two']; ?><?php if($amsha_options['considering_headline_span_two']) { ?> <span class="title-headline__color"><?php echo $amsha_options['considering_headline_span_two']; ?></span><?php } ?></h2>
					</div>
					<?php } ?>
					<!-- Оболонка слайдера -->
					<div class="considering__block">
						<div class="considering__slider slider-considering-top swiper">
							<!-- Частина слайдера, що рухається -->
							<div class="considering__wrapper swiper-wrapper">
								<!-- Слайд -->
								<?php $slider = $amsha_options['considering_brand_slider_one'];
								if (!empty($slider)) {
									foreach ($slider as $slide) {
										// Получаем URL изображения из attachment_id
										$image_url = !empty($slide['attachment_id']) ? wp_get_attachment_url($slide['attachment_id']) : '';
										// Получаем описание для alt-тега
										$image_alt = !empty($slide['description']) ? $slide['description'] : 'Slide Image';
										// Выводим слайд только если есть изображение
										if ($image_url) {
											?>
											<div class="considering__slide slide-considering swiper-slide">
												<div class="slide-considering__image-block">
													<img class="slide-considering__image ibg ibg--contain" data-src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
												</div>
											</div>
											<?php
											}
										}
									}
								?>
							</div>
						</div>
						<!-- Оболонка слайдера -->
						<div dir="rtl" class="considering__slider slider-considering-center swiper">
							<!-- Частина слайдера, що рухається -->
							<div class="considering__wrapper swiper-wrapper">
								<!-- Слайд -->
								<?php $slider = $amsha_options['considering_brand_slider_two'];
								if (!empty($slider)) {
									foreach ($slider as $slide) {
										// Получаем URL изображения из attachment_id
										$image_url = !empty($slide['attachment_id']) ? wp_get_attachment_url($slide['attachment_id']) : '';
										// Получаем описание для alt-тега
										$image_alt = !empty($slide['description']) ? $slide['description'] : 'Slide Image';
										// Выводим слайд только если есть изображение
										if ($image_url) {
											?>
											<div class="considering__slide slide-considering swiper-slide">
												<div class="slide-considering__image-block">
													<img class="slide-considering__image ibg ibg--contain" data-src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
												</div>
											</div>
											<?php
											}
										}
									}
								?>
							</div>
						</div>
						<!-- Оболонка слайдера -->
						<div class="considering__slider slider-considering-bottom swiper">
							<!-- Частина слайдера, що рухається -->
							<div class="considering__wrapper swiper-wrapper">
								<!-- Слайд -->
								<?php $slider = $amsha_options['considering_brand_slider_three'];
								if (!empty($slider)) {
									foreach ($slider as $slide) {
										// Получаем URL изображения из attachment_id
										$image_url = !empty($slide['attachment_id']) ? wp_get_attachment_url($slide['attachment_id']) : '';
										// Получаем описание для alt-тега
										$image_alt = !empty($slide['description']) ? $slide['description'] : 'Slide Image';
										// Выводим слайд только если есть изображение
										if ($image_url) {
											?>
											<div class="considering__slide slide-considering swiper-slide">
												<div class="slide-considering__image-block">
													<img class="slide-considering__image ibg ibg--contain" data-src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
												</div>
											</div>
											<?php
											}
										}
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="page__our-clients our-clients">
				<div class="our-clients__some-content">
					<!-- Оболонка слайдера -->
					<div class="our-clients__slider swiper">
						<!-- Частина слайдера, що рухається -->
						<div class="our-clients__wrapper swiper-wrapper">
							<!-- Слайд -->
						<?php $args = array(
						'post_type' => 'Client',
						'posts_per_page' => 3,
						'order'          => 'ASC',
					);
					$service_query = new WP_Query( $args );
					if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post(); 
					get_template_part( 'partials/content', 'client' );
				endwhile;
				the_posts_navigation();
else : get_template_part( 'partials/content', 'none' );
endif; 

wp_reset_postdata();
?>
						</div>
					</div>
				</div>
			</section>
			<section class="page__our-services our-services our-services--home">
				<div class="our-services__some-content">
					<?php if (!empty($amsha_options['our_services_headline']) && !empty($amsha_options['our_services_parahraph'])) { ?>
					<div class="our-services__headline-block">
						<?php if($amsha_options['our_services_headline']) { ?>
						<h2 class="our-services__headline title-headline title-headline--headline-xl"><?php echo $amsha_options['our_services_headline']; ?><?php if($amsha_options['our_services_headline_span']) { ?><span class="title-headline__color"> <?php echo $amsha_options['our_services_headline_span']; ?></span><?php } ?></h2>
						<?php } ?>
						<?php if($amsha_options['our_services_parahraph']) { ?>
						<p class="our-services__text body-text body-text--text-m"><?php echo $amsha_options['our_services_parahraph']; ?></p>
						<?php } ?>
					</div>
					<?php } ?>
					<div class="our-services__content content-services">
					<?php $args = array(
						'post_type' => 'Service',
						'posts_per_page' => -1,
						'order'          => 'ASC',
					);
					$service_query = new WP_Query( $args );
					if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post(); 
					get_template_part( 'partials/content', 'service' );
				endwhile;
				the_posts_navigation();
else : get_template_part( 'partials/content', 'none' );
endif; 

wp_reset_postdata();
?>
					</div>
				</div>
			</section>
			<section class="page__why-choose why-choose">
				<div class="why-choose__some-content">
					<?php if($amsha_options['why_choose_headline']) { ?>
					<div class="why-choose__headline-block">
						<h2 class="why-choose__headline title-headline title-headline--headline-xl"><?php echo $amsha_options['why_choose_headline']; ?><?php if($amsha_options['why_choose_headline_span']) { ?><span class="title-headline__color"> <?php echo $amsha_options['why_choose_headline_span']; ?></span><?php } ?></h2>
					</div>
					<?php } ?>
					<div class="why-choose__items items-choose">
					<?php $args = array(
						'post_type' => 'Acardione',
						'posts_per_page' => 4,
						'order'          => 'ASC',
					);
					$service_query = new WP_Query( $args );
					if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post(); 
					get_template_part( 'partials/content', 'acardione' );
				endwhile;
				the_posts_navigation();
else : get_template_part( 'partials/content', 'none' );
endif; 

wp_reset_postdata();
?>
					</div>
				</div>
			</section>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/content', 'our-sertification' ); ?>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
			<?php endif; ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/content', 'before-footer-hero' ); ?>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
			<?php endif; ?>
		</main>

<?php get_footer();