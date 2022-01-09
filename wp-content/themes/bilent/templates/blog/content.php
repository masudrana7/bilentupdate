<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bilent
 */
?>
<div class="blog-item mb-50">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if(has_post_thumbnail()){?>
	<div class="image-part">
	<?php the_post_thumbnail('bilent-blog-list'); ?>
	</div>
	<?php } ?>
		<div class="blog-content">
			<?php
			if ( is_sticky() ) {
				echo '<div class="sticky_post_icon " title="' . esc_attr__( 'Sticky Post', 'bilent' ) . '"><i class="fas fa-map-pin"></i></div>';
			}
			?>
			<ul class="blog-meta">
				<li><i class="far fa-user"></i><?php bilent_posted_by();?></li>
				<li><i class="far fa-clock"></i><?php bilent_posted_on(); ?></li>
			</ul>
			<h3 class="title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
			<div class="desc">
			<?php the_excerpt(); ?>
				<?php 
				wp_link_pages(
					array(
						'before' => '<div class="page-links text-left">',
						'after'  => '</div>',
					)
				); 
				?>
			</div>
			<div class="blog-btn">
				<a href="<?php esc_url(the_permalink()); ?>"><i class="flaticon-right-arrow"></i></a>
			</div>
		</div>
	</div> 
</div>