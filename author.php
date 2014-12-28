<?php
/**
 * Author Template
 * Displays author page is required to be displayed
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
 * Refactored post meta to be more i18n compatible
 *
 * @version     2.3
 * @date        November 1, 2014
 * Minor i18n corrections and updates
 */

get_header();

/** Set the $curauth variable */
$curauth = ( get_query_var( 'author_name ' ) ) ? get_user_by( 'id', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) ); ?>

	<div id="main-blog">

		<div id="content">

			<div id="author" class="<?php
			/** Add class as related to the user role (see 'Role:' drop-down in User options) */
			if ( user_can( $curauth->ID, 'administrator' ) ) {
				echo 'administrator';
			} elseif ( user_can( $curauth->ID, 'editor' ) ) {
				echo 'editor';
			} elseif ( user_can( $curauth->ID, 'contributor' ) ) {
				echo 'contributor';
			} elseif ( user_can( $curauth->ID, 'subscriber' ) ) {
				echo 'subscriber';
			} else {
				echo 'guest';
			}
			/** End if - user can */

			/** Add user classes by ID */
			/** First user/administrator */
			if ( ( $curauth->ID ) == '1' ) {
				echo ' administrator-prime';
			}
			/** End if - current author ID is 1 */
			/** Additional Example */
			/** elseif ( ( $curauth->ID ) == '2' ) echo ' user-id-2 jellybeen'; */
			?>">

				<h2>
					<?php printf( __( 'About %1$s', 'ground-floor' ), $curauth->display_name ); ?>
				</h2>

				<ul>
					<?php if ( ! empty( $curauth->user_url ) ) { ?>
						<li><?php printf(
								__( 'Website: %1$s or %2$s', 'ground-floor' ),
								'<a href="' . $curauth->user_url . '">' . $curauth->user_url . '</a>',
								'<a href="mailto:' . $curauth->user_email . '">' . __( 'email', 'ground-floor' ) . '</a>'
							); ?>
						</li>
					<?php
					}
					/** End if - not empty current author - url */
					if ( ! empty( $curauth->user_description ) ) {
						?>
						<li><?php printf( __( 'Biography: %1$s', 'ground-floor' ), $curauth->user_description ); ?></li>
					<?php } /** end if - not empty current author - description */ ?>
				</ul>

			</div>
			<!-- #author -->

			<h2>
				<?php printf( __( 'Posts by %1$s:', 'ground-floor' ), $curauth->display_name ); ?>
			</h2>

			<!-- Start the_Loop -->
			<?php
			if ( have_posts() ) {
				$count = 0;

				while ( have_posts() ) {
					the_post();
					$count ++; ?>

					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h2>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'ground-floor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>

						<div class="post-details">

							<?php printf( __( '%1$s on %2$s', 'ground-floor' ), gf_use_posted(), get_the_time( get_option( 'date_format' ) ) );
							if ( ! post_password_required() ) {
								/** Hide Comment(s) if password required to read post */
								echo ' ';
								comments_popup_link( __( 'with No Comments', 'ground-floor' ), __( 'with 1 Comment', 'ground-floor' ), __( 'with % Comments', 'ground-floor' ), '', __( '(Comments Closed)', 'ground-floor' ) );
							}
							/** password protected post test */
							edit_post_link( __( 'Edit', 'ground-floor' ), __( ' &#124; ', 'ground-floor' ), __( '', 'ground-floor' ) );
							_e( '<br />in ', 'ground-floor' ); ?><?php the_category( ', ' ) ?>
							<br />
							<?php the_tags( __( 'as ', 'ground-floor' ), ', ', '' ); ?>
							<br />

						</div>
						<!-- .post-details -->

						<?php
						if ( $count == 1 ) {
							the_content();
							wp_link_pages(
								array(
									'before'         => '<p><strong>' . __( 'Pages:', 'ground-floor' ) . '</strong> ',
									'after'          => '</p>',
									'next_or_number' => 'number'
								)
							);
						} else {
							the_excerpt();
						} /** End if - count is 1 */
						?>

						<div class="clear"></div>
						<!-- For inserted media at the end of the post -->

					</div><!-- post_class -->

				<?php } /** end while - have posts */ ?>

				<div id="nav-global" class="navigation">
					<div class="left">
						<?php next_posts_link( __( '&laquo; Previous entries ', 'ground-floor' ) ); ?>
					</div>
					<div class="right">
						<?php previous_posts_link( __( ' Next entries &raquo;', 'ground-floor' ) ); ?>
					</div>
				</div><!-- .navigation -->

				<div class="clear"></div>

			<?php } else { ?>

				<h2>
					<?php printf( __( 'Search Results for: %s', 'ground-floor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
				</h2>
				<p><?php _e( 'Sorry, there are no posts by this author.', 'ground-floor' ); ?></p>

				<?php
				get_search_form();
			} ?>
			<!-- end the Loop -->

		</div>
		<!-- #content -->

	</div><!-- #main-blog -->

<?php
get_sidebar();
get_footer();