<div class="search-widget">
    <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-wrap">
        <input type="search" id="<?php echo esc_attr(uniqid('search-form-')); ?>" class="search-input" name="s" placeholder="<?php esc_attr_e('Searching...', 'bilent'); ?>" value="<?php echo get_search_query(); ?>" required="required">
        <button type="submit" value="Search"><i class="flaticon flaticon-magnifying-glass"></i></button>
    </form>
</div>