	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    
    <div class="container">
      <div class="row">

        <div class="col-md-8">
        		
        <div class="panel panel-default">
        <div class="panel-heading"><h1 class="chesterRed search10"><?php _e( 'Search Results', 'wpboot' ); ?></h1></div>
        <ul class="list-group">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<a href="<?php the_permalink() ?>" rel="bookmark" class="list-group-item">
                <div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h3 class="search10"><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
                        
				</div> </a>
	  <?php endwhile; else: ?>
		
	  <li class="list-group-item lead"><?php _e( 'Sorry. We didn&#39;t find anything.<br>Please try another keyword.', 'wpboot' ); ?></li>

	  <?php endif; ?>
      
      </ul>
      </div>

	<ul class="pager clearfix">
		<li class="pull-left"><?php next_posts_link( __( '&larr; Older Posts', 'wpboot' ) ); ?></li>
		<li class="pull-right"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'wpboot' ) ); ?></li>
	</ul>

        </div><!-- /.blog-main -->	

	<?php get_sidebar(); ?>
    </div>
    <div class="row">
    	<div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="search">
        <hr>
            <div class="row hidden-print hidden-sm hidden-md hidden-lg marginTop">
                <div class="col-xs-12" id="search">
                    <?php get_search_form(); ?>
                </div>	
            </div>
		</div>
    </div>
    </div>
	<?php get_footer(); ?>