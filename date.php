<?php
/**
 * Date Template
 *
 * Displays date archive page if required to be displayed
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
 * Last revised April 19, 2012
 * @version     2.0
 * Addressed `_e` and other output / i18n issues
 *
 * @todo Address all `_e` and other output / i18n issues
 */

global $m;
$display_date = '';
if ( $m <> "" ) { /** works for default permalinks only */
    if ( strlen( $m ) == 8 ) {
        $display_date = strftime( "%d %B %Y", strtotime( $m ) );
    } elseif ( strlen( $m ) == 6 ) {
        /** Hack - function requires Year, Month, Day(?), at 6 characters only Year and Month are given */
        $m .= "01";
        $display_date = strftime( "%B %Y", strtotime( $m ) );
    } else { /** Year only - no manipulation required */
        $display_date = $m;
    }
    $display_date = ": " . $display_date;
}
get_header(); ?>
<div id="main-blog">
    <div id="content">
        <div id="date-title">
            <?php
            global $paged;
            if ( $paged < 2 ) {
                printf( __( 'Posts by date %1$s', 'groundfloor' ), $display_date );
            } else {
                printf( __( 'Page %1$s of posts by date %2$s.', 'groundfloor' ), $paged, $display_date );
            } ?>
        </div><!-- #date-title -->

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
                    if ( ( $count <= 3 ) && ( $paged < 2 ) ) :
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
            </div> <!-- .navigation -->
            <div class="clear"></div>
        <?php else : ?>
            <h2><?php printf( __( 'Search Results for: %s', 'groundfloor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
            <p><?php _e( 'Sorry, but you are looking for something that is not here.', 'groundfloor' ); ?></p>
           <?php get_search_form();
        endif; ?><!-- end the Loop -->
    </div><!-- #content -->
</div><!-- #main-blog -->
<?php get_sidebar();
get_footer(); ?>