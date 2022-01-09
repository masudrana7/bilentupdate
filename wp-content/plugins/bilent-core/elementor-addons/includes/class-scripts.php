<?php
namespace SC_Repair;

class Scripts {

    public function __construct() {
        add_action('elementor/frontend/after_register_scripts', array($this, 'scaddon_register_plugin_styles'));
    }
    public function scaddon_register_plugin_styles() {
        $dir = plugin_dir_url(__FILE__);
        // Enqueue Style CSS
        wp_enqueue_style( 'addons-style', $dir.'assets/css/addons.css');

        // Enqueue Script JS
        wp_enqueue_script( 'bilent-jquery-ui', $dir.'assets/js/jquery-ui.js' , array('jquery'), '201598644', true);  
        wp_enqueue_script( 'bilent-charming-script', $dir.'assets/js/addons-script.js' , array('jquery'), '201598634', true);  
    }
}
