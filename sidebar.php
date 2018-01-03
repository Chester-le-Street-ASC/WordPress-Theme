<!--<style>
.blog-sidebar {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: minmax(100px, auto);
  grid-column-gap: 20px;
}
</style>-->

<hr class="d-lg-none d-xl-none">

<div class="blog-sidebar d-print-none">

	<?php if ( ! dynamic_sidebar( 'primary' ) ) : ?>

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
</div>
