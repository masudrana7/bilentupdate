<?php
global $bilent_options;
$footer_copyright  = isset($bilent_options['footer_copyright']) ? $bilent_options['footer_copyright'] : '' ;

$footer_template_meta = get_post_meta( get_the_ID(), 'bilent_meta_select_footer_template', true );
if( $footer_template_meta){
    $footer_elementor = get_post_meta( get_the_ID(), 'bilent_meta_select_footer_template', true );
}else{
    $footer_elementor  = isset($bilent_options['footer_elementor']) ? $bilent_options['footer_elementor'] : '' ;
}

?>
<!-- Footer Secton Start -->
<footer id="sc-footer" class="sc-footer footer-bg-image">
    <?php 
    if (class_exists('\\Elementor\\Plugin')) {
        if (isset($footer_elementor) && !empty($footer_elementor)) {
        $pluginElementor = \Elementor\Plugin::instance(); 
    ?>
    <div class="container">
        <div class="footer-content">
        <?php
        $footer_elementor = $pluginElementor->frontend->get_builder_content($footer_elementor);
        echo do_shortcode($footer_elementor);
        ?>
        </div>
    </div>
    <?php } } ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright text-center">
            <p>
            <?php 
            if($footer_copyright){
                echo wp_kses_post($footer_copyright);
            }else{
                esc_html_e('Copyright © 2021. All Rights Reserved By Bilent', 'bilent'); ?>
            <?php } ?>
            </p>
            </div>
        </div>
    </div>
</footer>