<?php
if ( $m <> "" ) { /* works for default permalinks only */
  if ( strlen( $m ) == 8 ) {
    $display_date = strftime( "%d %B %Y", strtotime( $m ) );
  } elseif ( strlen( $m ) == 6 ) {
    $m .= "01"; /* Hack - function requires Year, Month, Day(?), at 6 characters only Year and Month are given */
    $display_date = strftime( "%B %Y", strtotime( $m ) );
  } else { /* Year only - no manipulation required */
    $display_date = $m;
  }
  $display_date = ": " . $display_date;
}
?>
<?php get_header(); ?>
<div id="main-blog">
  <div id="content">
    <div id="date-title">
      <?php if ( $paged < 2 ) { ?>
	<?php _e( 'Posts by date', 'groundfloor' ); echo $display_date; ?>
      <?php } else { ?>
	<?php _e( 'Page ', 'groundfloor' ); _e( $paged, 'groundfloor' ); _e( ' of posts by date', 'groundfloor' ); echo $display_date; ?>
      <?php } ?>
    </div> <!-- #date-title -->
    
    <!-- start the Loop -->
    <?php if ( have_posts() ) : ?>
      <?php $count = 0; ?>
      <?php while ( have_posts() ) : the_post(); ?>
	<?php $count++; ?>
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	  <div class="post-details">
	    <?php _e( 'Posted by ', 'groundfloor' ); the_author(); _e( ' on ', 'groundfloor' ); the_time( get_option( 'date_format' ) ); ?>
	    <?php _e( 'with ', 'groundfloor' ); comments_popup_link( __( 'No Comments', 'groundfloor' ), __( '1 Comment', 'groundfloor' ), __( '% Comments', 'groundfloor' ), '', __( 'Comments Closed', 'groundfloor' ) ); ?>
	    <?php edit_post_link( __('Edit', 'groundfloor' ), __( '&#124; ', 'groundfloor' ), __( '', 'groundfloor' ) ); ?><br />
	    <?php _e( ' in ', 'groundfloor' ); the_category( ', ' ) ?><br />
	    <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
	  </div> <!-- .post-details -->
	  <?php if ( ( $count <= 3 ) && ( $paged < 2 ) ) : ?>
	    <?php the_content(); ?>
	    <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
	  <?php else : ?>
	    <?php the_excerpt(); ?>
	  <?php endif; ?>
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
    <!-- end the Loop -->
  </div> <!-- #content -->
</div> <!-- #main-blog -->
<?php get_sidebar(); ?>
<?php get_footer();?>
<?php /* Last revised September 3, 2011 v1.8 */ ?>