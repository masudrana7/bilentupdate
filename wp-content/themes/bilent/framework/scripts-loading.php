<?php
add_action('wp_enqueue_scripts',  'bilent_enqueue_scripts');
function bilent_enqueue_scripts()
{
	wp_enqueue_style('bootstrap', BILENT_CSS_URL . 'bootstrap.min.css', false, time());
	wp_enqueue_style('font-awesome', BILENT_CSS_URL . 'font-awesome.min.css', false, time());
	wp_enqueue_style('animate', BILENT_CSS_URL . 'animate.css', false, '1');
	wp_enqueue_style('flaticon', BILENT_CSS_URL . 'flaticon.css', false, time());
	wp_enqueue_style('slick', BILENT_CSS_URL . 'slick.css', false, time());
	wp_enqueue_style('magnific', BILENT_CSS_URL . 'magnific-popup.css', false, time());
	wp_enqueue_style('scmenu-main', BILENT_CSS_URL . 'scmenu-main.css', false, time());
	wp_enqueue_style('bilent-unit-style', BILENT_CSS_URL . 'unit-style.css', false, time());
	if (class_exists('WooCommerce')) {
		wp_enqueue_style('woocommerce-style', BILENT_CSS_URL . 'woocommerce.css', false, time());
	}
	wp_enqueue_style('default-style', BILENT_CSS_URL . 'default.css', false, time());
	wp_enqueue_style('bilent-style', get_stylesheet_uri(), false, time());
	wp_enqueue_style('bilent-responsive', BILENT_CSS_URL . 'responsive.css', false, time());

	wp_enqueue_script('bootstrap', BILENT_JS_URL . 'bootstrap.min.js', array('jquery'), time(), true);
	wp_enqueue_script('isotope-pkgd', BILENT_JS_URL . 'isotope.pkgd.min.js', array('jquery'), time(), true);
	wp_enqueue_script('slick', BILENT_JS_URL . 'slick.min.js', array('jquery'), time(), true);
	wp_enqueue_script('slick-animation', BILENT_JS_URL . 'slick-aniamtion.js', array('jquery'), time(), true);
	wp_enqueue_script('magnific', BILENT_JS_URL . 'jquery.magnific-popup.min.js', array('jquery'), time(), true);
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('wow', BILENT_JS_URL . 'wow.min.js', array('jquery'), time(), true);
	wp_enqueue_script('jquery-counterup', BILENT_JS_URL . 'jquery.counterup.min.js', array('jquery'), time(), true);
	wp_enqueue_script('waypoints', BILENT_JS_URL . 'waypoints.min.js', array('jquery'), time(), true);
	wp_enqueue_script('bilent-main', BILENT_JS_URL . 'main.js', array('jquery'), time(), true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
// RTL CSS
add_action('wp_enqueue_scripts', 'bilent_rtl_scripts', 1500);
if (!function_exists('bilent_rtl_scripts')) {
	function bilent_rtl_scripts()
	{
		if (is_rtl()) {
			wp_enqueue_style('bilent-rtl', BILENT_CSS_URL . 'rtl.css', array(), 1.0);
		}
	}
}
