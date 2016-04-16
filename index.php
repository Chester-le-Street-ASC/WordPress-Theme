	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="well">
                <div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="blog-post-title chesterRed"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
           			 <p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?> - <?php the_category(', ');?></p>

			<?php if ( has_post_thumbnail()) : ?>
				<div class="post-thumb">
					   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						   <?php the_post_thumbnail('big-thumb'); ?>
					   </a>
				</div>
			 <?php endif; ?>
             
            <?php the_content( $more_link_text , $strip_teaser ); ?> 

				
			</div> </div>
	<?php endwhile; endif; ?>

	<?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>

	<!--<ul class="pager clearfix">
		<li class="pull-left"><?php next_posts_link( __( '&larr; Older Posts', 'wpboot' ) ); ?></li>
		<li class="pull-right"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'wpboot' ) ); ?></li>
	</ul>-->

        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>
</div>
</div>
	<?php get_footer(); ?>