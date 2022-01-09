<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
class SC_Repair_Gallery extends Widget_Base {
  public function get_name() {
    return 'SC_Repair_Gallery';
  }

  public function get_title() {
    return esc_html__( 'SC Gallery', 'bilent-core' );
  }

  public function get_icon() {
    return '';
  }
   public function get_categories() {
    return [ 'bilent' ];
  }
    protected function _register_controls() {

      $this->start_controls_section(
         'content',
         [
           'label' => __( 'Content', 'bilent-core' ),
         ]
      );
            $this->add_control(
              'heading',
              [
                'label' => __( 'Heading', 'bilent-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Our Work Gallery', 'bilent-core' ),
              ]
            );
            $this->add_control(
              'background',
              [
                'label' => __( 'Background', 'bilent-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                      'url' => Utils::get_placeholder_image_src(),
                  ],
                
              ]
            );
            $this->add_control(
              'extra_class',
              [
                'label' => __( 'Extra Class', 'bilent-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '', 'bilent-core' ),
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
              'default' => __( 'Laptop Repair', 'bilent-core' ),
            ]
          );
          $repeater->add_control(
            'url',
            [
              'label' => __( 'URL', 'bilent-core' ),
              'type' => Controls_Manager::URL,
            ]
          );
      $this->end_controls_section();

      $this->start_controls_section(
        'gallery_list',
        [
          'label' => __( 'Gallery List', 'bilent-core' ),
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
              'list_content' => __( 'Item content. Click the edit button to change this text.', 'bilent-core' ),
            ],
            [
              'list_title' => __( 'Title #2', 'bilent-core' ),
              'list_content' => __( 'Item content. Click the edit button to change this text.', 'bilent-core' ),
            ],
          ],
        ]
      );
  
      $this->end_controls_section();
  
    }    
    protected function render() {
      $settings =  $this->get_settings_for_display(); 
      $heading = $settings["heading"]; 
      $extra_class = $settings["extra_class"]; 
      $background = wp_get_attachment_image_url( $settings["background"]["id"],'full');
      
?>


    <section class="section work-gallery bg-cover overlay-dark <?php echo esc_attr($extra_class);?>" style="background-image: url(<?php echo $background;?>);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 text-center">
                    <h2 class="section-heading h1 text-white mb-50"><?php echo $heading;?></h2>
                </div>
            </div>
        </div>
        <div class="carousel-fluid">
            <div class="row no-gutters justify-content-center">
                <div class="col-md-12">
                    <div class="owl-carousel fluid-carousel">
                    <?php 
                    foreach($settings["items1"] as $item){ 
                      $title = $item["title"]; 
                      $url = $item["url"]['url']; 
                      $image = wp_get_attachment_image( $item["image"]["id"],'full', "", array( "class" => "img-fluid"));
                      ?>
                        <div class="work-item">
                            <?php echo $image;?>
                            <a class="btn btn-sm btn-light" href="<?php echo $url;?>"><?php echo $title;?></a>
                        </div>
                      <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>

 <?php 
    }
  
    protected function content_template() {
      
    }
  }

Plugin::instance()->widgets_manager->register_widget_type( new \SC_Repair_Gallery() );