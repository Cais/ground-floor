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
 * Last modified April 15, 2012
 * @version     1.9
 * Added `gf_use_posted` function to be implemented with "no title" posts
 */

/**
 * Ground Floor Login - adds link to login|Dashboard
 * @todo Review for optimization
 */
function gf_login() {
    $login_url = home_url() . '/wp-admin/';
    if ( is_user_logged_in() ) {
        echo '<div id="gf-logged-in" class="gf-login">' . __( 'You are logged in! ', 'groundfloor' );
        if ( function_exists( 'get_current_site' ) ) {
            $current_site = get_current_site();
            $home_domain = 'http://' . $current_site->domain . $current_site->path;
            echo '<a href="' . wp_logout_url( $home_domain ) . '" title="' . __( 'Logout', 'groundfloor' ) . '">' . __( 'Logout', 'groundfloor' ) . '</a>';
        } else {
            echo '<a href="' . wp_logout_url( home_url() ) . '" title="' . __( 'Logout', 'groundfloor' ) . '">' . __( 'Logout', 'groundfloor' ) . '</a>';
        }
        echo __( ' or go to the ', 'groundfloor' ) . '<a href="' . $login_url . '" title="' . __( 'dashboard', 'groundfloor' ) . '">' . __( 'dashboard', 'groundfloor' ) . '</a>.</div>';
    } else {
        echo '<div id="gf-logged-out" class="gf-login"><a href="' . $login_url . '" title="' . __( 'Log in here', 'groundfloor' ) . '">' . __( 'Log in here!', 'groundfloor' ) . '</a></div>';
    }
}

/**
 * Widgetizing
 */
register_sidebars( 3, array(
    'description'   => 'Widget area found in sidebar of theme.',
    'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div><!-- .widget --><div class="widget-bottom"></div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );

register_sidebar( array(
    'name'          => 'Footer Left',
    'id'            => 'footer-left',
    'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div><!-- .footer-widget --><div class="widget-bottom"></div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );

register_sidebar( array(
    'name'          => 'Footer Middle',
    'id'            => 'footer-middle',
    'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div><!-- .footer-widget --><div class="widget-bottom"></div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );

register_sidebar( array(
    'name'          => 'Footer Right',
    'id'            => 'footer-right',
    'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div><!--.footer-widget --><div class="widget-bottom"></div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );

if ( ! function_exists( 'bns_dynamic_copyright' ) ) {
    /**
     * BNS Dynamic Copyright
     *
     * Outputs a copyright notice with a beginning and ending date based on published posts.
     *
     * @param string $args
     * @todo re-namespace to be relevant to the theme's name
     */
    function bns_dynamic_copyright( $args = '' ) {
        /** Initialize variables */
        $initialize_values = array( 'start' => '', 'copy_years' => '', 'url' => '', 'end' => '' );
        $args = wp_parse_args( $args, $initialize_values );
        $output = '';

        /** Start common copyright notice */
        empty( $args['start'] ) ? $output .= sprintf( __('Copyright', 'groundfloor') ) : $output .= $args['start'];

        /* Calculate Copyright Years; and, prefix with Copyright Symbol */
        if ( empty( $args['copy_years'] ) ) {
            /** Get all posts */
            $all_posts = get_posts( 'post_status=publish&order=ASC' );
            /** Get first post */
            $first_post = $all_posts[0];
            /** Get date of first post */
            $first_date = $first_post->post_date_gmt;
            /** First post year versus current year */
            $first_year = substr( $first_date, 0, 4 );
            if ( $first_year == '' ) {
                $first_year = date( 'Y' );
            }
            /** Add to output string */
            if ( $first_year == date( 'Y' ) ) {
                /** Only use current year if no posts in previous years */
                $output .= ' &copy; ' . date( 'Y' );
            } else {
                $output .= ' &copy; ' . $first_year . "-" . date( 'Y' );
            }
        } else {
            $output .= ' &copy; ' . $args['copy_years'];
        }

        /** Create URL to link back to home of website */
        empty( $args['url'] ) ? $output .= ' <a href="' . home_url( '/' ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name', 'display' ) .'</a>  ' : $output .= ' ' . $args['url'];
        /** End common copyright notice */
        empty( $args['end'] ) ? $output .= ' ' . sprintf( __( 'All rights reserved.', 'groundfloor' ) ) : $output .= ' ' . $args['end'];
        /** Construct and sprintf the copyright notice */
        $output = sprintf( __( '<span id="bns-dynamic-copyright"> %1$s </span><!-- #bns-dynamic-copyright -->', 'groundfloor' ), $output );

        echo apply_filters( 'bns_dynamic_copyright', $output, $args );
    }
}

if ( ! function_exists( 'bns_theme_version' ) ) {
    /**
     * BNS Theme Version
     *
     * Outputs the theme version and relevant details; if it is a Child-Theme it also outputs the Parent-Theme details
     * @todo re-namespace to be relevant to the theme's name
     * @todo Address deprecated function call `get_theme_data`
     */
    function bns_theme_version () {
        /** Get details of the theme / child theme */
        $blog_css_url = get_stylesheet_directory() . '/style.css';
        $my_theme_data = get_theme_data( $blog_css_url );
        $parent_blog_css_url = get_template_directory() . '/style.css';
        $parent_theme_data = get_theme_data( $parent_blog_css_url );
        if ( is_child_theme() ) {
            printf( __( '<br /><span id="bns-theme-version">%1$s version %2$s a child of the %3$s version %4$s theme from <a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>.</span>', 'groundfloor' ), $my_theme_data['Name'], $my_theme_data['Version'], $parent_theme_data['Name'], $parent_theme_data['Version'] );
        } else {
            printf( __( '<br /><span id="bns-theme-version">%1$s version %2$s theme from <a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>.</span>', 'groundfloor' ), $my_theme_data['Name'], $my_theme_data['Version'] );
        }
    }
}

/**
 * Set the content width based on the theme's design and stylesheet
 * Calculated from: Main Blog Layout section in style.css
 */
if ( !isset( $content_width ) ) $content_width = 620;

/** Tell WordPress to run ground_floor_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'ground_floor_setup' );

if ( ! function_exists( 'ground_floor_setup' ) ):
    /**
     * Ground Floor Setup - adds various core functionality to the theme
     * @todo Address deprecated function call `add_custom_background`
     */
    function ground_floor_setup(){
        /** This theme uses post thumbnails */
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
        /** Add default posts and comments RSS feed links to head */
        add_theme_support( 'automatic-feed-links' );
        /** Add theme support for editor-style */
        add_editor_style();
        /** This theme allows users to set a custom background */
        add_custom_background();

        if ( ! function_exists( 'gf_nav_menu' ) ) {
            /** Ground Floor Navigation Menu - adds wp_nav_menu() custom menu support */
            function gf_nav_menu() {
                if ( function_exists( 'wp_nav_menu' ) )
                    wp_nav_menu( array(
                        'menu_class'        => 'nav-menu',
                        'theme_location'    => 'top-menu',
                        'fallback_cb'       => 'gf_list_pages'
                    ) );
                else
                    gf_list_pages();
            }
        }
        if ( ! function_exists( 'gf_list_pages' ) ) {
            /** Ground Floor List Pages - used as callback function `gf_nav_menu` */
            function gf_list_pages() {
                if ( is_home() || is_front_page() ) { ?>
                    <ul class="nav-menu">
                        <?php wp_list_pages( 'title_li=' ); ?>
                    </ul>
                <?php } else { ?>
                    <ul class="nav-menu">
                        <li><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'groundfloor' ) ?></a></li>
                        <?php wp_list_pages( 'title_li=' ); ?>
                    </ul>
                <?php }
            }
        }
        if ( ! function_exists( 'register_gf_menu' ) ) {
            /** Register Ground Floor Menu location name */
            function register_gf_menu() {
                register_nav_menu( 'top-menu', __( 'Top Menu', 'groundfloor' ) );
            }
        }
        add_action( 'init', 'register_gf_menu' );

    	/**
         * Make theme available for translation.
         * Translation files must be placed in the /languages/ directory
         */
    	load_theme_textdomain( 'groundfloor', TEMPLATEPATH . '/languages' );
    	$locale = get_locale();
    	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
    	if ( is_readable( $locale_file ) )
            require_once( $locale_file );
    }
endif;

/**
 * Ground Floor Use Posted
 *
 * This returns a URL to the post using the anchor text 'Posted' in the meta
 * details with the post excerpt as the URL title; or, returns the word 'Posted'
 * if the post title exists
 *
 * @package     GroundFloor
 * @since       1.9
 *
 * @internal    Adapted from `dmm_use_posted` as found in Desk Mess Mirrored 2.0
 *
 * @return      string - URL|Posted
 */
if ( ! function_exists( 'gf_use_posted' ) ) {
    function gf_use_posted() {
        $gf_no_title = get_the_title();
        empty( $gf_no_title )
            ? $gf_no_title = '<span class="no-title"><a href="' . get_permalink() . '" title="' . get_the_excerpt() . '">' . __( 'Posted', 'groundfloor' ) . '</span></a>'
            : $gf_no_title = __( 'Posted', 'groundfloor' );
        $gf_no_title = apply_filters( 'dmm_use_posted', $gf_no_title );
        return $gf_no_title;
    }
}
// End: DMM Use Posted

/**
 * BNS Modified Post
 *
 * Outputs the modifying author name and date the post was modified if the post
 * date and the last modified date are different.
 *
 * @todo To be implemented ...
 */
function bns_modified_post(){
    /**  */
    if ( get_the_date() <> get_the_modified_date() ) {
        echo '<div class="bns-modified-post">'; /* CSS wrapper for modified date details */
        echo 'Last modified by ' . get_the_modified_author() . ' on ' . get_the_modified_date();
        echo '</div><!-- .bns-modified-post -->';
    }
}

/** Set the content width based on the theme's design and stylesheet, see #main-blog element in style.css */
if ( ! isset( $content_width ) ) $content_width = 640;