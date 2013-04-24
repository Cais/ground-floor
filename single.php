<?php
/**
 * Single Template
 *
 * Displays single view of posts
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
 * @version 2.2
 * @date    March 11, 2013
 * Dropped the "subscribe" link from the post meta
 * Refactored code formatting and code block termination comments
 * Refactored to be more i18n compatible
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
                        printf( __( '%1$s by %2$s on %3$s', 'groundfloor' ),
                            gf_use_posted(),
                            get_the_author(),
                            get_the_time( get_option( 'date_format' ) )
                        );

                        edit_post_link( __( 'Edit', 'groundfloor' ), __( '&#124; ', 'groundfloor' ), __( '', 'groundfloor' ) );

                        printf( sprintf( __( '<div class="ground-floor-categories-list">in %1$s</div>', 'groundfloor' ), get_the_category_list( ', ' ) ) ); ?>

                        <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />

                    </div><!-- .post-details -->

                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
                    } /** End if - has post thumbnail */

                    the_content( __( 'Read more ...', 'groundfloor' ) ); ?>

                    <div class="clear"></div><!-- For inserted media at the end of the post -->

                    <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>

                    <div id="author_link"><?php _e( '... other posts by ', 'groundfloor' ); ?><?php the_author_posts_link(); ?></div>

                </div><!-- post_class -->

                <?php
                comments_template();

            } /** End while - have posts */

        } else { ?>

            <h2>
                <?php printf( __( 'Search Results for: %s', 'groundfloor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
            </h2>
            <p><?php _e( 'Sorry, but you are looking for something that is not here.', 'groundfloor' ); ?></p>

            <?php
            get_search_form();

        } /** End if - have posts */ ?>

    </div><!-- #content -->

</div><!-- #main-blog -->

<?php
get_sidebar();
get_footer();