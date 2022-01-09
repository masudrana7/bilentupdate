<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Plugin;
class SCaddon_Button_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'sc-button';
	}
	public function get_title() {
		return esc_html__( 'SC Button', 'scaddon' );
	}
	public function get_icon() {
		return 'eicon-button';
	}
	public function get_categories() {
        return ['bilent'];
    }
	public function get_keywords() {
		return [ 'button' ];
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Content', 'scaddon' ),
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'scaddon' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'Read More',
				'placeholder' => esc_html__( 'Button Text', 'scaddon' ),
				'separator'   => 'before',
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label'       => esc_html__( ' Button Link', 'scaddon' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,						
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
                    '{{WRAPPER}} .sc-button' => 'text-align: {{VALUE}}'
                ]
            ]
        );
	
		$this->end_controls_section();	

		$this->start_controls_section(
		    'section_style_button',
		    [
		        'label' => esc_html__( 'Button', 'scaddon' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->start_controls_tabs( '_tabs_button' );
			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'scaddon' ),
				]
			); 
			
			$this->add_control(
				'btn_text_color',
				[
					'label' => esc_html__( 'Text Color', 'scaddon' ),
					'type' => Controls_Manager::COLOR,		      
					'selectors' => [
						'.sc-button a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'link_padding',
				[
					'label' => esc_html__( 'Padding', 'scaddon' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .sc-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'btn_typography',
					'selector' => '{{WRAPPER}} .sc-button a',
					'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'background_normal',
					'label' => esc_html__( 'Background', 'scaddon' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .sc-button a',
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'selector' => '{{WRAPPER}} .sc-button a',
				]
			);
			$this->add_control(
				'button_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'scaddon' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .sc-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'button_box_shadow',
					'selector' => '{{WRAPPER}} .sc-button a',
				]
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'scaddon' ),
				]
			); 
			$this->add_control(
				'btn_text_hover_color',
				[
					'label' => esc_html__( 'Text Color', 'scaddon' ),
					'type' => Controls_Manager::COLOR,		      
					'selectors' => [
						'{{WRAPPER}} .sc-view-btn a, {{WRAPPER}} .sc-button a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'link_hover_padding',
				[
					'label' => esc_html__( 'Padding', 'scaddon' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .sc-button a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'background',
					'label' => esc_html__( 'Background', 'scaddon' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .sc-button a:hover',
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'selector' => '{{WRAPPER}} .sc-button a:hover',
				]
			);
			$this->add_control(
				'button_hover_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'scaddon' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .sc-button a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'button_hover_box_shadow',
					'selector' => '{{WRAPPER}} .sc-button a:hover',
				]
			);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	protected function render() {	
	$settings = $this->get_settings_for_display();
	$this->add_inline_editing_attributes( 'btn_text', 'basic' );
	$this->add_render_attribute( 'btn_text', 'class', 'btn_text' );	

	?>
	<div class="sc-button">
		<?php $target = $settings['btn_link']['is_external'] ? 'target=_blank' : '';?>
		<a class="sc_button" href="<?php echo esc_url($settings['btn_link']['url']);?>" <?php echo esc_attr($target);?>>				
			<span <?php echo wp_kses_post($this->print_render_attribute_string('btn_text'));?>><?php echo esc_html($settings['btn_text']);?></span>
			
		</a>
	</div>  
	<?php 
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \SCaddon_Button_Widget());