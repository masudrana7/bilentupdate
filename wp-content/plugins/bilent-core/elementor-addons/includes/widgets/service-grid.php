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

class SC_Repair_Service_Grid extends Widget_Base
{
	public function get_name()
	{
		return 'SC_Repair_Service_Grid';
	}
	public function get_title()
	{
		return esc_html__('SC Services Grid', 'scaddon');
	}
	public function get_icon()
	{
		return 'eicon-settings';
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
				'label' => esc_html__('Services Global', 'scaddon'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'service_style',
			[
				'label'   => esc_html__('Select Services Style', 'scaddons'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__('Style 1', 'scaddons'),
					'style2' => esc_html__('Style 2', 'scaddons'),
					'style3' => esc_html__('Style 3', 'scaddons'),
				],
			]
		);
		$this->add_control(
			'number_text',
			[
				'label' => esc_html__('Number', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
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
					'{{WRAPPER}} .single-service' => 'text-align: {{VALUE}}'
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__('Icon/Image', 'scaddon'),
				'tab' => Controls_Manager::TAB_CONTENT,
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
			]
		);
		$this->add_control(
			'sevice_image',
			[
				'label' => esc_html__('Choose Image', 'scaddon'),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'condition' => [
					'service_style' => 'style3'
				]
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title & Description', 'scaddon'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => esc_html__('Services Title', 'scaddon'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'Services Title',
				'placeholder' => esc_html__('Services Title', 'scaddon'),
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'title_link',
			[
				'label_block' => true,
				'label' => esc_html__('Title Link', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__('#', 'scaddon'),
			]
		);

		$this->add_control(
			'link_open',
			[
				'label'   => esc_html__('Link Open New Window', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'no' => esc_html__('No', 'scaddon'),
					'yes' => esc_html__('Yes', 'scaddon'),

				],
			]
		);
		$this->add_control(
			'text',
			[
				'label' => esc_html__('Services Text', 'scaddon'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'separator' => 'before',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__('Button', 'scaddon'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'services_btn_text',
			[
				'label' => esc_html__('Services Button Text', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Load More',
				'placeholder' => esc_html__('Services Button Text', 'scaddon'),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'services_btn_link',
			[
				'label' => esc_html__('Services Button Link', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
				'placeholder' => esc_html__('#', 'scaddon'),
			]
		);

		$this->add_control(
			'services_btn_link_open',
			[
				'label'   => esc_html__('Link Open New Window', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'no' => esc_html__('No', 'scaddon'),
					'yes' => esc_html__('Yes', 'scaddon'),

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
					'{{WRAPPER}} .single-service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'item_bg_color',
				'label' => esc_html__('Background Color', 'scaddon'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .single-service'
			]
		);
		$this->add_control(
			'item_hover_title',
			[
				'label' => __('Hover Background', 'scaddon'),
				'type' => Controls_Manager::HEADING,
				'default' => __('Default title', 'plugin-domain'),
				'placeholder' => __('Type your title here', 'plugin-domain'),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'item_hover_bg_color',
				'label' => esc_html__('Background Color', 'scaddon'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .single-service:before'
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'selector' => '{{WRAPPER}} .single-service'
			]
		);

		$this->end_controls_section();

		// Icon Style
		$this->start_controls_section(
			'_section_media_style',
			[
				'label' => esc_html__('Icon', 'scaddon'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service .service-icon i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .single-service .service-icon svg' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
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
					'{{WRAPPER}} .single-service .service-icon' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .single-service .service-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_min_width',
			[
				'label' => esc_html__('Min Width', 'scaddon'),
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
					'{{WRAPPER}} .single-service .service-icon' => 'min-width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label'      => esc_html__('Height', 'scaddon'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service .service-icon' => 'min-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .single-service .service-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);


		$this->add_responsive_control(
			'media_margin',
			[
				'label' => esc_html__('Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .single-service .service-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'media_padding',
			[
				'label' => esc_html__('Padding', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
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
				'selector' => '{{WRAPPER}} .single-service .service-icon'
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
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
				'label' => esc_html__('Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service:hover .service-icon i' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .single-service:hover .service-icon svg path' => 'fill: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__('Background Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service .service-icon' => 'background-color: {{VALUE}} !important',
				],
			]
		);


		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => esc_html__('Hover Background Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service:hover .service-icon' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'media_border_radius',
			[
				'label' => esc_html__('Border Radius', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .single-service .service-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_title_style',
			[
				'label' => esc_html__('Title & Description', 'scaddon'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__('Content Box Padding', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .service-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_padding',
			[
				'label' => esc_html__('Content Box Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .service-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .services-text'
			]
		);

		$this->add_control(
			'title_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__('Title', 'scaddon'),
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__('Bottom Spacing', 'scaddon'),
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
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service .service-text .title, {{WRAPPER}} .single-service .service-text .title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__('Hover Color', 'scaddon'),
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
				'label' => esc_html__('Typography', 'scaddon'),
				'selector' => '{{WRAPPER}}  .single-service .service-text .title',
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2
			]
		);

		$this->add_control(
			'description_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__('Description', 'scaddon'),
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label' => esc_html__('Bottom Spacing', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .single-service .service-text .desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service .service-text .desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'description_hover_color',
			[
				'label' => esc_html__('Hover Color', 'scaddon'),
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
				'label' => esc_html__('Typography', 'scaddon'),
				'selector' => '{{WRAPPER}} .single-service .service-text',
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
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

		$this->add_responsive_control(
			'link_padding',
			[
				'label' => esc_html__('Padding', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
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
				'label' => esc_html__('Border Radius', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
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

		$this->start_controls_tabs('_tabs_button');

		$this->start_controls_tab(
			'_tab_button_normal',
			[
				'label' => esc_html__('Normal', 'scaddon'),
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => esc_html__('Text Color', 'scaddon'),
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
				'label' => esc_html__('Background Color', 'scaddon'),
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
				'label' => esc_html__('Hover', 'scaddon'),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Text Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service:hover .service-text .services-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service:hover .service-text .services-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes('title', 'basic');
		$this->add_render_attribute('title', 'class', 'title');
		$this->add_inline_editing_attributes('text', 'basic');
		$this->add_render_attribute('text', 'class', 'desc');
		$this->add_inline_editing_attributes('services_btn_text', 'basic');
		$this->add_render_attribute('services_btn_text', 'class', 'btn_text');
?>
		<div class="sc-service-<?php echo esc_attr($settings['service_style']); ?> single-service align-middle">
			<?php if (!empty($settings['number_text'])) : ?>
				<span class="number-text"><?php echo esc_html($settings['number_text']); ?> </span>
			<?php endif; ?>

			<?php if ('style3' == $settings['service_style']) {  ?>
				<div class="service-image">
					<?php if (!empty($settings['sevice_image']['url'])) : ?>
						<img class="top-image" src="<?php echo esc_url($settings['sevice_image']['url']); ?>" alt="image" />
					<?php endif; ?>
					<div class="service-icon">
						<?php if (!empty($settings['selected_icon'])) {
							Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
						} ?>
					</div>
				</div>
			<?php } else { ?>
				<div class="service-icon">
					<?php if (!empty($settings['selected_icon'])) {
						Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
					} ?>
				</div>
			<?php } ?>

			<div class="service-text">
				<?php if (!empty($settings['title_link'])) :
					$link_open = $settings['link_open'] == 'yes' ? 'target=_blank' : '';
				?>
					<h4 <?php echo wp_kses_post($this->print_render_attribute_string('title')); ?>> <a href="<?php echo esc_url($settings['title_link']); ?>" <?php echo wp_kses_post($link_open); ?>><?php echo wp_kses_post($settings['title']); ?></a></h4>
				<?php else : ?>
					<h4 <?php echo wp_kses_post($this->print_render_attribute_string('title')); ?>> <?php echo wp_kses_post($settings['title']); ?></h4>
				<?php endif; ?>
				<?php if (!empty($settings['text'])) : ?>
					<p <?php echo wp_kses_post($this->print_render_attribute_string('text')); ?>> <?php echo wp_kses_post($settings['text']); ?></p>
				<?php endif; ?>
				<?php if (!empty($settings['services_btn_text'])) { ?>
					<?php
					$link_open = $settings['services_btn_link_open'] == 'yes' ? 'target=_blank' : '';
					?>
					<a class="services-btn" href="<?php echo esc_url($settings['services_btn_link']); ?>" <?php echo wp_kses_post($link_open); ?>>
						<?php echo esc_html($settings['services_btn_text']); ?>
					</a>
				<?php } ?>
			</div>
		</div>
<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Repair_Service_Grid());
