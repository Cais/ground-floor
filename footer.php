<?php
/**
 * Footer Template
 *
 * @package     GroundFloor
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/ground-floor/
 * @link        https://github.com/Cais/ground-floor/
 * @link        https://wordpress.org/themes/ground-floor/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2015, Edward Caissie
 */ ?>

</div><!-- #head2toe -->

<div id="footer">

	<div id="footer-top"></div>

	<div id="footer-widgets-above"></div>

	<!-- NB: It is very important to maintain the order of the following widget code to insure the formatting and style does not break!!! -->
	<div id="footer-widgets">

		<div id="fw-middle" class="fw-column">
			<?php if ( dynamic_sidebar( "footer-middle" ) ) : else : endif; ?>
		</div>
		<!-- #fw-middle -->

		<div id="fw-left" class="fw-column">
			<?php if ( dynamic_sidebar( "footer-left" ) ) : else : endif; ?>
		</div>
		<!-- #fw-left -->

		<div id="fw-right" class="fw-column">
			<?php if ( dynamic_sidebar( "footer-right" ) ) : else : endif; ?>
		</div>
		<!-- #fw-right -->

	</div>
	<!-- #footer-widgets -->

	<div id="footer-widgets-below"></div>

	<div id="footer-middle">
		<p>
			<?php gf_dynamic_copyright();
			gf_theme_version(); ?>
		</p>
	</div>
	<!-- #footer-middle -->

	<div id="footer-bottom">
		<?php wp_footer(); ?>
	</div>

</div><!-- #footer -->

</div><!-- #outside -->
</body>
</html>