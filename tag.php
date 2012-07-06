<?php
/**
 * Tags Template
 *
 * Displays tags archive index page using a "mullet loop" of two full-style
 * content posts and the balance as excerpts of the remaining posts.
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
 *
 * Last revised April 14, 2012
 * @version     1.9
 * Updated 'tag-title' block with better i18n support
 */

get_header();

/** used to create dynamic tag link */
$curr_tag = single_tag_title( '', false ); ?>
<div id="main-blog">
    <div id="content">
        <div id="tag-title">
            <?php
            global $paged;
            $tag_link = '<span id="tag-name"><a href="' . get_home_url( '/?tag=' ) . $curr_tag .'" title="' . $curr_tag . '">' . $curr_tag . '</a></span>';
            if ( $paged < 2 ) {
                printf( __( 'First page of the %1$s archive.', 'groundfloor' ), $tag_link );
            } else {
                printf( __( 'Page %1$s of the %2$s archive.', 'groundfloor' ), $paged, $tag_link );
            } ?>
        </div><!-- #tag-title -->

        <div id="tag-description"><?php echo tag_description(); ?></div><!-- #tag-description -->

        <!-- start the Loop -->
        <?php
        if ( have_posts() ) :
            $count = 0;
            while ( have_posts() ) : the_post();
                $count++; ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-details">
                        <?php printf( __( '%1$s by %2$s on %3$s', 'groundfloor' ), gf_use_posted(), get_the_author(), get_the_time( get_option( 'date_format' ) ) );
                        if ( ! post_password_required() ) { /** Hide Comment(s) if password required to read post */
                            echo ' ';
                            comments_popup_link( __( 'with No Comments', 'groundfloor' ), __( 'with 1 Comment', 'groundfloor' ), __( 'with % Comments', 'groundfloor' ), '', __( '(Comments Closed)', 'groundfloor' ) );
                        } /** password protected post test */
                        edit_post_link( __( 'Edit', 'groundfloor' ), __( ' &#124; ', 'groundfloor' ), __( '', 'groundfloor' ) );
                        _e( '<br />in ', 'groundfloor' );?><?php the_category( ', ' ) ?><br />
                        <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
                    </div><!-- .post-details -->
                    <?php
                    if ( ( $count <= 2 ) && ( $paged < 2 ) ) {
                        the_content();
                        wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
                    } else {
                        the_excerpt();
                    } ?>
                    <div class="clear"></div><!-- For inserted media at the end of the post -->
                </div> <!-- post_class -->
            <?php endwhile; ?>
            <div id="nav-global" class="navigation">
                <div class="left">
                    <?php next_posts_link( __( '&laquo; Previous entries ', 'groundfloor' ) ); ?>
                </div>
                <div class="right">
                    <?php previous_posts_link( __( ' Next entries &raquo;', 'groundfloor' ) ); ?>
                </div>
            </div><!-- .navigation -->
            <div class="clear"></div>
        <?php else : ?>
            <h2><?php printf( __( 'Search Results for: %s', 'groundfloor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
            <p><?php _e( 'Sorry, there are no posts with this tag.', 'groundfloor' ); ?></p>
            <?php get_search_form();
        endif; ?>
        <!-- end the Loop -->
    </div><!-- #content -->
</div><!-- #main-blog -->
<?php get_sidebar();
get_footer();