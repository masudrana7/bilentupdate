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
?>
<section class="error-section pb-110 pt-110 md-pt-70 md-pb-70">
	<div class="container">
		<div class="row clearfix align-items-center">
			<div class="col-md-12 text-center">
				<h1><?php esc_html_e('404', 'bilent'); ?></h1>
				<h2><?php esc_html_e('Oops! That page can’t be found.', 'bilent'); ?></h2>
				<p><?php esc_html_e('It looks like nothing was found at this page.', 'bilent'); ?></p>
				<a class="readon mt-20" href="<?php echo esc_url(get_home_url()); ?>"><?php esc_html_e('Back to Home','bilent');?></a>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();