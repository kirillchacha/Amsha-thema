<?php
/**
 * Template name: Services General Template
 */

get_header(); ?>

		<main class="services">
		<?php global $amsha_options; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'partials/content', 'herosection' ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
		<?php endif; ?>
			<section class="services__accordion-services accordion-services">
				<div class="accordion-services__some-content">
					<div class="accordion-services__content">
					<?php $args = array(
						'post_type' => 'Service-card',
						'posts_per_page' => -1,
						'order'          => 'ASC',
					);
					$service_query = new WP_Query( $args );
					$counter = 1;
					if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post(); 
					set_query_var('service_counter', $counter);
					get_template_part('partials/content', 'service-card');
					$counter++;
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
			<?php get_template_part( 'partials/content', 'before-footer-hero' ); ?>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
			<?php endif; ?>
		</main>

<?php get_footer();