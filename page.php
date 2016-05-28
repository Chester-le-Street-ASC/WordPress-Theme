	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="chesterRed entry"><?php the_title(); ?></h2>

				<div class="entry clearfix"><?php the_content(); ?></div>

			  <?php comments_template(); ?>

			</div>
            
	  <?php endwhile; endif; ?>

        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>

</div>
</div>

	<?php get_footer(); ?>