	<?php /* Template Name: Default Template No Title*/ ?>
	<?php get_header(); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>

				<div class="entry clearfix"><?php the_content(); ?></div>

			  <?php comments_template(); ?>

			</div>
            
	  <?php endwhile; endif; ?>

        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>

</div>
</div>

	<?php get_footer(); ?>