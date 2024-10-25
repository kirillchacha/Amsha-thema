<?php 
$title_our_clients = get_post_meta(get_the_ID(), 'amsha_our_clients_headline_metaboxes', true);
$text_our_clients = get_post_meta(get_the_ID(), 'amsha_our_clients_text_metaboxes', true); 
$has_innovation = $title_our_clients || $text_our_clients; 
?>
<div class="our-clients__slide slide-our-clients swiper-slide">
	<div class="slide-our-clients__content">
		<div class="slide-our-clients__headline-block">
			<h2 class="slide-our-clients__headline title-headline title-headline--headline-xl"><?php the_title(); ?></h2>
		</div>
		<?php if($has_innovation) { ?>
		<div class="slide-our-clients__innovation innovation">
			<?php if($title_our_clients) { ?>
			<h2 class="innovation__headline title-headline title-headline--headline-l"><?php echo esc_html($title_our_clients); ?></h2>
			<?php } ?>
			<?php if($text_our_clients) { ?>
			<div class="innovation__parahraph body-text body-text--text-m">
				<p class="innovation__text"><?php echo esc_html($text_our_clients); ?></p>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>