<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bilent
 */
get_header();

global $bilent_options;


if (is_active_sidebar('sidebar-blog')) :
	$blog_class = 'col-lg-8';
else :
	$blog_class = 'col-lg-12';
endif;
?>

<!-- sidebar-page-container -->
<section class="sc-blog-single pt-120 pb-120 md-pt-80 md-pb-80">
	<div class="container">
		<div class="row justify-content-center">
			<div class="<?php echo esc_attr($blog_class); ?>">
				<?php
				while (have_posts()) :
					the_post();
					get_template_part('templates/blog/single/content');
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</div>
			<!--Sidebar Side-->
			<?php if (is_active_sidebar('sidebar-blog')) { ?>
				<div class="col-lg-4 mt-5 mt-lg-0">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section><!-- sidebar-page-container -->
<?php
get_footer();