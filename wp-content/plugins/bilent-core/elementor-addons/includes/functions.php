<?php
// don't call the file directly
if (!defined('ABSPATH'))
    exit;

add_action(
        'elementor/init', function() {
    \Elementor\Plugin::$instance->elements_manager->add_category(
            'bilent', [
        'title' => __('SC Elementor', 'bilent-core'),
        'icon' => 'fa fa-plug',
            ], 1
    );
});

if ( ! function_exists( 'scaddons_get_cf7_forms' ) ) {
    /**
     * Get a list of all CF7 forms
     *
     * @return array
     */
    function scaddons_get_cf7_forms() {
        $forms = get_posts( [
            'post_type'      => 'wpcf7_contact_form',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $forms ) ) {
            return wp_list_pluck( $forms, 'post_title', 'ID' );
        }
        return [];
    }
}