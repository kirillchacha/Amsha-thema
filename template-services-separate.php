<?php
/**
 * Template name: Services Separate Template
 */

get_header(); ?>

		<main class="services-separate">
		<?php global $amsha_options; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'partials/content', 'herosection' ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
		<?php endif; ?>
			<?php 
			$has_process_separate_title_block = !empty($amsha_options['services_process_headline']) || !empty($amsha_options['services_process_parahraph']);
			$service_query = new WP_Query( $args );
			$has_posts = $service_query->have_posts();
			$has_process_separate_button_block = !empty($amsha_options['services_process_button_link_text']) && !empty($amsha_options['services_process_color_list']) && !empty($amsha_options['services_process_button_text']);
			$has_process_separate = $has_process_separate_title_block || $has_posts || $has_process_separate_button_block;
			if($has_process_separate) { ?>
			<section class="services-separate__process process-separate">
				<div class="process-separate__some-content">
					<?php
					if($has_process_separate_title_block) { ?>
					<div class="process-separate__title-block">
						<?php if($amsha_options['services_process_headline']) { ?>
						<h2 class="process-separate__title title-headline title-headline--headline-xl"><?php echo esc_html($amsha_options['services_process_headline']); ?><?php if($amsha_options['services_process_headline_span']) { ?><span class="title-headline__color"> <?php echo esc_html($amsha_options['services_process_headline_span']); ?></span><?php } ?></h2>
						<?php } ?>
						<?php if($amsha_options['services_process_parahraph']) { ?>
						<div class="process-separate__parahraph body-text body-text--text-s hero-section__parahraph--two">
							<p class="process-separate__text"><?php echo esc_html($amsha_options['services_process_parahraph']); ?></p>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					<div class="process-separate__content content-process">
					<?php $args = array(
						'post_type' => 'Step',
						'posts_per_page' => 4,
						'order'          => 'ASC',
					);
					$service_query = new WP_Query( $args );
					$has_posts = $service_query->have_posts();
					if ($has_posts) : while ( $service_query->have_posts() ) : $service_query->the_post(); 
					get_template_part( 'partials/content', 'step' );
				endwhile;
				the_posts_navigation();
else : get_template_part( 'partials/content', 'none' );
endif; 
wp_reset_postdata();
?>
					</div>
					<?php 
					if($has_process_separate_button_block) { ?>
					<div class="process-separate__button-block">
						<a href="<?php echo esc_attr($amsha_options['services_process_button_link_text']); ?>" class="process-separate__button body-text body-text--text-xs <?php echo esc_attr($amsha_options['services_process_color_list']); ?>"><?php echo esc_html($amsha_options['services_process_button_text']); ?></a>
					</div>
					<?php } ?>
				</div>
			</section>
			<?php } ?>
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