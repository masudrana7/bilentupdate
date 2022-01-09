<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;


/**
 * Elementor Faq area one
 *
 * @since 1.0.0
 */
class SC_Repair_Brands extends Widget_Base {

	public function get_name() {
		return 'SC_Repair_Brands';
	}
	public function get_title() {
		return esc_html__( 'SC Brands', 'plugin-name' );
	}
	public function get_icon() {
		return '';
	}
	public function get_categories() {
		return array( 'bilent' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'general', 'plugin-name' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'bilent-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'link',
			array(
				'label'         => esc_html__( 'Link', 'bilent-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'bilent-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

			)
		);
		$this->add_control(
			'brand_list',
			array(
				'label'  => __( 'img List', 'bilent-core' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();

	}
	protected function render() {
		$settings     = $this->get_settings_for_display();
		$brand_list   = $settings['brand_list'];
		?>
		<section class="section cm-brands">
			<div class="container">
				<div class="row">
					<?php
					foreach ( $brand_list as $item ) {
						$link       = $item['link']['url'];
						$image = wp_get_attachment_image_url( $item["image"] ["id"],'full');
						?>
					<div class="col-6 col-sm-4 col-md-3 col-lg-2">
						<?php if($link){ ?>
							<a href="<?php echo $link;?>"><img class="img-fluid mt-40" src="<?php echo $image;?>" alt=""></a>
						<?php }else{?>
						<img class="img-fluid mt-40" src="<?php echo $image;?>" alt="">
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	}

	protected function content_template() {

	}
}
Plugin::instance()->widgets_manager->register_widget_type(new SC_Repair_Brands());