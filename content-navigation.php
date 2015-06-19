<?php
/**
 * Template Part - Navigation
 *
 * Displays navigation controls for moving between pages of posts
 *
 * @package     GroundFloor
 * @since       2.4
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        https://wordpress.org/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2015, Edward Caissie
 */ ?>

<div id="nav-global" class="navigation">
	<div class="left">
		<?php next_posts_link( '&laquo; ' . __( 'Previous entries ', 'ground-floor' ) ); ?>
	</div>
	<div class="right">
		<?php previous_posts_link( ' ' . __( 'Next entries', 'ground-floor' ) . ' &raquo;' ); ?>
	</div>
</div><!-- .navigation -->