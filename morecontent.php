<div class="hidden-print">
        <h3>More from <?php bloginfo('name'); ?></h3>
        <p><a class="btn btn-default" data-parent="#collapse-more" role="button" data-toggle="collapse" href="#collapse-searchbox" aria-expanded="false" aria-controls="collapse-searchbox">
  Search
</a>
<a class="btn btn-default" data-parent="#collapse-more" role="button" data-toggle="collapse" href="#collapse-recentposts" aria-expanded="false" aria-controls="collapse-recentposts">
  Recent Posts
</a></p>
		<div id="collapse-more accordion-group">
        <div class="collapse" id="collapse-searchbox">
          <div class="cell">
            <?php get_search_form(); ?>
          </div>
        </div>
        <div class="collapse" id="collapse-recentposts">
          <div class="cell text-left">
          	<h3 class="sidebar-module-title">Recent News and Notices</h3>
            <ul><?php
	$args = array( 'numberposts' => '5' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	}
?></ul>
          </div>
        </div>
        </div>
</div>