<?php 
$counter = get_query_var('service_counter');
$text_accordion_services = get_post_meta(get_the_ID(), 'amsha_accordion_services_text_metaboxes', true);
?>
<div class="accordion-services__column">
	<div data-spollers class="accordion-services__spollers">
		<details class="accordion-services__item">
			<summary class="accordion-services__block title-headline title-headline--headline-l ">
				<div class="accordion-services__title"><span class="accordion-services__counter"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></span>
					<div class="accordion-services__text"><?php the_title(); ?></div>
				</div><span class="accordion-services__icon"></span>
			</summary>
			<?php if($text_accordion_services) { ?>
			<div class="accordion-services__body body-text body-text--text-m"><?php echo esc_html($text_accordion_services); ?></div>
			<?php } ?>
		</details>
	</div>
</div>