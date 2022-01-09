<?php

/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */

get_header();
global $bilent_option;
$mevim_layout_class = 'col-sm-12 col-xs-12'; ?>
<div class="container">
	<div id="content" class="site-content">
		<div class="row">
			<?php
			if (is_product()) {
			?>
				<div class="col-sm-12 col-xs-12">
					<?php
					woocommerce_content();
					?>
				</div>
			<?php
			} else {
				get_sidebar('woocommerce');
			?>
				<div class="<?php echo esc_attr($mevim_layout_class); ?>">
					<?php
					woocommerce_content();
					?>
				</div>
			<?php
				get_sidebar('woocommerce');
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();
