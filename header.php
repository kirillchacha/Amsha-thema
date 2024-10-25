<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amsha
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php global $amsha_options; ?>
<div class="wrapper">
<?php if (is_page_template('template-homepage.php') || is_page_template('template-contact.php')) { 
	$scroll_header_bottom = esc_html($amsha_options['header_scroll_customization']);
	?>
	<header data-scroll="<?php echo $scroll_header_bottom ?>" data-scroll-show class="header">
	<div class="header__some-content">
			<div class="header__block">
				<?php if (!empty($amsha_options['logo_link_white']) && !empty($amsha_options['logo_white']) && !empty($amsha_options['logo_alt_white'])) { ?>
				<a href="<?php echo $amsha_options['logo_link_white']; ?>" class="header__logo"><img src="<?php echo esc_url($amsha_options['logo_white']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_white']; ?>"></a>
				<?php } ?>
				<?php if (!empty($amsha_options['logo_link_dark']) && !empty($amsha_options['logo_dark_no_text']) && !empty($amsha_options['logo_alt_dark'])) { ?>
				<a href="<?php echo $amsha_options['logo_link_dark']; ?>" class="header__logo-mobile"><img src="<?php echo esc_url($amsha_options['logo_dark_no_text']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_dark']; ?>"></a>
				<?php } ?>
				<?php if($amsha_options['header_logo_text_one']) { ?>
				<div class="header__text header__text--black"><?php echo $amsha_options['header_logo_text_one']; ?></div>
				<?php } ?>
				<div class="header__menu menu">
					<nav class="menu__body">
					<?php wp_nav_menu(array(
    'theme_location' => 'header_nav_one',
    'container'      => false,
    'menu_class'     => 'menu__list',
    'fallback_cb'    => false,
    'walker'         => new Amsha_Custom_Walker_Nav_Menu(), // Используем наш кастомный Walker
));
?>
						<?php if (!empty($amsha_options['logo_link_dark']) && !empty($amsha_options['logo_dark']) && !empty($amsha_options['logo_alt_dark'])) { ?>
						<a href="<?php echo $amsha_options['logo_link_dark']; ?>" class="menu__logo"><img src="<?php echo esc_url($amsha_options['logo_dark']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_dark']; ?>"></a>
						<?php } ?>
					</nav>
				</div>
				<div class="header__actions actions-header">
					<?php if (!empty($amsha_options['header_contact_link']) && !empty($amsha_options['header_contact_button'])) { ?>
					<a href="<?php echo $amsha_options['header_contact_link']; ?>" class="actions-header__button button button--header"><span><?php echo $amsha_options['header_contact_button']; ?></span></a>
					<?php } ?>
					<button type="button" class="menu__icon icon-menu"><span class="icon-menu__lines"></span><span class="icon-menu__text">Close</span></button>
				</div>
			</div>
		</div>
	</header>
	<?php } else { ?>
	<header data-scroll="<?php echo $scroll_header_bottom ?>" data-scroll-show class="header">
	<div class="header__some-content header__some-content--white">
				<div class="header__block header__block--white">
				<?php if (!empty($amsha_options['logo_link_dark']) && !empty($amsha_options['logo_dark']) && !empty($amsha_options['logo_alt_dark'])) { ?>
					<a href="<?php echo $amsha_options['logo_link_dark']; ?>" class="header__logo"><img src="<?php echo esc_url($amsha_options['logo_dark']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_dark']; ?>"></a>
					<?php } ?>
					<?php if (!empty($amsha_options['logo_link_white']) && !empty($amsha_options['logo_white_no_text']) && !empty($amsha_options['logo_alt_white'])) { ?>
					<a href="<?php echo $amsha_options['logo_link_white']; ?>" class="header__logo-mobile"><img src="<?php echo esc_url($amsha_options['logo_white_no_text']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_white']; ?>"></a>
					<?php } ?>
					<?php if($amsha_options['header_logo_text_two']) { ?>
					<div class="header__text header__text--white"><?php echo $amsha_options['header_logo_text_two']; ?></div>
					<?php } ?>
					<div class="header__menu menu">
						<nav class="menu__body">
						<?php wp_nav_menu(array(
    'theme_location' => 'header_nav_one',
    'container'      => false,
    'menu_class'     => 'menu__list',
    'fallback_cb'    => false,
    'walker'         => new Amsha_Custom_Walker_Nav_Menu(),
));
?>
							<?php if (!empty($amsha_options['logo_link_dark']) && !empty($amsha_options['logo_dark']) && !empty($amsha_options['logo_alt_dark'])) { ?>
						<a href="<?php echo $amsha_options['logo_link_dark']; ?>" class="menu__logo"><img src="<?php echo esc_url($amsha_options['logo_dark']['url']); ?>" alt="<?php echo $amsha_options['logo_alt_dark']; ?>"></a>
						<?php } ?>
						</nav>
					</div>
					<div class="header__actions actions-header">
						<?php if (!empty($amsha_options['header_contact_link']) && !empty($amsha_options['header_contact_button'])) { ?>
						<a href="<?php echo $amsha_options['header_contact_link']; ?>" class="actions-header__button <?php echo esc_attr($amsha_options['header_color_list']); ?> button--header"><span><?php echo $amsha_options['header_contact_button']; ?></span></a>
						<?php } ?>
						<button type="button" class="menu__icon icon-menu icon-menu--two"><span class="icon-menu__lines icon-menu__lines--two"></span><span class="icon-menu__text">Close</span></button>
					</div>
				</div>
			</div>
		</header>
		<?php } ?>