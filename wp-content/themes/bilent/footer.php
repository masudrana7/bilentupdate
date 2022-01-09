</div>
<!-- Main content End -->
<?php get_template_part('templates/footer/footer-1'); ?>
<?php
global $bilent_options;
$back_to_top_on_off = isset($bilent_options['back_to_top_on_off']) ? $bilent_options['back_to_top_on_off'] : 0;
if ($back_to_top_on_off == '1') :
	?>
	<div id="scrollUp">
		<i class="fas fa-chevron-up"></i>
	</div>
	<?php
endif;
?>
<!-- Search Modal Start -->
<div aria-hidden="true" id="search-modal" class="modal fade search-modal" role="dialog" tabindex="-1">
	<button type="button" class="close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Close','bilent');?>">
		<i class="flaticon-close"></i>
	</button>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="search-block clearfix">
				<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
					<div class="form-group">
						<input type="search" id="<?php echo esc_attr(uniqid('search-form-')); ?>" class="form-control" name="s" placeholder="<?php esc_attr_e('Search Here...', 'bilent'); ?>" value="<?php echo get_search_query(); ?>" required="required">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>