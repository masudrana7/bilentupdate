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

class SC_Header_Middle extends Widget_Base
{

    public function get_name()
    {
        return 'SC_header_middle';
    }
    public function get_title()
    {
        return esc_html__('Header Middle', 'bilent-core');
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
            'select_style',
            [
                'label'   => esc_html__('Select Style', 'scaddons'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'scaddons'),
                    'style2' => esc_html__('Style 2', 'scaddons'),
                    'style3' => esc_html__('Style 3', 'scaddons'),
                ],
            ]
        );
        $this->add_control(
            'logo',
            [
                'label' => __('Logo', 'bilent-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'logo_sticky',
            [
                'label' => __('Logo Sticky', 'bilent-core'),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'select_style' => 'style3'
                ]
            ]
        );
        $this->add_control(
            'phone_title',
            [
                'label' => __('Phone Title', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Call:', 'bilent-core'),
            ]
        );
        $this->add_control(
            'phone_number',
            [
                'label' => __('Phone Number', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('+(111)256 352', 'bilent-core'),
            ]
        );
        $this->add_control(
            'email_title',
            [
                'label' => __('Email Title', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Mail drop Us', 'bilent-core'),
            ]
        );
        $this->add_control(
            'email',
            [
                'label' => __('Email', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('support@softcoders.net', 'bilent-core'),
            ]
        );
        $this->add_control(
            'address',
            [
                'label' => __('Address', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('202 Raffles Ave, Carlisle CA2 7EF, United Kingdon', 'bilent-core'),
            ]
        );
        $this->add_control(
            'short_desc',
            [
                'label' => __('Short Desc', 'bilent-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for web sites still in their infancy.', 'bilent-core'),
            ]
        );
        $this->add_control(
            'btn_onoff',
            [
                'label'   => esc_html__('Button ON/Off', 'scaddons'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
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
            'shopicon_onoff',
            [
                'label'   => esc_html__('Shop ON/Off', 'scaddons'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Consulthing', 'bilent-core'),
                'condition' => [
                    'btn_onoff' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'bilent-core'),
                'condition' => [
                    'btn_onoff' => 'yes',
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'social_list',
            [
                'label' => __('Social Links', 'bilent-core'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'social_icon',
            [
                'label' => __('Social Icon', 'bilent-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__('Link', 'scaddon'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__('https://example.com/', 'scaddon'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'items1',
            [
                'label' => __('Repeater List', 'bilent-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'bilent-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'bilent-core'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_area_style',
            [
                'label' => esc_html__('Global Style', 'scaddon'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'number_width',
            [
                'label' => esc_html__('Logo Height', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-part img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'menu__bg_color',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.header-middle-area' => 'background: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );
        $this->add_responsive_control(
            'sec_padding',
            [
                'label' => esc_html__('Padding', 'scaddons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} div.header-middle-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_area_test_style',
            [
                'label' => esc_html__('Content Style', 'scaddon'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__('Menu Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-area .main-menu .sc-menu > ul.nav-menu > li > a' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => ['style1', 'style2']
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'menu_color_hover',
            [
                'label' => esc_html__('Menu Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-area .main-menu .sc-menu > ul.nav-menu > li.current-menu-parent > a' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .menu-area .main-menu .sc-menu > ul.nav-menu > li:hover > a' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => ['style1', 'style2']
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'menu_drop_color',
            [
                'label' => esc_html__('Menu Drop Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-area .main-menu .sc-menu ul.sub-menu li a' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => ['style1', 'style2']
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'menu_drop_hover_color',
            [
                'label' => esc_html__('Menu Drop Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-area .main-menu .sc-menu ul.sub-menu li.current-menu-item a, {{WRAPPER}} .menu-area .main-menu .sc-menu ul.sub-menu li a:hover' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => ['style1', 'style2']
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .header-address ul li i' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => 'style1'
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .header-address ul li .info span' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => 'style1'
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Link Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .header-address ul li .info a' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => 'style1'
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'text_color_hover',
            [
                'label' => esc_html__('Link Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .header-address ul li .info a:hover' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'select_style' => 'style1'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'navigation_bar',
            [
                'label' => esc_html__('Navigation-Bar Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .nav-expander span' => 'background: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'navigation_bar_hover',
            [
                'label' => esc_html__('Navigation-Bar Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .nav-expander:hover span' => 'background: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'navigation_bar_hover_bg',
            [
                'label' => esc_html__('Navigation-Bar Background', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .nav-expander' => 'background: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );
        $this->end_controls_section();
        // Button Style
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'scaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'btn_onoff' => 'yes',
                ]
            ]
        );
        $this->start_controls_tabs('_tabs_button');
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'scaddon'),
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => esc_html__('Text Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_padding',
            [
                'label' => esc_html__('Padding', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_normal',
                'label' => esc_html__('Background', 'scaddon'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button',
            ]
        );
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'scaddon'),
            ]
        );
        $this->add_control(
            'btn_text_hover_color',
            [
                'label' => esc_html__('Text Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_hover_padding',
            [
                'label' => esc_html__('Padding', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'scaddon'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'selector' => '{{WRAPPER}} div.menu-area .expand-btn-inner li.sc-quote-btn .quote-button:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $select_style = $settings["select_style"];
        $phone_title = $settings["phone_title"];
        $phone_number = $settings["phone_number"];
        $email_title = $settings["email_title"];
        $button_text = $settings["button_text"];
        $email = $settings["email"];
        $address = $settings["address"];
        $short_desc = $settings["short_desc"];
        $logo = wp_get_attachment_image($settings["logo"]["id"], 'full');
        $btn_onoff = $settings["btn_onoff"];
        $search_onoff = $settings["search_onoff"];
        $shopicon_onoff = $settings["shopicon_onoff"];

?>
        <?php if ($select_style == 'style1') { ?>
            <div class="header-middle-area menu-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo-cat-wrap">
                                <div class="logo-part">
                                    <?php
                                    if ($logo) { ?>
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo $logo; ?>
                                        </a>
                                    <?php } elseif (has_custom_logo()) {
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
                        <div class="col-lg-9 align-items-center d-flex justify-content-end">
                            <div class="expand-btn-inner">
                                <div class="header-address">
                                    <ul>
                                        <li>
                                            <i class="flaticon flaticon-call-1"></i>
                                            <div class="info">
                                                <span><?php echo $phone_title; ?></span>
                                                <a href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo esc_html($phone_number); ?></a>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="flaticon flaticon-email"></i>
                                            <div class="info">
                                                <span><?php echo $email_title; ?></span>
                                                <?php echo esc_html($address); ?>
                                            </div>
                                        </li>
                                        <?php if ($btn_onoff) { ?>
                                            <li class="sc-quote-btn">
                                                <a href="#" class="quote-button"><?php echo esc_html($button_text); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($select_style == 'style2') { ?>
            <div class="menu-area menu-sticky sc-header-style2 sc-header-default">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <div class="logo-cat-wrap">
                                <div class="logo-part">
                                    <?php
                                    if ($logo) { ?>
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo $logo; ?>
                                        </a>
                                    <?php } elseif (has_custom_logo()) {
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
                        <div class="col-md-9 align-items-center d-flex text-end justify-content-end">
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
                                                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fas fa-shopping-bag"></i></i></a>
                                                    <div class="cart-icon-total-products">
                                                        <?php the_widget('WC_Widget_Cart'); ?>
                                                    </div>
                                                </div>

                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                    <li class="nav-arrow sc-nav-mobile">
                                        <a id="nav-expander" class="nav-expander">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                        </a>
                                    </li>
                                    <?php if ($btn_onoff) { ?>
                                        <li class="sc-quote-btn">
                                            <a href="#" class="quote-button"><?php echo esc_html($button_text); ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($select_style == 'style3') {
            $logo_sticky = wp_get_attachment_image($settings["logo_sticky"]["id"], 'full');
        ?>
            <div class="menu-area menu-sticky sc-transparent-header sc-header-default">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-3">
                            <div class="logo-cat-wrap">
                                <div class="logo-part">
                                    <?php
                                    if ($logo) { ?>
                                        <a class="default-logo" href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo $logo; ?>
                                        </a>
                                        <?php if ($logo_sticky) { ?>
                                            <a class="sticky-logo" href="<?php echo esc_url(home_url('/')); ?>">
                                                <?php echo $logo_sticky; ?>
                                            </a>
                                        <?php } ?>
                                    <?php } elseif (has_custom_logo()) {
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
                        <div class="col-md-9 align-items-center d-flex text-end justify-content-end">
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
                                                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fas fa-shopping-bag"></i></i></a>
                                                    <div class="cart-icon-total-products">
                                                        <?php the_widget('WC_Widget_Cart'); ?>
                                                    </div>
                                                </div>

                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                    <li class="nav-arrow sc-nav-mobile">
                                        <a id="nav-expander" class="nav-expander">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                        </a>
                                    </li>
                                    <?php if ($btn_onoff) { ?>
                                        <li class="sc-quote-btn">
                                            <a href="#" class="quote-button"><?php echo esc_html($button_text); ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } ?>

<?php

    }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Header_Middle());
