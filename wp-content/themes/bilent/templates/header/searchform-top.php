<div aria-hidden="true" id="search-modal" class="modal fade search-modal" role="dialog" tabindex="-1">
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i class="flaticon-close"></i>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <div class="form-group">
                        <input class="form-control" type="search" id="<?php echo esc_attr(uniqid('search-form-')); ?>" name="s" placeholder="<?php esc_attr_e('Search Here...', 'bilent'); ?>" value="<?php echo get_search_query(); ?>" required="required">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END search-wrapper -->