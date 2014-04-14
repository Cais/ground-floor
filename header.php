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
 * @copyright   Copyright (c) 2009-2013, Edward Caissie
 *
 * @version     2.0
 * @date        July 5, 2012
 * Updated HTML title tag
 *
 * @version     2.1
 * @date        March 12, 2013
 * Updated DOCTYPE and other related header elements
 * Code formatting to be more easily read
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="outside"><!-- ends in footer.php -->

	<div id="header">

		<div id="header-top"></div>

		<div id="header-middle">

			<div id="header-title">

				<div id="blog-title">
					<span><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></span>
				</div>
				<!-- #blog-title -->

				<div id="blog-description">
					<?php bloginfo( 'description' ) ?>
				</div>
				<!-- #blog-description -->

			</div>
			<!-- #header-title -->

			<div id="top-navigation-menu">
				<?php gf_nav_menu(); ?>
			</div>
			<!-- #top-navigation-menu -->

			<div class="clear"></div>

		</div>
		<!-- #header-middle -->

		<div id="header-bottom"></div>

	</div>
	<!-- #header -->

	<div id="head2toe"><!-- ends in footer.php -->