<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amsha
 */

?>
<?php global $amsha_options; ?>

<footer class="footer">
			<div class="footer__some-content">
			<?php if (!empty($amsha_options['logo_link_dark']) && !empty($amsha_options['logo_dark']) && !empty($amsha_options['logo_alt_dark'])) { ?>
				<a href="<?php echo $amsha_options['logo_link_dark']; ?>" class="footer__logo"><img src="<?php echo esc_url($amsha_options['logo_dark']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_dark']; ?>"></a>
				<?php } ?>
				<div class="footer__menu menu-footer">
					<nav class="menu-footer__body">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_nav_one',
							'container'      => false,
							'menu_class'     => 'menu-footer__list',
							'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
							'walker'         => new Custom_Walker_Nav_Menu()
						));
						?>
					</nav>
				</div>
				<div class="footer__social-block block-social">
					<ul class="block-social__list">
					<?php $social_links = $amsha_options['footer_social_link_sortable']; 
								
								foreach($social_links as $social=>$link){
									$class = '';
									$class_item = '';
									if($social == 'Facebook Link') {
										$class = '_icon-social-facebook';
									} else if($social == 'Instagram Link') {
										$class = '_icon-social-instagram';
									} else if($social == 'TwitterX Link') {
										$class = '_icon-social-twitter';
									} else if($social == 'WhatsApp Link') {
										$class = '_icon-social-whatsapp';
									} else if($social == 'Linkedin Link') {
										$class = '_icon-social-linkedin';
									}
									?>
									<?php if($link) { ?>
									<li class="block-social__item"><a href="<?php echo $link ?>" class="block-social__link title-headline title-headline--headline-m <?php echo $class ?>" target="_blank"></a></li>
									<?php } ?>
							<?php } ?>
					</ul>
				</div>
				<div class="footer__local-and-copy body-text body-text--text-xs">
					<div class="footer__location grey-text-color">
					<?php if (!empty($amsha_options['footer_location_text'])) {
						if (!empty($amsha_options['footer_location_link'])) {
							echo '<a href="' . esc_url($amsha_options['footer_location_link']) . '" class="footer__location-text">' . esc_html($amsha_options['footer_location_text']) . '</a>';
						} else {
							echo '<p class="footer__location-text">' . esc_html($amsha_options['footer_location_text']) . '</p>';
						}
					} ?>
					</div>
					<?php if($amsha_options['footer_copy_text']){ ?>
					<div class="footer__copy grey-text-color">© <?php echo date('Y') . ' ' . $amsha_options['footer_copy_text']; ?></div>
					<?php } ?>
				</div>
			</div>
		</footer>

<?php wp_footer(); ?>

</body>
</html>
