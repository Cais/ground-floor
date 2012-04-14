<?php
/**
 * Search Template
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
<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>/">
    <label class="hidden" for="s"><?php _e( 'Search for:', 'groundfloor' ); ?></label>
    <div id="search-container">
        <input type="text" value="<?php _e( 'Enter keyword(s) and hit enter', 'groundfloor' ); ?>" onblur="if(this.value == '') {this.value = '<?php _e( 'Enter keyword(s) and hit enter', 'groundfloor' ); ?>';}" onfocus="if(this.value == '<?php _e( 'Enter keyword(s) and hit enter', 'groundfloor' ); ?>') {this.value = '';}" name="s" id="s" />
        <input type="submit" class="hidden" id="search-submit" value="<?php _e( 'Search' , 'groundfloor' ); ?>" />
    </div> <!-- #search-container -->
</form>