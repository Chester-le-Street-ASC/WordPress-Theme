	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <main class="col-lg-8 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h1 class="m-t-0"><?php the_title(); ?></h1>

				<div class="entry clearfix"><?php the_content(); ?></div>

			  <?php comments_template(); ?>

			</div>
            
	  <?php endwhile; endif; ?>

        </main><!-- /.blog-main -->

	<div class="col-lg-4"><?php get_sidebar(); ?></div>

</div>
</div>

	<?php get_footer(); ?>