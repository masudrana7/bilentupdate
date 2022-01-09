<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;

class SC_Elementor_Image_Showcase_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'sc-image';
    }
    public function get_title()
    {
        return esc_html__('SC Image Showcase', 'scaddon');
    }
    public function get_icon()
    {
        return 'glyph-icon flaticon-image';
    }
    public function get_categories()
    {
        return ['bilent'];
    }
    public function get_keywords()
    {
        return ['logo', 'clients', 'brand', 'parnter', 'image'];
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__('Image Settings', 'scaddon'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'first_image',
            [
                'label' => esc_html__('Choose Image', 'scaddon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'separator' => 'before',
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .sc-image' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'image_animation',
            [
                'label' => esc_html__('Animation', 'scaddon'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'scaddon'),
                'label_off' => esc_html__('Hide', 'scaddon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'images_translate',
            [
                'label'   => esc_html__('Translate Position', 'scaddon'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'veritcal',
                'options' => [
                    'veritcal' => esc_html__('Veritcal', 'scaddon'),
                    'horizontal' => esc_html__('Horizontal', 'scaddon'),
                    'rotate' => esc_html__('Rotate', 'scaddon'),
                    'zoom_in_out' => esc_html__('Zoom In/Out', 'rsaddon'),
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'sc_image_duration',
            [

                'label' => esc_html__('Animation Duration', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sc-image .sc-multi-image' => 'animation-duration: {{SIZE}}s;',
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'sc_image_animate_start_x',
            [

                'label' => esc_html__('Translate X Start', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'horizontal',
                ],
            ]
        );
        $this->add_responsive_control(
            'sc_image_animate_end_x',
            [

                'label' => esc_html__('Translate X End', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'horizontal',
                ],
            ]
        );
        $this->add_responsive_control(
            'sc_image_animate_start_y',
            [

                'label' => esc_html__('Translate Y Start', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'veritcal',
                ],
            ]
        );
        $this->add_responsive_control(
            'sc_image_animate_end_y',
            [

                'label' => esc_html__('Translate Y End', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'veritcal',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Style', 'scaddon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'img_width',
            [
                'label' => esc_html__('Image Width', 'scaddon'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sc-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <div class="sc-image <?php echo esc_attr($settings['image_animation']); ?>">
            <?php if (!empty($settings['first_image']['url'])) : ?>
                <img class="sc-multi-image <?php echo esc_attr($settings['images_translate']); ?>" src="<?php echo esc_url($settings['first_image']['url']); ?>" alt="image" />
            <?php endif; ?>
        </div>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Elementor_Image_Showcase_Widget());
