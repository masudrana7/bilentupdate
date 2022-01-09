<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Plugin;

class SC_Menu extends Widget_Base
{

    public function get_name()
    {
        return 'SC_Menu';
    }
    public function get_title()
    {
        return esc_html__('SC Menu', 'bilent-core');
    }
    public function get_icon()
    {
        return 'eicon-nav-menu';
    }
    public function get_categories()
    {
        return ['bilent'];
    }
    private function sc_get_menu()
    {
        $options = array();
        $menus = wp_get_nav_menus();
        if (!empty($menus)) {
            foreach ($menus as $menu) {
                if (isset($menu)) {
                    $options[''] = 'Select';
                    if (isset($menu->term_id) && isset($menu->name)) {
                        $options[$menu->term_id] = $menu->name;
                    }
                }
            }
        }
        return $options;
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
            'menu_select',
            [
                'label' => __('Select Menu', 'bilent-core'),
                'type' => Controls_Manager::SELECT,
                'options' =>  $this->sc_get_menu(),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_area_style',
            [
                'label' => esc_html__('Menu Style', 'scaddon'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__('Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-widget-menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu_color_active',
            [
                'label' => esc_html__('Active & Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-widget-menu li a:hover, {{WRAPPER}} .sc-widget-menu li.current a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'menu_color_bg',
            [
                'label' => esc_html__('Background', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-widget-menu li a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu_color_active_bg',
            [
                'label' => esc_html__('Active & Hover Background', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-widget-menu li a:hover, {{WRAPPER}} .sc-widget-menu li.current a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_padding',
            [
                'label' => esc_html__('Padding', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-widget-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_margin',
            [
                'label' => esc_html__('Margin', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-widget-menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'scaddon'),
                'selector' => '{{WRAPPER}}  .sc-widget-menu li a',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'menu_border',
                'selector' => '{{WRAPPER}} .sc-widget-menu li a',
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $menu_select = $settings["menu_select"];
        $nav_menu = !empty($menu_select) ? wp_get_nav_menu_object($menu_select) : false;
        $menu_no = wp_get_nav_menu_items($nav_menu);
        if (!empty($menu_no)) {
            echo '<ul class="sc-widget-menu widget-menu">';
            $primaryNav     = wp_get_nav_menu_items($nav_menu); // Get the array of wp objects, the nav items for our queried location.
            $queried_object = get_queried_object();
            $object_post_id = $queried_object->ID;
            foreach ($primaryNav as $navItem) {
                $post_id = $navItem->object_id;
                $post_object_id = $navItem->object_id;
                if ($object_post_id == $post_object_id) {
                    echo '<li class="current"><a href="' . $navItem->url . '" title="' . $navItem->title . '">' . $navItem->title . '</a></li>';
                } else {
                    echo '<li><a href="' . $navItem->url . '" title="' . $navItem->title . '">' . $navItem->title . '</a></li>';
                }
            }
            echo '</ul>';
        }
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Menu());
