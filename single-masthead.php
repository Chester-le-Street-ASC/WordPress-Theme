	<?php /* WP Post Template: Detailed Post */ ?>
 
	<?php get_header(); ?>
    
    <div class="masthead">
    	<div class="container">
      		<div class="row">

        	<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                		
                        <!--<div class="masthead-post-title">-->
            			<h1 class="entry"><?php the_title(); ?></h1>
           			 	<p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?> - <?php the_category(', ');?></p>
                        <!--</div>-->
                        
                </div>

			</div>
         </div>
     </div>
     <div class="container">
    	<div class="row">
        	<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
     		<div class="blog-main">
            
			<?php if ( has_post_thumbnail()) : ?>
				<div class="post-thumb">
					  <?php the_post_thumbnail('big-thumb'); ?>
				</div>
			 <?php endif; ?>

				<div class="entry clearfix"><?php the_content(); ?></div>

				<?php wp_link_pages(); ?>
                				
		  		<?php comments_template(); ?>
			</div>
            
            <ul class="pager clearfix hidden-print">
					<li class="pull-left"><?php previous_post_link( '%link', '' . _x( '<i class="fa fa-chevron-left"></i>', 'Previous post link', 'wpboot' ) . ' Previous' ); ?></li>
					<li class="pull-right"><?php next_post_link( '%link', 'Next ' . _x( '<i class="fa fa-chevron-right"></i>', 'Next post link', 'wpboot' ) . '' ); ?></li>
			</ul>
	
	  <?php endwhile; endif; ?>


        </div><!-- /.col -->
        </div>
        <div class="row">
        <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 text-center">
        <hr>
		<?php get_template_part( 'morecontent' ); ?>
        </div>
        </div>

</div>
	<?php get_footer(); ?>