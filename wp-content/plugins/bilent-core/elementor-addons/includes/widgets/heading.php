<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Background;
use Elementor\Plugin;

class Scaddon_Elementor_Heading_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'sc-heading';
	}		
	public function get_title() {
		return esc_html__( 'SC Heading', 'scaddon' );
	}
	public function get_icon() {
		return 'eicon-heading';
	}
	public function get_categories() {
        return ['bilent'];
    }
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Heading Info', 'scaddons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Select Heading Style', 'scaddons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'scaddons'),
					'style1'  => esc_html__( 'Intro Border Right', 'scaddons'),
					'style2'  => esc_html__( 'Border Bottom', 'scaddons'),
					'style3'  => esc_html__( 'Intro Border Left', 'scaddons' ),
					'style4'  => esc_html__( 'Border Top', 'scaddons' ),					
					'style6'  => esc_html__( 'Border Top Left', 'scaddons' ),
					'style7'  => esc_html__( 'Border Top Right', 'scaddons' ),
					'style8'  => esc_html__( 'Boder Left Vertical Style', 'scaddons' ),
					'style9'  => esc_html__( 'Heading Image Style', 'scaddons' ),
					'style5'  => esc_html__( 'Heading Bracket Style', 'scaddons' ),
					'style10' => esc_html__( 'Heading Left Rotate Style', 'scaddons' ),
					'style11' => esc_html__( 'Heading Right Rotate Style', 'scaddons' ),
					
				],
			]
		);

		$this->add_control(
			'animate_style',
			[
				'label'   => esc_html__( 'Animate Border Style', 'scaddons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'default'  => esc_html__( 'Select', 'scaddons'),
					'style1'  => esc_html__( 'Animate Border Bottom One', 'scaddons'),
					'style2'  => esc_html__( 'Animate Border Bottom Two', 'scaddons'),				
					'style3'  => esc_html__( 'Animate Border Left & Right One', 'scaddons'),				
					'style4'  => esc_html__( 'Animate Border Left & Right Two', 'scaddons'),			
				],
			]
		);

        $this->add_control(
            'animate_border_color',
            [
                'label' => esc_html__( 'Border Color', 'scaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .sc-heading .pre-heading-line' => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading .pre-heading-line1:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style2', 'style3', 'style4'],
				],
            ]
        );  

        $this->add_control(
            'animate_dot_color',
            [
                'label' => esc_html__( 'Dot Color', 'scaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .sc-heading .pre-heading-line:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading .pre-heading-line1:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style2', 'style3', 'style4'],
				],
            ]
        ); 

        $this->add_control(
            'animate_border_color_hover',
            [
                'label' => esc_html__( 'Border Color (Hover)', 'scaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .elementor-widget-container:hover .pre-heading-line1:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style3'],
				],
            ]
        );
        $this->add_control(
            'animated_border_color_hover',
            [
                'label' => esc_html__( 'Dot Color (Hover)', 'scaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .elementor-widget-container:hover .pre-heading-line1:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'animate_style' => ['style1', 'style3'],
				],
            ]
        );   

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Heading Text', 'scaddons' ),
				'type' => Controls_Manager::TEXTAREA,
				'description'	=> esc_html__( 'Hightlight Title Settings will be worked, If you use this <span>Text</span> format', 'scaddons' ),
				'default' => esc_html__( 'Heading Style', 'scaddons' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'scaddons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'scaddons'),
					'h2' => esc_html__( 'H2', 'scaddons'),
					'h3' => esc_html__( 'H3', 'scaddons' ),
					'h4' => esc_html__( 'H4', 'scaddons' ),
					'h5' => esc_html__( 'H5', 'scaddons' ),
					'h6' => esc_html__( 'H6', 'scaddons' ),					
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Sub Heading Text', 'scaddons' ),
				'type'      => Controls_Manager::TEXT,				
				'default'   => esc_html__( 'Sub Heading', 'scaddons' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Heading Image', 'scaddons' ),
				'type'  => Controls_Manager::MEDIA,					
				'condition' => [
					'style' => 'style9',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_postition',
			[
				'label'   => esc_html__( 'Select Image Position', 'scaddons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [						
					'top' => esc_html__( 'Top', 'scaddons'),
					'bottom' => esc_html__( 'Bottom', 'scaddons'),						
					
				],
				'condition' => [
					'style' => 'style9',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'watermark',
			[
				'label' => esc_html__( 'Watermark Text', 'scaddons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Watermark', 'scaddons' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content',
			[
				'label'   => esc_html__( 'Description', 'scaddons' ),
				'type'    => Controls_Manager::WYSIWYG,
				'rows'    => 10,			
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'scaddons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'scaddons' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'scaddons' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'scaddons' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'scaddons' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .sc-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'scaddons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
	    $this->add_control(
            'title_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Title', 'scaddons' ),
                'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'scaddons' ),
				'selector' => '{{WRAPPER}} .sc-heading .title-inner .title',
			]
		);

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'scaddons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );
       

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'scaddons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .title-inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Sub Title', 'scaddons' ),
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Subtitle Typography', 'scaddons' ),
				'selector' => '{{WRAPPER}} .sc-heading .title-inner .sub-text',
			]
		);

		$this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Subtitle Color', 'scaddons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .title-inner .sub-text' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Subtitle Margin', 'scaddons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .title-inner .sub-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'des_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Description', 'scaddons' ),
                'separator' => 'before',
            ]
        ); 

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'scaddons' ),
				'selector' => '{{WRAPPER}} .sc-heading .description p',
				'selector' => '{{WRAPPER}} .sc-heading .description',
			]
		);

		$this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'scaddons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .description' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sc-heading .description p' => 'color: {{VALUE}};',
                ],                
            ]
        ); 

        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Description Margin', 'scaddons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .description p, {{WRAPPER}} .sc-heading .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'scaddons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .sc-heading.style2:after '                        => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading.style1 .description:after '           => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading.style6 .title-inner .sub-text:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading.style4 .title-inner h2:before'        => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading.style7 .title-inner .sub-text:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading.style8 .title-inner:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .sc-heading.style8 .description:after' => 'background: {{VALUE}};',
				]
            ]
        );             

		$this->end_controls_section();

		$this->start_controls_section(
			'title_highlight_style',
			[
				'label' => esc_html__( 'Highlight Title', 'scaddons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'highlight_color',
            [
                'label' => esc_html__( 'Highlight Color', 'scaddons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .title-inner .title span' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_control(
            'underline_color',
            [
                'label' => esc_html__( 'Underline Color', 'scaddons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sc-heading .title-inner .title span:not(.watermark):after' => 'background: {{VALUE}};',
                ],                
            ]
        );


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hightlight_typography',
				'label' => esc_html__( 'Hightlight Typography', 'scaddons' ),
				'selector' => '{{WRAPPER}} .sc-heading .title-inner .title span',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_image_style',
			[
				'label' => esc_html__( 'Image Settings', 'scaddons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style9',
				],
			]

		);

		 $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Width', 'scaddons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 65,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sc-heading.style9 .title-inner .title-img > img' => 'width: {{SIZE}}{{UNIT}};',                    
                ],

              
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__( 'Height', 'scaddons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sc-heading.style9 .title-inner .title-img > img' => 'height: {{SIZE}}{{UNIT}};',
                ],
               
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'scaddons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .sc-heading.style9 .title-inner .title-img > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
              
            ]
        );


		$this->end_controls_section();
	}
	protected function render() {

		$settings = $this->get_settings_for_display(); 
		$watermark_text = ($settings['watermark']) ? '<span class="watermark">'.($settings['watermark']).'</span>' : '';

		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title"><span class="watermark">'.$settings['watermark'].'</span>'.wp_kses_post($settings['title']).'</'.$settings['title_tag'].'>' : '';

		if( "style4"==	$settings['style'] || "style4 Lite"== $settings['style'] || "style6"== $settings['style'] || "style6 Lite"==$settings['style'] || "style7" == $settings['style'] || "style7 Lite"== $settings['style'] ){
			$sub_text = ($settings['subtitle']) ? '<span class="sub-text">'.($settings['subtitle']).'</span>' : '';
		}
		elseif ( "style5" == $settings['style'] ){
			$sub_text = ($settings['subtitle']) ? '<span class="sub-text title-upper">[ <span class="sub-text title-upper">'.($settings['subtitle']).'</span> ] </span>' : '';
		}
		elseif("style3" == $settings['animate_style']){
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text"> <span class="pre-heading-line1"></span>'.($settings['subtitle']) .'</span>' : '';
		}
		elseif("style4" == $settings['animate_style']){
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text"> <span class="pre-heading-line"></span>'.($settings['subtitle']) .'</span>' : '';
		}
		else{
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text ">'.($settings['subtitle']) .'</span>' : '';
		}
		$titleimg    = $settings['image'] ? '<img src="' . $settings['image']['url'] . '" alt="">' : '';
		$topimage    = $settings['image_postition'] == 'top' ? '<div class="title-img top"> '.$titleimg .'</div>' : "";
		$bottomimage = $settings['image_postition'] == 'bottom' ? '<div class="title-img bottom-img">'.$titleimg .'</div>' : "";
		if( "style9" == $settings['style'] ){
			$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title" ><span class="watermark">'.$settings['watermark'].'</span>'.($settings['title']).'</'.$settings['title_tag'].'>' : '';
		}

      ?>

        <div class="sc-heading <?php echo esc_attr($settings['style']);?> animate-<?php echo esc_attr($settings['animate_style']);?> <?php echo esc_attr($settings['align']);?>">
        	<div class="title-inner">        		      		
	            <?php 
					

					echo wp_kses_post($topimage);

					if( "style4" != $settings['style'] ){
						echo wp_kses_post($sub_text);
					}
					echo wp_kses_post($main_title);
					if( "style4" == $settings['style'] ){
						echo wp_kses_post($sub_text);
					}
					echo wp_kses_post($bottomimage) ;


				?>
				<?php if( "style1" == $settings['animate_style'] ){?>
					<div class="pre-heading-line1"></div>
				<?php } ?>

				<?php if( "style2" == $settings['animate_style'] ){?>
					<div class="pre-heading-line"></div>
				<?php } ?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description">
            		<?php echo wp_kses_post($settings['content']);?>            		
            	</div>
        	<?php } ?>
        </div>
        <?php 		
	}
} 
Plugin::instance()->widgets_manager->register_widget_type(new \Scaddon_Elementor_Heading_Widget());