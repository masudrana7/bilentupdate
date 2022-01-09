<?php

use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Background;
use Elementor\Plugin;
use Elementor\Widget_Base;

class SCaddon_Elementor_Counter_Widget extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'sc-counter';
	}
	public function get_title()
	{
		return esc_html__('SC Counter', 'scaddon');
	}
	public function get_icon()
	{
		return 'eicon-counter';
	}
	public function get_categories()
	{
		return ['bilent'];
	}
	public function get_keywords()
	{
		return ['counter'];
	}
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_counter',
			[
				'label' => esc_html__('Counter', 'scaddon'),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__('Select Counter Style', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__('Style 1', 'scaddon'),
					'style2' => esc_html__('Style 2', 'scaddon'),
					'style3' => esc_html__('Style 3', 'scaddon'),
				],
			]
		);

		$this->add_control(
			'number',
			[
				'label' => esc_html__('Counter Number', 'scaddon'),
				'type' => Controls_Manager::NUMBER,
				'default' => 100,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'suffix',
			[
				'label' => esc_html__('Number Prefix', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__('Prefix', 'scaddon'),
				'separator' => 'before',
			]

		);

		$this->add_control(
			'prefix',
			[
				'label' => esc_html__('Number Suffix', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => 'Suffix',
				'separator' => 'before',
			]
		);



		$this->add_control(
			'title',
			[
				'label' => esc_html__('Counter Title', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Happy Clients', 'scaddon'),
				'placeholder' => esc_html__('Clients', 'scaddon'),
				'separator' => 'before',
			]

		);

		$this->add_control(
			'icon_type',
			[
				'label'   => esc_html__('Select Icon Type', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon' => esc_html__('Icon', 'scaddon'),
					'image' => esc_html__('Image', 'scaddon'),

				],
				'separator' => 'before',
			]
		);


		$this->add_control(
			'selected_icon',
			[
				'label' => __('Icon', 'elementor'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'selected_image',
			[
				'label' => esc_html__('Choose Image', 'scaddon'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'condition' => [
					'icon_type' => 'image',
				],
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
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .counter-top-area' => 'text-align: {{VALUE}}'
				],
				'separator' => 'before',
				'condition' => [
					'style' => 'style1',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_number',
			[
				'label' => esc_html__('Number', 'scaddon'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'show_gradient',
			[
				'label'        => esc_html__('Show Gradient Color', 'scaddon'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Show', 'scaddon'),
				'label_off'    => esc_html__('Hide', 'scaddon'),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_gradient',
				'label' => esc_html__('Background', 'scaddon'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .sc-gradient-yes .sc-counter-list .count-text span.sc-counter, {{WRAPPER}} .sc-gradient-yes .sc-counter-list .count-text span.prefix, {{WRAPPER}} .sc-gradient-yes .sc-counter-list .count-text span.suffix',
				'condition' => [
					'show_gradient' => 'yes',
				],
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .count-number span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'number_hover_color',
			[
				'label' => esc_html__('Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-top-area:hover .count-number span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'scaddon'),
				'name' => 'typography_number',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .count-number span',
			]
		);

		$this->add_control(
			'number_top_spacing',
			[
				'label' => esc_html__('Padding', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .count-number span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'number_margin',
			[
				'label' => esc_html__('Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-top-area .count-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'prefix_color',
			[
				'label' => esc_html__('Prefix Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .count-number span.prefix' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Prefix Typography', 'scaddon'),
				'name' => 'typography_prefix',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .count-number span.prefix',
			]
		);

		$this->add_control(
			'sufix_color',
			[
				'label' => esc_html__('Suffix Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .count-number span.suffix' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Suffix Typography', 'scaddon'),
				'name' => 'typography_suffix',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .count-number span.suffix',
			]
		);

		$this->add_control(
			'underline_number_color',
			[
				'label' => esc_html__('Underline Color', 'prelements'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-counter-list .count-text span.sc-counter:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'prefix_number_position',
			[
				'label'      => esc_html__('Prefix & Suffix Top/Bottom Position', 'scaddon'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sc-counter-list .count-number span.prefix' => 'bottom: {{SIZE}}{{UNIT}}; position: relative;',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'underline_number_position',
			[
				'label'      => esc_html__('Underline Position', 'scaddon'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sc-counter-list .count-text span.sc-counter:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'stroke_color_yes_no',
			[
				'label'   => esc_html__('Stroke Color Enable/Disable', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'disable',
				'options' => [
					'enable' => esc_html__('Enable', 'scaddon'),
					'disable' => esc_html__('Disable', 'scaddon'),
				],
			]
		);

		$this->add_control(
			'stroke_number_color',
			[
				'label' => esc_html__('Stroke Inside Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .count-number span' => '-webkit-text-fill-color: {{VALUE}};',
				],
				'condition' => [
					'stroke_color_yes_no' => 'enable'
				],
			]
		);

		$this->add_control(
			'stroke_outside_number_color',
			[
				'label' => esc_html__('Stroke Outside Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .count-number span' => '-webkit-text-stroke-color: {{VALUE}};',
				],
				'condition' => [
					'stroke_color_yes_no' => 'enable'
				],
			]
		);

		$this->add_control(
			'stroke_number_width',
			[
				'label' => esc_html__('Width', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .count-number span' => '-webkit-text-stroke-width: {{SIZE}}px;',
				],
				'condition' => [
					'stroke_color_yes_no' => 'enable'
				],
			]
		);
		$this->add_responsive_control(
			'number_width',
			[
				'label' => esc_html__('Width', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .counter-top-area .count-number' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'number_height',
			[
				'label' => esc_html__('Height', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-top-area .count-number' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'number_line_height',
			[
				'label' => esc_html__('Height', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .counter-top-area .count-number' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'number_part_border',
				'selector' => '{{WRAPPER}} .counter-top-area .count-number',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'number_part_bg',
				'label' => esc_html__('Background', 'scaddon'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .counter-top-area .count-number',
			]
		);
		$this->add_control(
			'number_border_radius',
			[
				'label' => esc_html__('Border Radius', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-top-area .count-number' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'scaddon'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .count-text .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__('Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-top-area:hover .count-text .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_title',
				'selector' => '{{WRAPPER}} .count-text .title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__('Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-top-area:hover .count-text .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__('Icon/Image', 'scaddon'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_align',
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
					'{{WRAPPER}} .counter-icon' => 'text-align: {{VALUE}}'
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'scaddon'),
				'name' => 'typography_icon',
				'selector' => '{{WRAPPER}} .counter-icon i',
				'condition' => [
					'icon_type' => 'icon'
				]
			]
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__('Icon/Image Part Width', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .counter-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__('Icon/Image Part Height', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_line_height',
			[
				'label' => esc_html__('Icon/Image Part Line Height', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .counter-icon, {{WRAPPER}} .counter-icon i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__('Image Width', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .counter-icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_type' => 'image'
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__('Image Height', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-icon img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_type' => 'image'
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__('Icon Part Padding', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__('Icon Part Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('back_part_btn_tabs');

		$this->start_controls_tab(
			'icon_tabs_normal',
			[
				'label' => esc_html__('Normal', 'scaddon'),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_part_border',
				'selector' => '{{WRAPPER}} .counter-icon',
			]
		);

		$this->add_control(
			'icon_part_border_radius',
			[
				'label' => esc_html__('Border Radius', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_part_box_shadow',
				'selector' => '{{WRAPPER}} .counter-icon',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_part_bg',
				'label' => esc_html__('Background', 'scaddon'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .counter-icon',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_tabs_hover',
			[
				'label' => esc_html__('Hover', 'scaddon'),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_part_hover_border',
				'selector' => '{{WRAPPER}} .counter-top-area:hover .counter-icon',
			]
		);

		$this->add_control(
			'icon_part_hover_border_radius',
			[
				'label' => esc_html__('Border Radius', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-top-area:hover .counter-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_part_hover_box_shadow',
				'selector' => '{{WRAPPER}} .counter-top-area:hover .counter-icon',
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__('Icon Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-top-area:hover .counter-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_part_hover_bg',
				'label' => esc_html__('Background', 'scaddon'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .counter-icon',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tab();
		$this->end_controls_section();
	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes('suffix', 'basic');
		$this->add_render_attribute('suffix', 'class', 'suffix');

		$this->add_inline_editing_attributes('number', 'basic');
		$this->add_render_attribute('number', 'class', 'sc-counter');

		$this->add_inline_editing_attributes('prefix', 'basic');
		$this->add_render_attribute('prefix', 'class', 'prefix');

		$this->add_inline_editing_attributes('title', 'basic');
		$this->add_render_attribute('title', 'class', 'title');

?>
		<div class="counter-top-area <?php echo esc_attr($settings['style']); ?> sc-gradient-<?php echo esc_attr($settings['show_gradient']); ?>">
			<div class="sc-counter-list">
				<?php if (!empty($settings['selected_icon']) || !empty($settings['selected_image']['url'])) { ?>

					<div class="counter-icon">
						<?php if (!empty($settings['selected_icon'])) {
							Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
						} ?>
						<?php if (!empty($settings['selected_image'])) : ?>
							<img src="<?php echo esc_url($settings['selected_image']['url']); ?>" alt="image" />
						<?php endif; ?>
					</div>

				<?php } ?>

				<div class="count-text">
					<div class="count-number">
						<?php if ($settings['suffix']) : ?><span <?php echo wp_kses_post($this->print_render_attribute_string('suffix')); ?>><?php echo esc_html($settings['suffix']); ?></span><?php endif; ?>
						<span <?php echo wp_kses_post($this->print_render_attribute_string('number')); ?>> <?php echo esc_html($settings['number']); ?></span>
						<?php if ($settings['prefix']) : ?><span <?php echo wp_kses_post($this->print_render_attribute_string('prefix')); ?>><?php echo esc_html($settings['prefix']); ?></span><?php endif; ?>
					</div>

					<?php if (!empty($settings['title'])) : ?>
						<span <?php echo wp_kses_post($this->print_render_attribute_string('title')); ?>> <?php echo esc_html($settings['title']); ?></span>
					<?php endif; ?>

				</div>
			</div>
		</div>
<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \SCaddon_Elementor_Counter_Widget());
