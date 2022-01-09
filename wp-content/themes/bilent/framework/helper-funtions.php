<?php
/**
 * is_blog compatibility.
 */
function is_blog() {
	if ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) {
		return true;
	} else {
		return false;
	}
}

function bilent_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}
if ( ! function_exists( 'bilent_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bilent_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'bilent' ),
			$time_string
		);

		printf( $posted_on );

	}
endif;
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bilent
 */

if (!function_exists('bilent_comments_count')) :

	function bilent_comments_count()
	{
		if (get_comments_number(get_the_ID()) == 0) {
			$comments_count =  get_comments_number(get_the_ID()) . esc_html__( ' Comments', 'bilent' );
		} elseif (get_comments_number(get_the_ID()) > 1) {
			$comments_count =  get_comments_number(get_the_ID()) . esc_html__( ' Comments', 'bilent' );
		} else {
			$comments_count =  get_comments_number(get_the_ID()) . esc_html__( ' Comment', 'bilent' );
		}
		echo sprintf(esc_html('%s'), $comments_count); // WPCS: XSS OK.

	}
endif;

if (!function_exists('bilent_tag_list')) :

	function bilent_tag_list()
	{
		if ('post' === get_post_type()) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '<ul class="tags-list"><li>', '</li><li>', '</li></ul>' );
		if ( $tags_list ) {
			printf( '' . esc_html( '%1$s' ) . '', $tags_list ); // WPCS: XSS OK.
		}
		}

	}

endif;

if ( ! function_exists( 'bilent_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function bilent_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'bilent' ),
			esc_html__( 'By ', 'bilent' ) . '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);
		printf( $byline );

	}
endif;

if (!function_exists('bilent_comments')) {

	function bilent_comments($comment, $args, $depth)
	{
		extract($args, EXTR_SKIP);
		$args['reply_text'] = esc_html__('Reply', 'bilent');
		$class              = '';
		if ($depth > 1) {
			$class = '';
		}
		if ($depth == 1) {
			$child_html_el     = '<ul><li>';
			$child_html_end_el = '</li></ul>';
		}

		if ($depth >= 2) {
			$child_html_el     = '<li>';
			$child_html_end_el = '</li>';
		}
		?>
			<?php if ($comment->comment_type != 'trackback' && $comment->comment_type != 'pingback') { ?>
			<div class="comment" id="comment-<?php comment_ID(); ?>">
			<?php } else { ?>
				<div class="comment yes-ping">
				<?php } ?>
				<div class="comments-box d-flex">
				<?php if ($comment->comment_type != 'trackback' && $comment->comment_type != 'pingback') { ?>
					<div class="comments-avatar">
					<?php print get_avatar($comment, 70, null, null); ?>       
					</div>
					<?php } ?>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php echo get_comment_author_link(); ?></h5>
						</div>
						<?php comment_text(); ?>
						<?php
						$replyBtn = 'comment-reply-link';
						echo preg_replace(
							'/comment-reply-link/',
							'comment-reply-link ' . $replyBtn,
							get_comment_reply_link(
								array_merge(
									$args,
									array(
										'reply_text' => esc_html__('Reply','bilent'),
										'depth'      => $depth,
										'max_depth'  => $args['max_depth'],
									)
								)
							),
							1
						);
						?> 
					</div>
				</div>
		<?php
	}
}



//Demo content file include here

function bilent_import_files() {
	return array(
	  array(
		'import_file_name'           => 'Bilent Demo Import',
		'categories'                 => array( 'Category 1' ),
		'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/bilent-content.xml',
		'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/bilent-widget.wie',      
		'import_redux'               => array(
		  array(
			'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/bilent-options.json',
			'option_name' => 'bilent_options',
		  ),
		),
		
		'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'bilent' ),
		
	  ),
	  
	);
  }
  
  add_filter( 'pt-ocdi/import_files', 'bilent_import_files' );
  
  function bilent_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   = get_term_by( 'name', 'Primary Menu', 'nav_menu' ); 
  
	set_theme_mod( 'nav_menu_locations', array(
		'primary' => $main_menu->term_id,        
		'footer_menu' => $single_menu->term_id        
	  )
	);
  
	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );
  
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID ); 
   
  }
  add_action( 'pt-ocdi/after_import', 'bilent_after_import_setup' );