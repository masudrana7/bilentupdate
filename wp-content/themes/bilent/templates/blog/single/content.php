<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bilent
 */
?>
<div class="blog-deatails">
	<div class="post-img">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<div class="blog-full">
		<ul class="single-post-meta">
			<li>
				<span class="p-date"><i class="far fa-user"></i><?php the_author();?> </span>
			</li> 
			<li>
				<span class="p-date"><i class="far fa-calendar-alt"></i><?php bilent_posted_on(); ?> </span>
			</li> 
			<li class="post-comment"><i class="far fa-comments"></i><?php bilent_comments_count(); ?></li>
		</ul>
		<?php the_content(); ?>
		<?php 
		wp_link_pages(
			array(
				'before' => '<div class="page-links text-left">',
				'after'  => '</div>',
			)
		);
		?>
		<?php if(has_tag()){?>
		<div class="tags-area">
			<span class="tags"><?php esc_html_e('Tags','bilent');?></span>
			<?php bilent_tag_list() ?>
		</div>
		<?php } ?>
	</div>
</div>