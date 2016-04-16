	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    
    <div class="container">
      <div class="row">

        <div class="col-md-8">
        
		<h1 class="chesterRed"><?php _e( 'Search Results', 'wpboot' ); ?></h1>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div class="well">
                <div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="blog-post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<?php the_excerpt(); ?>
			</div> </div>
	  <?php endwhile; else: ?>
		
	  <p><?php _e( 'Sorry. We didn&#39;t find anything.<br>Please try another keyword.', 'wpboot' ); ?></p>

	  <?php endif; ?>

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