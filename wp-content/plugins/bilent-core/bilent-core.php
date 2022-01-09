<?php
/*
  Plugin Name: Bilent Core
  Plugin URI: https://softcoders.net
  Description: Helping for the Bilent theme.
  Author: SoftCoders Team
  Version: 1.0.0
  Author URI: https://softcoders.net
 */

if (!defined('ABSPATH')) {
	exit;
}

require_once __DIR__ . '/meta-box/config-meta-box.php';
require_once __DIR__ . '/elementor-addons/bilent-elementor.php';
require_once __DIR__ . '/includes/Widgets/bilent-recent-posts.php';

function SC_repair_get_contact_form_7_posts()
{
	$args    = array(
		'post_type'      => 'wpcf7_contact_form',
		'posts_per_page' => -1,
	);
	$catlist = array();
	if ($categories = get_posts($args)) {
		foreach ($categories as $category) {
			(int) $catlist[$category->ID] = $category->post_title;
		}
	} else {
		(int) $catlist['0'] = esc_html__('No contect From 7 form found', 'bilent-core');
	}
	return $catlist;
}





function bilent_core_elementor_library()
{
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if (!empty($pageslist)) {
		foreach ($pageslist as $page) {
			$pagearray[$page->ID] = $page->post_title;
		}
	}
	return $pagearray;
}
