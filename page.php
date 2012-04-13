<?php
/**
 * Footer Template
 *
 * @package     GroundFloor
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        http://wordpress.org/extend/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2012, Edward Caissie
 */

get_header(); ?>
<div id="main-blog">
    <div id="content">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
                <div id="page-content">
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <h1><?php the_title(); ?></h1>
                        <div id="page-meta">
                            <?php comments_popup_link( __( 'with No Comments', 'groundfloor' ), __( 'with 1 Comment', 'groundfloor' ), __( 'with % Comments', 'groundfloor' ), '', __( '', 'groundfloor' ) ); ?>
                            <?php edit_post_link( __( 'Edit this page', 'groundfloor' ), __( '&gt ', 'groundfloor' ), __( '', 'groundfloor' ) ); ?>
                        </div><!-- #page-meta -->
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
                        }
                        the_content( __( 'Read more ...', 'groundfloor' ) );
                        wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
                        <div class="clear"></div><!-- For inserted media at the end of the post -->
                    </div><!-- post_class -->
                    <?php comments_template(); ?>
                </div><!-- #page-content -->
            <?php endwhile;
        else : ?>
            <h2><?php printf( __( 'Search Results for: %s', 'groundfloor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
            <p><?php _e( 'Sorry, but you are looking for something that is not here.', 'groundfloor' ); ?></p>
            <?php get_search_form();
        endif; ?>
    </div><!-- #content -->
</div><!-- #main-blog -->
<?php get_sidebar();
get_footer(); ?>