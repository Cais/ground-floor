<?php
/**
 * Comments Template
 *
 * @package     GroundFloor
 * @subpackage  Comments
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        https://wordpress.org/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2015, Edward Caissie
 *
 * @version     2.2
 * @date        March 11, 2013
 * Refactored code formatting and code block termination comments
 * Refactored yo be more i18n compatible
 *
 * @version     2.3
 * @date        November 1, 2014
 * Remove micro-ID class insertion into comment classes
 */

/** Do not delete these lines */
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( __( 'Please do not load this page directly. Thanks!', 'ground-floor' ) );
}

if ( post_password_required() ) { ?>

	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'ground-floor' ); ?></p>

	<?php return;

}

/**
 * Comment Add User ID
 * Add a userid (if exists) to all the comments
 *
 * @package     GroundFloor
 * @sub-package Comments
 *
 * @param $classes - existing CSS classes
 *
 * @uses        GLOBAL $comments
 * @uses        user_can
 *
 * @return array
 *
 * @version     2.3
 * @date        November 1, 2014
 * Re-factored to note various user roles as comment classes
 */
function gf_comment_add_userid( $classes ) {

	/** Get the comment object */
	global $comment;

	/** Add classes based on user role */
	if ( user_can( $comment->user_id, 'administrator' ) ) {
		$classes[] = 'administrator';
	} elseif ( user_can( $comment->user_id, 'editor' ) ) {
		$classes[] = 'editor';
	} elseif ( user_can( $comment->user_id, 'contributor' ) ) {
		$classes[] = 'contributor';
	} elseif ( user_can( $comment->user_id, 'subscriber' ) ) {
		$classes[] = 'subscriber';
	} else {
		$classes[] = 'guest';
	}

	/** Add user ID based classes */
	if ( $comment->user_id == 1 ) {
		/** Administrator 'Prime' => first registered user ID */
		$userid = "administrator-prime user-id-1";
	} else {
		/** All other users - NB: user-id-0 -> non-registered user */
		$userid = "user-id-" . ( $comment->user_id );
	}

	$classes[] = $userid;

	return $classes;

}

add_filter( 'comment_class', 'gf_comment_add_userid' ); ?>

<div id="comments-main">

	<?php /** show the comments */
	if ( have_comments() ) { ?>

		<h4 id="comments">
			<?php comments_number( __( 'No Comments', 'ground-floor' ), __( 'One Comment', 'ground-floor' ), __( '% Comments', 'ground-floor' ) ); ?>
		</h4><!-- #comments -->

		<ul class="commentlist" id="singlecomments">
			<?php wp_list_comments(
				array(
					'avatar_size' => 60,
					'reply_text'  => '&raquo; ' . __( 'Reply to this Comment', 'ground-floor' ) . ' &laquo;'
				)
			); ?>
		</ul><!-- commentlist -->

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div><!-- .navigation -->

	<?php } else {

		global $post;

		/** this is displayed if there are no comments so far */
		if ( 'open' == $post->comment_status ) {
			/** If comments are open, but there are no comments. */
		} else {
			/** comments are closed */
		}

	}

	comment_form(); ?>

</div><!-- #comments-main -->