<?php get_header(); ?>
<div id="main-blog">
  <div id="content">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="post-details">
            <?php printf( __( 'Posted by %1$s on %2$s', 'groundfloor' ), get_the_author(), get_the_time( get_option( 'date_format' ) ) ); ?>
            <?php if ( ! post_password_required() ) { // Hide Comment (and "no title" link) if password required to read post ?>
              <?php _e( 'with', 'groundfloor' ); ?> <?php if ( get_the_title() == "" ) { /* for posts without titles - creates a permalink using the comments reference as the anchor text and reference the post ID */ ?>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent link to untitled post ', 'groundfloor' ); the_id(); ?>"><?php comments_popup_link( __( 'No Comments', 'groundfloor' ), __( '1 Comment', 'groundfloor' ), __( '% Comments', 'groundfloor' ), '', __( 'Comments Closed', 'groundfloor' ) ); ?></a>
                <?php } else {
                  comments_popup_link( __( 'No Comments', 'groundfloor' ), __( '1 Comment', 'groundfloor' ), __( '% Comments', 'groundfloor' ), '', __( 'Comments Closed', 'groundfloor' ) );
                } ?>
            <?php } // password protected post test ?>
            <?php edit_post_link( __( 'Edit', 'groundfloor' ), __( '&#124; ', 'groundfloor' ), __( '', 'groundfloor' ) ); ?><br />
            <?php _e( 'in ', 'groundfloor' );?><?php the_category( ', ' ) ?><br />
            <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
          </div> <!-- .post-details -->
          <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
          } ?>
          <?php the_content( __( 'Read more... ', 'groundfloor' ) ); ?>
          <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
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
  </div> <!-- #content -->
</div> <!-- #main-blog -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php /* Last Revised July 20, 2011 v1.8 */ ?>