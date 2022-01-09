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

class SC_Header_Top extends Widget_Base
{

    public function get_name()
    {
        return 'SC_header_top';
    }

    public function get_title()
    {
        return esc_html__('Header Top', 'bilent-core');
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
            'phone_title',
            [
                'label' => __('Office Time', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Monday - Friday 9am - 5pm', 'bilent-core'),
            ]
        );
        $this->add_control(
            'email',
            [
                'label' => __('Address', 'bilent-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('London, United Kingdom', 'bilent-core'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'sociall_list_section',
            [
                'label' => __('Social List', 'bilent-core'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'social_icon',
            [
                'label'   => esc_html__('Social Icon', 'scaddon'),
                'type'    => Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__('Social Link', 'scaddon'),
                'type' => Controls_Manager::URL
            ]
        );
        $this->add_control(
            'social_list',
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
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_area_style',
            [
                'label' => esc_html__('Global Style', 'scaddon'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'test_color',
            [
                'label' => esc_html__('Text Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar-area .topbar-contact li, {{WRAPPER}} .topbar-area .topbar-contact li a' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'test_color_hover',
            [
                'label' => esc_html__('Text Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar-area .topbar-contact li a:hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__('Social Icon Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar-area .social-icons li a' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'social_icon_color_hover',
            [
                'label' => esc_html__('Social Icon Hover Color', 'scaddon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar-area .social-icons li a:hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sec_background',
                'label' => esc_html__('Background Color', 'scaddon'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .topbar-area',
                'separator' => 'before'
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $phone_title = $settings["phone_title"];
        $email = $settings["email"];
?>
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <ul class="topbar-contact">
                            <li>
                                <i class="far fa-clock"></i> <?php echo esc_html($phone_title); ?>
                            </li>
                            <li>
                                <i class="far fa-map"></i>
                                <?php echo esc_html($email); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-end">
                        <ul class="social-icons topbar-right">
                            <?php
                            foreach ($settings['social_list'] as $item) :
                            ?>
                                <li><a href="<?php echo $item['social_link']['url']; ?>" target="_blank"> <i class="<?php echo $item['social_icon']['value']; ?>"></i> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new \SC_Header_Top());
