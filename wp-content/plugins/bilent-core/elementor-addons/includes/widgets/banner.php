<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;

class SC_Repair_Banner extends Widget_Base {

  public function get_name() {
    return 'SC_Repair_Banner';
  }

  public function get_title() {
    return esc_html__( 'CM Repair Banner', 'bilent-core' );
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
            'image',
            [
              'label' => __( 'Banner Image', 'bilent-core' ),
              'type' => Controls_Manager::MEDIA,
              'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
              
            ]
          );
          $this->add_control(
            'sub_title',
            [
              'label' => __( 'Sub Title', 'bilent-core' ),
              'type' => Controls_Manager::TEXT,
              'default' => __('Mobile & Computer', 'bilent-core' ),
            ]
          );
          $this->add_control(
            'title',
            [
              'label' => __( 'Title', 'bilent-core' ),
              'type' => Controls_Manager::TEXT,
              'default' => __('Repair Service', 'bilent-core' ),
            ]
          );
          $this->add_control(
            'desc',
            [
              'label' => __( 'Description', 'bilent-core' ),
              'type' => Controls_Manager::TEXTAREA,
            ]
          );
          $this->add_control(
            'button_text',
            [
              'label' => __( 'Button Text', 'bilent-core' ),
              'type' => Controls_Manager::TEXT,
              'default' => __( 'Appointment', 'bilent-core' ),
            ]
          );
          $this->add_control(
            'button_url',
            [
                'label' => __( 'Button Url', 'bilent-core' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'liting-domain' ),
                'show_external' => true,
                'default' => [
                  'url' => '',
                  'is_external' => true,
                  'nofollow' => true,
                ],
                
              ]
            );
            $this->add_control(
              'button_text_2',
              [
                'label' => __( 'Button Text 02', 'bilent-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'get a quote', 'bilent-core' ),
              ]
            );
            $this->add_control(
              'button_url_2',
              [
                  'label' => __( 'Button Url', 'bilent-core' ),
                  'type' => Controls_Manager::URL,
                  'placeholder' => __( 'https://your-link.com', 'liting-domain' ),
                  'show_external' => true,
                  'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                  ],
                  
                ]
              );
            $this->add_control(
              'extra_class',
              [
                'label' => __( 'Extra Class', 'bilent-core' ),
                'type' => Controls_Manager::TEXT,
              ]
            );
  
      $this->end_controls_section();

  
    }    
    protected function render() {
      $settings =  $this->get_settings_for_display(); 
      $extra_class = $settings["extra_class"]; 
      $sub_title = $settings["sub_title"];
      $title = $settings["title"];
      $desc = $settings["desc"];
      
      $image = wp_get_attachment_image_url( $settings["image"] ["id"],'full');
     
      $button_text = $settings["button_text"];  
      $button_url = $settings["button_url"]["url"];  
      $button_text_2 = $settings["button_text_2"];  
      $button_url_2 = $settings["button_url_2"]["url"];  
?>
    <!-- start of banner -->
    <div class="cm-banner overlay bg-cover <?php echo $extra_class;?>" style="background-image: url(<?php echo esc_url($image);?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="block text-white">
                        <h3 class="mb-15"><?php echo esc_html($sub_title);?></h3>
                        <h2 class="display-3"><?php echo esc_html($title);?></h2>
                        <p class="lead mt-25 mb-35"><?php echo wp_kses_post($desc);?> </p>
                        <a class="btn btn-primary mt-10 mr-3 mr-md-4" href="<?php echo esc_url($button_url);?>"><?php echo $button_text;?></a>
                        <a class="btn btn-light mt-10" href="<?php echo esc_url($button_url_2);?>"><?php echo $button_text_2;?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of banner -->

 <?php 
    }
  
    protected function content_template() {
      
    }
  }

Plugin::instance()->widgets_manager->register_widget_type( new \SC_Repair_Banner() );