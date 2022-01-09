<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Plugin;
use Elementor\Widget_Base;

class SC_Repair_Blog extends Widget_Base
{
    public function get_name()
    {
        return 'SC_Repair_Blog';
    }
    public function get_title()
    {
        return esc_html__('SC Blog Slider', 'scaddon');
    }
    public function get_icon()
    {
        return 'eicon-post';
    }
    public function get_categories()
    {
        return ['bilent'];
    }
    private function get_blog_categories()
    {
        $options = array();
        $taxonomy = 'category';
        if (!empty($taxonomy)) {
            $terms = get_terms(
                array(
                    'parent' => 0,
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                )
            );
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    if (isset($term)) {
                        $options[''] = 'Select';
                        if (isset($term->slug) && isset($term->name)) {
                            $options[$term->slug] = $term->name;
                        }
                    }
                }
            }
        }
        return $options;
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_blogs',
            [
                'label' => esc_html__('Blogs', 'scaddon'),
            ]
        );
        $this->add_control(
            'blog_style',
            [
                'label'   => esc_html__('Select Blog Style', 'scaddons'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'scaddons'),
                    'style2' => esc_html__('Style 2', 'scaddons'),
                ],
            ]
        );
        $this->add_control(
            'category_id',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'scaddon'),
                'options' => $this->get_blog_categories()
            ]
        );
        $this->add_control(
            'blog_word_show',
            [
                'label' => esc_html__('Content Limit', 'sc'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('20', 'sc'),
            ]
        );
        $this->add_control(
            'number',
            [
                'label' => esc_html__('Number of Post', 'scaddon'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3
            ]
        );
        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'scaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'scaddon'),
                    'ID' => esc_html__('ID', 'scaddon'),
                    'author' => esc_html__('Author', 'scaddon'),
                    'title' => esc_html__('Title', 'scaddon'),
                    'modified' => esc_html__('Modified', 'scaddon'),
                    'rand' => esc_html__('Random', 'scaddon'),
                    'comment_count' => esc_html__('Comment count', 'scaddon'),
                    'menu_order' => esc_html__('Menu order', 'scaddon')
                ]
            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'scaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'desc' => esc_html__('DESC', 'scaddon'),
                    'asc' => esc_html__('ASC', 'scaddon')
                ]
            ]
        );
        $this->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'scaddon'),
                'type' => Controls_Manager::TEXT
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
                    '{{WRAPPER}} .sc-slider-wrapper .slick-slide' => 'margin-left:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sc-slider-wrapper .slick-slide' => 'margin-right:{{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__('Blog Style', 'rsaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'meta_date_color',
            [
                'label' => esc_html__('Meta Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .blog-meta li' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'meta_icon_color',
            [
                'label' => esc_html__('Meta Icon Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .blog-meta li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'meta_all_bg_color',
            [
                'label' => esc_html__('Meta Bg Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-blog-grid .blog-item.blog_style_2.slick-slide .blog-meta' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'blog_style' => 'style2',
                ]
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .title a' => 'color: {{VALUE}};',

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
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .title a:hover' => 'color: {{VALUE}};',
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
                '{{WRAPPER}} .sc-blog .blog-item .blog-content .title',
            ]
        );

        $this->add_responsive_control(
            'blog_title_margin',
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
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .desc' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'blog_bottom_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'rsaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content .desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_content_padding',
            [
                'label' => esc_html__('Content Padding', 'rsaddon'),
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
                    '{{WRAPPER}} .sc-blog .blog-item .blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_area_content_bg',
            [
                'label' => esc_html__('Blog Area Background', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-blog .blog-item' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_area_box_shadow',
                'selector' => '{{WRAPPER}} .sc-blog .blog-item',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'media_border',
                'selector' => '{{WRAPPER}} .sc-blog .blog-item',
            ]
        );

        $this->add_responsive_control(
            'blog_area_content_padding',
            [
                'label' => esc_html__('Full Area Padding', 'rsaddon'),
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
                    '{{WRAPPER}} .sc-blog .blog-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Read More Style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => esc_html__('Read More Style', 'rsaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'blog_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rsaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-item .blog-content .blog-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_blog_btn_normal',
            [
                'label' => esc_html__('Normal', 'rsaddon'),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .blog-content .blog-btn a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color_bg',
            [
                'label' => esc_html__('Icon Background Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .blog-content .blog-btn a i' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rsaddon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-item .blog-content .blog-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            '_blog_btn_button_hover',
            [
                'label' => esc_html__('Hover', 'rsaddon'),
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .blog-content .blog-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );




        $this->add_control(
            'icon_border_hover_color_bg',
            [
                'label' => esc_html__('Icon Hover Background Color', 'rsaddon'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .blog-content .blog-btn a:hove' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $extra_class = $settings['extra_class'];
        $btn_text = $settings['btn_text'];
        $posts_per_page = $settings['number'];
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
        $order_by = $settings['order_by'];
        $order = $settings['order'];
        $pg_num = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => array('post'),
            'post_status' => array('publish'),
            'nopaging' => false,
            'paged' => $pg_num,
            'posts_per_page' => $posts_per_page,
            'category_name' => $settings['category_id'],
            'orderby' => $order_by,
            'order' => $order,
        );
        $query = new WP_Query($args);
        $unique = rand(2021, 434221);
        $slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay', 'pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs');
?>
        <section class="sc-blog sc-blog-<?php echo $settings['blog_style']; ?> <?php echo $extra_class; ?>">
            <div class="sc-slider-wrapper">
                <div id="sc-slick-slider-<?php echo esc_attr($unique); ?>" class="sc-unique-slider">
                    <?php
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $thumbnail_src = get_the_post_thumbnail_url();
                            $post_admin     = get_the_author();

                            if (!empty($settings['blog_word_show'])) {
                                $limit = $settings['blog_word_show'];
                            } else {
                                $limit = 20;
                            }
                    ?>
                            <div class="blog-inner">
                                <div class="blog-item">
                                    <div class="image-part">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_src; ?>" alt="" /></a>
                                        <?php if ('style2' == $settings['blog_style']) { ?>
                                            <ul class="blog-meta d-flex align-items-center justify-content-between">
                                                <li><i class="far fa-user"></i><?php echo esc_html($post_admin); ?></li>
                                                <li><i class="far fa-clock"></i><?php echo get_the_date(); ?></li>
                                            </ul>
                                        <?php } ?>
                                    </div>

                                    <div class="blog-content">
                                        <?php if ('style1' == $settings['blog_style']) { ?>
                                            <ul class="blog-meta">
                                                <li><i class="far fa-user"></i><?php echo esc_html($post_admin); ?></li>
                                                <li><i class="far fa-clock"></i><?php echo get_the_date(); ?></li>
                                            </ul>
                                        <?php } ?>
                                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="desc"><?php echo wp_trim_words(get_the_content(), $limit, '...'); ?></div>
                                        <div class="blog-btn">
                                            <a href="<?php the_permalink(); ?>"><i class="flaticon-right-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                        wp_reset_postdata();
                    } ?>
                </div>
                <div class="sc-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
            </div>
        </section>

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
<?php
    }
    protected function content_template()
    {
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new SC_Repair_Blog());
