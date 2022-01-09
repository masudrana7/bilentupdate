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
use Elementor\Utils;
use Elementor\Repeater;

class SC_Repair_Service_Slider extends Widget_Base
{
  public function get_name()
  {
    return 'SC_Repair_Service_Slider';
  }
  public function get_title()
  {
    return esc_html__('SC Services Slider', 'scaddon');
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
			'section_services',
			[
				'label' => esc_html__( 'Services Global', 'scaddon' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'service_style',
			[
				'label'   => esc_html__( 'Select Services Style', 'scaddons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [					
					'style1' => esc_html__( 'Style 1', 'scaddons'),
					'style2' => esc_html__( 'Style 2', 'scaddons'),
					'style3' => esc_html__( 'Style 3', 'scaddons'),
				],
			]
		);
		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'scaddon' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'scaddon' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'scaddon' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'scaddon' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'scaddon' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .single-service' => 'text-align: {{VALUE}}'
                ],
				'separator' => 'before',
            ]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'services_list',
			[
			  'label' => __( 'Services List', 'scaddon' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'scaddon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Services Title', 'scaddon' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'Services Title',
				'placeholder' => esc_html__( 'Services Title', 'scaddon' ),
				'separator'   => 'before',
			]
		);

		$repeater->add_control(
			'title_link',
			[	'label_block' => true,
				'label' => esc_html__( 'Title Link', 'scaddon' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '#', 'scaddon' ),			
			]
		);
		$repeater->add_control(
			'link_open',
			[
				'label'   => esc_html__( 'Link Open New Window', 'scaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [					
					'no' => esc_html__( 'No', 'scaddon'),
					'yes' => esc_html__( 'Yes', 'scaddon'),					

				],
			]
		);
		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'Services Text', 'scaddon' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default'     => 'Excepteur sint occaecat cupidatat non',
				'separator' => 'before',
			]			
		);
		$repeater->add_control(
			'services_btn_text',
			[
				'label' => esc_html__( 'Services Button Text', 'scaddon' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Load More',
				'placeholder' => esc_html__( 'Services Button Text', 'scaddon' ),
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'services_btn_link',
			[
				'label' => esc_html__( 'Services Button Link', 'scaddon' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
				'placeholder' => esc_html__( '#', 'scaddon' ),			
			]
		);
		$repeater->add_control(
			'services_btn_link_open',
			[
				'label'   => esc_html__( 'Link Open New Window', 'scaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [					
					'no' => esc_html__( 'No', 'scaddon'),
					'yes' => esc_html__( 'Yes', 'scaddon'),

				],
			]
		);
		$repeater->add_control(
			'number_text',
			[
				'label' => esc_html__( 'Number', 'scaddon' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
			]			
		);

		$repeater->add_control(
            'service_img',
            [
              'label' => __( 'Image', 'bilent-core' ),
              'type' => Controls_Manager::MEDIA,
              'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
              
            ]
        );
		$this->add_control(
			'items1',
			[
			'label' => __( 'Repeater List', 'scaddon' ),
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[
				'list_title' => __( 'Title #1', 'scaddon' ),
				'list_content' => __( 'Item content. Click the edit button to change this text.', 'scaddon' ),
				],
				[
				'list_title' => __( 'Title #2', 'scaddon' ),
				'list_content' => __( 'Item content. Click the edit button to change this text.', 'scaddon' ),
				],
			],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
		    '_section_area_style',
		    [
		        'label' => esc_html__( 'Global Style', 'scaddon' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_responsive_control(
		    'item_padding_area',
		    [
		        'label' => esc_html__( 'Padding', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);
		$this->add_responsive_control(
		    'content_padding_margin',
		    [
		        'label' => esc_html__( 'Content Box Margin', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item_bg_color',
                'label' => esc_html__( 'Background Color', 'scaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .single-service'
            ]
        );

		
		$this->add_control(
			'item_hover_title',
			[
				'label' => __( 'Hover Background', 'scaddon' ),
				'type' => Controls_Manager::HEADING,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item_hover_bg_color',
                'label' => esc_html__( 'Background Color', 'scaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .single-service:before'
            ]
        );
		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'content_box_shadow',
		        'exclude' => [
		            'box_shadow_position',
		        ],
		        'selector' => '{{WRAPPER}} .single-service'
		    ]
		);
		$this->end_controls_section();

		// Icon Style
		$this->start_controls_section(
		    '_section_media_style',
		    [
		        'label' => esc_html__( 'Icon', 'scaddon' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'icon_size',
		    [
		        'label' => esc_html__( 'Size', 'scaddon' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px' ],
		        'range' => [
		            'px' => [
		                'min' => 10,
		                'max' => 300,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
		        ],
		    ]
		);

		$this->add_control(
		    'icon_color',
		    [
		        'label' => esc_html__( 'Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon i' => 'color: {{VALUE}} !important',
		            '{{WRAPPER}} .single-service .service-icon svg path' => 'fill: {{VALUE}} !important',
		        ],
		    ]
		);

		$this->add_control(
		    'icon_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service:hover .service-icon i' => 'color: {{VALUE}} !important',
		            '{{WRAPPER}} .single-service:hover .service-icon svg path' => 'fill: {{VALUE}} !important',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'image_width',
		    [
		        'label' => esc_html__( 'Width', 'scaddon' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            'px' => [
		                'min' => 1,
		                'max' => 400,
		            ],
		            '%' => [
		                'min' => 1,
		                'max' => 100,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon svg, {{WRAPPER}} .single-service .service-icon i' => 'min-width: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);

		$this->add_responsive_control(
		    'image_height',
		    [
				'label'      => esc_html__( 'Height', 'scaddon' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
		        'range' => [
		            'px' => [
		                'min' => 1,
		                'max' => 400,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon svg, {{WRAPPER}} .single-service .service-icon i' => 'height: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);


		$this->add_responsive_control(
		    'media_margin',
		    [
		        'label' => esc_html__( 'Margin', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'media_padding',
		    [
		        'label' => esc_html__( 'Padding', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'media_border',
		        'selector' => '{{WRAPPER}} .single-service .service-icon',
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'media_box_shadow',
		        'exclude' => [
		            'box_shadow_position',
		        ],
		        'selector' => '{{WRAPPER}} .single-service .service-icon'
		    ]
		);

		$this->add_control(
		    'icon_color_fill',
		    [
		        'label' => esc_html__( 'Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon i' => 'color: {{VALUE}} !important',
		            '{{WRAPPER}} .single-service .service-icon svg path' => 'fill: {{VALUE}} !important',
		        ],
		        'condition' => [
		            'icon_type' => 'icon'
		        ]
		    ]
		);

		$this->add_control(
		    'icon_hover_color_fill',
		    [
		        'label' => esc_html__( 'Hover Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service:hover .service-icon i' => 'color: {{VALUE}} !important',
		            '{{WRAPPER}} .single-service:hover .service-icon svg path' => 'fill: {{VALUE}} !important',
		        ],
		        'condition' => [
		            'icon_type' => 'icon'
		        ]
		    ]
		);
		$this->add_control(
		    'icon_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon' => 'background-color: {{VALUE}} !important',
		        ],
		    ]
		);
		$this->add_control(
		    'icon_hover_bg_color',
		    [
		        'label' => esc_html__( 'Hover Background Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service:hover .service-icon' => 'background-color: {{VALUE}} !important',
		        ],
		    ]
		);
		$this->add_responsive_control(
		    'media_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
		        ],
		    ]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
		    '_section_title_style',
		    [
		        'label' => esc_html__( 'Title & Description', 'scaddon' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'content_padding',
		    [
		        'label' => esc_html__( 'Content Box Padding', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .service-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'margin_padding',
		    [
		        'label' => esc_html__( 'Content Box Margin', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .service-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_heading',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => esc_html__( 'Title', 'scaddon' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'title_spacing',
		    [
		        'label' => esc_html__( 'Bottom Spacing', 'scaddon' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [

					'{{WRAPPER}} .single-service .service-text .title, {{WRAPPER}} .single-service .service-text .title a' => 'margin-bottom: {{SIZE}}{{UNIT}};',

		        ],
		    ]
		);

		$this->add_control(
		    'title_color',
		    [
		        'label' => esc_html__( 'Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-text .title, {{WRAPPER}} .single-service .service-text .title a' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_control(
		    'title_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		        	'{{WRAPPER}} .single-service:hover .title, {{WRAPPER}} .single-service:hover .title a' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'title_typography',
		        'label' => esc_html__( 'Typography', 'scaddon' ),
		        'selector' => '{{WRAPPER}}  .single-service .service-text .title',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2
		    ]
		);

		$this->add_control(
		    'description_heading',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => esc_html__( 'Description', 'scaddon' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'description_spacing',
		    [
		        'label' => esc_html__( 'Bottom Spacing', 'scaddon' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-text .services-txt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'description_color',
		    [
		        'label' => esc_html__( 'Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service .service-text .services-txt' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'description_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service:hover .service-text' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'description_typography',
		        'label' => esc_html__( 'Typography', 'scaddon' ),
		        'selector' => '{{WRAPPER}} .single-service .service-text',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
		    ]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		    '_section_style_button',
		    [
		        'label' => esc_html__( 'Button', 'scaddon' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'link_padding',
		    [
		        'label' => esc_html__( 'Padding', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .service-text .services-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_typography',
		        'selector' => '{{WRAPPER}} .service-text .services-btn',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border',
		        'selector' => '{{WRAPPER}} .service-text .services-btn',
		    ]
		);

		$this->add_control(
		    'button_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'scaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .service-text .services-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_box_shadow',
		        'selector' => '{{WRAPPER}} .service-text .services-btn',
		    ]
		);

		$this->add_control(
		    'hr',
		    [
		        'type' => Controls_Manager::DIVIDER,
		        'style' => 'thick',
		    ]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
		    '_tab_button_normal',
		    [
		        'label' => esc_html__( 'Normal', 'scaddon' ),
		    ]
		);

		$this->add_control(
		    'link_color',
		    [
		        'label' => esc_html__( 'Text Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .service-text .services-btn' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .service-text .services-btn' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		    '_tab_button_hover',
		    [
		        'label' => esc_html__( 'Hover', 'scaddon' ),
		    ]
		);

		$this->add_control(
		    'button_hover_color',
		    [
		        'label' => esc_html__( 'Text Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service:hover .service-text .services-btn' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_hover_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'scaddon' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .single-service:hover .service-text .services-btn' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Slider Settings
		$this->start_controls_section(
			'section_slider_settings',
			[
				'label' => esc_html__( 'Slider Settings', 'scaddon' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
            'col_lg',
            [
                'label'   => esc_html__( 'Desktops > 1199px', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'scaddon' ), 
                    '2' => esc_html__( '2 Column', 'scaddon' ),
                    '3' => esc_html__( '3 Column', 'scaddon' ),
                    '4' => esc_html__( '4 Column', 'scaddon' ),
                    '6' => esc_html__( '6 Column', 'scaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
        );
        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__( 'Desktops > 991px', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'scaddon' ), 
                    '2' => esc_html__( '2 Column', 'scaddon' ),
                    '3' => esc_html__( '3 Column', 'scaddon' ),
                    '4' => esc_html__( '4 Column', 'scaddon' ),
                    '6' => esc_html__( '6 Column', 'scaddon' ),                     
                ],
                'separator' => 'before',            
            ]
            
        );
        $this->add_control(
            'col_sm',
            [
                'label'   => esc_html__( 'Tablets > 767px', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'scaddon' ), 
                    '2' => esc_html__( '2 Column', 'scaddon' ),
                    '3' => esc_html__( '3 Column', 'scaddon' ),
                    '4' => esc_html__( '4 Column', 'scaddon' ),
                    '6' => esc_html__( '6 Column', 'scaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );
        $this->add_control(
            'col_xs',
            [
                'label'   => esc_html__( 'Tablets < 768px', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 1,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'scaddon' ), 
                    '2' => esc_html__( '2 Column', 'scaddon' ),
                    '3' => esc_html__( '3 Column', 'scaddon' ),
                    '4' => esc_html__( '4 Column', 'scaddon' ),
                    '6' => esc_html__( '6 Column', 'scaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );
        $this->add_control(
            'slides_ToScroll',
            [
                'label'   => esc_html__( 'Slide To Scroll', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Item', 'scaddon' ),
                    '2' => esc_html__( '2 Item', 'scaddon' ),
                    '3' => esc_html__( '3 Item', 'scaddon' ),
                    '4' => esc_html__( '4 Item', 'scaddon' ),                   
                ],
                'separator' => 'before',
                            
            ]
            
        );
        $this->add_control(
            'slider_dots',
            [
                'label'   => esc_html__( 'Navigation Dots', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'scaddon' ),
                    'false' => esc_html__( 'Disable', 'scaddon' ),              
                ],
                'separator' => 'before',             
            ]
        );
        $this->add_control(
            'dots_bg',
            [
                'label' => esc_html__( 'Background', 'scaddon' ),
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
                'label' => esc_html__( 'Border Color', 'scaddon' ),
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
                'label'   => esc_html__( 'Navigation Nav', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'scaddon' ),
                    'false' => esc_html__( 'Disable', 'scaddon' ),              
                ],
                'separator' => 'before',                            
            ]            
        );
        $this->add_control(
            'arrow_bg',
            [
                'label' => esc_html__( 'Background', 'scaddon' ),
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
                'label' => esc_html__( 'Color', 'scaddon' ),
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
                'label'   => esc_html__( 'Autoplay', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'scaddon' ),
                    'false' => esc_html__( 'Disable', 'scaddon' ),              
                ],
                'separator' => 'before',         
            ]
        );
        $this->add_control(
            'slider_autoplay_speed',
            [
                'label'   => esc_html__( 'Autoplay Slide Speed', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '1000' => esc_html__( '1 Seconds', 'scaddon' ),
                    '2000' => esc_html__( '2 Seconds', 'scaddon' ), 
                    '3000' => esc_html__( '3 Seconds', 'scaddon' ), 
                    '4000' => esc_html__( '4 Seconds', 'scaddon' ), 
                    '5000' => esc_html__( '5 Seconds', 'scaddon' ), 
                ],
                'separator' => 'before',            
            ]
        );
        $this->add_control(
            'slider_stop_on_hover',
            [
                'label'   => esc_html__( 'Stop on Hover', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',               
                'options' => [
                    'true' => esc_html__( 'Enable', 'scaddon' ),
                    'false' => esc_html__( 'Disable', 'scaddon' ),              
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'slider_interval',
            [
                'label'   => esc_html__( 'Autoplay Interval', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '5000' => esc_html__( '5 Seconds', 'scaddon' ), 
                    '4000' => esc_html__( '4 Seconds', 'scaddon' ), 
                    '3000' => esc_html__( '3 Seconds', 'scaddon' ), 
                    '2000' => esc_html__( '2 Seconds', 'scaddon' ), 
                    '1000' => esc_html__( '1 Seconds', 'scaddon' ),     
                ],
                'separator' => 'before',
                            
            ]
            
        );
        $this->add_control(
			'slider_loop',
			[
				'label'   => esc_html__( 'Loop', 'scaddon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Enable', 'scaddon' ),
					'false' => esc_html__( 'Disable', 'scaddon' ),
				],
				'separator' => 'before',
							
			]
			
		);
        $this->add_control(
            'slider_centerMode',
            [
                'label'   => esc_html__( 'Center Mode', 'scaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'scaddon' ),
                    'false' => esc_html__( 'Disable', 'scaddon' ),
                ],
                'separator' => 'before',        
            ]
            
        );
        $this->add_control(
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Middle Gap', 'prelements' ),
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
	}
	protected function render() { 



		$settings = $this->get_settings_for_display();	
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
        $unique = rand(2021,158596);
		$slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs'); ?>


        <div class="sc-services-slider sc-slider-wrapper">
            <div id="sc-slick-slider-<?php echo esc_attr($unique); ?>" class="sc-unique-slider">
			<?php foreach($settings["items1"] as $item){ 
				$number_text = $item["number_text"]; 
				$title_link = $item["title_link"]; 
				$title = $item["title"]; 
				$text = $item["text"]; 
				$service_img = wp_get_attachment_image_url( $item["service_img"] ["id"],'full'); 
				$services_btn_text = $item["services_btn_text"]; 
				$services_btn_link = $item["services_btn_link"]; ?>
				
				<div class="services-item-list">
					<div class="sc-service-<?php echo esc_attr($settings['service_style']);?> single-service">

						<?php if('style3' == $settings['service_style']){ ?>	
							<div class="service-image">
								<?php if(!empty($service_img)):?>
									<img src="<?php echo $service_img;?>" alt="Services">
								<?php endif; ?>	
							</div>
						<?php } ?>
						<?php if (!empty( $item['selected_icon']['value'])) { ?>
							<div class="service-icon">
								<?php if (!empty( $item['selected_icon']['value'])) {
									Icons_Manager::render_icon($item["selected_icon"], [ 'aria-hidden' => 'true' ] );
								} ?>
							</div>
						<?php } ?>

						<?php if(!empty($settings['number_text'])) : ?>
							<span class="number-text"><?php echo esc_html($settings['number_text']);?>  </span>
						<?php endif; ?>	
						
						<div class="service-text">
							<?php if(!empty($title_link)) : ?>
								<h4 class="title"> <a href="<?php echo $title_link; ?>"><?php echo $title; ?></a></h4>
							<?php ?>
							<?php else: ?>
								<h4 class="title"> <?php echo $title; ?></h4>
							<?php endif; ?>	
							<p class="services-txt"><?php echo $text;?></p>	
							<?php if(!empty($services_btn_text)){ ?>
									<a class="services-btn" href="<?php echo $services_btn_link;?>">
										<?php echo $services_btn_text;?>  
									</a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>	
			<div class="sc-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>  
			</div>
		</div>
		
		
		<script type="text/javascript"> 
            jQuery(document).ready(function(){
                jQuery( '.sc-unique-slider' ).each(function( index ) {        
                var slider_id       = jQuery(this).attr('id'); 
                var slider_conf     = jQuery.parseJSON( jQuery(this).closest('.sc-slider-wrapper').find('.sc-slider-conf').attr('data-conf'));
            
                if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
                jQuery('#'+slider_id).not('.slick-initialized').slick({
                slidesToShow    : parseInt(slider_conf.col_lg),
                centerMode      : (slider_conf.centerMode)  == "true" ? true : false,
                dots            : (slider_conf.sliderDots)  == "true" ? true : false,
                arrows          : (slider_conf.sliderNav) == "true" ? true : false,
                autoplay        : (slider_conf.slider_autoplay) == "true" ? true : false,
                slidesToScroll  : parseInt(slider_conf.slidesToScroll),
                centerPadding   : '15px',
                autoplaySpeed   : parseInt(slider_conf.autoplaySpeed),
                pauseOnHover    : (slider_conf.pauseOnHover) == "true" ? true : false,
                loop : false,

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
                }, ]
                });
            }
        
            });
        });
    </script> 
	<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Repair_Service_Slider());
