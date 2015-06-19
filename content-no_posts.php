<?php
/**
 * Template Part - No Posts
 *
 * Displays output if there are no posts found via search
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

<div class="no-posts-results">

	<h2>
		<?php printf( __( 'Search Results for: %s', 'ground-floor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
	</h2>

	<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'ground-floor' ); ?></p>

	<?php get_search_form(); ?>

</div>