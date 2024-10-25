<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'amsha_options';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'submenu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => false,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Sample Options', 'amsha' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Sample Options', 'amsha' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => true,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'amsha' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Global Settings', 'amsha' ),
		'id'               => 'globalsettings',
		'desc'             => esc_html__( 'Options for all', 'amsha' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-wordpress',
	)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Logo Settings', 'amsha' ),
	'id'               => 'site_settings_logo',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Logo!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'start-logo-white',
			'type'     => 'section',
			'title'    => esc_html__( 'White logo', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'header_logo_text_one',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Logo text:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Text', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Text', 'amsha' ),
		),
		array(
			'id'			 => 'logo_link_white',
			'type'		 => 'text',
			'title'		 => __( 'Logo Link', 'amsha' ),
			'desc'		 => __( 'Add logo link:', 'amsha' ),
			'subtitle'	 => __( 'Basic Logo Link', 'amsha' ),
		),
		array(
			'id'			 => 'logo_white',
			'type'		 => 'media',
			'url'			 => true,
			'title'		 => __( 'The Site Logo', 'amsha' ),
			'compiler'	 => true,
			'desc'		 => __( 'Add media', 'amsha' ),
			'subtitle'	 => __( 'Basic media uploader with disabled URL input field', 'amsha' ),
		),
		array(
			'id'			 => 'logo_white_no_text',
			'type'		 => 'media',
			'url'			 => true,
			'title'		 => __( 'Logo with no text', 'amsha' ),
			'compiler'	 => true,
			'desc'		 => __( 'Add media', 'amsha' ),
			'subtitle'	 => __( 'Basic media uploader with disabled URL input field', 'amsha' ),
		),
		array(
			'id'			 => 'logo_alt_white',
			'type'		 => 'text',
			'title'		 => __( 'Enter the name of the picture:', 'amsha' ),
			'desc'		 => __( 'alt = "Name"', 'amsha' ),
		),
		array(
			'id'     => 'end-logo-white',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'start-logo-dark',
			'type'     => 'section',
			'title'    => esc_html__( 'Dark logo', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'header_logo_text_two',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Logo text:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Text', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Text', 'amsha' ),
		),
		array(
			'id'			 => 'logo_link_dark',
			'type'		 => 'text',
			'title'		 => __( 'Logo Link', 'amsha' ),
			'desc'		 => __( 'Add logo link:', 'amsha' ),
			'subtitle'	 => __( 'Basic Logo Link', 'amsha' ),
		),
		array(
			'id'			 => 'logo_dark',
			'type'		 => 'media',
			'url'			 => true,
			'title'		 => __( 'The Site Logo', 'amsha' ),
			'compiler'	 => true,
			'desc'		 => __( 'Add media', 'amsha' ),
			'subtitle'	 => __( 'Basic media uploader with disabled URL input field', 'amsha' ),
		),
		array(
			'id'			 => 'logo_dark_no_text',
			'type'		 => 'media',
			'url'			 => true,
			'title'		 => __( 'Logo with no text', 'amsha' ),
			'compiler'	 => true,
			'desc'		 => __( 'Add media', 'amsha' ),
			'subtitle'	 => __( 'Basic media uploader with disabled URL input field', 'amsha' ),
		),
		array(
			'id'			 => 'logo_alt_dark',
			'type'		 => 'text',
			'title'		 => __( 'Enter the name of the picture:', 'amsha' ),
			'desc'		 => __( 'alt = "Name"', 'amsha' ),
		),
		array(
			'id'     => 'end-logo-dark',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
		'title'            => esc_html__( 'Header Settings', 'amsha' ),
		'id'               => 'site_settings_header',
		'subsection'		 => true,
		'desc'             => __( 'Settings for Header!', 'amsha' ),
		'customizer_width' => '450px',
		'fields'				 => array(
			array(
				'id'       => 'header-start-everything-else',
				'type'     => 'section',
				'title'    => esc_html__( 'Everything else', 'amsha' ),
				'indent'   => true,
			),
			array(
				'id'			 => 'header_scroll_customization',
				'type'		 => 'text',
				'title'		 => __( 'Scroll down (px)', 'amsha' ),
				'desc'		 => __( 'Add scroll down for Header', 'amsha' ),
				'subtitle'	 => __( 'Writing in a numeric value of “Px”', 'amsha' ),
				'default'	 => '120',
			),
			array(
            'id'       => 'header_background_color_one',
            'type'     => 'background',
            'title'    => __( 'header background:', 'amsha' ),
            'subtitle' => __( 'Select the background color', 'amsha' ),
            'default'  => array(
					'background' => 'rgba(243, 243, 243, .7)',
				),
            'output'   => array(
					'background' => '.header__block',
					'important'        => true,
				),
			),
			array(
            'id'       => 'header_background_color_two',
            'type'     => 'background',
            'title'    => __( 'header background 2:', 'amsha' ),
            'subtitle' => __( 'Select the background color', 'amsha' ),
            'default'  => array(
					'background' => 'rgba(243, 243, 243, .7)',
				),
            'output'   => array(
					'background' => '.header__block--white',
					'important'        => true,
				),
			),
			array(
				'id'			 => 'header_contact_link',
				'type'		 => 'text',
				'title'		 => __( 'Button link', 'amsha' ),
				'desc'		 => __( 'Add button link', 'amsha' ),
				'subtitle'	 => __( 'Button Link', 'amsha' ),
			),
			array(
				'id'			 => 'header_contact_button',
				'type'		 => 'text',
				'title'		 => __( 'Button name', 'amsha' ),
				'desc'		 => __( 'Add button name', 'amsha' ),
			),
			array(
				'id'       => 'header_color_list',
				'type'     => 'select',
				'title'    => __('Color button', 'amsha'),
				'subtitle' => __('Select a color', 'amsha'),
				'options'  => array(
						'button button--blue'  => __('Blue', 'amsha'),
						'button button--black' => __('Black', 'amsha'),
						'button button--gray'  => __('Gray', 'amsha'),
						'button'  => __('Normal', 'amsha'),
					),
					'default'  => 'button',
				),
			array(
				'id'     => 'header-end-everything-else',
				'type'   => 'section',
				'indent' => false, 
			),
		)
	)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'under-header Settings', 'amsha' ),
	'id'               => 'site_settings_under-header',
	'subsection'		 => true,
	'desc'             => __( 'Settings for under-header', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'span_color_title',
			'type'     => 'color',
			'title'    => __('Title color changes', 'amsha'),
			'subtitle'	 => esc_html__( 'Write the Color (Warning! Color changes in all colored headers)', 'amsha' ),
			'default'  => '#6ea1c3',
			'validate' => 'color',
			'output'   => array('color' => '.title-headline__color'),
		),
		// Section
		array(
			'id'       => 'homepage-under-start-header',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Homepage Hero', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'homepage_under_header_headline_span_one',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title 1:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'homepage_under_header_headline',
			'type'		 => 'text',
			'title'		 => __( 'Title:', 'amsha' ),
			'desc'		 => __( 'Add Title', 'amsha' ),
			'subtitle'	 => __( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'homepage_under_header_headline_span_two',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title 2:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'homepage_under_header_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'			 => 'homepage_hero_button_link_text_one',
			'type'		 => 'text',
			'title'		 => __( 'Button link 1', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'homepage_hero_button_text_one',
			'type'		 => 'text',
			'title'		 => __( 'Button text 1:', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'			 => 'homepage_hero_button_link_text_two',
			'type'		 => 'text',
			'title'		 => __( 'Button link 2', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'homepage_hero_button_text_two',
			'type'		 => 'text',
			'title'		 => __( 'Button text 2:', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'       => 'homepage_text_list_one',
			'type'     => 'select',
			'title'    => __('Color button 1', 'amsha'),
			'subtitle' => __('Select a color', 'amsha'),
			'options'  => array(
               'button button--blue'  => __('Blue', 'amsha'),
               'button button--black' => __('Black', 'amsha'),
               'button button--gray'  => __('Gray', 'amsha'),
               'button'  => __('Normal', 'amsha'),
            ),
            'default'  => 'button button--blue',
			),
			array(
				'id'       => 'homepage_text_list_two',
				'type'     => 'select',
				'title'    => __('Color button 2', 'amsha'),
				'subtitle' => __('Select a color', 'amsha'),
				'options'  => array(
						'button button--blue'  => __('Blue', 'amsha'),
						'button button--black' => __('Black', 'amsha'),
						'button button--gray'  => __('Gray', 'amsha'),
						'button'  => __('Normal', 'amsha'),
					),
					'default'  => 'button button--gray',
				),
		array(
			'id'     => 'homepage-under-end-header',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'page-start-title',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Title', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'about_hero_headline',
			'type'		 => 'text',
			'title'		 => __( 'Title "about page":', 'amsha' ),
			'desc'		 => __( 'Add Title', 'amsha' ),
			'subtitle'	 => __( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'services_general_hero_headline',
			'type'		 => 'text',
			'title'		 => __( 'Title "services-general page":', 'amsha' ),
			'desc'		 => __( 'Add Title', 'amsha' ),
			'subtitle'	 => __( 'Write the Title', 'amsha' ),
		),
		array(
			'id'     => 'page-end-title',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'page-start-text',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Text', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'about_hero_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text "about page":', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'			 => 'services_general_hero_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text "services-general page":', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'     => 'page-end-text',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'page-start-button',
			'type'     => 'section',
			'title'    => esc_html__( 'Section button', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'about_hero_button_link_text_one',
			'type'		 => 'text',
			'title'		 => __( 'Button link "about page":', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'about_hero_button_text',
			'type'		 => 'text',
			'title'		 => __( 'Button text "about page":', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'			 => 'services_general_button_link_text_two',
			'type'		 => 'text',
			'title'		 => __( 'Button link "services-general page":', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'services_general_button_text',
			'type'		 => 'text',
			'title'		 => __( 'Button text "services-general page":', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'       => 'about_hero_text_list',
			'type'     => 'select',
			'title'    => __('Color button "about page"', 'amsha'),
			'subtitle' => __('Select a color', 'amsha'),
			'options'  => array(
               'button button--blue'  => __('Blue', 'amsha'),
               'button button--black' => __('Black', 'amsha'),
               'button button--gray'  => __('Gray', 'amsha'),
               'button'  => __('Normal', 'amsha'),
            ),
            'default'  => 'button button--blue',
			),
			array(
				'id'       => 'services_general_text_list',
				'type'     => 'select',
				'title'    => __('Color button "services-general page"', 'amsha'),
				'subtitle' => __('Select a color', 'amsha'),
				'options'  => array(
						'button button--blue'  => __('Blue', 'amsha'),
						'button button--black' => __('Black', 'amsha'),
						'button button--gray'  => __('Gray', 'amsha'),
						'button'  => __('Normal', 'amsha'),
					),
					'default'  => 'button button--gray',
				),
		array(
			'id'     => 'page-end-button',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'before-footer Settings', 'amsha' ),
	'id'               => 'site_settings_before_footer',
	'subsection'		 => true,
	'desc'             => __( 'Settings for before-footer', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(

		array(
			'id'			 => 'before_footer_headline',
			'type'		 => 'text',
			'title'		 => __( 'Title:', 'amsha' ),
			'desc'		 => __( 'Add Title', 'amsha' ),
			'subtitle'	 => __( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'before_footer_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'			 => 'before_footer_button_link_text',
			'type'		 => 'text',
			'title'		 => __( 'Button link', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'before_footer_button_text',
			'type'		 => 'text',
			'title'		 => __( 'Button text:', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'       => 'before_footer_color_list',
			'type'     => 'select',
			'title'    => __('Color button', 'amsha'),
			'subtitle' => __('Select a color', 'amsha'),
			'options'  => array(
               'button button--blue'  => __('Blue', 'amsha'),
               'button button--black' => __('Black', 'amsha'),
               'button button--gray'  => __('Gray', 'amsha'),
               'button'  => __('Normal', 'amsha'),
            ),
            'default'  => 'button button--gray',
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Slides "Brand" Settings', 'amsha' ),
	'id'               => 'site_settings_slides_brand',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Slides "Brand"', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		// Section
		array(
			'id'       => 'slides-start-pictures',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Slides 1', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'            => 'considering_brand_slider_one',
			'type'          => 'slides',
			'title'         => __('Slides "Brand" 1:', 'amsha'),
			'subtitle'      => __('Add slide', 'amsha'),
			'placeholder' => array(
               'title'       => __('Title', 'your-text-domain'),
               'description' => __('Alt', 'your-text-domain'),
               'url'         => __('no link', 'your-text-domain'),
         ),
		),
		array(
			'id'     => 'slides-end-pictures',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'slides-start-pictures-two',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Slides 2', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'            => 'considering_brand_slider_two',
			'type'          => 'slides',
			'title'         => __('Slides "Brand" 2:', 'amsha'),
			'subtitle'      => __('Add slide', 'amsha'),
			'placeholder' => array(
               'title'       => __('Title', 'your-text-domain'),
               'description' => __('Alt', 'your-text-domain'),
               'url'         => __('no link', 'your-text-domain'),
         ),
		),
		array(
			'id'     => 'slides-end-pictures-two',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'slides-start-pictures-three',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Slides 3', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'            => 'considering_brand_slider_three',
			'type'          => 'slides',
			'title'         => __('Slides "Brand" 3:', 'amsha'),
			'subtitle'      => __('Add slide', 'amsha'),
			'placeholder' => array(
               'title'       => __('Title', 'your-text-domain'),
               'description' => __('Alt', 'your-text-domain'),
               'url'         => __('no link', 'your-text-domain'),
         ),
		),
		array(
			'id'     => 'slides-end-pictures-three',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Homepage Settings', 'amsha' ),
	'id'               => 'site_settings_homepage',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Homepage!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		// Section
		array(
			'id'       => 'hero-start-pictures',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Page Main', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id' 		  => 'hero_pictures_link_one',
			'type' 	  => 'text',
			'title'    => __( 'img link 1:', 'amsha' ),
			'desc'     => __( 'add link image', 'amsha' ),
		),
		array(
			'id'       => 'hero_pictures_image_one',
			'type'     => 'media',
			'url'		 => true,
			'title'    => __( 'Picture 1:', 'amsha' ),
			'subtitle' => __( 'Upload an image', 'amsha' ),
		),
		array(
			'id' 		  => 'hero_pictures_alt_one',
			'type' 	  => 'text',
			'title'    => __( 'Enter the name of the picture 1:', 'amsha' ),
			'desc'     => __( 'alt = "Name"', 'amsha' ),
		),
		array(
			'id' 		  => 'hero_pictures_link_two',
			'type' 	  => 'text',
			'title'    => __( 'img link 2:', 'amsha' ),
			'desc'     => __( 'add link image', 'amsha' ),
		),
		array(
			'id'       => 'hero_pictures_image_two',
			'type'     => 'media',
			'url'		 => true,
			'title'    => __( 'Picture 2:', 'amsha' ),
			'subtitle' => __( 'Upload an image', 'amsha' ),
		),
		array(
			'id' 		  => 'hero_pictures_alt_two',
			'type' 	  => 'text',
			'title'    => __( 'Enter the name of the picture 2:', 'amsha' ),
			'desc'     => __( 'alt = "Name"', 'amsha' ),
		),
		array(
			'id'     => 'hero-end-pictures',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'considering-start-section',
			'type'     => 'section',
			'title'    => esc_html__( 'Section considering', 'amsha' ),
			'indent'   => true, 
		),
		array(
			'id'			 => 'considering_headline_one',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title 1:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'considering_headline_span_one',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title 1:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'considering_headline_two',
			'type'		 => 'text',
			'title'		 => __( 'Title 2:', 'amsha' ),
			'desc'		 => __( 'Add Title', 'amsha' ),
			'subtitle'	 => __( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'considering_headline_span_two',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title 2:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'     => 'considering-end-section',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'our-start-services',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Our services', 'amsha' ),
			'indent'   => true, 
		),
		array(
			'id'			 => 'our_services_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'our_services_headline_span',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'our_services_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'     => 'our-end-services',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'why-start-choose',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Why choose', 'amsha' ),
			'indent'   => true, 
		),
		array(
			'id'			 => 'why_choose_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'why_choose_headline_span',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'     => 'why-end-choose',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'About Settings', 'amsha' ),
	'id'               => 'site_settings_about',
	'subsection'		 => true,
	'desc'             => __( 'Settings for About!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'content-start-services',
			'type'     => 'section',
			'title'    => esc_html__( 'Section "content services"', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'about_headline_span',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'about_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'content_services_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id' 		  => 'content_services_pictures_link',
			'type' 	  => 'text',
			'title'    => __( 'img link:', 'amsha' ),
			'desc'     => __( 'add link image', 'amsha' ),
		),
		array(
			'id'       => 'content_services_pictures_image',
			'type'     => 'media',
			'url'		 => true,
			'title'    => __( 'Picture:', 'amsha' ),
			'subtitle' => __( 'Upload an image', 'amsha' ),
		),
		array(
			'id' 		  => 'content_services_pictures_alt',
			'type' 	  => 'text',
			'title'    => __( 'Enter the name of the picture 1:', 'amsha' ),
			'desc'     => __( 'alt = "Name"', 'amsha' ),
		),
		array(
			'id'			 => 'content_services_button_link_text',
			'type'		 => 'text',
			'title'		 => __( 'Button link', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'content_services_button_text',
			'type'		 => 'text',
			'title'		 => __( 'Button text:', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'       => 'content_services_color_list',
			'type'     => 'select',
			'title'    => __('Color button', 'amsha'),
			'subtitle' => __('Select a color', 'amsha'),
			'options'  => array(
               'button button--blue'  => __('Blue', 'amsha'),
               'button button--black' => __('Black', 'amsha'),
               'button button--gray'  => __('Gray', 'amsha'),
               'button'  => __('Normal', 'amsha'),
            ),
            'default'  => 'button button--blue',
			),
		array(
			'id'     => 'content-end-services',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'about-start-pride',
			'type'     => 'section',
			'title'    => esc_html__( 'Section "about pride"', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'about_pride_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'about_pride_headline_span',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'about_pride_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'			 => 'about_pride_button_link_text',
			'type'		 => 'text',
			'title'		 => __( 'Button link', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'about_pride_button_text',
			'type'		 => 'text',
			'title'		 => __( 'Button text:', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'       => 'about_pride_color_list',
			'type'     => 'select',
			'title'    => __('Color button', 'amsha'),
			'subtitle' => __('Select a color', 'amsha'),
			'options'  => array(
               'button button--blue'  => __('Blue', 'amsha'),
               'button button--black' => __('Black', 'amsha'),
               'button button--gray'  => __('Gray', 'amsha'),
               'button'  => __('Normal', 'amsha'),
            ),
            'default'  => 'button button--gray',
			),
		array(
			'id'     => 'about-end-pride',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Services Settings', 'amsha' ),
	'id'               => 'site_settings_services',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Services!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'services-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Section text', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'     => 'services-end',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Services separate Settings', 'amsha' ),
	'id'               => 'site_settings_services_separate',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Services separate!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'process-start-separate',
			'type'     => 'section',
			'title'    => esc_html__( 'Section "process-separate"', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'services_process_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'services_process_headline_span',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Color Title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'services_process_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'			 => 'services_process_button_link_text',
			'type'		 => 'text',
			'title'		 => __( 'Button link', 'amsha' ),
			'desc'		 => __( 'Add button link', 'amsha' ),
			'subtitle'	 => __( 'Button Link', 'amsha' ),
		),
		array(
			'id'			 => 'services_process_button_text',
			'type'		 => 'text',
			'title'		 => __( 'Button text:', 'amsha' ),
			'desc'		 => __( 'Add Button text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text button', 'amsha' ),
		),
		array(
			'id'       => 'services_process_color_list',
			'type'     => 'select',
			'title'    => __('Color button', 'amsha'),
			'subtitle' => __('Select a color', 'amsha'),
			'options'  => array(
               'button button--blue'  => __('Blue', 'amsha'),
               'button button--black' => __('Black', 'amsha'),
               'button button--gray'  => __('Gray', 'amsha'),
               'button'  => __('Normal', 'amsha'),
            ),
            'default'  => 'button button--blue',
			),
		array(
			'id'     => 'process-end-separate',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Contact Settings', 'amsha' ),
	'id'               => 'site_settings_contact',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Contact!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'contact-start-left',
			'type'     => 'section',
			'title'    => esc_html__( 'Section "Contact left"', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'contact_left_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_parahraph',
			'type'		 => 'textarea',
			'title'		 => __( 'Text:', 'amsha' ),
			'desc'		 => __( 'Add Text', 'amsha' ),
			'subtitle'	 => __( 'Write the Text', 'amsha' ),
			'validate' => 'no_html',
		),
		array(
			'id'			 => 'contact_left_title',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title "Phone":', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_link',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Link:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Link', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Link', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_text_link',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Text Link:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Text Link', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Text Link', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_title_two',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title "Email":', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_link_two',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Link:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Link', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Link', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_text_link_two',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Text Link:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Text Link', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Text Link', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_title_three',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title "Adress":', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_link_three',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Link:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Link', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Link', 'amsha' ),
		),
		array(
			'id'			 => 'contact_left_text_link_three',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Text Link:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Text Link', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Text Link', 'amsha' ),
		),
		array(
			'id'     => 'contact-end-left',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section 
		array(
			'id'       => 'contact-start-right',
			'type'     => 'section',
			'title'    => esc_html__( 'Section "Contact right"', 'amsha' ),
			'indent'   => true,
		),
		array(
			'id'			 => 'contact_right_headline',
			'type'		 => 'text',
			'title'		 => esc_html__( 'title for Form:', 'amsha' ),
			'desc'		 => esc_html__( 'Add Title', 'amsha' ),							
			'subtitle'	 => esc_html__( 'Write the Title', 'amsha' ),
		),
		// array(
		// 	'id'			 => 'contact_form_shortcode',
		// 	'type'		 => 'text',
		// 	'title'		 => esc_html__( 'Form Shortcode:', 'amsha' ),
		// 	'desc'		 => esc_html__( 'Install the plugin and enter the shortcode in this field', 'amsha' ),
		// ),
		array(
			'id'     => 'contact-end-right',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
Redux::set_section( $opt_name, array(
	'title'            => esc_html__( 'Footer Settings', 'amsha' ),
	'id'               => 'site_settings_footer',
	'subsection'		 => true,
	'desc'             => __( 'Settings for Footer!', 'amsha' ),
	'customizer_width' => '450px',
	'fields'				 => array(
		array(
			'id'       => 'footer-start-social-link',
			'type'     => 'section',
			'title'    => esc_html__( 'Section Social Links', 'amsha' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'footer_social_link_sortable',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Social Links', 'amsha' ),
			'subtitle' => esc_html__( 'Inser Links for your Social Profiles', 'amsha' ),
			'desc'		 => esc_html__( 'Left the field empty if you don\'t have a link', 'amsha' ),
			'label'    => true,
			'options'  => array(
				'Facebook Link'   => '',
				'Instagram Link'   => '',
				'TwitterX Link' => '',
				'WhatsApp Link' => '',
				'Linkedin Link' => '',
			),
		),
		array(
			'id'     => 'footer-end-social-link',
			'type'   => 'section',
			'indent' => false, 
		),
		// Section
		array(
			'id'       => 'footer-start-location-and-copy',
			'type'     => 'section',
			'title'    => esc_html__( 'Location and Copyright', 'amsha' ),
			'indent'   => true, 
		),
		array(
			'id'			 => 'footer_location_link',
			'type'		 => 'text',
			'title'		 => __( 'Location link', 'amsha' ),
			'desc'		 => __( 'Add Location link', 'amsha' ),
			'subtitle'	 => __( 'Write the location', 'amsha' ),
		),
		array(
			'id'			 => 'footer_location_text',
			'type'		 => 'text',
			'title'		 => __( 'Location Text', 'amsha' ),
			'desc'		 => __( 'Add Location text', 'amsha' ),
			'subtitle'	 => __( 'Write the location', 'amsha' ),
			'default'	 => 'My home'
		),
		array(
			'id'			 => 'footer_copy_text',
			'type'		 => 'text',
			'title'		 => __( 'Copyright Text', 'amsha' ),
			'desc'		 => __( 'Add Copyright-text', 'amsha' ),
			'subtitle'	 => __( 'Write Copyright', 'amsha' ),
		),
		array(
			'id'     => 'footer-end-location-and-copy',
			'type'   => 'section',
			'indent' => false, 
		),
	)
)
);
//! Нужно буде убрасть v
/*
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Basic Fields', 'amsha' ),
		'id'               => 'basic',
		'desc'             => esc_html__( 'These are really basic fields!', 'amsha' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
	)
);

require_once Redux_Core::$dir . '../sample/sections/basic-fields/checkbox.php';
require_once Redux_Core::$dir . '../sample/sections/basic-fields/radio.php';
require_once Redux_Core::$dir . '../sample/sections/basic-fields/sortable.php';
require_once Redux_Core::$dir . '../sample/sections/basic-fields/text.php';
require_once Redux_Core::$dir . '../sample/sections/basic-fields/multi-text.php';
require_once Redux_Core::$dir . '../sample/sections/basic-fields/password.php';
require_once Redux_Core::$dir . '../sample/sections/basic-fields/textarea.php';

// -> START Editors.
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Editors', 'amsha' ),
		'id'               => 'editor',
		'customizer_width' => '500px',
		'icon'             => 'el el-edit',
	)
);

require_once Redux_Core::$dir . '../sample/sections/editors/wordpress-editor.php';
require_once Redux_Core::$dir . '../sample/sections/editors/ace-editor.php';

// -> START Color Selection.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Color Selection', 'amsha' ),
		'id'    => 'color',
		'icon'  => 'el el-brush',
	)
);

require_once Redux_Core::$dir . '../sample/sections/color-selection/color.php';
require_once Redux_Core::$dir . '../sample/sections/color-selection/color-gradient.php';
require_once Redux_Core::$dir . '../sample/sections/color-selection/color-rgba.php';
require_once Redux_Core::$dir . '../sample/sections/color-selection/link-color.php';
require_once Redux_Core::$dir . '../sample/sections/color-selection/palette.php';
require_once Redux_Core::$dir . '../sample/sections/color-selection/color-palette.php';

// -> START Design Fields.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Design Fields', 'amsha' ),
		'id'    => 'design',
		'icon'  => 'el el-wrench',
	)
);

require_once Redux_Core::$dir . '../sample/sections/design-fields/background.php';
require_once Redux_Core::$dir . '../sample/sections/design-fields/box-shadow.php';
require_once Redux_Core::$dir . '../sample/sections/design-fields/border.php';
require_once Redux_Core::$dir . '../sample/sections/design-fields/dimensions.php';
require_once Redux_Core::$dir . '../sample/sections/design-fields/spacing.php';

// -> START Media Uploads.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Media Uploads', 'amsha' ),
		'id'    => 'media',
		'icon'  => 'el el-picture',
	)
);

require_once Redux_Core::$dir . '../sample/sections/media-uploads/gallery.php';
require_once Redux_Core::$dir . '../sample/sections/media-uploads/media.php';
require_once Redux_Core::$dir . '../sample/sections/media-uploads/multi-media.php';
require_once Redux_Core::$dir . '../sample/sections/media-uploads/slides.php';

// -> START Presentation Fields.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Presentation Fields', 'amsha' ),
		'id'    => 'presentation',
		'icon'  => 'el el-screen',
	)
);

require_once Redux_Core::$dir . '../sample/sections/presentation-fields/divide.php';
require_once Redux_Core::$dir . '../sample/sections/presentation-fields/content.php';
require_once Redux_Core::$dir . '../sample/sections/presentation-fields/info.php';
require_once Redux_Core::$dir . '../sample/sections/presentation-fields/section.php';

Redux::set_section(
	$opt_name,
	array(
		'id'   => 'presentation-divide-sample',
		'type' => 'divide',
	)
);

// -> START Switch & Button Set.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Switch / Button Set', 'amsha' ),
		'id'    => 'switch_buttonset',
		'icon'  => 'el el-cogs',
	)
);

require_once Redux_Core::$dir . '../sample/sections/switch-button/button-set.php';
require_once Redux_Core::$dir . '../sample/sections/switch-button/switch.php';

// -> START Select Fields.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Select Fields', 'amsha' ),
		'id'    => 'select',
		'icon'  => 'el el-list-alt',
	)
);

require_once Redux_Core::$dir . '../sample/sections/select-fields/select.php';
require_once Redux_Core::$dir . '../sample/sections/select-fields/image-select.php';
require_once Redux_Core::$dir . '../sample/sections/select-fields/select-image.php';

// -> START Slider / Spinner.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Slider / Spinner', 'amsha' ),
		'id'    => 'slider_spinner',
		'icon'  => 'el el-adjust-alt',
	)
);

require_once Redux_Core::$dir . '../sample/sections/slider-spinner/slider.php';
require_once Redux_Core::$dir . '../sample/sections/slider-spinner/spinner.php';

// -> START Typography.
require_once Redux_Core::$dir . '../sample/sections/typography/typography.php';

// -> START Additional Types.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Additional Types', 'amsha' ),
		'id'    => 'additional',
		'icon'  => 'el el-magic',
	)
);

require_once Redux_Core::$dir . '../sample/sections/additional-types/date.php';
require_once Redux_Core::$dir . '../sample/sections/additional-types/date-time-picker.php';
require_once Redux_Core::$dir . '../sample/sections/additional-types/sorter.php';
require_once Redux_Core::$dir . '../sample/sections/additional-types/raw.php';

Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Advanced Features', 'amsha' ),
		'icon'  => 'el el-thumbs-up',
	)
);

require_once Redux_Core::$dir . '../sample/sections/advanced-features/callback.php';

// -> START Validation.
require_once Redux_Core::$dir . '../sample/sections/advanced-features/field-validation.php';

// -> START Sanitizing.
require_once Redux_Core::$dir . '../sample/sections/advanced-features/field-sanitizing.php';

// -> START Required.
require_once Redux_Core::$dir . '../sample/sections/advanced-features/field-required-linking.php';

require_once Redux_Core::$dir . '../sample/sections/advanced-features/wpml-integration.php';

// -> START Disabling.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Disabling', 'amsha' ),
		'icon'  => 'el el-lock',
	)
);

require_once Redux_Core::$dir . '../sample/sections/disabling/disable-field.php';
require_once Redux_Core::$dir . '../sample/sections/disabling/disable-section.php';

// -> START Extensions.
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Redux Extensions', 'amsha' ),
		'id'    => 'redux-extensions',
		'icon'  => 'el el-redux',
		'class' => 'pro_highlight',
		'desc'  => esc_html__( 'For full documentation on this field, visit: ', 'amsha' ) . '<a href="https://devs.redux.io/core-extensions/" target="_blank">https://devs.redux.io/core-extensions/</a>',
	)
);

require_once Redux_Core::$dir . '../sample/sections/extensions/accordion.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/color-scheme.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/custom-fonts.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/google-maps.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/icon-select.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/js-button.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/repeater.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/search.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/shortcodes.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/social-profiles.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/tabbed.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/widget-areas.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/taxonomy.php';
require_once Redux_Core::$dir . '../sample/sections/extensions/users.php';


require_once Redux_Core::$dir . '../sample/metaboxes.php';


if ( file_exists( $dir . '/../README.md' ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'amsha' ),
		'fields' => array(
			array(
				'id'           => 'opt-raw-documentation',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' => __DIR__ . '/../README.md', // FULL PATH, not relative, please.
			),
		),
	);

	Redux::set_section( $opt_name, $section );
}

Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__( 'Customizer Only', 'amsha' ),
		'desc'            => '<p class="description">' . esc_html__( 'This Section should be visible only in Customizer', 'amsha' ) . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__( 'Customizer Only Option', 'amsha' ),
				'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'amsha' ),
				'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'amsha' ),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__( 'Opt 1', 'amsha' ),
					'2' => esc_html__( 'Opt 2', 'amsha' ),
					'3' => esc_html__( 'Opt 3', 'amsha' ),
				),
				'default'         => '2',
			),
		),
	)
);
*/
//! Нужно буде убрасть ^

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'amsha' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'amsha' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'amsha' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
