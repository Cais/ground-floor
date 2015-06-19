<?php
/**
 * Archive Template
 * Displays archives page is required to be displayed
 *
 * @package     GroundFloor
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        https://wordpress.org/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2015, Edward Caissie
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
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'ground-floor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>

						<div class="post-details">

							<?php printf(
								__( '%1$s by %2$s on %3$s', 'ground-floor' ),
								gf_use_posted(),
								get_the_author(),
								get_the_time( get_option( 'date_format' ) )
							);

							if ( ! post_password_required() ) {

								echo ' ';
								comments_popup_link( __( 'with No Comments', 'ground-floor' ), __( 'with 1 Comment', 'ground-floor' ), __( 'with % Comments', 'ground-floor' ), '', __( '(Comments Closed)', 'ground-floor' ) );

							}

							edit_post_link( __( 'Edit', 'ground-floor' ), ' &#124; ', '' );

							printf( '<div class="ground-floor-categories-list">' . sprintf( __( 'in %1$s', 'ground-floor' ), get_the_category_list( ', ' ) ) . '</div>' );

							the_tags( __( 'as ', 'ground-floor' ), ', ', '' ); ?>

							<br />

						</div>
						<!-- .post-details -->

						<?php the_excerpt(); ?>

						<div class="clear"></div>
						<!-- For inserted media at the end of the post -->

					</div><!-- post_class -->

				<?php }

				get_template_part( 'content', 'navigation' ); ?>

				<div class="clear"></div>

			<?php } else { ?>

				<h2>
					<?php printf( __( 'Search Results for: %s', 'ground-floor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
				</h2>
				<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'ground-floor' ); ?></p>

				<?php get_search_form();

			} ?>

		</div>
		<!-- #content -->

	</div> <!-- #main-blog -->

<?php
get_sidebar();
get_footer();