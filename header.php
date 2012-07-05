<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php
/**
 * Header
 *
 * The document type, etc.; as well as the top graphics and top navigation menu
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
?>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="outside">
    <div id="header">
        <div id="header-top"></div>
        <div id="header-middle">
            <div id="header-title">
                <div id="blog-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></span></div>
                <div id="blog-description"><?php bloginfo( 'description' ) ?></div>
            </div><!-- #header-title -->
            <div id="top-navigation-menu">
                <?php gf_nav_menu(); ?>
            </div><!-- #top-navigation-menu -->
            <div class="clear"></div>
        </div><!-- #header-middle -->
        <div id="header-bottom"></div>
    </div><!-- #header -->
    <div id="head2toe">