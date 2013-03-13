<?php
/**
 * Functions
 * General functions used with the Ground Floor theme.
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
 * @version     2.1
 * @date        December 9, 2012
 * Added 'Ground Floor Custom Background Callback' function
 * Removed duplicate `content_width` conditional set
 * Removed `gf_login` function
 * Removed `gf_modified_post` function
 *
 * @version 2.2
 * @date    March 12, 2013
 * Refactored code formatting and code block termination comments
 * Refactored to be more i18n compatible
 * Refactored widget area definitions into `gf_widgets` function and hooked into `widget_init`
 */

/**
 * Ground Floor Widgets
 * Creating three (3) "sidebar" widget areas and three (3) "footer" widget areas
 *
 * @package GroundFloor
 * @since   1.0
 *
 * @version 1.9
 * @date    April 16, 2012
 * Added 'description' parameters for each sidebar definition
 *
 * @version 2.1
 * @date    December 7, 2012
 * Refactored sidebar definitions to include names and descriptions
 */
function gf_widgets() {
    register_sidebar( array(
        'name'          => __( 'Sidebar 1', 'groundfloor' ),
        'description'   => __( 'The first sidebar widget area. This contains the default theme sidebar widgets. Drag and drop a widget into this to clear *ALL* of the default widgets of the theme.', 'groundfloor' ),
        'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div><!-- .widget --><div class="widget-bottom"></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 2', 'groundfloor' ),
        'description'   => __( 'The second sidebar widget area. This is empty by default.', 'groundfloor' ),
        'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div><!-- .widget --><div class="widget-bottom"></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'groundfloor' ),
        'description'   => __( 'The third sidebar widget area. This is empty by default.', 'groundfloor' ),
        'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div><!-- .widget --><div class="widget-bottom"></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Left',
        'description'   => __( 'Footer widget area found at the bottom of the theme on the left side.', 'groundfloor' ),
        'id'            => 'footer-left',
        'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div><!-- .footer-widget --><div class="widget-bottom"></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Middle',
        'description'   => __( 'Footer widget area found at the bottom of the theme in the middle.', 'groundfloor' ),
        'id'            => 'footer-middle',
        'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div><!-- .footer-widget --><div class="widget-bottom"></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Right',
        'description'   => __( 'Footer widget area found at the bottom of the theme on the right side.', 'groundfloor' ),
        'id'            => 'footer-right',
        'before_widget' => '<div class="widget-top"></div><div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div><!--.footer-widget --><div class="widget-bottom"></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
} /** End function - widgets */
add_action( 'widgets_init', 'gf_widgets' );

if ( ! function_exists( 'gf_dynamic_copyright' ) ) {
    /**
     * Ground Floor Dynamic Copyright
     * Outputs a copyright notice with a beginning and ending date based on published posts.
     *
     * @package GroundFloor
     *
     * @uses    apply_filters
     * @uses    get_bloginfo
     * @uses    get_posts
     * @uses    home_url
     * @uses    post_date_gmt
     * @uses    wp_parse_args
     *
     * @param string $args
     *
     * Last modified April 16, 2012
     * Changed from `bns_dynamic_copyright` to `gf_dynamic_copyright`
     */
    function gf_dynamic_copyright( $args = '' ) {
        /** Initialize variables */
        $initialize_values = array( 'start' => '', 'copy_years' => '', 'url' => '', 'end' => '' );
        $args = wp_parse_args( $args, $initialize_values );
        $output = '';

        /** Start common copyright notice */
        empty( $args['start'] )
            ? $output .= sprintf( __( 'Copyright', 'groundfloor' ) )
            : $output .= $args['start'];

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
            } /** End if - first year */
            /** Add to output string */
            if ( $first_year == date( 'Y' ) ) {
                /** Only use current year if no posts in previous years */
                $output .= ' &copy; ' . date( 'Y' );
            } else {
                $output .= ' &copy; ' . $first_year . "-" . date( 'Y' );
            } /** End if - first year - date */
        } else {
            $output .= ' &copy; ' . $args['copy_years'];
        } /** End if - empty copy years */

        /** Create URL to link back to home of website */
        empty( $args['url'] )
            ? $output .= ' <a href="' . home_url( '/' ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name', 'display' ) .'</a>  '
            : $output .= ' ' . $args['url'];
        /** End common copyright notice */
        empty( $args['end'] )
            ? $output .= ' ' . sprintf( __( 'All rights reserved.', 'groundfloor' ) )
            : $output .= ' ' . $args['end'];
        /** Construct and sprintf the copyright notice */
        $output = sprintf( __( '<span id="gf-dynamic-copyright"> %1$s </span><!-- #gf-dynamic-copyright -->', 'groundfloor' ), $output );

        echo apply_filters( 'gf_dynamic_copyright', $output, $args );

    } /** End function - dynamic copyright */

} /** End if - function exists */


if ( ! function_exists( 'gf_theme_version' ) ) {
    /**
     * Ground Floor Theme Version
     * Outputs the theme version and relevant details; if it is a Child-Theme it also outputs the Parent-Theme details
     *
     * @package GroundFloor
     *
     * @uses    is_child_theme
     * @uses    parent
     * @uses    wp_get_theme
     *
     * @version 2.0
     * @date    July 5, 2012
     * Removed code for calls to deprecated function `get_theme_data`
     *
     * @version 2.1
     * @date    December 8, 2012
     * Reworded the theme version texts
     * Added filters to allow the text to be completely overwritten
     */
    function gf_theme_version () {
        /** @var $active_theme_data - array object containing the current theme's data */
        $active_theme_data = wp_get_theme();
        if ( is_child_theme() ) {
            /** @var $parent_theme_data - array object containing the Parent Theme's data */
            $parent_theme_data = $active_theme_data->parent();
            /** @noinspection PhpUndefinedMethodInspection - IDE commentary */
            echo apply_filters( 'gf_child_theme_version_text',
                sprintf( __( '<br /><span id="gf-theme-version">The %1$s (v%2$s) theme is built on the %3$s theme (v%4$s) by %5$s.</span>', 'groundfloor' ),
                    $active_theme_data['Name'],
                    $active_theme_data['Version'],
                    $parent_theme_data['Name'],
                    $parent_theme_data['Version'],
                    '<a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>' ) );
        } else {
            echo apply_filters( 'gf_parent_theme_version_text',
                sprintf( __( '<br /><span id="gf-theme-version">Made with the %1$s theme (v%2$s) from %3$s.</span>', 'groundfloor' ),
                    $active_theme_data['Name'],
                    $active_theme_data['Version'],
                    '<a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>' )
            );
        } /** End if - is child theme */
    } /** End function - theme version */
} /** End if - function exists */


if ( ! function_exists( 'gf_custom_background_cb' ) ) {
    /**
     * Ground Floor Custom Background Callback
     * Used specifically to set the CSS `background-attachment` property to
     * `fixed` by default.
     *
     * @package GroundFloor
     * @since   2.1
     *
     * @internal from `..\wp-includes\themes.php: _custom_background_cb()`
     * @internal the callback function writes the `body.custom-background` CSS
     * element and therefore required the entire "default" function structure
     * from core.
     *
     * @uses    get_background_image
     * @uses    get_theme_mod
     * @uses    set_url_scheme
     */
    function gf_custom_background_cb() {
        /** @var $background - custom image, or the default image. */
        $background = set_url_scheme( get_background_image() );

        // A default has to be specified in style.css. It will not be printed here.
        /** @var $color - custom color. */
        $color = get_theme_mod( 'background_color' );

        if ( ! $background && ! $color ) {
            return;
        } /** End if - no background or color */

        /** @var $style - color setting */
        $style = $color
            ? "background-color: #$color;"
            : '';

        if ( $background ) {
            $image = " background-image: url('$background');";

            /** @var $repeat - background repeat value*/
            $repeat = get_theme_mod( 'background_repeat', 'repeat' );
            if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
                $repeat = 'repeat';
            } /** End if - repeat value */

            /** @var $repeat */
            $repeat = " background-repeat: $repeat;";

            /** @var $position - position value */
            $position = get_theme_mod( 'background_position_x', 'left' );
            if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
                $position = 'left';
            } /** End if - default position */

            /** @var $position */
            $position = " background-position: top $position;";

            /** @var $attachment - default attachment */
            $attachment = get_theme_mod( 'background_attachment', 'fixed' );
            if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
                $attachment = 'fixed';
            } /** End if - default attachment */

            /** @var $attachment */
            $attachment = " background-attachment: $attachment;";

            $style .= $image . $repeat . $position . $attachment;
        } /** End if - background */ ?>

    <style type="text/css" id="custom-background-css">
        body.custom-background { <?php echo trim( $style ); ?> }
    </style>

    <?php
    } /** End function - custom background */
} /** End if - function exists */


/** Tell WordPress to run ground_floor_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'ground_floor_setup' );

if ( ! function_exists( 'ground_floor_setup' ) ) {
    /**
     * Ground Floor Setup
     * Adds various core functionality to the theme
     *
     * @package GroundFloor
     *
     * @uses    add_action
     * @uses    add_theme_support
     * @uses    get_locale
     * @uses    get_template_directory
     * @uses    get_template_directory_uri
     * @uses    gf_nav_menu
     * @uses    gf_list_pages
     * @uses    is_home
     * @uses    is_front_page
     * @uses    load_theme_textdomain
     * @uses    register_gf_menu
     * @uses    register_nav_menu
     * @uses    wp_list_pages
     *
     * @version 2.0
     * @date    July 6, 2012
     * Removed code for calls to deprecated functions
     * Updated inline documentation
     */
    function ground_floor_setup(){
        global $wp_version;
        /** This theme uses post thumbnails */
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
        /** Add default posts and comments RSS feed links to head */
        add_theme_support( 'automatic-feed-links' );
        /** Add theme support for editor-style */
        add_editor_style();

        /** This theme allows users to set a custom background */
        /** NB: Use the wf31.png for a higher definition (and larger) background image */
        add_theme_support( 'custom-background', array(
            'default-color'     => '673000',
            'default-image'     => get_template_directory_uri() . '/images/wood-floor-background.jpg',
            'wp-head-callback'  => 'gf_custom_background_cb',
        ) );

        if ( ! function_exists( 'gf_nav_menu' ) ) {
            /** Ground Floor Navigation Menu - adds wp_nav_menu() custom menu support */
            function gf_nav_menu() {
                wp_nav_menu( array(
                    'menu_class'        => 'nav-menu',
                    'theme_location'    => 'top-menu',
                    'fallback_cb'       => 'gf_list_pages'
                ) );
            }
        } /** End if - function exists */
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
                <?php } /** End of - is home */
            } /** End function - list pages */
        } /** End if - function exists */
        if ( ! function_exists( 'register_gf_menu' ) ) {
            /** Register Ground Floor Menu location name */
            function register_gf_menu() {
                register_nav_menu( 'top-menu', __( 'Top Menu', 'groundfloor' ) );
            } /** End function - register menu */
        } /** End if - function exists */
        add_action( 'init', 'register_gf_menu' );

    	/**
         * Make theme available for translation.
         * Translation files must be placed in the /languages/ directory
         *
         * Last revised April 19, 2012
         * @version 2.0 - changed TEMPLATEPATH to `get_template_directory()`
         */
    	load_theme_textdomain( 'groundfloor', get_template_directory() . '/languages' );
    	$locale = get_locale();
    	$locale_file = get_template_directory() . "/languages/$locale.php";
    	if ( is_readable( $locale_file ) ) {
            require_once( $locale_file );
        } /** End if - is readable */
    } /** End function - setup */
} /** End if - function exists */


/**
 * Ground Floor Use Posted
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
    } /** End function - use posted */
} /** End if - function exists */


if ( ! function_exists( 'gf_wp_title' ) ) {
    /**
     * Ground Floor WP Title
     * Utilizes the `wp_title` filter to add text to the default output
     *
     * @package GroundFloor
     * @since   2.0
     *
     * @link    http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
     * @link    https://gist.github.com/1410493
     *
     * @param   string $old_title - default title text
     * @param   string $sep - separator character
     * @param   string $sep_location - left|right - separator placement in relationship to title
     *
     * @return  string - new title text
     */
    function gf_wp_title( $old_title, $sep, $sep_location ) {
        global $page, $paged;
        /** Set initial title text */
        $gf_title_text = $old_title . get_bloginfo( 'name' );
        /** Add wrapping spaces to separator character */
        $sep = ' ' . $sep . ' ';

        /** Add the blog description (tagline) for the home/front page */
        $site_tagline = get_bloginfo( 'description', 'display' );
        if ( $site_tagline && ( is_home() || is_front_page() ) ) {
            $gf_title_text .= "$sep$site_tagline";
        } /** End if - site tagline */

        /** Add a page number if necessary */
        if ( $paged >= 2 || $page >= 2 ) {
            $gf_title_text .= $sep . sprintf( __( 'Page %s', 'groundfloor' ), max( $paged, $page ) );
        } /** End if - paged */

        return $gf_title_text;
    } /** End function - title */
} /** End if - function exists */
add_filter( 'wp_title', 'gf_wp_title', 10, 3 );


/**
 * Enqueue Comment Reply Script
 * If the page being viewed is a single post/page; and, comments are open; and,
 * threaded comments are turned on then enqueue the built-in comment-reply
 * script.
 *
 * @package GroundFloor
 * @since   2.0
 *
 * @uses    comments_open
 * @uses    get_option
 * @uses    is_singular
 * @uses    wp_enqueue_script
 *
 * @version 2.1
 * @date    December 7, 2012
 * Addressed conditional to display threaded comments if they are open or closed
 */
if ( ! function_exists( 'gf_enqueue_comment_reply' ) ) {
    function gf_enqueue_comment_reply() {
        if ( is_singular() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        } /** End if - is singular */
    } /** End function - enqueue comment reply */
} /** End if - function exists */
add_action( 'comment_form_before', 'gf_enqueue_comment_reply' );


/**
 * Set the content width based on the theme's design and stylesheet
 * Calculated from: #main-blog element in style.css
 */
if ( !isset( $content_width ) ) {
    $content_width = 620;
} /** End if - not is set */