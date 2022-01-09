<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;

class SC_Repair_Team_Grid extends Widget_Base
{

  public function get_name()
  {
    return 'SC_Repair_Team_Grid';
  }
  public function get_title()
  {
    return esc_html__('SC Team Grid', 'scaddon');
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
      'team_member_list',
      [
        'label' => __('Team Member List', 'scaddon'),
      ]
    );
    $repeater = new Repeater();
    $repeater->add_control(
      'image',
      [
        'label' => __('Image', 'scaddon'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],

      ]
    );
    $repeater->add_control(
      'name',
      [
        'label' => __('Name', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Lucinda Banfield', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'designation',
      [
        'label' => __('Designation', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Repair Technician', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'description',
      [
        'label' => __('Description', 'scaddon'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => __('PC Repair Technician, installs, evaluates, & troubleshoots.', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'team_single_link',
      [
        'label' => __('Team Single Link', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'fb_link',
      [
        'label' => __('Facebook Link', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'tw_link',
      [
        'label' => __('Twitter Link', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'gp_link',
      [
        'label' => __('Google Pluse Link', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'ld_link',
      [
        'label' => __('Linkedin Link', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'scaddon'),
      ]
    );
    $repeater->add_control(
      'yu_link',
      [
        'label' => __('Youtube Link', 'scaddon'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'scaddon'),
      ]
    );
    $this->add_control(
      'items1',
      [
        'label' => __('Repeater List', 'scaddon'),
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'list_title' => __('Title #1', 'scaddon'),
            'list_content' => __('Item content. Click the edit button to change this text.', 'scaddon'),
          ],
          [
            'list_title' => __('Title #2', 'scaddon'),
            'list_content' => __('Item content. Click the edit button to change this text.', 'scaddon'),
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
        'default' => '4',
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'item_margin',
      [
        'label' => esc_html__('Margin', 'scaddon'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
          '{{WRAPPER}} .sc-team-grid .sc-tam-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'global_section_area_style',
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
          '{{WRAPPER}} .sc-tam-team .team-item-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->add_control(
      'item_background_color',
      [
        'label' => esc_html__('Background Color', 'scaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .sc-tam-team .team-item-text' => 'background-color: {{VALUE}} !important',
        ],
      ]
    );

    $this->add_control(
      'item_background_hover_color',
      [
        'label' => esc_html__('Background Hover Color', 'scaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .sc-tam-team:hover .team-item-text' => 'background-color: {{VALUE}} !important',
        ],
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
          '{{WRAPPER}} .sc-tam-team .team-item-text' => 'text-align: {{VALUE}}'
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'section_slider_style',
      [
        'label' => esc_html__('Title & designation & Icon Style', 'rsaddon'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'rsaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team-item-text .team-details .team-name a' => 'color: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );

    $this->add_control(
      'title_color_hover',
      [
        'label' => esc_html__('Title Hover Color', 'rsaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .sc-tam-team:hover .team-item-text .team-details .team-name a' => 'color: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Title Typography', 'rsaddon'),
        'scheme' => Typography::TYPOGRAPHY_1,
        'selector' =>
        '{{WRAPPER}} .team-item-text .team-details .team-name',
        'separator' => 'before',
      ]
    );

    $this->add_responsive_control(
      'title_margin',
      [
        'label' => esc_html__('Margin', 'rsaddon'),
        'type' => Controls_Manager::DIMENSIONS,
        'range' => [
          'px' => [
            'max' => 100,
          ],
        ],
        'default' => [
          'size' => 30,
        ],
        'selectors' => [
          '{{WRAPPER}} .team-item-text .team-details .team-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );

    $this->add_control(
      'designation_color',
      [
        'label' => esc_html__('Designation Color', 'rsaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team-item-text .team-details .team-designation' => 'color: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'designation_color_hover',
      [
        'label' => esc_html__('Designation Color', 'rsaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .sc-tam-team:hover .team-item-text .team-details .team-designation' => 'color: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );

    $this->add_control(
      'icon_color',
      [
        'label' => esc_html__('Icon Color', 'rsaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .sc-tam-team .team-item-text .team-social li a' => 'color: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );

    $this->add_control(
      'icon_color_hover',
      [
        'label' => esc_html__('Icon Hover Color', 'rsaddon'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .sc-tam-team .team-item-text .team-social li a:hover' => 'color: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );

    $this->end_controls_section();
  }
  protected function render()
  {
    $settings =  $this->get_settings_for_display(); ?>
    <div class="section-sc-team sc-team-grid">
      <div class="row">
        <?php foreach ($settings["items1"] as $item) {
          $name = $item["name"];
          $designation = $item["designation"];
          $link = $item["team_single_link"];
          $fb_link = $item["fb_link"];
          $tw_link = $item["tw_link"];
          $gp_link = $item["gp_link"];
          $ld_link = $item["ld_link"];
          $yu_link = $item["yu_link"];
          $image = wp_get_attachment_image_url($item["image"]["id"], 'full'); ?>
          <div class="col-lg-<?php echo esc_html($settings['grid_columns']); ?> col-md-6">
            <div class="sc-tam-team">
              <div class="team-img">
                <a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" alt=""></a>
              </div>
              <div class="team-item-text">
                <div class="team-details">
                  <h3 class="team-name"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></h3>
                  <span class="team-designation"><?php echo $designation; ?></span>
                </div>
                <ul class="team-social">
                  <?php if (!empty($fb_link)) { ?>
                    <li><a href="<?php echo $fb_link; ?>" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  <?php } ?>
                  <?php if (!empty($gp_link)) { ?>
                    <li><a href="<?php echo $gp_link; ?>" class="social-icon" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                  <?php } ?>
                  <?php if (!empty($tw_link)) { ?>
                    <li><a href="<?php echo $tw_link; ?>" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a></li>
                  <?php } ?>
                  <?php if (!empty($ld_link)) { ?>
                    <li><a href="<?php echo $ld_link; ?>" class="social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                  <?php } ?>
                  <?php if (!empty($yu_link)) { ?>
                    <li><a href="<?php echo $yu_link; ?>" class="social-icon" target="_blank"><i class="fab fa-youtube"></i></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
<?php }
  protected function content_template()
  {
  }
}
Plugin::instance()->widgets_manager->register_widget_type(new \SC_Repair_Team_Grid());
