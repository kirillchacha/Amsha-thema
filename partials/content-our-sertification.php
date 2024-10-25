<?php $title_our_certifications = get_post_meta(get_the_ID(), 'amsha_our_certifications_headline_metaboxes', true); ?>
<?php $title_span_our_certifications = get_post_meta(get_the_ID(), 'amsha_our_certifications_span_headline_metaboxes', true); ?>
<?php $box_color_item_one = get_post_meta(get_the_ID(), 'amsha_content_certifications_one_metaboxes', true); ?>
<?php $box_color_item_two = get_post_meta(get_the_ID(), 'amsha_content_certifications_two_metaboxes', true); ?>
<?php $title_content_certifications_one = get_post_meta(get_the_ID(), 'amsha_content-certifications_title_one_metaboxes', true); ?>
<?php $parahraph_content_certifications_one = get_post_meta(get_the_ID(), 'amsha_content-certifications_text_one_metaboxes', true); ?>
<?php $title_content_certifications_two = get_post_meta(get_the_ID(), 'amsha_content-certifications_title_two_metaboxes', true); ?>
<?php $parahraph_content_certifications_two = get_post_meta(get_the_ID(), 'amsha_content-certifications_text_two_metaboxes', true); ?>
<?php if(is_page_template('template-homepage.php') || is_page_template('template-services-separate.php')) { ?>
<section class="page__our-certifications our-certifications our-certifications--home">
	<div class="our-certifications__some-content">
		<?php if($title_our_certifications) { ?>
		<div class="our-certifications__headline-block">
			<h2 class="our-certifications__headline title-headline title-headline--headline-xl"><?php echo esc_html($title_our_certifications); ?><?php if($title_span_our_certifications) { ?><span class="title-headline__color"> <?php echo esc_html($title_span_our_certifications); ?></span><?php } ?></h2>
		</div>
		<?php } ?>
		<div class="our-certifications__content content-certifications">
			<?php if(!empty($title_content_certifications_one) && !empty($parahraph_content_certifications_one)) { ?>
			<div class="content-certifications__item <?php echo esc_attr(get_field('content_certifications_one_scf')); ?>">
				<h2 class="content-certifications__headline title-headline title-headline--headline-l"><?php echo esc_html($title_content_certifications_one); ?></h2>
				<div class="content-certifications__parahraph body-text body-text--text-m">
					<p class="content-certifications__text"><?php echo esc_html($parahraph_content_certifications_one); ?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(!empty($title_content_certifications_two) && !empty($parahraph_content_certifications_two)) { ?>
			<div class="content-certifications__item <?php echo esc_attr(get_field('content_certifications_two_scf')); ?>">
				<h2 class="content-certifications__headline title-headline title-headline--headline-l"><?php echo esc_html($title_content_certifications_two); ?></h2>
				<div class="content-certifications__parahraph body-text body-text--text-m">
					<p class="content-certifications__text"><?php echo esc_html($parahraph_content_certifications_two); ?></p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } else { ?>
	<section class="page__our-certifications our-certifications our-certifications--about">
	<div class="our-certifications__some-content">
		<div class="our-certifications__content content-certifications">
			<?php if(!empty($title_content_certifications_one) && !empty($parahraph_content_certifications_one)) { ?>
				<div class="content-certifications__item <?php echo esc_attr(get_field('content_certifications_one_scf')); ?>">
				<h2 class="content-certifications__headline title-headline title-headline--headline-l"><?php echo esc_html($title_content_certifications_one); ?></h2>
				<div class="content-certifications__parahraph body-text body-text--text-m">
					<p class="content-certifications__text"><?php echo esc_html($parahraph_content_certifications_one); ?></p>
				</div>
			</div>
			<?php } ?>
			<?php if(!empty($title_content_certifications_two) && !empty($parahraph_content_certifications_two)) { ?>
			<div class="content-certifications__item <?php echo esc_attr(get_field('content_certifications_two_scf')); ?>">
				<h2 class="content-certifications__headline title-headline title-headline--headline-l"><?php echo esc_html($title_content_certifications_two); ?></h2>
				<div class="content-certifications__parahraph body-text body-text--text-m">
					<p class="content-certifications__text"><?php echo esc_html($parahraph_content_certifications_two); ?></p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php }  ?>