<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bilent
 */
get_header();


global $bilent_options;
$unittest_on_off = isset($bilent_options['unittest_on_off']) ? $bilent_options['unittest_on_off'] : 0;
if ($unittest_on_off == '1') {
	$class = 'sc-page-single';
	$class2 = 'page-container';
} else {
	$class = 'sc-blog-single';
	$class2 = 'container';
}
?>
<!--Sidebar Page Container-->
<div class="blog-area list-view <?php echo esc_attr($class); ?>">
	<div class="container">
		<div class="<?php echo esc_attr($class2); ?>">
			<!--Content Side / Blog Sidebar-->
			<div class="blog-details">
				<?php
				while (have_posts()) :
					the_post();
				?>
					<div class="page-content">
						<?php
						the_content();
						wp_link_pages(
							array(
								'before' => '<div class="page-links text-left">',
								'after'  => '</div>',
							)
						);
						?>
					</div>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
