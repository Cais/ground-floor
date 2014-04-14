<?php
/**
 * Archive Template
 *
 * Displays archives page is required to be displayed
 *
 * @package     GroundFloor
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        http://wordpress.org/extend/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2013, Edward Caissie
 *
 * Last revised April 16, 2012
 * @version     1.9
 * Implement `gf_use_posted`
 *
 * @version     2.2
 * @date        March 11, 2013
 * Refactored code formatting and code block termination comments
 * Refactored post meta to be more i18n compatible
 */

get_header(); ?>

	<div id="main-blog">

		<div id="content">

			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {
					the_post(); ?>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<h2>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>

						<div class="post-details">

							<?php
							printf(
								__( '%1$s by %2$s on %3$s', 'groundfloor' ),
								gf_use_posted(),
								get_the_author(),
								get_the_time( get_option( 'date_format' ) )
							);

							if ( ! post_password_required() ) {
								echo ' ';
								comments_popup_link( __( 'with No Comments', 'groundfloor' ), __( 'with 1 Comment', 'groundfloor' ), __( 'with % Comments', 'groundfloor' ), '', __( '(Comments Closed)', 'groundfloor' ) );
							}
							/** End if - password protected post test */

							edit_post_link( __( 'Edit', 'groundfloor' ), __( ' &#124; ', 'groundfloor' ), __( '', 'groundfloor' ) );

							printf( sprintf( __( '<div class="ground-floor-categories-list">in %1$s</div>', 'groundfloor' ), get_the_category_list( ', ' ) ) ); ?>

							<?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?>

							<br />

						</div>
						<!-- .post-details -->

						<?php the_excerpt(); ?>

						<div class="clear"></div>
						<!-- For inserted media at the end of the post -->

					</div><!-- post_class -->

				<?php } /** end while - have posts */ ?>

				<div id="nav-global" class="navigation">
					<div class="left">
						<?php next_posts_link( __( '&laquo; Previous entries ', 'groundfloor' ) ); ?>
					</div>
					<div class="right">
						<?php previous_posts_link( __( ' Next entries &raquo;', 'groundfloor' ) ); ?>
					</div>
				</div><!-- .navigation -->

				<div class="clear"></div>

			<?php } else { ?>

				<h2>
					<?php printf( __( 'Search Results for: %s', 'groundfloor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
				</h2>
				<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'groundfloor' ); ?></p>

				<?php
				get_search_form();

			} /** End if - have posts */
			?>

		</div>
		<!-- #content -->

	</div> <!-- #main-blog -->

<?php
get_sidebar();
get_footer();