<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bilent
 */

if (!is_active_sidebar('sidebar-blog')) {
	return;
}
?>
<div class="blog-sidebar">
	<?php dynamic_sidebar('sidebar-blog'); ?>
</div>