<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bilent
 */
get_header();
if (is_active_sidebar('sidebar-blog')) :
	$blog_class = 'col-lg-8';
else :
	$blog_class = 'col-lg-12';
endif;
?>
<!-- news-section -->
<div id="sc-blog" class="sc-blog sc-main-blog pb-110 pt-110 md-pt-70 md-pb-70">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($blog_class); ?>">
				<?php
				if (have_posts()) :
					while (have_posts()) :
						the_post();
						get_template_part('templates/blog/content', get_post_format());
					endwhile;
				else :
					get_template_part('templates/blog/content', 'none');
				endif;
				?>
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 4,
						'prev_text' => '<i class="fas fa-chevron-left"></i>',
						'next_text' => '<i class="fas fa-chevron-right"></i>',
					)
				);
				?>
			</div>
			<?php if (is_active_sidebar('sidebar-blog')) { ?>
			<div class="col-lg-4 col-md-12 order-last">
				<?php get_sidebar();?>
			</div>
			<?php } ?>
		</div>
	</div>
</div><!-- news-section -->
<?php
get_footer();