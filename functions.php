<?php
/**
 * amsha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package amsha
 */

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/redux-options.php';
add_action( 'tgmpa_register', 'amsha_register_required_plugins' );

function amsha_register_required_plugins() {

	$plugins = array(

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'amsha',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

function amsha_admin_scripts($hook) {
	// Add scripts for metaboxes
  	if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
		wp_enqueue_style('amsha-metabox', get_template_directory_uri().'/css/metaboxes.css', array(), '1.0');
		wp_enqueue_script( 'amsha-metaboxes', get_template_directory_uri() . '/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
  	}
}
add_action( 'admin_enqueue_scripts', 'amsha_admin_scripts', 10 );

function amsha_enqueue_scripts(){
	wp_enqueue_style('amsha_general', get_template_directory_uri().'/css/style.min.css', array(), '3.2', 'all');
	wp_enqueue_script( 'amsha_script', get_template_directory_uri() . '/js/app.min.js', array(), '20240917', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'amsha_enqueue_scripts');

// Меню
function amsha_register_menus() {
	register_nav_menus(array(
		'header_nav_one' => 'Header Navigation',
      'footer_nav_one' => 'Footer Navigation 1',
      'footer_nav_two' => 'Footer Navigation 2',
	));

// Кастомный класс Walker для меню
class Amsha_Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	// Начало элемента меню
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		 $classes = empty($item->classes) ? array() : (array) $item->classes;
		 $classes[] = $depth === 0 ? 'menu__item' : 'sub-menu__item'; // Добавляем класс для li в зависимости от уровня вложенности
		 $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
		 $class_names = ' class="' . esc_attr($class_names) . '"';

		 $output .= '<li' . $class_names . '>';

		 // Определяем классы для ссылки <a>
		 $link_classes = $depth === 0 ? 'menu__link' : 'sub-menu__link';

		 // Проверка шаблона страницы и добавление классов в зависимости от текущей страницы для элементов верхнего уровня
		 if ($depth === 0) {
			  if (is_page_template('template-homepage.php') || is_page_template('template-contact.php')) {
					$link_classes .= ' menu__link--header-white';
			  } else {
					$link_classes .= ' menu__link--header-black';
			  }
		 }

		 $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		 $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		 $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		 $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		 $attributes .= ' class="' . esc_attr($link_classes) . '"';

		 $item_output = $args->before;
		 $item_output .= '<a' . $attributes . '>';
		 $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		 $item_output .= '</a>';
		 $item_output .= $args->after;

		 $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	// Начало подменю
	function start_lvl(&$output, $depth = 0, $args = null) {
		 $indent = str_repeat("\t", $depth);
		 $submenu_class = $depth === 0 ? 'sub-menu__list' : 'sub-sub-menu__list'; // Можно добавить другие уровни подменю, если нужно
		 $output .= "\n$indent<ul class=\"$submenu_class\">\n";
	}
}

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	// Начало элемента списка
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		 // Добавляем класс для li
		 $classes = 'menu-footer__item';
		 $output .= '<li class="' . esc_attr($classes) . '">';

		 // Формируем ссылку с классом
		 $attributes = !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
		 $item_output = '<a' . $attributes . ' class="menu-footer__link title-headline title-headline--headline-s">';
		 $item_output .= apply_filters('the_title', $item->title, $item->ID);
		 $item_output .= '</a>';

		 // Выводим
		 $output .= $item_output;
	}

	// Конец элемента списка
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		 $output .= '</li>';
	}
}

		load_theme_textdomain( 'amsha', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
	
		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
}
add_action('after_setup_theme', 'amsha_register_menus',0);

function amsha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amsha_content_width', 640 );
}
add_action( 'after_setup_theme', 'amsha_content_width', 0 );


function amsha_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'amsha' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'amsha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'amsha_widgets_init' );

function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();
	$prefix = "amsha_";
	

	$meta_boxes[] = array(
		'id'         => 'services_separate_metaboxes',
      'title'      => 'Settings for services separate pages',
		'pages'      => array( 'page', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      'fields' => array(
			array(
				'name' => 'Title 2:',
            'desc' => 'Add the Title 2',
            'id'   => $prefix . 'services_separate_title_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Text:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'services_separate_text_metaboxes',
            'type' => 'text',
			),
			
		)
	);
	$meta_boxes[] = array(
		'id'         => 'our_certifications_metaboxes',
      'title'      => 'Section "our certifications"',
		'pages'      => array( 'page', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      'fields' => array(
			array(
				'name' => 'Title:',
            'desc' => 'Add the Title',
            'id'   => $prefix . 'our_certifications_headline_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Color Title:',
            'desc' => 'Add the Color Title',
            'id'   => $prefix . 'our_certifications_span_headline_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Title 1:',
            'desc' => 'Add the Title',
            'id'   => $prefix . 'content-certifications_title_one_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Text 1:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'content-certifications_text_one_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Title 2:',
            'desc' => 'Add the Title',
            'id'   => $prefix . 'content-certifications_title_two_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Text 2:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'content-certifications_text_two_metaboxes',
            'type' => 'text',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'our_services_metaboxes',
      'title'      => 'Settings for Our services',
		'pages'      => array( 'Service', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      'fields' => array(
			array(
				'name' => 'Text:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'our_services_text_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Button link:',
            'desc' => 'Add the Button link',
            'id'   => $prefix . 'our_services_button_link_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Button text:',
            'desc' => 'Add the Button text',
            'id'   => $prefix . 'our_services_button_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'img link:',
            'desc' => 'Add the image link',
            'id'   => $prefix . 'our_services_media_link_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Upload image:',
				'id'   => $prefix . 'our_services_media_metaboxes',
				'type' => 'file', // Тип "file" для загрузки медиафайлов
			),
			array(
				'name' => 'img alt:',
            'desc' => 'Add the text alt',
            'id'   => $prefix . 'our_services_media_alt_metaboxes',
            'type' => 'text',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'content_process_metaboxes',
      'title'      => 'Settings for Steps',
		'pages'      => array( 'Step', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      'fields' => array(
			array(
				'name' => 'Text:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'content_process_text_metaboxes',
            'type' => 'text',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'active_accordion_metaboxes',
      'title'      => 'Settings for Accordions',
		'pages'      => array( 'Acardione', ),
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true,
      'fields' => array(
			array(
				'name' => 'Text:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'active_accordion_text_metaboxes',
            'type' => 'text',
			),
			array(
				'name' => 'Upload image:',
				'id'   => $prefix . 'active_accordion_media_metaboxes',
				'type' => 'file',
			),
			array(
				'name' => 'img alt:',
            'desc' => 'Add the text alt',
            'id'   => $prefix . 'active_accordion_media_alt_metaboxes',
            'type' => 'text',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'accordion_services_metaboxes',
      'title'      => 'Settings for Service card',
		'pages'      => array( 'Service-card', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      'fields' => array(
			array(
				'name' => 'Text:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'accordion_services_text_metaboxes',
            'type' => 'text',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'accordion_services_metaboxes',
      'title'      => 'Settings for Service card',
		'pages'      => array( 'Client', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      'fields' => array(
			array(
				'name' => 'Title:',
				'desc' => 'Add the Title',
				'id'   => $prefix . 'our_clients_headline_metaboxes',
				'type' => 'text',
			),
			array(
				'name' => 'Text:',
            'desc' => 'Add the Text',
            'id'   => $prefix . 'our_clients_text_metaboxes',
            'type' => 'text',
			),
		)
	);
	return $meta_boxes;
}