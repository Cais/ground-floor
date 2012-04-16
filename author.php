<?php
/**
 * Author Template
 *
 * Displays author page is required to be displayed
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
 * Last revised April 16, 2012
 * @version     1.9
 * Implemented `gf_use_posted`
 */

get_header();
/**
 * This sets the $curauth variable
 * @todo Address deprecated call to `get_userdatabyloogin`
 */
if(isset( $_GET['author_name'] ) ) :
    $curauth = get_userdatabylogin( $author_name );
else :
    $curauth = get_userdata( intval( $author ) );
endif; ?>
<div id="main-blog">
    <div id="content">
        <div id="author" class="<?php if ( ( get_userdata( intval( $author ) )->ID ) == '1' ) echo 'administrator';
            /** elseif ((get_userdata(intval($author))->ID) == '2') echo 'user-id-2'; */ /** sample */
            /** add additional user_id following above example, echo the 'CSS element' you want to use for styling */ ?>">
            <h2><?php _e( 'About ', 'groundfloor' ); ?><?php echo $curauth->display_name; ?></h2>
            <ul>
                <li><?php _e( 'Website', 'groundfloor' ); ?>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <?php _e('or', 'groundfloor'); ?> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php _e( 'email', 'groundfloor' ); ?></a></li>
                <li><?php _e( 'Biography', 'groundfloor' ); ?>: <?php echo $curauth->user_description; ?></li>
            </ul>
        </div> <!-- #author -->
        <h2><?php _e( 'Posts by ', 'groundfloor' ); ?><?php echo $curauth->display_name; ?>:</h2>

        <?php /** Start the_Loop */
        if ( have_posts() ) :
            $count = 0;
            while ( have_posts() ) : the_post();
                $count++; ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-details">
                        <?php printf( __( '%1$s on %2$s', 'groundfloor' ), gf_use_posted(), get_the_time( get_option( 'date_format' ) ) );
                        if ( ! post_password_required() ) { /** Hide Comment(s) if password required to read post */
                            echo ' ';
                            comments_popup_link( __( 'with No Comments', 'groundfloor' ), __( 'with 1 Comment', 'groundfloor' ), __( 'with % Comments', 'groundfloor' ), '', __( '(Comments Closed)', 'groundfloor' ) );
                        } /** password protected post test */
                        edit_post_link( __( 'Edit', 'groundfloor' ), __( ' &#124; ', 'groundfloor' ), __( '', 'groundfloor' ) );
                        _e( '<br />in ', 'groundfloor' );?><?php the_category( ', ' ) ?><br />
                        <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
                    </div> <!-- .post-details -->                    <?php if ( $count == 1 ) :
                        the_content();
                        wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
                    else :
                        the_excerpt();
                    endif; ?>
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
            <p><?php _e( 'Sorry, there are no posts by this author.', 'groundfloor' ); ?></p>
            <?php get_search_form();
        endif; ?>
        <!-- end the Loop -->
    </div> <!-- #content -->
</div> <!-- #main-blog -->
<?php get_sidebar();
get_footer();?>