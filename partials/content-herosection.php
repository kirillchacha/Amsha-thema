<?php if(is_page_template('template-homepage.php')) { ?>
	<?php global $amsha_options; ?>
	<section class="page__hero hero-section hero-section--under-header">
		<div class="hero-section__some-content">
			<div class="hero-section__title-block">
				<?php if($amsha_options['homepage_under_header_headline']) { ?>
				<h1 class="hero-section__title title-headline title-headline--Heading-xxl"><?php if($amsha_options['homepage_under_header_headline_span_one']) { ?><span class="title-headline__color"><?php echo $amsha_options['homepage_under_header_headline_span_one']; ?> </span><?php } ?><?php echo $amsha_options['homepage_under_header_headline']; ?><?php if($amsha_options['homepage_under_header_headline_span_two']) { ?><span class="title-headline__color"> <?php echo $amsha_options['homepage_under_header_headline_span_two']; ?></span><?php } ?></h1>
				<?php } ?>
				<?php if($amsha_options['homepage_under_header_parahraph']) { ?>
				<div class="hero-section__parahraph body-text body-text--text-s">
					<p class="hero-section__text"><?php echo $amsha_options['homepage_under_header_parahraph']; ?></p>
				</div>
				<?php } ?>
			</div>
			<?php (!empty($amsha_options['homepage_hero_button_text_one']) && !empty($amsha_options['homepage_hero_button_text_two'])); { ?>
			<div class="hero-section__actions actions-hero">
				<?php if(!empty($amsha_options['homepage_hero_button_text_one']) && !empty($amsha_options['homepage_hero_button_link_text_one'])) { ?>
				<a href="<?php echo $amsha_options['homepage_hero_button_link_text_one']; ?>" class="body-text body-text--text-xs <?php echo esc_attr($amsha_options['homepage_text_list_one']); ?>"><?php echo esc_html($amsha_options['homepage_hero_button_text_one']); ?></a>
				<?php } ?>
				<?php if(!empty($amsha_options['homepage_hero_button_text_two']) && !empty($amsha_options['homepage_hero_button_link_text_two'])) { ?>
				<a href="<?php echo $amsha_options['homepage_hero_button_link_text_two']; ?>" class="body-text body-text--text-xs <?php echo esc_attr($amsha_options['homepage_text_list_two']); ?>"><?php echo esc_html($amsha_options['homepage_hero_button_text_two']); ?></a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</section>
<?php } else { ?>
	<section class="about-us__hero hero-section hero-section--black">
	<?php global $amsha_options; ?>
		<div class="hero-section__some-content hero-section__some-content--black">
			<div class="hero-section__title-block">
				<?php if(is_page_template('template-about.php')) { ?>
				<?php if($amsha_options['about_hero_headline']) { ?>
				<h1 class="hero-section__title title-headline title-headline--Heading-xxl"><?php echo esc_html($amsha_options['about_hero_headline']); ?></h1>
				<?php }  ?>
				<?php } elseif(is_page_template('template-services-general.php')) { ?>
				<?php if($amsha_options['services_general_hero_headline']) { ?>
				<h1 class="hero-section__title title-headline title-headline--Heading-xxl"><?php echo esc_html($amsha_options['services_general_hero_headline']); ?></h1>
				<?php }  ?>
				<?php } elseif(is_page_template('template-services-separate.php')) { ?>
				<h1 class="hero-section__title title-headline title-headline--Heading-xxl"><?php echo get_the_title(); ?></h1>
				<?php $title_two_hero = get_post_meta(get_the_ID(), 'amsha_services_separate_title_metaboxes', true); ?>
				<?php if($title_two_hero) { ?>
				<h2 class="hero-section__headline title-headline title-headline--headline-l"><?php echo $title_two_hero ?></h2>
				<?php } ?>
				<?php } ?>
				<?php if(is_page_template('template-about.php')) { ?>
				<?php if($amsha_options['about_hero_parahraph']) { ?>
				<div class="hero-section__parahraph body-text body-text--text-s">
					<p class="hero-section__text"><?php echo esc_html($amsha_options['about_hero_parahraph']); ?></p>
				</div>
				<?php } ?>
				<?php } elseif(is_page_template('template-services-general.php')) { ?>
				<?php if($amsha_options['services_general_hero_parahraph']) { ?>
				<div class="hero-section__parahraph body-text body-text--text-s">
						<p class="hero-section__text"><?php echo esc_html($amsha_options['services_general_hero_parahraph']); ?></p>
				</div>
				<?php } ?>
				<?php } elseif(is_page_template('template-services-separate.php')) { ?>
				<?php $text_hero = get_post_meta(get_the_ID(), 'amsha_services_separate_text_metaboxes', true); ?>
				<?php if($text_hero) { ?>
				<div class="hero-section__parahraph body-text body-text--text-s">
					<p class="hero-section__text"><?php echo $text_hero ?></p>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
			<?php if(is_page_template('template-about.php')) { ?>
			<?php if(!empty($amsha_options['about_hero_button_link_text_one']) && !empty($amsha_options['about_hero_button_text'])) { ?>
			<div class="hero-section__actions actions-hero">
				<a href="<?php echo $amsha_options['about_hero_button_link_text_one']; ?>" class="body-text body-text--text-xs <?php echo esc_attr($amsha_options['about_hero_text_list']); ?>"><?php echo esc_html($amsha_options['about_hero_button_text']); ?></a>
			</div>
			<?php } ?>
			<?php } elseif(is_page_template('template-services-general.php') || is_page_template('template-services-separate.php')) { ?>
			<?php if(!empty($amsha_options['services_general_button_link_text_two']) && !empty($amsha_options['services_general_button_text'])) { ?>
			<div class="hero-section__actions actions-hero">
				<a href="<?php echo $amsha_options['services_general_button_link_text_two']; ?>" class="body-text body-text--text-xs <?php echo esc_attr($amsha_options['services_general_text_list']); ?>"><?php echo esc_html($amsha_options['services_general_button_text']); ?></a>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
	</section>
<?php }  ?>