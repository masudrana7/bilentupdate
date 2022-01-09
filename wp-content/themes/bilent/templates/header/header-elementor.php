<?php
global $bilent_options;

$header_style = get_post_meta(get_the_ID(), 'bilent_meta_select_header_style', true);
$header_template_meta = get_post_meta(get_the_ID(), 'bilent_meta_select_header_template', true);
if ($header_template_meta) {
    $header_elementor = get_post_meta(get_the_ID(), 'bilent_meta_select_header_template', true);
} else {
    $header_elementor  = isset($bilent_options['header_elementor']) ? $bilent_options['header_elementor'] : '';
}
if ($header_style == '2') {
    $header_class = 'header-style2';
}
if ($header_style == '3') {
    $header_class = 'header-style3';
} else {
    $header_class = 'header-style1';
}
?>
<div class="full-width-header <?php echo esc_attr($header_class); ?>">
    <header id="sc-header" class="sc-header">
        <?php
        if (class_exists('\\Elementor\\Plugin')) {
            if (isset($header_elementor) && !empty($header_elementor)) {
                $pluginElementor = \Elementor\Plugin::instance();
        ?>
                <?php
                $header_elementor = $pluginElementor->frontend->get_builder_content($header_elementor);
                echo do_shortcode($header_elementor);
                ?>
        <?php }
        } ?>

        <?php
        $header_sidebar_elementor  = isset($bilent_options['header_sidebar_elementor']) ? $bilent_options['header_sidebar_elementor'] : '';
        if (class_exists('\\Elementor\\Plugin')) {
            if (isset($header_sidebar_elementor) && !empty($header_sidebar_elementor)) {
                $pluginElementor = \Elementor\Plugin::instance();
        ?>
                <?php
                $header_sidebar_elementor = $pluginElementor->frontend->get_builder_content($header_sidebar_elementor);
                echo do_shortcode($header_sidebar_elementor);
                ?>
        <?php }
        } ?>

    </header>
</div>