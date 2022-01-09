<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;

class SC_Repair_Testimonial extends Widget_Base
{
    public function get_name()
    {
        return 'SC_Repair_Testimonial';
    }
    public function get_title()
    {
        return esc_html__('SC Testimonial Slider', 'bilent-core');
    }
    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }
    public function get_categories()
    {
        return ['bilent'];
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'testimonial_list',
            [
                'label' => __('Testimonial List', 'bilent-core'),
            ]
        );
        $this->add_control(
            'testimonial_style',
            [
                'label'   => esc_html__('Select Testimonial Style', 'scaddons'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'scaddons'),
                    'style2' => esc_html__('Style 2', 'scaddons'),
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Miranda Austin', 'bilent-core'),
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => __('Designation', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Genarel customer', 'bilent-core'),
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bilent-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $repeater->add_control(
            'review_text',
            [
                'label' => __('Review Text', 'bilent-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Article evident arrived express highest men did boy. Mistres sensible entirely am so. Quick can manor smart money hopes worth produce husband boy her had hearing.' . 'bilent-core'),
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
                    [
                        'list_title' => __('Title #2', 'bilent-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'bilent-core'),
                    ],
                ],
            ]
        );

        $this->add_control(
            'left_image',
            [
                'label' => __('Quote Icon Image', 'bilent-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $this->end_controls_section();

        //start slider settings
        $this->start_controls_section(
            'section_slider_settings',
            [
                'label' => esc_html__('Slider Settings', 'scaddon'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'col_lg',
            [
                'label'   => esc_html__('Desktops > 1199px', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 3,
                'options' => [
                    '1' => esc_html__('1 Column', 'scaddon'),
                    '2' => esc_html__('2 Column', 'scaddon'),
                    '3' => esc_html__('3 Column', 'scaddon'),
                    '4' => esc_html__('4 Column', 'scaddon'),
                    '6' => esc_html__('6 Column', 'scaddon'),
                ],
                'separator' => 'before',

            ]
        );
        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__('Desktops > 991px', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 3,
                'options' => [
                    '1' => esc_html__('1 Column', 'scaddon'),
                    '2' => esc_html__('2 Column', 'scaddon'),
                    '3' => esc_html__('3 Column', 'scaddon'),
                    '4' => esc_html__('4 Column', 'scaddon'),
                    '6' => esc_html__('6 Column', 'scaddon'),
                ],
                'separator' => 'before',
            ]

        );
        $this->add_control(
            'col_sm',
            [
                'label'   => esc_html__('Tablets > 767px', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 2,
                'options' => [
                    '1' => esc_html__('1 Column', 'scaddon'),
                    '2' => esc_html__('2 Column', 'scaddon'),
                    '3' => esc_html__('3 Column', 'scaddon'),
                    '4' => esc_html__('4 Column', 'scaddon'),
                    '6' => esc_html__('6 Column', 'scaddon'),
                ],
                'separator' => 'before',

            ]

        );
        $this->add_control(
            'col_xs',
            [
                'label'   => esc_html__('Tablets < 768px', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    '1' => esc_html__('1 Column', 'scaddon'),
                    '2' => esc_html__('2 Column', 'scaddon'),
                    '3' => esc_html__('3 Column', 'scaddon'),
                    '4' => esc_html__('4 Column', 'scaddon'),
                    '6' => esc_html__('6 Column', 'scaddon'),
                ],
                'separator' => 'before',

            ]

        );
        $this->add_control(
            'slides_ToScroll',
            [
                'label'   => esc_html__('Slide To Scroll', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 2,
                'options' => [
                    '1' => esc_html__('1 Item', 'scaddon'),
                    '2' => esc_html__('2 Item', 'scaddon'),
                    '3' => esc_html__('3 Item', 'scaddon'),
                    '4' => esc_html__('4 Item', 'scaddon'),
                ],
                'separator' => 'before',

            ]

        );
        $this->add_control(
            'slider_dots',
            [
                'label'   => esc_html__('Navigation Dots', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__('Enable', 'scaddon'),
                    'false' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'dots_bg',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .sc-unique-slider .slick-dots button' => 'background: {{VALUE}};',],
                'condition' => [
                    'slider_dots' => 'true'
                ],
            ]
        );
        $this->add_control(
            'dots_bdr_color',
            [
                'label' => esc_html__('Active Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .sc-unique-slider .slick-dots button:hover, {{WRAPPER}} .sc-unique-slider .slick-dots .slick-active button' => 'background: {{VALUE}};',],
                'condition' => [
                    'slider_dots' => 'true'
                ],
            ]
        );
        $this->add_control(
            'slider_nav',
            [
                'label'   => esc_html__('Navigation Nav', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__('Enable', 'scaddon'),
                    'false' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'arrow_bg',
            [
                'label' => esc_html__('Background', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .sc-addon-slider .slick-next, {{WRAPPER}} .sc-addon-slider .slick-prev' => 'background: {{VALUE}};',],
                'condition' => [
                    'slider_nav' => 'true'
                ],
            ]
        );

        $this->add_control(
            'arrow_icon_color',
            [
                'label' => esc_html__('Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .sc-addon-slider .slick-prev::after, {{WRAPPER}} .sc-addon-slider .slick-next::after' => 'color: {{VALUE}};',],

                'condition' => [
                    'slider_nav' => 'true'
                ],
            ]
        );
        $this->add_control(
            'slider_autoplay',
            [
                'label'   => esc_html__('Autoplay', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__('Enable', 'scaddon'),
                    'false' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'slider_autoplay_speed',
            [
                'label'   => esc_html__('Autoplay Slide Speed', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 3000,
                'options' => [
                    '1000' => esc_html__('1 Seconds', 'scaddon'),
                    '2000' => esc_html__('2 Seconds', 'scaddon'),
                    '3000' => esc_html__('3 Seconds', 'scaddon'),
                    '4000' => esc_html__('4 Seconds', 'scaddon'),
                    '5000' => esc_html__('5 Seconds', 'scaddon'),
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'slider_stop_on_hover',
            [
                'label'   => esc_html__('Stop on Hover', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__('Enable', 'scaddon'),
                    'false' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'slider_interval',
            [
                'label'   => esc_html__('Autoplay Interval', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 3000,
                'options' => [
                    '5000' => esc_html__('5 Seconds', 'scaddon'),
                    '4000' => esc_html__('4 Seconds', 'scaddon'),
                    '3000' => esc_html__('3 Seconds', 'scaddon'),
                    '2000' => esc_html__('2 Seconds', 'scaddon'),
                    '1000' => esc_html__('1 Seconds', 'scaddon'),
                ],
                'separator' => 'before',

            ]

        );
        $this->add_control(
            'slider_loop',
            [
                'label'   => esc_html__('Loop', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__('Enable', 'scaddon'),
                    'false' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',

            ]

        );
        $this->add_control(
            'slider_centerMode',
            [
                'label'   => esc_html__('Center Mode', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__('Enable', 'scaddon'),
                    'false' => esc_html__('Disable', 'scaddon'),
                ],
                'separator' => 'before',
            ]

        );
        $this->add_control(
            'item_gap_custom',
            [
                'label' => esc_html__('Item Middle Gap', 'prelements'),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 15,
                ],

                'selectors' => [
                    '{{WRAPPER}} .sc-slider-wrapper .slick-slide' => 'margin-left:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sc-slider-wrapper .slick-slide' => 'margin-right:{{SIZE}}{{UNIT}};',
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
            'item_padding_area',
            [
                'label' => esc_html__('Padding', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-testimonial .single-testimonial .testi-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_margin_area',
            [
                'label' => esc_html__('Margin', 'scaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sc-testimonial .single-testimonial .testi-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'item_background_color',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-testimonial .single-testimonial .testi-item' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
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
                'selectors' => [
                    '{{WRAPPER}} .sc-testimonial .single-testimonial .testi-item' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'rating_onoff',
            [
                'label'   => esc_html__('Rating ON/Off', 'scaddons'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__('Testimonial Style', 'rsaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .testi-item .author-details .name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'rsaddon'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' =>
                '{{WRAPPER}} .single-testimonial .testi-item .author-details .name',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'rsaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .testi-item .author-details .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__('Designation Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .testi-item .author-details .designation' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .testi-item .desc' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__('Conent Margin', 'rsaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .testi-item .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $left_image = wp_get_attachment_image_url($settings["left_image"]["id"], 'full');

        $slidesToShow    = !empty($settings['col_lg']) ? $settings['col_lg'] : 3;
        $autoplaySpeed   = $settings['slider_autoplay_speed'];
        $interval        = $settings['slider_interval'];
        $slidesToScroll  = $settings['slides_ToScroll'];
        $slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
        $pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
        $sliderDots      = $settings['slider_dots'] == 'true' ? 'true' : 'false';
        $sliderNav       = $settings['slider_nav'] == 'true' ? 'true' : 'false';
        $infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
        $centerMode      = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';
        $col_lg          = $settings['col_lg'];
        $col_md          = $settings['col_md'];
        $col_sm          = $settings['col_sm'];
        $col_xs          = $settings['col_xs'];
        $rating_onoff    = $settings["rating_onoff"];
        $unique = rand(2021, 158596);
        $slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay', 'pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs'); ?>
        <div class="sc-testimonial sc-slider-wrapper sc-testimonilal_<?php echo $settings['testimonial_style']; ?> testi_item_<?php echo $settings['align']; ?>">
            <div id="sc-slick-slider-<?php echo esc_attr($unique); ?>" class="sc-testimonial-slider sc-unique-slider">
                <?php foreach ($settings["items1"] as $item) {
                    $name = $item["name"];
                    $designation = $item["designation"];
                    $review_text = $item["review_text"];
                    $image = wp_get_attachment_image_url($item["image"]["id"], 'full');
                    if ('style2' == $settings['testimonial_style']) {  ?>
                        <div class="single-testimonial">
                            <div class="testi-item">
                                <div class="desc"><?php echo $review_text; ?></div>
                                <div class="quote-icon">
                                    <img src="<?php echo $left_image; ?>" alt="quote-icon">
                                </div>
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-img">
                                        <img src="<?php echo $image; ?>" alt="">
                                    </div>
                                    <div class="author-details">
                                        <h4 class="name"><?php echo $name; ?></h4>
                                        <span class="designation"><?php echo $designation; ?></span>
                                        <?php if ($rating_onoff) { ?>
                                            <div class="rating-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="single-testimonial">
                            <div class="testi-item">
                                <div class="author-img">
                                    <img src="<?php echo $image; ?>" alt="">
                                </div>
                                <div class="desc"><?php echo $review_text; ?></div>
                                <div class="author-details">
                                    <h4 class="name"><?php echo $name; ?></h4>
                                    <span class="designation"><?php echo $designation; ?></span>
                                </div>
                                <div class="quote-icon">
                                    <img src="<?php echo $left_image; ?>" alt="quote-icon">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="sc-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.sc-unique-slider').each(function(index) {
                    var slider_id = jQuery(this).attr('id');
                    var slider_conf = jQuery.parseJSON(jQuery(this).closest('.sc-slider-wrapper').find('.sc-slider-conf').attr('data-conf'));

                    if (typeof(slider_id) != 'undefined' && slider_id != '') {
                        jQuery('#' + slider_id).not('.slick-initialized').slick({
                            slidesToShow: parseInt(slider_conf.col_lg),
                            centerMode: (slider_conf.centerMode) == "true" ? true : false,
                            dots: (slider_conf.sliderDots) == "true" ? true : false,
                            arrows: (slider_conf.sliderNav) == "true" ? true : false,
                            autoplay: (slider_conf.slider_autoplay) == "true" ? true : false,
                            slidesToScroll: parseInt(slider_conf.slidesToScroll),
                            centerPadding: '15px',
                            autoplaySpeed: parseInt(slider_conf.autoplaySpeed),
                            pauseOnHover: (slider_conf.pauseOnHover) == "true" ? true : false,
                            loop: false,
                            responsive: [{
                                    breakpoint: 1200,
                                    settings: {
                                        slidesToShow: parseInt(slider_conf.col_md),
                                    }
                                },
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: parseInt(slider_conf.col_sm),
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        arrows: false,
                                        slidesToShow: parseInt(slider_conf.col_xs),
                                    }
                                },
                            ]
                        });
                    }

                });
            });
        </script>
<?php }
    protected function content_template()
    {
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Repair_Testimonial());
