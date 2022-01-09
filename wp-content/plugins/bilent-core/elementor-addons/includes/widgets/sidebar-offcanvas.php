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

class SC_Header_Sidebar_Offcanvas extends Widget_Base
{

    public function get_name()
    {
        return 'SC_Header_Sidebar_Offcanvas';
    }

    public function get_title()
    {
        return esc_html__('Sidebar Offcanvas', 'bilent-core');
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
            'logo',
            [
                'label' => __('Logo', 'bilent-core'),
                'type' => Controls_Manager::MEDIA,
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
        $this->add_control(
            'menu__bg_color',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas' => 'background: {{VALUE}} !important',
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
                    '{{WRAPPER}} .sc-sidebar-offcanvas' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Height', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .canvas-logo img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .offcanvas-text' => 'color: {{VALUE}} !important',
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
                    '{{WRAPPER}} .sc-sidebar-offcanvas .address-widget li i' => 'color: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__('Link Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .address-widget li a' => 'color: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'link_hover_color',
            [
                'label' => esc_html__('Link Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .address-widget li a:hover' => 'color: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_area_test_icon',
            [
                'label' => esc_html__('Social Icon Style', 'scaddon'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__('Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .canvas-contact .social li a i' => 'color: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'social_icon__bg_color',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .canvas-contact .social li a i' => 'background: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'social_icon_hover_color',
            [
                'label' => esc_html__('Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .canvas-contact .social li a i:hover' => 'color: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'social_icon_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-sidebar-offcanvas .canvas-contact .social li a i:hover' => 'background: {{VALUE}} !important',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $phone_title = $settings["phone_title"];
        $phone_number = $settings["phone_number"];
        $email_title = $settings["email_title"];
        $email = $settings["email"];
        $address = $settings["address"];
        $short_desc = $settings["short_desc"];
        $logo = wp_get_attachment_image($settings["logo"]["id"], 'full');

?>
        <nav class="sc-sidebar-offcanvas">
            <div class="close-btn">
                <div id="nav-close">
                    <div class="line">
                        <span class="line1"></span><span class="line2"></span>
                    </div>
                </div>
            </div>
            <div class="canvas-logo">
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
            <div class="offcanvas-text">
                <p><?php echo $short_desc; ?></p>
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
            <ul class="address-widget">
                <li>
                    <i class="flaticon flaticon-call"></i>
                    <a href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo $phone_title; ?> <?php echo esc_html($phone_number); ?></a>
                </li>
                <li>
                    <i class="flaticon flaticon-mail"></i>
                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                </li>
                <li>
                    <div class="desc">
                        <i class="flaticon flaticon-maps-and-flags"></i>
                        <?php echo $address; ?>
                    </div>
                </li>
            </ul>
            <div class="canvas-contact">
                <ul class="social">
                    <?php foreach ($settings["items1"] as $item) {
                        $social_icon = $item["social_icon"];
                        $social_link = $item["social_link"];
                    ?>
                        <li><a href="<?php echo $social_link['url']; ?>"><i class="<?php echo $social_icon['value']; ?>"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

<?php

    }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Header_Sidebar_Offcanvas());
