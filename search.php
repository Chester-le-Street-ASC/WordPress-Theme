	<?php get_header(); ?>
        <?php get_template_part( 'pageheader' ); ?>
    
    <div class="container">
      <div class="row">

	<div class="col-md-8 blog-main">
        <h2 class="chesterRed entry"><?php _e( 'Search Results', 'wpboot' ); ?></h2><hr>	
        <div id="search"><?php get_search_form(); ?></div><hr>
        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<a href="<?php the_permalink() ?>" rel="bookmark">
	<h3 class="search10"><?php the_title(); ?></h3></a>
	<?php the_excerpt(); ?>
	<hr>
                
	<?php endwhile; else: ?>	
	<?php _e( '<p class="lead">Sorry. We didn&#39;t find anything.<br>Please try another keyword.</p>', 'wpboot' ); ?>
	<?php endif; ?>
      
      <?php if ( function_exists('wp_bootstrap_pagination') ) wp_bootstrap_pagination(); ?>

        </div><!-- /.blog-main -->	
<div class="col-md-4"><?php get_sidebar(); ?></div></div></div>
	<?php get_footer(); ?>