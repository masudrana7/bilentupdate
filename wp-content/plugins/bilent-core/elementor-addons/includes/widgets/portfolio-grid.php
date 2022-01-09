<?php

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Background;
use Elementor\Plugin;

class SC_Repair_Portfolio_Grid extends Widget_Base
{
	public function get_name()
	{
		return 'SC_Repair_Portfolio';
	}
	public function get_title()
	{
		return esc_html__('SC Portfolio Grid', 'bilent-core');
	}
	public function get_icon()
	{
		return 'eicon-image';
	}
	public function get_categories()
	{
		return ['bilent'];
	}
	protected function _register_controls()
	{
		$this->start_controls_section(
			'portfolio_grid',
			[
				'label' => __('Portfolio List', 'bilent-core'),
			]
		);

		$this->add_control(
			'filter',
			[
				'label' => __('Filter', 'bilent-core'),
				'type' => Controls_Manager::SWITCHER,
				'default' => false
			]
		);
		$repeater = new Repeater();
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
			'title',
			[
				'label' => __('Title', 'bilent-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Portfolio Title', 'bilent-core'),
			]
		);
		$repeater->add_control(
			'url',
			[
				'label' => __('URL', 'bilent-core'),
				'type' => Controls_Manager::URL,
			]
		);
		$repeater->add_control(
			'item_category',
			[
				'label' => esc_html__('Category', ''),
				'type' => Controls_Manager::TEXT,
				'default' => __('Corporate', ''),
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
					],

					[
						'list_title' => __('Title #2', 'bilent-core'),
					],

					[
						'list_title' => __('Title #3', 'bilent-core'),
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
		$this->add_responsive_control(
			'item_padding_area',
			[
				'label' => esc_html__('Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} div.single-portfolio' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				'selector' => '{{WRAPPER}} div.single-portfolio:before'
			]
		);
		$this->add_responsive_control(
			'item_border_radius',
			[
				'label' => esc_html__('Border Radius', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} div.single-portfolio img, {{WRAPPER}} div.single-portfolio:before, {{WRAPPER}} div.single-portfolio' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'grid_columns',
			[
				'label'   => esc_html__('Columns', 'prelements'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'6' => esc_html__('2 Column', 'prelements'),
					'4' => esc_html__('3 Column', 'prelements'),
					'3' => esc_html__('4 Column', 'prelements'),
					'2' => esc_html__('6 Column', 'prelements'),
					'1' => esc_html__('1 Column', 'prelements'),
				],
				'default' => '3',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'item_margin',
			[
				'label' => esc_html__('Item Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} div.single-portfolio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				],
				'condition' => [
					'show_thums' => 'yes',
				],
				'separator' => 'before',
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

		$this->add_control(
			'icon_onoff',
			[
				'label'   => esc_html__('Icon ON/Off', 'scaddons'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
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
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'min-height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_line_height',
			[
				'label'      => esc_html__('Line Height', 'scaddon'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__('Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__('Background Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'background-color: {{VALUE}} !important',
				],
			]
		);


		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => esc_html__('Hover Background Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i:hover' => 'background-color: {{VALUE}} !important',
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
					'{{WRAPPER}} .single-portfolio .portfolio-text .portfolio-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_title_style',
			[
				'label' => esc_html__('Title & Category', 'scaddon'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'margin_padding',
			[
				'label' => esc_html__('Content Box Margin', 'scaddon'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__('Bottom Spacing', 'scaddon'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [

					'{{WRAPPER}} .single-portfolio .portfolio-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__('Hover Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__('Typography', 'scaddon'),
				'selector' => '{{WRAPPER}}  .single-portfolio .portfolio-title',
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

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'scaddon'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-portfolio .portfolio-category' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => esc_html__('Typography', 'scaddon'),
				'selector' => '{{WRAPPER}} .single-portfolio .portfolio-category',
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
			]
		);
		$this->end_controls_section();
	}

	protected function render()
	{
		$settings =  $this->get_settings_for_display();
		$filter = $settings['filter'];
		$icon_onoff = $settings["icon_onoff"];
?>
		<?php if ($filter) {
			$category_arr       = array();
			$category_arr_class = array();
			foreach ($settings["items1"] as $key => $item) {
				$cat                        = $item['item_category'];
				$child_categories_ex        = explode(',', $cat);
				$child_categories           = str_replace(',', ' ', $cat);
				$category_arr_class[$key] = strtolower($child_categories);
				foreach ($child_categories_ex as $child_category) {
					$category_arr[] = strtolower($child_category);
				}
			}
		?>
			<div class="gridFilter text-center mb-70 md-mb-50">
				<button class="active" data-filter="*"><?php esc_html_e('All', 'bilent'); ?></button>
				<?php
				$category_arr = array_unique($category_arr);
				foreach ($category_arr as $category) {
					echo '<button data-filter=".' . $category . '">' . $category . '</button>';
				}
				?>
			</div>
			<div class="row grid">
				<?php
				foreach ($settings["items1"] as $key => $item) {
					$item_category = $item["item_category"];
					$title = $item["title"];
					$url = $item["url"]['url'];
					$image = wp_get_attachment_image($item["image"]["id"], 'full', "", array("class" => "img-fluid"));

				?>
					<div class="col-lg-<?php echo esc_html($settings['grid_columns']); ?> col-md-6 col-sm-6 grid-item <?php echo esc_attr($category_arr_class[$key]); ?>">
						<div class="single-portfolio">
							<div class="portfolio-img">
								<?php echo $image; ?>
							</div>
							<div class="portfolio-text">
								<?php if ($icon_onoff) { ?>
									<span class="portfolio-icon">
										<a href="<?php echo $url; ?>">
											<i class="flaticon flaticon-plus"></i>
										</a>
									</span>
								<?php } ?>
								<h3 class="portfolio-title"><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
								<span class="portfolio-category"><?php echo $item_category; ?></span>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="row justify-content-center">
				<?php
				foreach ($settings["items1"] as $item) {
					$title = $item["title"];
					$url = $item["url"]['url'];
					$item_category = $item["item_category"];
					$image = wp_get_attachment_image($item["image"]["id"], 'full', "", array("class" => "img-fluid")); ?>
					<div class="col-lg-<?php echo esc_html($settings['grid_columns']); ?> col-md-6">
						<div class="single-portfolio">
							<div class="portfolio-img">
								<?php echo $image; ?>
							</div>
							<div class="portfolio-text">
								<?php if ($icon_onoff) { ?>
									<span class="portfolio-icon">
										<a href="<?php echo $url; ?>"><i class="flaticon flaticon-plus"></i></a>
									</span>
								<?php } ?>
								<h3 class="portfolio-title"><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
								<span class="portfolio-category"><?php echo $item_category; ?></span>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
<?php
		}
	}
	protected function content_template()
	{
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Repair_Portfolio_Grid());
