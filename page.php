<?php
/**
 * Page Template
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
 */

get_header(); ?>

	<div id="main-blog">

		<div id="content">

			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); ?>
					<div id="page-content">

						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<h1>
								<?php the_title(); ?>
							</h1>

							<div id="page-meta">
								<?php comments_popup_link( __( 'with No Comments', 'ground-floor' ), __( 'with 1 Comment', 'ground-floor' ), __( 'with % Comments', 'ground-floor' ), '', __( '', 'ground-floor' ) ); ?>
								<?php edit_post_link( __( 'Edit this page', 'ground-floor' ), __( '&gt ', 'ground-floor' ), __( '', 'ground-floor' ) ); ?>
							</div>
							<!-- #page-meta -->

							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
							}
							/** End if - has post thumbnails */

							the_content( __( 'Read more ...', 'ground-floor' ) );

							wp_link_pages(
								array(
									'before'         => '<p><strong>Pages:</strong> ',
									'after'          => '</p>',
									'next_or_number' => 'number'
								)
							); ?>

							<div class="clear"></div>
							<!-- For inserted media at the end of the post -->

						</div>
						<!-- post_class -->

						<?php comments_template(); ?>

					</div><!-- #page-content -->

				<?php
				}
				/** End while - have posts */

			} else {
				?>

				<h2>
					<?php printf( __( 'Search Results for: %s', 'ground-floor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
				</h2>
				<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'ground-floor' ); ?></p>

				<?php
				get_search_form();

			} /** end if - have posts */
			?>

		</div>
		<!-- #content -->

	</div><!-- #main-blog -->

<?php
get_sidebar();
get_footer();