<?php
class Services
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        // Register the post type
        add_action('init', [$this, 'SC_repair_services_post_type'], 0);
    }

    // Register Custom Post Type
    function SC_repair_services_post_type()
    {

        $labels = array(
            'name' => _x('Services', 'Post Type General Name', 'bilent'),
            'singular_name' => _x('Service', 'Post Type Singular Name', 'bilent'),
            'menu_name' => __('Services', 'bilent'),
            'name_admin_bar' => __('Service', 'bilent'),
            'archives' => __('Item Archives', 'bilent'),
            'parent_item_colon' => __('Parent Item:', 'bilent'),
            'all_items' => __('All Services', 'bilent'),
            'add_new_item' => __('Add New Service', 'bilent'),
            'add_new' => __('Add New Service', 'bilent'),
            'new_item' => __('New Service Item', 'bilent'),
            'edit_item' => __('Edit Service Item', 'bilent'),
            'update_item' => __('Update Service Item', 'bilent'),
            'view_item' => __('View Service Item', 'bilent'),
            'search_items' => __('Search Item', 'bilent'),
            'not_found' => __('Not found', 'bilent'),
            'not_found_in_trash' => __('Not found in Trash', 'bilent'),
            'featured_image' => __('Featured Image', 'bilent'),
            'set_featured_image' => __('Set featured image', 'bilent'),
            'remove_featured_image' => __('Remove featured image', 'bilent'),
            'use_featured_image' => __('Use as featured image', 'bilent'),
            'insert_into_item' => __('Insert into item', 'bilent'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'bilent'),
            'items_list' => __('Items list', 'bilent'),
            'items_list_navigation' => __('Items list navigation', 'bilent'),
            'filter_items_list' => __('Filter items list', 'bilent'),
        );

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'bilent' ),
			'public'             => true,
			'publicly_queryable' => true,
			'taxonomies'         => array( 'taxonomy_service' ),
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'services' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);

        register_post_type('services', $args);
    }
}

$services = new Services();