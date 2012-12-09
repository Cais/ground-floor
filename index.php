<?php
/**
 * Ground Floor
 *
 * Theme Description: Richly toned wood floor background with bare-earth colored
 * widgetized sidebar and footer. A strong theme to begin with; grow into; and,
 * build on.
 *
 * @package     GroundFloor
 * @since       1.0
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2012, Edward Caissie
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/fround-floor/
 * @link        http://wordpress.org/extend/themes/ground-floor/
 *
 * @internal    REQUIRES WordPress version 3.0
 * @internal    Tested up to WordPress version 3.4
 *
 * This program is free software; you can redistribute it and/or modify it under
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
 * @version 2.1
 * @date    December 9, 2012
 * Fixed spacing issue in meta details if post has no tags
 */
get_header(); ?>
<div id="main-blog">
    <div id="content">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-details">
                        <?php printf( __( '%1$s by %2$s on %3$s', 'groundfloor' ), gf_use_posted(), get_the_author(), get_the_time( get_option( 'date_format' ) ) );
                        if ( ! post_password_required() ) { /** Hide Comment(s) if password required to read post */
                            echo ' ';
                            comments_popup_link( __( 'with No Comments', 'groundfloor' ), __( 'with 1 Comment', 'groundfloor' ), __( 'with % Comments', 'groundfloor' ), '', __( '(Comments Closed)', 'groundfloor' ) );
                        } /** password protected post test */
                        edit_post_link( __( 'Edit', 'groundfloor' ), __( ' &#124; ', 'groundfloor' ), __( '', 'groundfloor' ) );
                        _e( '<br />in ', 'groundfloor' );?><?php the_category( ', ' ) ?>
                        <?php
                        $gf_post_tags = get_the_tags();
                        if ( $gf_post_tags ) { ?>
                            <br />
                            <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); } ?>
                        <br />
                    </div><!-- .post-details -->
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
                    }
                    the_content( __( 'Read more... ', 'groundfloor' ) );
                    wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
                    <div class="clear"></div> <!-- For inserted media at the end of the post -->
                </div> <!-- post_class -->
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
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div> <!-- #content -->
</div> <!-- #main-blog -->
<?php get_sidebar();
get_footer();