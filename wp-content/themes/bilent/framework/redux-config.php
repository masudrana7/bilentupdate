<?php

/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
	return;
}
// This is your option name where all the Redux data is stored.
$opt_prefix = 'bilent_';
$opt_name   = 'bilent_options';
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => $theme->get('Name'),
	// Name that appears at the top of your panel
	'display_version'      => $theme->get('Version'),
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => esc_html__('Bilent Settings', 'bilent'),
	'page_title'           => esc_html__('Bilent Settings', 'bilent'),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	// 'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => false,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	// 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	// 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => '_options',
	// Page slug used to denote the panel
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.
	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	// 'compiler'             => true,
);


Redux::setArgs($opt_name, $args);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__('Basic option', 'bilent'),
		'id'     => 'basic_theme_option',
		'desc'   => esc_html__('Change Basic Option here', 'bilent'),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => 'preloader_on_off',
				'type'    => 'switch',
				'title'   => esc_html__('Preloader on off switch', 'bilent'),
				'default' => false,
				'on'      => esc_html__('Enable', 'bilent'),
				'off'     => esc_html__('Disable', 'bilent'),
			),
			array(
				'id'      => 'back_to_top_on_off',
				'type'    => 'switch',
				'title'   => esc_html__('Back To Top on off switch', 'bilent'),
				'default' => false,
				'on'      => esc_html__('Enable', 'bilent'),
				'off'     => esc_html__('Disable', 'bilent'),
			),
			array(
				'id'      => 'canvas_on_off',
				'type'    => 'switch',
				'title'   => esc_html__('Canvas on off switch', 'bilent'),
				'default' => false,
				'on'      => esc_html__('Enable', 'bilent'),
				'off'     => esc_html__('Disable', 'bilent'),
			),
			array(
				'id'      => 'unittest_on_off',
				'type'    => 'switch',
				'title'   => esc_html__('Unit Test on off switch', 'bilent'),
				'default' => false,
				'on'      => esc_html__('Enable', 'bilent'),
				'off'     => esc_html__('Disable', 'bilent'),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__('Header Option', 'bilent'),
		'id'     => 'header_option',
		'desc'   => esc_html__('Chnage Header Option here', 'bilent'),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => 'header_style',
				'type'    => 'select',
				'title'   => esc_html__('Header style', 'bilent'),
				'options' => array(
					'1' => esc_html__('Header Default', 'bilent'),
					'elementor' => esc_html__('Header Elementor', 'bilent'),
				),
				'default' => '1',
			),
			array(
				'id'      => 'header_elementor',
				'type'    => 'select',
				'title'   => esc_html__('Header Templates', 'bilent'),
				'options' => bilent_elementor_library(),
			),
			array(
				'id'      => 'header_sidebar_elementor',
				'type'    => 'select',
				'title'   => esc_html__('Header Sidebar', 'bilent'),
				'options' => bilent_elementor_library(),
			),
			array(
				'id'      => 'sticky_header_onoff',
				'type'    => 'switch',
				'title'   => esc_html__('Sticky Header switch', 'bilent'),
				'default' => false,
				'on'      => esc_html__('Enable', 'bilent'),
				'off'     => esc_html__('Disable', 'bilent'),
			),
			array(
				'id'      => 'header_search_enable',
				'type'    => 'switch',
				'title'   => esc_html__('Header Search switch', 'bilent'),
				'default' => false,
				'on'      => esc_html__('Enable', 'bilent'),
				'off'     => esc_html__('Disable', 'bilent'),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__('Breadcrumb', 'bilent'),
		'desc'   => esc_html__('Change Breadcrumb here', 'bilent'),
		'id'     => 'theme_typography',
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'       => $opt_prefix . 'bread-crumb-background',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'bilent'),
				'subtitle' => esc_html__('Change Background with image, color, etc.', 'bilent'),
				'desc'     => esc_html__('This is the description field, again good for additional info.', 'bilent'),
				'output'   => array('.sc-breadcrumbs'),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__('Footer option', 'bilent'),
		'id'     => 'bilent_footer_area',
		'desc'   => esc_html__('Chnage footer option here', 'bilent'),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => 'footer_elementor',
				'type'    => 'select',
				'title'   => esc_html__('Footer Templates', 'bilent'),
				'options' => bilent_elementor_library(),
			),
			array(
				'id'      => 'footer_bg',
				'type'    => 'background',
				'title'   => esc_html__('Footer Background', 'bilent'),
				'output'   => '.footer-bg-image',
			),
			array(
				'id'      => 'footer_copyright',
				'type'    => 'textarea',
				'title'   => esc_html__('Copyright text', 'bilent'),
				'default' => esc_html__('Copyright © 2021. All Rights Reserved By Bilent', 'bilent'),
			),
		),
	)
);
