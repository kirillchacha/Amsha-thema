<?php $parahraph_content_process_one = get_post_meta(get_the_ID(), 'amsha_content_process_text_metaboxes', true); ?>
<div class="content-process__item">
	<div class="content-process__circle <?php echo esc_attr(get_field('content_process_color_scf')); ?>"></div>
	<h2 class="content-process__headline title-headline--headline-m"><?php the_title(); ?></h2>
	<?php if($parahraph_content_process_one) { ?>
	<p class="content-process__parahraph body-text body-text--text-s"><?php echo esc_html($parahraph_content_process_one); ?></p>
	<?php } ?>
</div>