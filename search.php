<?php get_header(); ?>
<?php get_template_part('pageheader'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h1 class="entry"><?php _e('Search Results', 'chester'); ?></h1>
      <hr>
      <div id="search">
        <?php get_search_form(); ?>
      </div>
      <hr>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="cell">
        <h2>
          <a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_title(); ?>
          </a>
        </h2>

        <?php the_excerpt(); ?>
      </div>

	    <?php endwhile; else: ?>
	    <?php _e( '<p class="lead mb-0">Sorry. We didn&#39;t find anything for that.</p><p>Please try another search.</p>', 'wpboot' ); ?>
	    <?php endif; ?>

      <?php if ( function_exists('wp_bootstrap_pagination') ) wp_bootstrap_pagination(); ?>

      </div><!-- /.blog-main -->
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
