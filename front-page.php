<?php get_header(); ?>

<!--<div class="homepage-masthead homepage-alert bg-primary d-print-none">
  <div class="container">
    <p class="h3">Chester-le-Street Junior Meet 2018</p>
    <p>Join us for our Junior Meet from 26 to 28 October, including 1500m, 800m, skins and more.</p>
    <a class="btn btn-dark" target="_blank" style="text-decoration:none" href="https://www.chesterlestreetasc.co.uk/competitions/galas/chester-le-street-junior-meet-2018/">
      Find out more
    </a>
  </div>
</div>-->

<div class="front-page">
  <!--[if !IE]>
  <div class="row"><div class="col-md-12"><hr><div class="alert alert-danger"><strong>Unsupported Browser</strong><br>You're using an unsupported browser and this website may not work properly with it. <a  href="http://browsehappy.com/" target="_blank">Upgrade your browser today</a> to better experience this site.</p></div><hr></div></div><![endif]-->
  <div class="container">
    <noscript>
      <div class="alert alert-danger">
        <p class=""><strong>JavaScript is disabled or not supported</strong>
  		  <br>
  		  It looks like you've got JavaScript disabled or your browser does not support it. JavaScript is essential for our website to function properly, so we recommend you enable it or upgrade to a browser which supports it as soon as possible. <a href="http://browsehappy.com/" class="alert-link" target="_blank">Upgrade your browser today <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
      </div>
    </noscript>
    <div class="row mb-4">
			<div class="col-md-9">
        <h1>Welcome to Chester&#8209;le&#8209;Street ASC</h1>
        <p class="lead">We're an Amateur Swimming Club offering the opportunity to participate in swimming as a competitive sport.</p>
        <p class="mb-0">Established in 1975, we've grown in size and stature over the years, boasting tremendously talented young athletes who have achieved significant success at the local, national and international level.</p>
			</div>
    </div>
    <div class="mb-4">
      <h2 class="mb-4">Latest News</h2>
      <div class="news-grid">
        <?php
        $args = [
        	'numberposts' => 6,
        	'offset' => 0,
        	'category' => 0,
        	'orderby' => 'post_date',
        	'order' => 'DESC',
        	'include' => '',
        	'exclude' => '',
        	'meta_key' => '',
        	'meta_value' =>'',
        	'post_type' => 'post',
        	'post_status' => 'publish',
        	'suppress_filters' => true
        ];
        /* post status, future, pending, private */
        $recent_posts = wp_get_recent_posts($args, ARRAY_A);
      	foreach($recent_posts as $recent) { ?>
      	<a href="<?=get_permalink($recent["ID"])?>">
          <span class="title"><?=$recent["post_title"]?></span>
          <span class="category"><?=get_the_category($recent["ID"])[0]->name?></span>
        </a>
      	<? }
      	wp_reset_query();
        ?>
			</div>
		</div>

    <div class="mb-4">
      <h2 class="mb-4">Upcoming Galas</h2>
      <div class="news-grid">
        <?php
        $events = eo_get_events([
				  'numberposts'       => 6,
				  'event_end_after'   => 'today',
          'group_events_by'   => 'series'
				]);
      	foreach($events as $event) {
          $format = (eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format'));
          ?>
      	<a href="<?=get_permalink($event->ID)?>">
          <div>
            <span class="title mb-0"><?=get_the_title($event->ID)?></span>
            <span class="d-flex mb-3"><?=eo_get_venue_name(eo_get_venue($event->ID))?></span>
          </div>
          <span class="category"><?=eo_get_the_start($format, $event->ID, null, $event->occurrence_id)?></span>
        </a>
      	<? }
      	wp_reset_query();
        ?>
			</div>
		</div>
  </div>
</div>

<!--<div class="container"><div class="row front-page-content"></div></div>-->
<style>.cls-global-footer-sponsors{margin-top:0}</style>
<?php get_footer(); ?>
