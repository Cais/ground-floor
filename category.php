<?php
/**
 * Category Template
 * Displays category archive page if required to be displayed
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

/** used to create dynamic category link */
$curr_cat      = single_cat_title( '', false );
$cat_id        = get_cat_ID( $curr_cat );
$category_link = get_category_link( $cat_id ); ?>

	<div id="main-blog">

		<div id="content">

			<div id="category-title">

				<?php global $paged;

				if ( $paged < 2 ) {
					printf( __( 'First page of the %1$s archive.', 'ground-floor' ), '<span id="category-name"><a href="' . $category_link . '" title="' . $curr_cat . '">' . single_cat_title( '', false ) . '</a></span>' );
				} else {
					printf( __( 'Page %1$s of the %2$s archive.', 'ground-floor' ), $paged, '<span id="category-name"><a href="' . $category_link . '" title="' . $curr_cat . '">' . single_cat_title( '', false ) . '</a></span>' );
				} ?>

			</div>
			<!-- #category-title -->

			<div id="category-description">
				<?php echo category_description(); ?>
			</div>
			<!-- #category-description -->

			<!-- start the Loop -->
			<?php if ( have_posts() ) {

				$count = 0;

				while ( have_posts() ) {

					the_post();
					$count ++; ?>

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

							edit_post_link( __( 'Edit', 'ground-floor' ), __( ' &#124; ', 'ground-floor' ), __( '', 'ground-floor' ) );

							printf( sprintf( __( '<div class="ground-floor-categories-list">in %1$s</div>', 'ground-floor' ), get_the_category_list( ', ' ) ) );

							the_tags( __( 'as ', 'ground-floor' ), ', ', '' ); ?>

							<br />

						</div>
						<!-- .post-details -->

						<?php if ( ( $count <= 2 ) && ( $paged < 2 ) ) {

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

						} ?>

						<div class="clear"></div>
						<!-- For inserted media at the end of the post -->

					</div><!-- post_class -->

				<?php } ?>

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
				<p><?php _e( 'Sorry, there are no posts in this category.', 'ground-floor' ); ?></p>

				<?php get_search_form();

			} ?>
			<!-- end the Loop -->

		</div>
		<!-- #content -->

	</div><!-- #main-blog -->

<?php
get_sidebar();
get_footer();