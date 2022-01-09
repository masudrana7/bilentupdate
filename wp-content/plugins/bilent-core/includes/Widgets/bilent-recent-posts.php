<?php
function Bilent_Posts_func() {
    register_widget( 'Bilent_Posts' );
}
add_action( 'widgets_init', 'Bilent_Posts_func' );
class Bilent_Posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {

		$widget_ops = array(
			'classname'                   => 'recent-posts-widget',
			'description'                 => __( 'A Bilent Posts Widget' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recent_posts', __( 'Bilent Recent Posts' ), $widget_ops );

	}

	public function widget( $args, $instance ) {

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;


		$r = new \WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page' => $number,
					'no_found_rows'  => true,
					'post_status'    => 'publish',
					'post_type'      => array(
						'Post',
						'ignore_sticky_posts' => true,
					),
				)
			)
		);

		if ( $r->have_posts() ) :
			?>
			<?php printf( $args['before_widget'] ); ?>
			<?php
			if ( $title ) {
				printf( $args['before_title'] . $title . $args['after_title'] );
			}
			?>
			<div class="post-list">
				<?php
				while ( $r->have_posts() ) :
					$r->the_post();
					?>
					<div class="show-featured">
						<div class="post-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'bilent-blog-sidebar' ); ?>
							</a>
						</div>
						<div class="post-desc">
							<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							<?php if($show_date){?>
							<span class="date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
							<?php } ?>
						</div>
					</div>
			<?php endwhile; ?>
			</div>
			<?php printf( $args['after_widget'] ); ?>
			<?php
			wp_reset_postdata();
		endif;
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;

		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php printf( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php printf( $this->get_field_id( 'title' ) ); ?>" name="<?php printf( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php printf( $title ); ?>" /></p>

		<p><label for="<?php printf( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php printf( $this->get_field_id( 'number' ) ); ?>" name="<?php printf( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php printf( $number ); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php printf( $this->get_field_id( 'show_date' ) ); ?>" name="<?php printf( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php printf( $this->get_field_id( 'show_date' ) ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
		<?php
	}
}
