<div class="d-print-none">
        <h3>More from Chester&#8209;le&#8209;Street&nbsp;ASC</h3>
        <p><a class="btn btn-light" data-parent="#collapse-more" role="button" data-toggle="collapse" href="#collapse-searchbox" aria-expanded="false" aria-controls="collapse-searchbox">
  Search
</a>
<a class="btn btn-light" data-parent="#collapse-more" role="button" data-toggle="collapse" href="#collapse-recentposts" aria-expanded="false" aria-controls="collapse-recentposts">
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
            <ul class="mb-0">
              <?php
              $args = array(
                'numberposts' => 5,
                'offset' => 0,
                'category' => 0,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'include' => '',
                'exclude' => '',
                'meta_key' => '',
                'meta_value' =>'',
                'post_type' => 'post',
                'post_status' => 'publish, future, pending, private',
                'suppress_filters' => true
              );

              $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
                foreach( $recent_posts as $recent ){
                  echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                }
                wp_reset_query();
              ?>
            </ul>
          </div>
        </div>
        </div>
</div>
