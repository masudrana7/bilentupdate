<?php

use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Color;
use Elementor\Plugin;

class SCaddons_Elementor_Video_Widget extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'scaddons-video';
	}
	public function get_title()
	{
		return __('SC Video', 'scaddons');
	}
	public function get_icon()
	{
		return 'glyph-icon flaticon-multimedia';
	}
	public function get_categories()
	{
		return ['bilent'];
	}
	public function get_keywords()
	{
		return ['video'];
	}
	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_video',
			[
				'label' => esc_html__('Content', 'scaddons'),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__('Title Alignment', 'scaddons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'scaddons'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'scaddons'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'scaddons'),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justify', 'scaddons'),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default'     => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .sc-video' => 'text-align: {{VALUE}}'
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'sc_video_style',
			[
				'label'   => esc_html__('Select Video Style', 'scaddons'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'defualt' => esc_html__('Defualt', 'scaddons'),
					'style1' => esc_html__('Style 1', 'scaddons'),
					'style2' => esc_html__('Style 2', 'scaddons'),
				],
			]
		);


		$this->add_control(
			'video_link',
			[
				'label' => esc_html__('Enter Link Here', 'scaddons'),
				'type' => Controls_Manager::TEXT,
				'default'     => '#',
				'placeholder' => esc_html__('Video link here', 'scaddons'),
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
					'value' => 'fas fa-photo-video',
					'library' => 'fa-solid',
				],
				'condition' => [
					'sc_video_style' => 'defualt'
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Background Image', 'scaddons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sc_video_title',
			[
				'label' => esc_html__('Video Title', 'scaddons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'description',
			[
				'label' => esc_html__('Video Description', 'scaddons'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default'     => 'Add your video description here',
				'placeholder' => esc_html__('Add your video content here..', 'scaddons'),
				'separator' => 'before',
				'condition' => [
					'sc_video_style!' => 'defualt'
				],
			]

		);
		$this->add_control(
			'sc_video_subtitle',
			[
				'label' => esc_html__('Video Subtitle', 'scaddons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'sc_video_btn',
			[
				'label' => esc_html__('Button Text', 'scaddons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'default'     => 'Button Text',
				'placeholder' => esc_html__('Add button text here..', 'scaddons'),
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'sc_video_btn_link',
			[
				'label' => esc_html__('Button Link Text', 'scaddons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'default'     => '#',
				'placeholder' => esc_html__('Add button link here..', 'scaddons'),
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Content', 'scaddons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'sc_video_style!' => 'defualt'
				],
			]
		);
		$this->add_control(
			'title_color_style2',
			[
				'label' => esc_html__('Title Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'video_title_text',
				'selector' => '{{WRAPPER}} .video_title',

			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Content Text Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_text',
				'selector' => '{{WRAPPER}} .video-desc',

			]
		);
		$this->add_responsive_control(
			'video_title_postion',
			[
				'label' => esc_html__('Content Position Vertical', 'scaddons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sc-video .video-desc' => 'top: {{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Subtitle Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video .video-desc span' => 'color: {{VALUE}};',
				],
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Subtitle Typography', 'scaddons'),
				'name' => 'sub_title_text',
				'selector' => '{{WRAPPER}} .sc-video .video-desc span',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_responsive_control(
			'video_full_area_padding',
			[
				'label' => esc_html__('Area Padding', 'scaddons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .sc-video' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__('Icon', 'scaddons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-icon .popup-video i, {{WRAPPER}} .sc-video .popup-videos i:before' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'scaddons'),
				'name' => 'typography_icon',
				'selector' => '{{WRAPPER}} .sc-video .popup-videos i',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_bg',
			[
				'label' => esc_html__('Icon Background Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video .popup-videos' => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-video .popup-videos:before' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_border',
			[
				'label' => esc_html__('Icon Border Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video .overly-border' => 'border-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'video_icon_postion_ver',
			[
				'label' => esc_html__('Icon Position Vertical', 'scaddons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .icon-area, {{WRAPPER}} .sc-video .overly-border' => 'top: {{SIZE}}%;',
				],
			]
		);
		$this->add_responsive_control(
			'video_icon_postion_ht',
			[
				'label' => esc_html__('Icon Position Horizontal', 'scaddons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .icon-area, {{WRAPPER}} .sc-video .overly-border' => 'left: {{SIZE}}%;',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_btn',
			[
				'label' => esc_html__('Button Style', 'scaddons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'icon_btn',
			[
				'label' => esc_html__('Button Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'label' => esc_html__('Border Color', 'scaddons'),
				'name' => 'btn_border',
				'selector' => '{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a',
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__('Border Radius', 'scaddons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'icon_btn_hover',
			[
				'label' => esc_html__('Button Hover Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a:hover' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'scaddons'),
				'name' => 'typography_btn',
				'selector' => '{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a',
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => esc_html__('Button Background Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->add_control(
			'btn_bg_hover',
			[
				'label' => esc_html__('Button Hover Background Color', 'scaddons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-video.style2 .sc-icon-inner .sc-icon-btn a:before' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'sc_video_style' => 'style2'
				],
			]
		);
		$this->end_controls_section();
	}
	protected function render()
	{

		$settings = $this->get_settings_for_display();
		$rand = rand(12, 3330);
		$this->add_inline_editing_attributes('description', 'basic');
		$this->add_render_attribute('description', 'class', 'video-desc'); ?>



		<?php if ($settings['sc_video_style'] == 'defualt') { ?>
			<div class="sc-video-part">
				<?php if (!empty($settings['image']['url'])) : ?>
					<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="image" />
				<?php endif; ?>
				<div class="video-icon">
					<a class="popup-video" href="<?php echo esc_url($settings['video_link']); ?>" title="Video Icon">
						<?php if (!empty($settings['selected_icon'])) {
							Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
						} ?>
					</a>
				</div>
			</div>
		<?php } ?>

		<?php if ($settings['sc_video_style'] == 'style2' || $settings['sc_video_style'] == 'style1') { ?>

			<div class="sc-video video-item-<?php echo esc_attr($rand); ?> <?php echo esc_html($settings['align']); ?> <?php echo esc_html($settings['sc_video_style']); ?>" <?php if (!empty($settings['image']['url'])) : ?>style="background: url(<?php echo esc_url($settings['image']['url']); ?>);" <?php endif; ?>>
				<?php if ($settings['sc_video_style'] == 'style1') { ?>
					<div class="overly-border">
						<a class="popup-videos" href="<?php echo esc_url($settings['video_link']); ?>">
							<i class="fas fa-play"></i>
						</a>
					</div>
					<?php if (!empty($settings['description']) || !empty($settings['sc_video_subtitle'])) : ?>
						<div <?php echo wp_kses_post($this->print_render_attribute_string('description')); ?>>
							<?php echo wp_kses_post($settings['description']); ?>
						</div>
					<?php endif; ?>
				<?php }; ?>

				<?php if ($settings['sc_video_style'] == 'style2') : ?>
					<span class="video_title"><?php echo esc_html($settings['sc_video_title']); ?></span>
					<?php if (!empty($settings['description']) || !empty($settings['sc_video_subtitle'])) : ?>
						<div class="video-desc">
							<?php echo wp_kses_post($settings['description']); ?>
							<?php if (!empty($settings['sc_video_subtitle'])) : ?>
								<span><?php echo wp_kses_post($settings['sc_video_subtitle']); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="sc-icon-inner">
						<?php if (!empty($settings['sc_video_btn'])) : ?>
							<div class="sc-icon-btn">
								<a href="<?php echo esc_url($settings['sc_video_btn_link']); ?>"><?php echo esc_html($settings['sc_video_btn']); ?></a>
							</div>
						<?php endif; ?>

						<div class="icon-area">
							<div class="overly-border">
								<a class="popup-videos" href="<?php echo esc_url($settings['video_link']); ?>">
									<i class="fas fa-play"></i>
								</a>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php } ?>
		<!-- <script type="text/javascript">			
			jQuery(document).ready(function(){
				jQuery('.popup-videos').magnificPopup({
			        disableOn: 10,
			        type: 'iframe',
			        mainClass: 'mfp-fade',
			        removalDelay: 160,
			        preloader: false,
			        fixedContentPos: false
			    }); 
			});
		</script> -->
<?php }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SCaddons_Elementor_Video_Widget());
