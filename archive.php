	<?php get_header(); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8">

	<?php if (have_posts()) : ?>

		<h1 class="chesterRed">
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
		<?php if (is_category()) { ?>				
			<?php echo single_cat_title(); ?>
			
		<?php } elseif( is_tag() ) { ?>
			<?php _e( 'Posts Tagged:', 'wpboot' ); ?> <?php single_tag_title(); ?>
			
		<?php } elseif (is_day()) { ?>
			<?php _e( 'Archive for', 'wpboot' ); ?> <?php echo get_the_date(); ?>
			
		<?php } elseif (is_month()) { ?>
			<?php _e( 'Archive for', 'wpboot' ); ?> <?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'wpboot' ) ) ?>
			
		<?php } elseif (is_year()) { ?>
			<?php _e( 'Archive for', 'wpboot' ); ?> <?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'wpboot' ) ) ?>
			
		<?php } elseif (is_search()) { ?>
			<?php _e( 'Search Results', 'wpboot' ); ?>
			
		<?php } elseif (is_author()) { ?>
			<?php _e( 'Author Archive', 'wpboot' ); ?>
			
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<?php _e( 'Blog Archives', 'wpboot' ); ?>
			
		<?php } ?>

			</h1>

	<?php while (have_posts()) : the_post(); ?>
                
                <div class="well">
                <div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="blog-post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
           			 <p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?> - <?php the_category(', ');?></p>

				<?php the_excerpt(); ?>
			</div> </div>
	<?php endwhile; endif; ?>

	<ul class="pager clearfix">
		<li class="pull-left"><?php next_posts_link( __( '&larr; Older Posts', 'wpboot' ) ); ?></li>
		<li class="pull-right"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'wpboot' ) ); ?></li>
	</ul>

        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>
</div>
</div>
	<?php get_footer(); ?>