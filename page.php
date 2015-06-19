<?php
/**
 * Page Template
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
 *
 * @version     2.3
 * @date        November 1, 2014
 * Minor i18n corrections and updates
 */

get_header(); ?>

	<div id="main-blog">

		<div id="content">

			<?php if ( have_posts() ) {

				while ( have_posts() ) {

					the_post(); ?>
					<div id="page-content">

						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<h1>
								<?php the_title(); ?>
							</h1>

							<div id="page-meta">
								<?php comments_popup_link( __( 'with No Comments', 'ground-floor' ), __( 'with 1 Comment', 'ground-floor' ), __( 'with % Comments', 'ground-floor' ), '', '' ); ?>
								<?php edit_post_link( __( 'Edit this page', 'ground-floor' ), '&gt ', '' ); ?>
							</div>
							<!-- #page-meta -->

							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
							}

							the_content( __( 'Read more ...', 'ground-floor' ) );

							wp_link_pages(
								array(
									'before'         => '<p><strong>' . __( 'Pages:', 'ground-floor' ) . '</strong> ',
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

				<?php }

			} else {

				get_template_part( 'content', 'no_posts' );

			} ?>

		</div>
		<!-- #content -->

	</div><!-- #main-blog -->

<?php
get_sidebar();
get_footer();