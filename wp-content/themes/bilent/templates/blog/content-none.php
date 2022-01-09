<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bilent
 */
?>
<div class="col-lg-10 margin-auto">
	<p class="no-found-text"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bilent'); ?></p>
	<div class="nothing-found-search">
		<div class="widget-area">
			<?php
			get_search_form();
			?>
		</div>
	</div>
</div>