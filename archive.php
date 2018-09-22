<?php get_header(); ?>
<?php get_template_part( 'pageheader' ); ?>
  <main class="container">
    <div class="row">
      <div class="col-lg-8 blog-main">

        <?php if (have_posts()) : ?>

  		<h1>

  		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

  		<?php if (is_category()) { ?>
  			<?php echo single_cat_title(); ?>

  		<?php } elseif( is_tag() ) { ?>
  			<?php _e( 'Posts Tagged:', 'chester' ); ?> <?php single_tag_title(); ?>

  		<?php } elseif (is_day()) { ?>
  			<?php _e( 'Posts from', 'chester' ); ?> <?php echo get_the_date(); ?>

  		<?php } elseif (is_month()) { ?>
  			<?php _e( 'Posts from', 'chester' ); ?> <?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'chester' ) ) ?>

  		<?php } elseif (is_year()) { ?>
  			<?php _e( 'Posts from', 'chester' ); ?> <?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'chester' ) ) ?>

  		<?php } elseif (is_search()) { ?>
  			<?php _e( 'Your Search Results', 'chester' ); ?>

  		<?php } elseif (is_author()) { ?>
  			<?php _e( 'Posts by Author', 'chester' ); ?>

  		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
  			<?php _e( 'Posts', 'chester' ); ?>

  		<?php } ?>

  			</h1>
  			<?php
  			the_archive_description('<div class="lead">', '</div>');
  			?>
        <hr>

        <?php while (have_posts()) : the_post(); ?>
          <div class="cell">
            <h2 class="blog-post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
           	<div class="blog-post-meta mb-2">
              <?php the_time( 'j F Y' ); ?> - <?php the_category(', ');?>
            </div>
            <?php the_excerpt(); ?>
				  </div>
	      <?php endwhile; endif; ?>

        <?php
	       if ( function_exists('wp_bootstrap_pagination') )
		       wp_bootstrap_pagination();
	      ?>

        </div>

      <div class="col-lg-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
