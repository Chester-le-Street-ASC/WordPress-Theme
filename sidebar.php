<div class="col-md-4 blog-sidebar hidden-print">

	<hr class="hidden-md hidden-lg">
	
	<?php if ( ! dynamic_sidebar( 'primary' ) ) : ?>

		<div id="search" class="sidebar-module">
			<?php get_search_form(); ?>
		</div>	
    
	    <div id="categories" class="sidebar-module"><h4>Categories</h4>
			<ul>
				<?php wp_list_categories( 'title_li=' ); ?>
			</ul>
		</div>
		
    		<div id="archives" class="sidebar-modulet"><h4>Archives</h4>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>
		
		<div id="subscribe" class="sidebar-module"><h4>Subscribe</h4>
			<ul>
			   	<li><a href="<?php bloginfo( 'rss2_url' ); ?>">Entries (RSS)</a></li>
			 	<li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>">Comments (RSS)</a></li>
			</ul>
		
	<?php endif; ?>
    </div>