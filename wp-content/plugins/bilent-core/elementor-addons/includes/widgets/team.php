<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;

class SC_Repair_Team extends Widget_Base
{

    public function get_name()
    {
        return 'SC_Repair_Team';
    }

    public function get_title()
    {
        return esc_html__('SC Team Slider', 'scaddon');
    }
    public function get_icon()
    {
        return 'eicon-slides';
    }
    public function get_categories()
    {
        return ['bilent'];
    }
    protected function _register_controls()
    {

        $this->start_controls_section(
            'team_member_list',
            [
                'label' => __('Team Member List', 'scaddon'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'scaddon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Lucinda Banfield', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => __('Designation', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Repair Technician', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'scaddon'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('PC Repair Technician, installs, evaluates, & troubleshoots.', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'team_single_link',
            [
                'label' => __('Team Single Link', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'fb_link',
            [
                'label' => __('Facebook Link', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'tw_link',
            [
                'label' => __('Twitter Link', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'gp_link',
            [
                'label' => __('Google Pluse Link', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'ld_link',
            [
                'label' => __('Linkedin Link', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'scaddon'),
            ]
        );
        $repeater->add_control(
            'yu_link',
            [
                'label' => __('Youtube Link', 'scaddon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'scaddon'),
            ]
        );
        $this->add_control(
            'items1',
            [
                'label' => __('Repeater List', 'scaddon'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'scaddon'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'scaddon'),
                    ],
                    [
                        'list_title' => __('Title #2', 'scaddon'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'scaddon'),
                    ],
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
                'label' => esc_html__('Background', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .sc-addon-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',],
                'condition' => [
                    'slider_dots' => 'true'
                ],
            ]
        );
        $this->add_control(
            'dots_bdr_color',
            [
                'label' => esc_html__('Border Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .sc-addon-slider .slick-dots li button' => 'border-color: {{VALUE}};',],

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
                    '{{WRAPPER}} .sc-blog .blog-item' => 'margin-left:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sc-blog .blog-item' => 'margin-right:{{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .sc-tam-team .team-item-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'item_background_color',
            [
                'label' => esc_html__('Background Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-tam-team .team-item-text' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'item_background_hover_color',
            [
                'label' => esc_html__('Background Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-tam-team:hover .team-item-text' => 'background-color: {{VALUE}} !important',
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
                    '{{WRAPPER}} .sc-tam-team .team-item-text' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__('Title & designation & Icon Style', 'rsaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item-text .team-details .team-name a' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__('Title Hover Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-tam-team:hover .team-item-text .team-details .team-name a' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'rsaddon'),
                'scheme' => Typography::TYPOGRAPHY_1,
                'selector' =>
                '{{WRAPPER}} .team-item-text .team-details .team-name',
                'separator' => 'before',
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
                    '{{WRAPPER}} .team-item-text .team-details .team-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__('Designation Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item-text .team-details .team-designation' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'designation_color_hover',
            [
                'label' => esc_html__('Designation Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-tam-team:hover .team-item-text .team-details .team-designation' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-tam-team .team-item-text .team-social li a' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Icon Hover Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-tam-team .team-item-text .team-social li a:hover' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $select_style = $settings["select_style"];
        $heading = $settings["heading"];
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

        $unique = rand(2021, 158596);
        $slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay', 'pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs'); ?>

        <div class="section-sc-team sc-slider-wrapper">
            <div id="sc-slick-slider-<?php echo esc_attr($unique); ?>" class="sc-unique-slider">
                <?php foreach ($settings["items1"] as $item) {
                    $name = $item["name"];
                    $link = $item["team_single_link"];
                    $designation = $item["designation"];
                    $description = $item["description"];
                    $image = wp_get_attachment_image_url($item["image"]["id"], 'full');
                    $fb_link = $item["fb_link"];
                    $tw_link = $item["tw_link"];
                    $gp_link = $item["gp_link"];
                    $ld_link = $item["ld_link"];
                    $yu_link = $item["yu_link"]; ?>
                    <div class="sc-tam-team">
                        <div class="team-img">
                            <a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" alt=""></a>
                        </div>
                        <div class="team-item-text">
                            <div class="team-details">
                                <h3 class="team-name"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></h3>
                                <span class="team-designation"><?php echo $designation; ?></span>
                            </div>
                            <ul class="team-social">
                                <?php if (!empty($fb_link)) { ?>
                                    <li><a href="<?php echo $fb_link; ?>" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($gp_link)) { ?>
                                    <li><a href="<?php echo $gp_link; ?>" class="social-icon" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($tw_link)) { ?>
                                    <li><a href="<?php echo $tw_link; ?>" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($ld_link)) { ?>
                                    <li><a href="<?php echo $ld_link; ?>" class="social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($yu_link)) { ?>
                                    <li><a href="<?php echo $yu_link; ?>" class="social-icon" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="sc-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
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

Plugin::instance()->widgets_manager->register_widget_type(new \SC_Repair_Team());
