<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bilent
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<?php
// You can start editing here -- including this comment!
if (have_comments()) :
	$comment_close = '';
	if (!comments_open()) :
		$comment_close = 'comment-close';
	endif;
?>
	<div id="comments" class="post-comments <?php echo esc_attr($comment_close); ?>">
		<div class="blog-coment-title mb-25">
			<h3 class="text-dark">
				<?php
				$bilent_comment_count = get_comments_number();
				if ('1' === $bilent_comment_count) {
					printf(
						/* translators: 1: title. */
						esc_html__('Comment', 'bilent')
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html(_nx('%1$s Comment', '%1$s Comments ', $bilent_comment_count, 'comments title', 'bilent'), 'bilent'),
						number_format_i18n($bilent_comment_count)
					);
				}
				?>
			</h3>
		</div>
		<div class="latest-comments">
			<?php
			if (have_comments()) :
				the_comments_navigation();
			?>
				<?php
				wp_list_comments(array(
					'style'      => 'div',
					'callback' => 'bilent_comments',
					'short_ping' => true,
				));
				?>
		
				<?php
				the_comments_navigation();
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if (!comments_open()) :
				?>
					<p class="no-comments"><?php esc_html_e('Comments are closed.', 'bilent'); ?></p>
			<?php
				endif;
			endif;
			?>
		</div><!-- comment-box -->
	</div>
<?php
endif; // Check for have_comments().


if (comments_open()) :
?>
	<div class="comment-area">
		<div class="comment-full">
			<?php
			$user = wp_get_current_user();
			$bilent_user_identity = $user->display_name;
			$req = get_option('require_name_email');
			$aria_req = $req ? " aria-required='true'" : '';

			$formargs = array(
				'title_reply_before'   => '<h3 class="reply-title">',
				'title_reply_after'    => '</h3>',
				'title_reply'          =>  esc_html__('Add to Comment', 'bilent'),
				'title_reply_to' => esc_html__('Leave a Reply to %s', 'bilent'),
				'cancel_reply_link' => '<small>' . esc_html__(' Cancel Reply', 'bilent') . '</small>',
				'label_submit' => esc_html__('Post Comment', 'bilent'),
				'comment_notes_before' => false,
				'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="%3$s submit">%4$s</button>',
				'submit_field'         => '<div class="submit-btn">%1$s %2$s</div>',
				'comment_field' => '<div class="row"><div class="form-group mb-30 col-md-12"><textarea class="form-control shadow-none rounded-0 p-3" name="comment" rows="4" placeholder="' . esc_attr__('Your Comments', 'bilent') . '"  ></textarea></div></div>',
				'must_log_in' => '<div>' .
					sprintf(
						wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'bilent'), array('a' => array('href' => array()))),
						wp_login_url(apply_filters('the_permalink', get_permalink()))
					) . '</div>',
				'logged_in_as' => '<div class="logged-in-as">' .
					sprintf(
						wp_kses(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="%4$s">Log out?</a>', 'bilent'), array('a' => array('href' => array()))),
						esc_url(admin_url('profile.php')),
						$bilent_user_identity,
						wp_logout_url(apply_filters('the_permalink', get_permalink())),
						esc_attr__('Log out of this account', 'bilent')
					) . '</div>',

				'comment_notes_after' => '',
				'fields' => apply_filters(
					'comment_form_default_fields',
					array(
						'author' =>
						'<div class="row"><div class="col-lg-6 col-md-6 col-sm-12 form-group">'
							. '<input name="author" class="form-control" type="text" placeholder="' . esc_attr__('Your name', 'bilent') . '" value="' . esc_attr($commenter['comment_author']) .
							'" size="30"' . $aria_req . ' /></div>',
						'email' =>
						'<div class="col-lg-6 col-md-6 col-sm-12 form-group">'
							. '<input name="email" class="form-control" type="text"  placeholder="' . esc_attr__('Your Email', 'bilent') . '" value="' . esc_attr($commenter['comment_author_email']) .
							'" size="30"' . $aria_req . ' />
						</div></div>'
					)
				),
			);
			comment_form($formargs);
			?>
		</div>
	</div>
<?php endif; ?>