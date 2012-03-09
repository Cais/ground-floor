<?php get_header(); ?>
<?php /* This sets the $curauth variable */
if(isset( $_GET['author_name'] ) ) :
  $curauth = get_userdatabylogin( $author_name );
else :
  $curauth = get_userdata( intval( $author ) );
endif;
?>
<div id="main-blog">
  <div id="content">
    <div id="author" class="<?php if ( ( get_userdata( intval( $author ) )->ID ) == '1' ) echo 'administrator';
      /* elseif ((get_userdata(intval($author))->ID) == '2') echo 'user-id-2'; */ /* sample */
      /* add additional user_id following above example, echo the 'CSS element' you want to use for styling */ ?>">
      <h2><?php _e( 'About ', 'groundfloor' ); ?><?php echo $curauth->display_name; ?></h2>
      <ul>
	<li><?php _e( 'Website', 'groundfloor' ); ?>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <?php _e('or', 'groundfloor'); ?> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php _e( 'email', 'groundfloor' ); ?></a></li>
        <li><?php _e( 'Biography', 'groundfloor' ); ?>: <?php echo $curauth->user_description; ?></li>
      </ul>
    </div> <!-- #author -->
    
    <h2><?php _e( 'Posts by ', 'groundfloor' ); ?><?php echo $curauth->display_name; ?>:</h2>
    
    <!-- start the Loop -->
    <?php if ( have_posts() ) : ?>
      <?php $count = 0; ?>
      <?php while ( have_posts() ) : the_post(); ?>
	<?php $count++; ?>
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'groundfloor' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	  <div class="post-details">
	    <?php _e( ' on ', 'groundfloor' ); the_time( get_option( 'date_format' ) ); ?>
	    <?php _e( 'with ', 'groundfloor' ); comments_popup_link( __( 'No Comments', 'groundfloor' ), __( '1 Comment', 'groundfloor' ), __( '% Comments', 'groundfloor' ), '', __( 'Comments Closed', 'groundfloor' ) ); ?>
	    <?php edit_post_link( __( 'Edit', 'groundfloor' ), __( '&#124; ', 'groundfloor' ), __( '', 'groundfloor' ) ); ?><br />
	    <?php _e( ' in ', 'groundfloor' );?><?php the_category( ', ' ) ?><br />
	    <?php the_tags( __( 'as ', 'groundfloor' ), ', ', '' ); ?><br />
	  </div> <!-- .post-details -->
	  <?php if ( $count == 1 ) : ?>
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
      <p><?php _e( 'Sorry, there are no posts by this author.', 'groundfloor' ); ?></p>
      <?php get_search_form(); ?>
    <?php endif; ?>
    <!-- end the Loop -->
  </div> <!-- #content -->
</div> <!-- #main-blog -->
<?php get_sidebar(); ?>
<?php get_footer();?>
<?php /* Last Revision: October 2, 2010 v1.6 */ ?>