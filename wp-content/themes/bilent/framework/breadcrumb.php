<?php
/**
 * Bilent Custom Breadcrumb
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
    exit(); //exit if access directly
}


if ( ! function_exists( 'Bilent_Breadcrumb' ) ) {
	function Bilent_Breadcrumb() {
		// Set variables for later use
		$home_link        = home_url( '/' );
		$home_text        = esc_html__( 'Home', 'bilent' );
		$link_attr        = ' rel="v:url" property="v:title"';
		$link_before             = '';
		$link             = '<a href="%1$s">%2$s</a>';
		$link_after             = '';
		$delimiter        = '<span class="mx-2"><i aria-hidden="true" class="fas fa-angle-double-right"></i></span>';              // Delimiter between crumbs
		$before           = '<span">'; // Tag before the current crumb
		$after            = '</span>';                // Tag after the current crumb
		$page_addon       = '';                       // Adds the page number if the query is paged
		$breadcrumb_trail = '';
		$category_links   = '';

		if ( is_front_page() && is_home() ) {
			$breadcrumb_title = esc_html__( 'Blog Posts', 'bilent' );
		}elseif ( is_archive() ) {
				$breadcrumb_title = get_the_archive_title();
		}elseif ( is_single() ) {
			if ( get_post_type( get_the_ID() ) == 'post' ){
				$breadcrumb_title = get_the_title();
			}else{
				// post type
				$breadcrumb_title = get_post_type() . esc_html__( ' Details', 'bilent' );
			}
		}elseif ( is_404() ) {
			$breadcrumb_title = esc_html__( 'Error Page', 'bilent' );
		}elseif ( is_search() ) {
			$breadcrumb_title =  esc_html__( 'Search Results for: ', 'bilent' ) . get_search_query();;
		}else{
			$breadcrumb_title = get_the_title();
		}
		/**
		 * Set our own $wp_the_query variable. Do not use the global variable version due to
		 * reliability
		 */
		$wp_the_query   = $GLOBALS['wp_the_query'];
		$queried_object = $wp_the_query->get_queried_object();

		if(is_home()){
			$breadcrumb_output_link = '';
			$breadcrumb_output_link .= '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title"><i aria-hidden="true" class="fas fa-home"></i>' . esc_html( $home_text ) . '</a><span class="mx-2"><i aria-hidden="true" class="fas fa-angle-double-right"></i></span>'; 
			$breadcrumb_output_link .= '<span>' . $breadcrumb_title.'</span>'; 
		
			echo wp_kses_post( $breadcrumb_output_link );
		}
		if(is_single()){	
				$breadcrumb_output_link = '';
		
				$breadcrumb_output_link .= '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title"><i aria-hidden="true" class="fas fa-home"></i>' . esc_html( $home_text ) . '</a><span class="mx-2"><i aria-hidden="true" class="fas fa-angle-double-right"></i></span>'; 
				$breadcrumb_output_link .= '<span>' . $breadcrumb_title .'</span>'; 
	
				echo wp_kses_post( $breadcrumb_output_link );
		}
	

		// Handle single post requests which includes single pages, posts and attatchments
		if ( is_singular() ) {
			/**
			 * Set our own $post variable. Do not use the global variable version due to
			 * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
			 */
			$post_object = sanitize_post( $queried_object );

			// Set variables
			$title          = $post_object->post_title;
			$parent         = $post_object->post_parent;
			$post_type      = $post_object->post_type;
			$post_id        = $post_object->ID;
			$post_link      = $before . $title . $after;
			$parent_string  = '';
			$post_type_link = '';


			if ( 'post' === $post_type ) {
				// Get the post categories
				$categories = get_the_category( $post_id );
				if ( $categories ) {
					// Lets grab the first category
					$category = $categories[0];

					$category_links = get_category_parents( $category, true, $delimiter );
					$category_links = str_replace( '<a', $link_before . '<a' . $link_attr, $category_links );
					$category_links = str_replace( '</a>', '</a>' . $link_after, $category_links );
				}
			}

			if ( ! in_array( $post_type, [ 'post', 'page', 'attachment' ] ) ) {
				$post_type_object = get_post_type_object( $post_type );
				$archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

				$post_type_link = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
			}

			// Get post parents if $parent !== 0
			if ( 0 !== $parent ) {
				$parent_links = [];
				while ( $parent ) {
					$post_parent = get_post( $parent );

					$parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

					$parent = $post_parent->post_parent;
				}

				$parent_links = array_reverse( $parent_links );

				$parent_string = implode( $delimiter, $parent_links );
			}

			// Lets build the breadcrumb trail
			if ( $parent_string ) {
				$breadcrumb_trail = $parent_string . $delimiter . $post_link;
			} else {
				$breadcrumb_trail = $post_link;
			}

			if ( $post_type_link ) {
				$breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;
			}

			if ( $category_links ) {
				$breadcrumb_trail = $category_links . $breadcrumb_trail;
			}
		}

		// Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives

		if ( is_archive() ) {
			$breadcrumb_output_link = '';
			$breadcrumb_output_link .= '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title"><i aria-hidden="true" class="fas fa-home"></i>' . esc_html( $home_text ) . '</a>';
			$breadcrumb_output_link .= $delimiter; 
	
			$breadcrumb_output_link .= $before . $breadcrumb_title . $after; 
			
			echo wp_kses_post( $breadcrumb_output_link );	
		}
	
		// Handle the search page
		if ( is_search() ) {
			$breadcrumb_output_link = '';
			$breadcrumb_output_link .= '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title"><i aria-hidden="true" class="fas fa-home"></i>' . esc_html( $home_text ) . '</a>'; 
			$breadcrumb_output_link .= $delimiter;
			$breadcrumb_output_link .= $before . $breadcrumb_title . $after; 
			echo wp_kses_post( $breadcrumb_output_link );
		}

		// Handle 404's
		if ( is_404() ) {
			$breadcrumb_output_link = '';
			$breadcrumb_output_link .= '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title"><i aria-hidden="true" class="fas fa-home"></i>' . esc_html( $home_text ) . '</a>'; 
			$breadcrumb_output_link .= $delimiter;
			$breadcrumb_output_link .= $before . $breadcrumb_title . $after;
			echo wp_kses_post( $breadcrumb_output_link );
		}

		// Handle paged pages
		if ( is_paged() ) {
			
			$current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
			$page_addon   = $before . sprintf( esc_html__( ' ( Page %s )', 'bilent' ), number_format_i18n( $current_page ) ) . $after;
		}

		if ( is_page() && ! is_404() ){

			$breadcrumb_output_link = '';
			$breadcrumb_output_link .= '<a href="' . esc_url( $home_link ) . '" rel="v:url" property="v:title"><i aria-hidden="true" class="fas fa-home"></i>' . esc_html( $home_text ) . '</a>';
			$breadcrumb_output_link .= $delimiter;
			$breadcrumb_output_link .= $breadcrumb_trail;
			$breadcrumb_output_link .= $page_addon;
			echo wp_kses_post( $breadcrumb_output_link );

		}

	} //end class

} //end if