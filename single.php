<?php get_header(); ?>
<div id="main-blog">
  <div id="content">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	  <div class="post-details">
	    <?php _e( 'Posted by ', 'groundfloor' ); ?><?php the_author() ?><?php _e( ' on ', 'groundfloor' );?><?php the_time( get_option( 'date_format' ) ) ?> | <a class="rss" href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php _e( 'Subscribe to my feed', 'groundfloor' ); ?>"><?php _e( 'Subscribe', 'groundfloor' ); ?></a> <?php edit_post_link( __( 'Edit', 'groundfloor' ), __( '&#124; ', 'groundfloor' ), __( '', 'groundfloor' ) ); ?><br />
	    <?php _e( ' in ', 'groundfloor' );?><?php the_category( ', ' ) ?><br />
	    <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
	  </div> <!-- .post-details -->
	  <?php if ( has_post_thumbnail() ) {
	    the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
	  } ?>
	  <?php the_content( __( 'Read more ...', 'groundfloor' ) ); ?>
	  <div class="clear"></div> <!-- For inserted media at the end of the post -->
	  <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
	  <div id="author_link"><?php _e( '... other posts by ', 'groundfloor' ); ?><?php the_author_posts_link(); ?></div>
	</div> <!-- post_class -->
	<?php comments_template(); ?>
      <?php endwhile; ?>
    <?php else : ?>
      <h2><?php printf( __( 'Search Results for: %s', 'groundfloor' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
      <p><?php _e( 'Sorry, but you are looking for something that is not here.', 'groundfloor' ); ?></p>
      <?php get_search_form(); ?>
    <?php endif; ?>
  </div> <!-- #content -->
</div> <!-- #main-blog -->
<?php get_sidebar(); ?>
<?php get_footer();?>
<?php /* Last Revision March 27, 2011 v1.7 */ ?>