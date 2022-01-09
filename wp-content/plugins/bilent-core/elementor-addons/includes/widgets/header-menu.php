<?php

use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Plugin;
use Elementor\Repeater;

class SC_Header_Menu extends Widget_Base
{

    public function get_name()
    {
        return 'SC_header_menu';
    }

    public function get_title()
    {
        return esc_html__('Header Menu', 'bilent-core');
    }

    public function get_icon()
    {
        return '';
    }

    public function get_categories()
    {
        return ['bilent'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content',
            [
                'label' => __('Content', 'bilent-core'),
            ]
        );
        $this->add_control(
            'search_onoff',
            [
                'label'   => esc_html__('Search ON/Off', 'scaddons'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'Canvas_onoff',
            [
                'label'   => esc_html__('Canvas ON/Off', 'scaddons'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'shopicon_onoff',
            [
                'label'   => esc_html__('Shop ON/Off', 'scaddons'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $search_onoff = $settings["search_onoff"];
        $Canvas_onoff = $settings["Canvas_onoff"];
        $shopicon_onoff = $settings["shopicon_onoff"];
?>
        <div class="menu-area menu-sticky darkheader-area">
            <div class="container">
                <div class="dark-menu-area  align-items-center d-flex">
                    <div class="logo-area sticky-logo">
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
                    <div class="sc-menu-area">
                        <div class="main-menu">
                            <nav class="sc-menu sc-menu-close">
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

                    <?php if ($search_onoff || $Canvas_onoff) { ?>
                        <div class="expand-btn-inner text-end">
                            <ul class="info-icon">
                                <?php if ($search_onoff) { ?>
                                    <li>
                                        <a class="hidden-xs sc-search" data-bs-target="#search-modal" data-bs-toggle="modal" href="#">
                                            <i class="flaticon flaticon-loupe"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (class_exists('WooCommerce')) { ?>
                                    <?php if ($shopicon_onoff) { ?>
                                        <li class="sc-cart-area">
                                            <div class="menu-cart-area">
                                                <a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fas fa-shopping-bag"></i></a>
                                                <div class="cart-icon-total-products">
                                                    <?php the_widget('WC_Widget_Cart'); ?>
                                                </div>
                                            </div>

                                        </li>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($Canvas_onoff) { ?>
                                    <li class="nav-arrow">
                                        <a id="nav-expander" class="nav-expander">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new \SC_Header_Menu());
