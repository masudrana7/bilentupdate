<?php

/**
 * Slider widget class
 *
 */

use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class scaddon_pro_Slider_Showcase_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'sc-slider';
    }
    public function get_title()
    {
        return esc_html__('SC Slider', 'scaddon');
    }
    public function get_icon()
    {
        return 'eicon-slides';
    }
    public function get_categories()
    {
        return ['bilent'];
    }
    public function get_keywords()
    {
        return ['Slider'];
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__('Slider', 'scaddon'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'scaddon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'animation_effect_image',
            [
                'label'   => esc_html__('Select Animation Effect', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'zoomInImage',
                'options' => [
                    'zoomInImage' => esc_html__('zoomInImage', 'scaddon'),
                    'zoomOutImage' => esc_html__('zoomOutImage', 'scaddon'),
                ],
            ]
        );
        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'scaddon'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Slider Subtitle Hire', 'scaddon'),
                'label_block' => true,
                'placeholder' => esc_html__('Subtitle', 'scaddon'),
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'animation_effect_subtitle',
            [
                'label'   => esc_html__('Select Animation Effect', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'Up',
                'options' => [
                    'Left' => esc_html__('Left', 'scaddon'),
                    'Right' => esc_html__('Right', 'scaddon'),
                    'Up' => esc_html__('Up', 'scaddon'),
                ],
            ]
        );
        $repeater->add_control(
            'slide_title',
            [
                'label' => esc_html__('Slide Title', 'scaddon'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Slider Title Hire', 'scaddon'),
                'label_block' => true,
                'placeholder' => esc_html__('Name', 'scaddon'),
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'animation_effect_title',
            [
                'label'   => esc_html__('Select Animation Effect', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'Up',
                'options' => [
                    'Left' => esc_html__('Left', 'scaddon'),
                    'Right' => esc_html__('Right', 'scaddon'),
                    'Up' => esc_html__('Up', 'scaddon'),
                ],
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Slide Description', 'scaddon'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ', 'scaddon'),
                'label_block' => true,
                'placeholder' => esc_html__('Description', 'scaddon'),
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'animation_effect_des',
            [
                'label'   => esc_html__('Select Animation Effect', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'Up',
                'options' => [
                    'Left' => esc_html__('Left', 'scaddon'),
                    'Right' => esc_html__('Right', 'scaddon'),
                    'Up' => esc_html__('Up', 'scaddon'),
                ],
            ]
        );
        $repeater->add_control(
            'right_image',
            [
                'label' => esc_html__('Slider Image', 'scaddon'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'slider_image_effect',
            [
                'label'   => esc_html__('Slider Image', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'Right',
                'options' => [
                    'Left' => esc_html__('Left', 'scaddon'),
                    'Right' => esc_html__('Right', 'scaddon'),
                    'Up' => esc_html__('Up', 'scaddon'),
                ],
            ]
        );
        $repeater->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us', 'scaddon'),
                'label_block' => true,
                'placeholder' => esc_html__('Button text here', 'scaddon'),
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'scaddon'),
                'type' => Controls_Manager::URL,
            ]
        );
        $repeater->add_control(
            'animation_effect_btn',
            [
                'label'   => esc_html__('Select Animation Effect', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'Up',
                'options' => [
                    'Left' => esc_html__('Left', 'scaddon'),
                    'Right' => esc_html__('Right', 'scaddon'),
                    'Up' => esc_html__('Up', 'scaddon'),
                ],
            ]
        );
        $repeater->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'scaddon'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'scaddon'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'scaddon'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'scaddon'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify', 'scaddon'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'logo_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => esc_html__('Settings', 'scaddon'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__('Slider Settings', 'scaddon'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'slider_nav',
            [
                'label'   => esc_html__('Navigation', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'enable',
                'options' => [
                    'enable' => esc_html__('Enable', 'scaddon'),
                    'disable' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',


            ]

        );
        $this->add_control(
            'slider_dots',
            [
                'label'   => esc_html__('Dots', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'disable',
                'options' => [
                    'enable' => esc_html__('Enable', 'scaddon'),
                    'disable' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_title_style_grid',
            [
                'label' => esc_html__('Style', 'scaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'show_title',
            [
                'label' => esc_html__('Show Title', 'scaddon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'scaddon'),
                'label_off' => esc_html__('Hide', 'scaddon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'scaddon'),
                'selector' => '{{WRAPPER}} .sc-slider-area .slider-item .title',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
                'separator'   => 'before',
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slider-item .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slider-item .title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'show_desc',
            [
                'label' => esc_html__('Show Description', 'scaddon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'scaddon'),
                'label_off' => esc_html__('Hide', 'scaddon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'desc_margin',
            [
                'label' => esc_html__('Margin', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slider-item .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_desc' => 'yes'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__('Typography', 'scaddon'),
                'selector' => '{{WRAPPER}}  .sc-slider-area .slider-item .desc',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
                'separator'   => 'before',
                'condition' => [
                    'show_desc' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slider-item .desc' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_desc' => 'yes'
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => esc_html__('Button', 'scaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .slider-item .sc-btn' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slider-item .sc-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .slider-item .sc-btn',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_normal',
                'label' => esc_html__('Background', 'scaddon'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .slider-item .sc-btn',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .slider-item .sc-btn',
            ]
        );
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slider-item .sc-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .slider-item .sc-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'scaddon'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .slider-item .sc-btn:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'selector' => '{{WRAPPER}} .slider-item .sc-btn:hover',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__('Slider Style', 'scaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'arrow_options',
            [
                'label' => esc_html__('Arrow Style', 'scaddon'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'navigation_arrow_background',
            [
                'label' => esc_html__('Background', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slick-arrow' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__('Icon Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slick-arrow' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'bullet_options',
            [
                'label' => esc_html__('Bullet Style', 'scaddon'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'navigation_dot_background',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .stick-dots .slick-dots li button' => 'background: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'navigation_dot_active_background',
            [
                'label' => esc_html__('Background Active Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .stick-dots .slick-dots li:hover button, {{WRAPPER}} .sc-slider-area .stick-dots .slick-dots li.slick-active button' => 'background: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'bullet_spacing_custom',
            [
                'label' => esc_html__('Bullet Margin', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-slider-area .slick-dots li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <section class="sc-slider-area dots_<?php echo esc_attr($settings['slider_dots']); ?> navs_<?php echo esc_attr($settings['slider_nav']); ?>">
            <div class="slider-inner stick-dots">
                <?php
                foreach ($settings['logo_list'] as $index => $item) :
                    $bg_image = wp_get_attachment_image_url($item['bg_image']['id'], $settings['thumbnail_size']);
                    if (!$bg_image) {
                        $bg_image = Utils::get_placeholder_image_src();
                    }
                    $right_image = wp_get_attachment_image_url($item['right_image']['id'], $settings['thumbnail_size']);
                    $subtitle        = !empty($item['subtitle']) ? $item['subtitle'] : '';
                    $slide_title        = !empty($item['slide_title']) ? $item['slide_title'] : '';
                    $description  = !empty($item['description']) ? $item['description'] : '';
                    $btn_text        = !empty($item['btn_text']) ? $item['btn_text'] : '';
                    $link = !empty($item['link']['url']) ? $item['link']['url'] : '';

                    $animation    = !empty($settings['hover_animation']) ? 'elementor-animation-' . $settings['hover_animation'] . '' : '';
                    $animation_effect_subtitle        = !empty($item['animation_effect_subtitle']) ? $item['animation_effect_subtitle'] : '';
                    $animation_title        = !empty($item['animation_effect_title']) ? $item['animation_effect_title'] : '';
                    $animation_image        = !empty($item['animation_effect_image']) ? $item['animation_effect_image'] : '';
                    $slider_image        = !empty($item['slider_image_effect']) ? $item['slider_image_effect'] : '';
                    $animation_des        = !empty($item['animation_effect_des']) ? $item['animation_effect_des'] : '';
                    $animation_btn        = !empty($item['animation_effect_btn']) ? $item['animation_effect_btn'] : ''; ?>
                    <div class="slider-item  <?php echo esc_attr($item['align']); ?> <?php echo esc_attr('elementor-repeater-item-' . $item['_id']); ?>">
                        <div class="slider-image">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="<?php echo esc_attr($item['slide_title']); ?>" data-lazy="<?php echo esc_url($bg_image); ?>" class="full-image animated" data-animation-in="<?php echo esc_attr($animation_image); ?>" />
                        </div>
                        <div class="slide_content">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-sm-12 <?php if (!empty($right_image)) { ?> col-sm-6 <?php } ?>">
                                        <div class="slide-content-headings">
                                            <?php if (!empty($item['subtitle'])) : ?>
                                                <span class="animated subtitle" data-animation-in="fadeIn<?php echo esc_attr($animation_effect_subtitle); ?>">
                                                    <?php echo wp_kses_post($subtitle); ?></span>
                                            <?php endif; ?>

                                            <?php if (!empty($item['slide_title'])) : ?>
                                                <?php if ('yes' === $settings['show_title']) : ?>
                                                    <h1 class="animated title" data-animation-in="fadeIn<?php echo esc_attr($animation_title); ?>">
                                                        <?php echo wp_kses_post($slide_title); ?></h1>
                                                <?php endif; ?>

                                            <?php endif; ?>
                                            <?php if (!empty($item['description'])) : ?>
                                                <?php if ('yes' === $settings['show_desc']) : ?>
                                                    <p class="animated desc" data-animation-in="fadeIn<?php echo esc_attr($animation_des); ?>" data-delay-in="0.3"><?php echo wp_kses_post($description); ?></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (!empty($item['btn_text'])) : ?>
                                                <div class="slider-btn">
                                                    <a href="<?php echo esc_url($link); ?>" class="sc-btn animated" data-animation-in="fadeIn<?php echo esc_attr($animation_btn); ?>"><?php echo esc_attr($btn_text); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($right_image)) { ?>
                                        <div class="col-sm-6">
                                            <div class="slide-image">
                                                <img src="<?php echo esc_url($right_image); ?>" alt="<?php echo esc_attr($item['slide_title']); ?>" data-lazy="<?php echo esc_url($right_image); ?>" class="full-image animated" data-animation-in="fadeIn<?php echo esc_attr($slider_image); ?>" />
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- jquert -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery(".slider-inner")
                    .slick({
                        autoplay: false,
                        speed: 1500,
                        lazyLoad: "progressive",
                        arrows: true,
                        dots: true,
                        variableWidth: true,
                        prevArrow: '<div class="slick-arrow arrow-left"><i class="flaticon flaticon-left-arrow"></i></div>',
                        nextArrow: '<div class="slick-arrow arrow-right"><i class="flaticon flaticon-right-arrow"></i></div>'
                    })
                    .slickAnimation();
                jQuery(".slick-nav").on("click touch", function(e) {
                    e.preventDefault();
                    var arrow = $(this);
                    if (!arrow.hasClass("animate")) {
                        arrow.addClass("animate");
                        setTimeout(() => {
                            arrow.removeClass("animate");
                        }, 2000);
                    }
                });
            });
        </script>
<?php }
}
Plugin::instance()->widgets_manager->register_widget_type(new \scaddon_pro_Slider_Showcase_Widget());
