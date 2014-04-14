<?php
/**
 * Comments Template
 *
 * @package     GroundFloor
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        http://wordpress.org/extend/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2014, Edward Caissie
 *
 * @version     2.2
 * @date        March 11, 2013
 * Refactored code formatting and code block termination comments
 * Refactored yo be more i18n compatible
 */

/** Do not delete these lines */
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( __( 'Please do not load this page directly. Thanks!', 'groundfloor' ) );
}
/** End if - not empty */
if ( post_password_required() ) {
	?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'groundfloor' ); ?></p>
	<?php
	return;
}
/** End if - post password required */

/**
 * Comment Add Micro ID
 *
 * Add a micro ID class to all the comments
 *
 * @param $classes - existing CSS classes
 *
 * @return array
 */
function comment_add_microid( $classes ) {

	$c_email = get_comment_author_email();
	$c_url   = get_comment_author_url();
	if ( ! empty( $c_email ) && ! empty( $c_url ) ) {
		$microid   = 'microid-mailto+http:sha1:' . sha1( sha1( 'mailto:' . $c_email ) . sha1( $c_url ) );
		$classes[] = $microid;
	}

	/** End if - not empty */

	return $classes;

}

/** End function - add micro ID */
add_filter( 'comment_class', 'comment_add_microid' );

/**
 * Comment Add User ID
 *
 * Add a userid (if exists) to all the comments
 *
 * @param $classes - existing CSS classes
 *
 * @return array
 */
function comment_add_userid( $classes ) {

	global $comment;
	if ( $comment->user_id == 1 ) {
		/** Default Administrator Account */
		$userid = "administrator user-id-1";
	} else {
		/** All other users - NB: user-id-0 -> non-registered user */
		$userid = "user-id-" . ( $comment->user_id );
	}
	/** End if - comment user ID is 1 */
	$classes[] = $userid;

	return $classes;

}

/** End function - add user ID */
add_filter( 'comment_class', 'comment_add_userid' ); ?>

<div id="comments-main">

	<?php /** show the comments */
	if ( have_comments() ) {
		?>

		<h4 id="comments">
			<?php comments_number( __( 'No Comments', 'groundfloor' ), __( 'One Comment', 'groundfloor' ), __( '% Comments', 'groundfloor' ) ); ?>
		</h4><!-- #comments -->

		<ul class="commentlist" id="singlecomments">
			<?php wp_list_comments(
				array(
					'avatar_size' => 60,
					'reply_text'  => __( '&raquo; Reply to this Comment &laquo;', 'groundfloor' )
				)
			); ?>
		</ul><!-- commentlist -->

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div><!-- .navigation -->

	<?php
	} else {

		/** this is displayed if there are no comments so far */
		if ( 'open' == $post->comment_status ) {
			/** If comments are open, but there are no comments. */
		} else {
			/** comments are closed */
		}
		/** End if - comments open */

	}
	/** End if - have comments */

	comment_form(); ?>

</div><!-- #comments-main -->