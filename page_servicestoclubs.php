<?php /* Template Name: Services to CLubs */ ?>

<?php get_header(); ?>

<style>
.services-header {
	margin: -1rem 0 1rem 0;
	background: #e4f2ff;
	padding: 1rem 0;
}
.services-cell {
	margin: 0 0 1rem 0;
	background: #e4f2ff;
	padding: 1rem;
}
</style>

<div class="services-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-8">
				<a href="https://www.chesterlestreetasc.co.uk/servicestoclubs/">
					<img class="img-fluid"
					src="/wp-content/themes/chester/img/ServicesToClubs.svg" alt="Services
					to Clubs Logo" style="max-height:4rem;">
				</a>
			</div>
		</div>
	</div>
</div>

<!-- Page Content -->
<div class="container">
	<div class="row">
		<main class="col-md-12 col-lg-8 blog-main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry clearfix"><?php the_content(); ?></div>
			</div>
			<?php endwhile; endif; ?>
		</main>
		<aside class="col-lg-4 blog-sidebar d-print-none">
			<hr class="d-lg-none">
			<?php if ( ! dynamic_sidebar( 'servicestoclubs' ) ) : ?>

			<div id="search" class="sidebar-module"><?php get_search_form(); ?></div>

			<div id="categories" class="sidebar-module"><h4>Categories</h4>
				<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
			</div>

		    	<div id="archives" class="sidebar-modulet"><h4>Archives</h4>
				<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
			</div>

			<div id="subscribe" class="sidebar-mod3, ule"><h4>Subscribe</h4>
				<ul><li><a href="<?php bloginfo( 'rss2_url' ); ?>">Entries (RSS)</a></li><li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>">Comments (RSS)</a></li></ul>
			</div>

			<?php endif; ?>
		</aside>
	</div>
</div>
<!-- Content ENDS -->

	<?php get_footer(); ?>
