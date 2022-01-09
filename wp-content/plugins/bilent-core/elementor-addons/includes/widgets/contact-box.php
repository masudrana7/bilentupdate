<?php

use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Plugin;

defined('ABSPATH') || die();

class SC_Elementor_Contactbox_Grid_Widget extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'sc-contact-box';
	}
	public function get_title()
	{
		return esc_html__('SC Contact Info', 'scaddon');
	}
	public function get_icon()
	{
		return 'eicon-icon-box';
	}
	public function get_categories()
	{
		return ['bilent'];
	}
	protected function _register_controls()
	{
		$this->start_controls_section(
			'sc_section_contact_box',
			[
				'label' => esc_html__('Contact Info', 'scaddon'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'type_contact_box',
			[
				'label'   => esc_html__('Type', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'text_box',
				'dynamic' => [
					'active' => true,
				],
				'options' => [
					'text_box' => esc_html__('Address', 'scaddon'),
					'email' => esc_html__('Email', 'scaddon'),
					'phone' => esc_html__('Phone', 'scaddon'),
				],
			]
		);
		$repeater->add_control(
			'contact_label',
			[
				'label' => esc_html__('label', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_html__('Content', 'scaddon'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Address', 'scaddon'),
				'show_label' => false,

				'condition' => [
					'type_contact_box' => 'text_box'
				],
			]
		);
		$repeater->add_control(
			'contact_label_email',
			[
				'label' => esc_html__('Email', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'condition' => [
					'type_contact_box' => 'email'
				],
			]
		);
		$repeater->add_control(
			'contact_label_phone',
			[
				'label' => esc_html__('Phone', 'scaddon'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'condition' => [
					'type_contact_box' => 'phone'
				],
			]
		);
		$repeater->add_control(
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

		$repeater->add_control(
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

		$repeater->add_control(
			'selected_image',
			[
				'label' => esc_html__('Choose Image', 'scaddon'),
				'type'  => Controls_Manager::MEDIA,

				'condition' => [
					'icon_type' => 'image',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'tabs',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'contact_label' => esc_html__('Email:', 'scaddon'),
						'tab_content' => esc_html__('(+088)589-8745', 'scaddon'),
						'selected_icon' => 'fa fa-home',
					],
					[
						'contact_label' => esc_html__('Phone:', 'scaddon'),
						'tab_content' => esc_html__('support@rstheme.com', 'scaddon'),
						'selected_icon' => 'fa fa-phone',
					],
					[
						'contact_label' => esc_html__('Address:', 'scaddon'),
						'tab_content' => esc_html__('New Jesrsy, 1201, USA', 'scaddon'),
						'selected_icon' => 'fa fa-map-marker',
					],
				],
				'title_field' => '{{{ contact_label }}}',
			]
		);
		$this->add_control(
			'sc_contact_box_style',
			[
				'label' => esc_html__('Contact Box Style', 'scaddon'),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => [
					'vertical' => esc_html__('Vertical', 'scaddon'),
					'horizontal' => esc_html__('Horizontal', 'scaddon'),

				],
				'default' => 'horizontal',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'sc_contact_icons',
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
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__('Background Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon' => 'background-color: {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => esc_html__('Background Effect Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon:before' => 'background-color: {{VALUE}} !important',
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon:after' => 'background-color: {{VALUE}} !important',
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
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon' => 'min-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_line_height',
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
					'{{WRAPPER}} .sc-contact-box .address-item .address-icon i, {{WRAPPER}} .sc-contact-box .address-item .address-icon' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'ico _spacing',
			[
				'label' => esc_html__('Icon Right Gap', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item.horizontal .address-icon' => 'margin-right: {{SIZE}}{{UNIT}} !important;',
				],
				'condition' => [
					'sc_contact_box_style' => 'horizontal',
				],
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'_section_title_style',
			[
				'label' => esc_html__('Label', 'scaddon'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => esc_html__('Label Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-text span.label' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .sc-contact-box .address-item .address-text span.label',
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-text span.label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'lable_style',
			[
				'label'   => esc_html__('Label Inline Enable/Disable', 'scaddon'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'enable',
				'options' => [
					'enable' => esc_html__('Enable', 'scaddon'),
					'disable' => esc_html__('Disable', 'scaddon'),
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_des_style',
			[
				'label' => esc_html__('Description', 'scaddon'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'des_color',
			[
				'label' => esc_html__('Description Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-text a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .sc-contact-box .address-item .address-text .des' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'des_hover_color',
			[
				'label' => esc_html__('Description Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-text a:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => esc_html__('Description Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item .address-text a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .sc-contact-box .address-item .address-text .des' => 'color: {{VALUE}} !important',
				],
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
			]
		);


		$this->add_responsive_control(
			'area_spacing',
			[
				'label' => esc_html__('Area Bottom Gap', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .sc-contact-box .address-item' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display(); ?>

		<!-- Style 1 Start -->
		<div class="sc-contact-box">
			<?php
			foreach ($settings['tabs'] as $item) :
			?>
				<div class="address-item <?php echo esc_attr($settings['sc_contact_box_style']); ?>">

					<?php if (!empty($item['selected_icon']) || !empty($item['selected_image'])) { ?>
						<div class="address-icon">
							<?php if (!empty($item['selected_icon']['value'])) {
								Icons_Manager::render_icon($item["selected_icon"], ['aria-hidden' => 'true']);
							} else { ?>
								<img src="<?php echo esc_html($item['selected_image']['url']); ?>" />
							<?php } ?>
						</div>
					<?php } ?>
					<div class="address-text label_<?php echo esc_attr($settings['lable_style']); ?>">
						<?php if (!empty($item['tab_content'])) { ?>
							<div class="text">
								<?php if ($item['contact_label']) { ?>
									<span class="label"><?php echo esc_html($item['contact_label']); ?></span>
								<?php } ?>
								<?php if (!empty($item['tab_content'])) { ?>
									<span class="des">
										<?php echo esc_html($item['tab_content']); ?>
									</span>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if (!empty($item['contact_label_phone'])) { ?>
							<div class="phone">
								<?php if ($item['contact_label']) { ?>
									<span class="label"><?php echo esc_html($item['contact_label']); ?></span>
								<?php } ?>

								<a href="tel:+<?php echo esc_html($item['contact_label_phone']); ?>"><?php echo esc_html($item['contact_label_phone']); ?></a>
							</div>
						<?php } ?>
						<?php if (!empty($item['contact_label_email'])) { ?>
							<div class="email">
								<?php if ($item['contact_label']) { ?>
									<span class="label"><?php echo esc_html($item['contact_label']); ?></span>
								<?php } ?>
								<a href="mailto:<?php echo esc_html($item['contact_label_email']); ?>"><?php echo esc_html($item['contact_label_email']); ?></a>
							</div>
						<?php } ?>

					</div>
				</div>
			<?php endforeach; ?>
		</div>
<?php }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Elementor_Contactbox_Grid_Widget());
