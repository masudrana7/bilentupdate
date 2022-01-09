<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
class SC_Repair_Portfolio_Slider extends Widget_Base {
  public function get_name() {
    return 'SC_Repair_Slider';
  }
  public function get_title() {
    return esc_html__( 'SC Portfolio Slider', 'bilent-core' );
  }
  public function get_icon() {
    return 'eicon-slides';
  }
   public function get_categories() {
    return [ 'bilent' ];
  }
  protected function _register_controls() {
    $this->start_controls_section(
        'portfolio_grid',
        [
          'label' => __( 'Portfolio List', 'bilent-core' ),
        ]
    );
	$repeater = new Repeater();
	$repeater->add_control(
		'image',
		[
		'label' => __( 'Image', 'bilent-core' ),
		'type' => Controls_Manager::MEDIA,
		'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
		
		]
	);
	$repeater->add_control(
		'title',
		[
		'label' => __( 'Title', 'bilent-core' ),
		'type' => Controls_Manager::TEXT,
		'default' => __( 'Portfolio Title', 'bilent-core' ),
		]
	);
	$repeater->add_control(
		'url',
		[
		'label' => __( 'URL', 'bilent-core' ),
		'type' => Controls_Manager::URL,
		]
	);
	$repeater->add_control(
		'category',
		[
		'label' => __( 'Category', 'bilent-core' ),
		'type' => Controls_Manager::TEXT,
		'default' => __( 'Corporate', 'bilent-core' ),
		]
	);
    $this->add_control(
      'items1',
      [
        'label' => __( 'Repeater List', 'bilent-core' ),
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'list_title' => __( 'Title #1', 'bilent-core' ),
          ],

          [
            'list_title' => __( 'Title #2', 'bilent-core' ),
          ],

          [
            'list_title' => __( 'Title #3', 'bilent-core' ),
          ],
        ],
      ]
    );
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
	$this->add_responsive_control(
		'item_gap_custom',
		[
			'label' => esc_html__( 'Item Left& Right Gap', 'prelements' ),
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
	$this->add_responsive_control(
		'item_bottom_custom',
		[
			'label' => esc_html__( 'Item bottom Gap', 'prelements' ),
			'type' => Controls_Manager::SLIDER,
			'show_label' => true,               
			'selectors' => [
				'{{WRAPPER}} .single-portfolio' => 'margin-bottom:{{SIZE}}{{UNIT}};',                     
			],
		]
	); 
	$this->end_controls_section(); 
}   
    protected function render() {
    $settings =  $this->get_settings_for_display(); 
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
	$slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs');
	?>
    <div class="sc-portfolio-slider sc-slider-wrapper">
        <div id="sc-slick-slider-<?php echo esc_attr($unique); ?>" class="sc-unique-slider">
			<?php 
			foreach($settings["items1"] as $item){ 
				$title = $item["title"]; 
				$category = $item["category"]; 
				$url = $item["url"]['url']; 
				$image = wp_get_attachment_image( $item["image"]["id"],'full', "", array( "class" => "img-fluid")); ?>
				<div class="single-portfolio">
					<div class="portfolio-img">
						<?php echo $image;?>
					</div>
					<div class="portfolio-text">
						<span class="portfolio-icon">
							<a href="<?php echo $url;?>"><i class="flaticon flaticon-plus"></i></a>
						</span>
						<h3 class="portfolio-title"><a href="<?php echo $url;?>"><?php echo $title;?></a></h3>
						<span class="portfolio-category"><?php echo $category;?></span>
					</div>
				</div>
			<?php } ?> 
			<div class="sc-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
		</div>
    </div>

 <?php }
    protected function content_template() {}
  }

Plugin::instance()->widgets_manager->register_widget_type( new \SC_Repair_Portfolio_Slider() );