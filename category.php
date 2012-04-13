<?php
/**
 * Category Template
 *
 * Displays category archive page if required to be displayed
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
 * @todo Address `_e` and other output / i18n issues
 */

get_header();
/** used to create dynamic category link */
$curr_cat = single_cat_title( '', false );
$cat_id = get_cat_ID( $curr_cat );
$category_link = get_category_link ( $cat_id );
?>
<div id="main-blog">
    <div id="content">
        <div id="category-title">
            <?php global $paged;
            if ( $paged < 2 ) {
                _e( 'First page of the', 'groundfloor' ); ?> <span id="category-name"><?php single_cat_title(); ?></span> <?php _e( 'archive.', 'groundfloor' );
            } else {
                _e( 'Page', 'groundfloor' );?> <?php _e( $paged, 'groundfloor' ); ?> <?php _e( 'of the', 'groundfloor' ); ?> <span id="category-name"><a href="<?php echo $category_link; ?>" title="<?php echo $curr_cat; ?>"><?php single_cat_title(); ?></a></span> <?php _e( 'archive.', 'groundfloor' );
            } ?>
        </div><!-- #category-title -->
        <div id="category-description">
            <?php echo category_description(); ?>
        </div><!-- #category-description -->

        <!-- start the Loop -->
        <?php
        if ( have_posts() ) :
            $count = 0;
            while ( have_posts() ) : the_post();
                $count++; ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-details">
                        <?php
                        _e( 'Posted by ', 'groundfloor' ); the_author(); _e(' on ', 'groundfloor'); the_time( get_option( 'date_format' ) );
                        _e( 'with ', 'groundfloor' ); comments_popup_link( __( 'No Comments', 'groundfloor' ), __( '1 Comment', 'groundfloor' ), __( '% Comments', 'groundfloor' ), '', __( 'Comments Closed', 'groundfloor') );
                        edit_post_link( __( 'Edit', 'groundfloor' ), __( '&#124; ', 'groundfloor' ), __( '', 'groundfloor' ) );
                        _e( '<br />in ', 'groundfloor' ); the_category( ', ' ) ?><br />
                        <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
                    </div><!-- .post-details -->
                    <?php
                    if ( ( $count <= 2 ) && ( $paged < 2 ) ) :
                        the_content();
                        wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
                    else :
                        the_excerpt();
                    endif; ?>
                    <div class="clear"></div><!-- For inserted media at the end of the post -->
                </div><!-- post_class -->
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
            <p><?php _e( 'Sorry, there are no posts in this category.', 'groundfloor' ); ?></p>
            <?php get_search_form();
        endif; ?><!-- end the Loop -->
    </div><!-- #content -->
</div><!-- #main-blog -->
<?php get_sidebar();
get_footer(); ?>