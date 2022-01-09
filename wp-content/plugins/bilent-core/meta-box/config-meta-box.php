<?php
add_filter( 'rwmb_meta_boxes', 'Bilent_meta_box' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function Bilent_meta_box( $meta_boxes ) {

	$prefix = 'bilent_meta';

	$posts_page = get_option( 'page_for_posts' );
	if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {
		$meta_boxes[] = array(
			'id'       => $prefix . '_page_meta_box',
			'title'    => esc_html__( 'Page Design Settings', 'bilent-core' ),
			'pages'    => array(
				'page',
			),
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array(
				array(
					'id'      => "{$prefix}_show_breadcrumb",
					'name'    => esc_html__( 'Show Breadcrumb', 'bilent-core' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
				array(
					'name'            => 'Header Style',
					'id'              => $prefix . '_select_header_style',
					'type'            => 'select_advanced',
					'options'         => array(
						'1' => 'Style 1',
						'2' => 'Style 2',
						'3' => 'Style 3',
					),
				),
				array(
					'id'      => "{$prefix}_select_header_template",
					'name'    => esc_html__( 'Select Header Template', 'bilent-core' ),
					'desc'    => '',
					'type'    => 'select_advanced',
					'options' => bilent_core_elementor_library(),
					'multiple' => true,
				),
				array(
					'id'      => "{$prefix}_select_footer_template",
					'name'    => esc_html__( 'Select Footer Template', 'bilent-core' ),
					'desc'    => '',
					'type'    => 'select_advanced',
					'options' => bilent_core_elementor_library(),
					'multiple' => true,
				),
			),
		);
	
	}
	return $meta_boxes;
}
