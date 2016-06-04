	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="chesterRed entry"><?php the_title(); ?></h2>
           			 	<p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?> - <?php the_category(', ');?></p>

			<?php if ( has_post_thumbnail()) : ?>
				<div class="post-thumb">
					  <?php the_post_thumbnail('big-thumb'); ?>
				</div>
			 <?php endif; ?>

				<div class="entry clearfix"><?php the_content(); ?></div>

				<?php wp_link_pages(); ?>

				<p class="p-tags"><?php the_tags(); ?></p>
			
            <?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>
            
				<ul class="pager clearfix hidden-print">
					<li class="pull-left"><?php previous_post_link( '%link', '' . _x( '<i class="fa fa-chevron-left"></i>', 'Previous post link', 'wpboot' ) . ' Previous' ); ?></li>
					<li class="pull-right"><?php next_post_link( '%link', 'Next ' . _x( '<i class="fa fa-chevron-right"></i>', 'Next post link', 'wpboot' ) . '' ); ?></li>
				</ul>
				
		  		<?php comments_template(); ?>
			</div>
	
	  <?php endwhile; endif; ?>


        </div><!-- /.blog-main -->

	<div class="col-md-4"><?php get_sidebar(); ?></div>
</div>
</div>
	<?php get_footer(); ?>