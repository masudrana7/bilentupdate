<?php
global $bilent_options;
$sticky_header_onoff = isset($bilent_options['sticky_header_onoff']) ? $bilent_options['sticky_header_onoff'] : 0;
if ($sticky_header_onoff == '1') {
    $sticky = 'menu-sticky';
} else {
    $sticky = '';
}
?>
<!-- start header -->
<div class="full-width-header header-style2 sc-default-header">
    <!--Header Start-->
    <header id="sc-header" class="sc-header">
        <!-- Menu Start -->
        <div class="menu-area <?php echo esc_attr($sticky); ?>">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo-cat-wrap">
                            <div class="logo-part">
                                <?php
                                if (has_custom_logo()) {
                                    the_custom_logo();
                                } elseif (!has_custom_logo()) {
                                ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url(BILENT_IMG_URL . 'logo.png'); ?>" alt="<?php esc_attr_e('logo', 'bilent'); ?>">
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 align-items-center d-flex text-end justify-content-end">
                        <div class="sc-menu-area">
                            <div class="main-menu">
                                <nav class="sc-menu">
                                    <?php
                                    if (has_nav_menu('primary')) {
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'primary',
                                                'depth'          => 3, // 1 = no dropdowns, 2 = with dropdowns.
                                                'container'      => 'ul',
                                                'menu_class'     => 'nav-menu',
                                            )
                                        );
                                    } else {
                                        wp_nav_menu(
                                            array(
                                                'container'      => 'ul',
                                                'menu_class'     => 'nav-menu',
                                            )
                                        );
                                    }
                                    ?>
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                        <div class="expand-btn-inner text-end sc-mobile-cavas-icon">
                            <span>
                                <a id="nav-expander" class="nav-expander">
                                    <span class="dot1"></span>
                                    <span class="dot2"></span>
                                    <span class="dot3"></span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <nav class="sc-sidebar-offcanvas sc-mobile-cavas-menu">
            <div class="close-btn">
                <div id="nav-close">
                    <div class="line">
                        <span class="line1"></span><span class="line2"></span>
                    </div>
                </div>
            </div>
            <div class="canvas-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } elseif (!has_custom_logo()) {
                ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(BILENT_IMG_URL . 'logo.png'); ?>" alt="<?php esc_attr_e('logo', 'bilent'); ?>">
                    </a>
                <?php } ?>
            </div>
            <nav id="sc-offcanvas-menu" class="sc-offcanvas-menu">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'depth'          => 3, // 1 = no dropdowns, 2 = with dropdowns.
                            'container'      => 'ul',
                            'menu_class'     => 'nav-menu',
                        )
                    );
                } else {
                    wp_nav_menu(
                        array(
                            'container'      => 'ul',
                            'menu_class'     => 'nav-menu',
                        )
                    );
                }
                ?>
            </nav>
        </nav>



    </header>
    <!--Header End-->
</div>