<?php
/**
 * Search Template
 * Displays search results
 *
 * @package     GroundFloor
 * @since       2.2
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2014, Edward Caissie
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/fround-floor/
 * @link        https://wordpress.org/themes/ground-floor/
 *
 * @internal    REQUIRES WordPress version 3.4
 * @internal    Tested up to WordPress version 4.2.2
 *
 * This file is part of Ground Floor.
 *
 * Ground Floor is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.
 *
 * You may NOT assume that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to:
 *
 *      Free Software Foundation, Inc.
 *      51 Franklin St, Fifth Floor
 *      Boston, MA  02110-1301  USA
 *
 * The license for this software can also likely be found here:
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @version     2.2
 * @date        March 13, 2013
 */

get_header(); ?>

	<div id="main-blog">

		<div id="content">

			<?php if ( have_posts() ) {

				printf( '<h2 id="search-results-success-title">%1$s</h2>', sprintf( __( 'You searched for %1$s ...', 'ground-floor' ), get_search_query() ) );
				printf( '<span id="search-results-found-message">%1$s</span>', __( '... and we found what you were looking for! These are the results:', 'ground-floor' ) );

				while ( have_posts() ) {

					the_post(); ?>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<h2>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'ground-floor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>

						<div class="post-details">

							<?php
							printf(
								__( '%1$s by %2$s on %3$s', 'ground-floor' ),
								gf_use_posted(),
								get_the_author(),
								get_the_time( get_option( 'date_format' ) )
							);

							if ( ! post_password_required() && ( 'page' !== get_post_type() ) ) {
								echo ' ';
								comments_popup_link( __( 'with No Comments', 'ground-floor' ), __( 'with 1 Comment', 'ground-floor' ), __( 'with % Comments', 'ground-floor' ), '', __( '(Comments Closed)', 'ground-floor' ) );
							}

							edit_post_link( __( 'Edit', 'ground-floor' ), ' &#124; ', '' );

							if ( 'page' !== get_post_type() ) {

								printf( sprintf( '<div class="ground-floor-categories-list">' . __( 'in %1$s', 'ground-floor' ), get_the_category_list( ', ' ) ) . '</div>' );
								the_tags( __( 'as ', 'ground-floor' ), ', ', '' );

							} ?>

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

			<?php } else {

				get_template_part( 'content', 'no_posts' );

			} ?>
			<!-- end the Loop -->

		</div>
		<!-- #content -->

	</div> <!-- #main-blog -->

<?php
get_sidebar();
get_footer();