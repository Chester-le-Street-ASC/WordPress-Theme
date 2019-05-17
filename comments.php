<?php
/**
 * The template for displaying Comments.
 * Both Comment form and the comments themselves are generated
 * The form is simply the standard WordPress as described in the Codex reference: comment_form()
 *
 * @link http://codex.wordpress.org/Function_Reference/comment_form
 * @package chester
 */
?>

<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
  <h3 id="comments"><?php comments_number( 'No Comments', 'One Comment', '% Comments' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol id="commentlist">
	   <?php wp_list_comments('avatar_size=60'); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	   <nav id="comment-nav-below">
       <h3 class="screen-reader-text">
         <?php _e( 'Comment navigation', 'chester' ); ?>
       </h3>
       <div class="nav-previous">
         <?php previous_comments_link( __( '&laquo; Older Comments', 'chester' ) ); ?>
       </div>
			<div class="nav-next">
        <?php next_comments_link( __( 'Newer Comments &raquo;', 'chester' ) ); ?>
      </div>
		</nav>
	<?php endif; // check for comment navigation ?>

  <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

  <?php else : // comments are closed ?>
    <!-- If comments are closed. -->
	<p class="nocomments">
    <?php _e( '' ); ?>
  </p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>
