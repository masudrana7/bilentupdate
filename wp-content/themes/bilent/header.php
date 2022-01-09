<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bilent
 */
global $bilent_options;
$preloader_on_off = isset($bilent_options['preloader_on_off']) ? $bilent_options['preloader_on_off'] : 0;
$canvas_on_off = isset($bilent_options['canvas_on_off']) ? $bilent_options['canvas_on_off'] : 0;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php wp_head(); ?>
</head>
<!-- page wrapper -->

<body <?php body_class(); ?>>
	<?php if ($canvas_on_off == '1') : ?>
		<div class="sc-overlay-bg"></div>
	<?php endif; ?>
	<?php wp_body_open(); ?>
	<?php
	if ($preloader_on_off == '1') :
		do_action('bilent_preloader');
	endif;
	$header_style = isset($bilent_options['header_style']) ? $bilent_options['header_style'] : '1';
	if (!$header_style) {
		$header_style = '1';
	}
	get_template_part('templates/header/header', $header_style);
	?>
	<?php
	$show_breadcrumb = get_post_meta(get_the_ID(), 'bilent_meta_show_breadcrumb', true);
	if ($show_breadcrumb != 'off') {
	?>
		<div class="sc-breadcrumbs breadcrumbs-overlay">
			<div class="breadcrumbs-text white-color">
				<h1 class="page-title">
					<?php
					if (is_front_page() && is_home()) {
						$breadcrumb_title = esc_html__('Blog Posts', 'bilent');
					} elseif (is_archive()) {
						$breadcrumb_title = get_the_archive_title();
					} elseif (is_single()) {
						if (get_post_type(get_the_ID()) == 'post') {
							$breadcrumb_title = get_the_title();
						} else {
							$breadcrumb_title = get_post_type() . esc_html__(' Details', 'bilent');
						}
					} elseif (is_404()) {
						$breadcrumb_title = esc_html__('Error Page', 'bilent');
					} elseif (is_search()) {
						$breadcrumb_title =  esc_html__('Search Results for: ', 'bilent') . get_search_query();;
					} else {
						$breadcrumb_title = get_the_title();
					}
					echo wp_kses_post($breadcrumb_title);
					?>
				</h1>
				<ul>
					<li>
						<?php Bilent_Breadcrumb(); ?>
					</li>
				</ul>
			</div>
		</div>
	<?php
	}
	?>
	<!-- Main content Start -->
	<div class="main-content">