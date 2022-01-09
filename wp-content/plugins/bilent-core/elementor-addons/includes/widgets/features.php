<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class SC_Repair_Features extends Widget_Base {

  public function get_name() {
    return 'SC_Repair_Features';
  }

  public function get_title() {
    return esc_html__( 'CM Repair Features', 'bilent-core' );
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
          'select_style',
          [
            'label' => __( 'Select Style', 'bilent-core' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'style_1',
            'options' => array(
              'style_1' => __( 'Style 1', 'plugin-core' ),
              'style_2' => __( 'Style 2', 'plugin-core' ),
            ),
          ]
        );
          $repeater = new Repeater();
          $repeater->add_control(
            'title',
            [
              'label' => __( 'Title', 'bilent-core' ),
              'type' => Controls_Manager::TEXT,
              'default' => __( 'Low Price Guarantee', 'bilent-core' ),
            ]
          );
          $repeater->add_control(
            'content',
            [
              'label' => __( 'Content', 'bilent-core' ),
              'type' => Controls_Manager::TEXTAREA,
              'default' => __( 'John draw real poor', 'bilent-core' ),
            ]
          );
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
      $this->end_controls_section();
  
    }    
    protected function render() {
      $settings =  $this->get_settings_for_display(); 
      $extra_class = $settings["extra_class"];
      $select_style = $settings["select_style"];
      
?>

    <?php if($select_style == 'style_1'){ ?>
    <div class="cm-features <?php echo esc_attr($extra_class);?>">
        <div class="container">
            <div class="row justify-content-center">
            <?php 
          foreach($settings["items1"] as $item){ 
            $title = $item["title"]; 
            $content = $item["content"]; 
            $image = wp_get_attachment_image( $item["image"]["id"],'full');
            ?>
                <div class="col-xl-4 col-md-6">
                    <div class="block d-flex align-items-center">
                        <span class="icon bg-primary">
                            <?php echo $image;?>
                        </span>
                        <div>
                            <h4 class="text-dark mb-10"><?php echo $title;?></h4>
                            <p><?php echo $content;?></p>
                        </div>
                    </div>
                    <!-- features item -->
                </div>
            <?php } ?> 
            </div>
        </div>
    </div>
   <?php }elseif($select_style == 'style_2'){ ?>

    <section class="section pb-0 cm-how-can-help cm-how-can-help-2">
        <div class="container">
            <div class="row">
            <?php 
          foreach($settings["items1"] as $item){ 
            $title = $item["title"]; 
            $content = $item["content"]; 
            $image = wp_get_attachment_image( $item["image"]["id"],'full', "", array( "class" => "mb-25" ));
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="block mb-30">
                        <div class="context">
                            <?php echo $image;?>
                            <h4 class="text-dark font-w-700"><?php echo $title;?></h4>
                            <p class="mt-15"><?php echo $content;?></p>
                        </div>
                    </div>
                    <!-- how-can-help item -->
                </div>
                <?php } ?> 

                <div class="col-12 mt-70">
                    <div class="border-bottom"></div>
                </div>
            </div>
        </div>
    </section>
 <?php 
    }
    }
  
    protected function content_template() {
      
    }
  }

Plugin::instance()->widgets_manager->register_widget_type( new \SC_Repair_Features() );