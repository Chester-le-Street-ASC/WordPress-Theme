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

<?
$fp_img;
if (!isset($_COOKIE['CLSASC_AutoLogin']) && !isset($_COOKIE['CLSASC_UserInformation'])) {
  $fp_img = "front-page-image";
} ?>

<div class="front-page pt-0 <?=$fp_img?>">
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
  </div>
  <div class="bg-secondary">
    <div class="container">
      <div class="row mb-4 text-white">
  			<div class="col-md-9">

          <h1 class="mt-3">Welcome to our 2018 Junior Meet</h1>
          <p class="mb-0"><strong>Tweet about today</strong> Use #CLSJuniorMeet</p>

        </div>
      </div>

      <div class="row pb-4 mb-4">
        <div class="col">

          <div class="news-grid">
            <a href="/downloads/galas/juniormeet18/">
              <span class="title">Live Results</span>
              <span class="category text-secondary">SPORTSYSTEMS</span>
            </a>

            <a href="#">
              <span class="title">Programme of Events</span>
              <span class="category text-secondary"><abbr title="PDF Files may be harder to view on mobile phones">PDF</title></span>
            </a>

            <a href="/galahome/whats-on">
              <span class="title">What's on this weekend?</span>
              <span class="category text-secondary">Fundraising</span>
            </a>

            <a href="/galahome/parkingcharges">
              <span class="title">Parking at Chester-le-Street Leisure Centre</span>
              <span class="category text-secondary">Help and Support</span>
            </a>

            <a href="https://account.chesterlestreetasc.co.uk/timeconverter">
              <span class="title">Online Swim Time Converter</span>
              <span class="category text-secondary">Useful Tools from CLS ASC</span>
            </a>

            <a href="/competitions/galas/chester-le-street-junior-meet-2018/">
              <span class="title">Junior Meet Gala Page</span>
              <span class="category text-secondary">Galas</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="row mb-4">
			<div class="col-md-9">

        <? if (!isset($_COOKIE['CLSASC_AutoLogin']) && !isset($_COOKIE['CLSASC_UserInformation'])) { ?>
        <h1 class="">Welcome to Chester&#8209;le&#8209;Street ASC</h1>
        <p class="lead">We're an Amateur Swimming Club offering the opportunity to participate in swimming as a competitive sport.</p>
        <p>Established in 1975, we've grown in size and stature over the years, boasting tremendously talented young athletes who have achieved significant success at the local, national and international level.</p>
        <p class="mb-0">Why not <a href="https://www.chesterlestreetasc.co.uk/members/#membership" target="_self">join us</a> for your journey through swimming?</p>
        <? } else {
          if (isset($_COOKIE['CLSASC_UserInformation'])) {
            $user = json_decode(stripcslashes($_COOKIE['CLSASC_UserInformation']));
            $forename = $user->Forename;
            if (isset($_SESSION['CLSASC_UserInformation-Forename'])) {
              $forename = $_SESSION['CLSASC_UserInformation-Forename'];
            } else {
              $_SESSION['CLSASC_UserInformation-Forename'] = $forename;
            } ?>
            <h1 class="">Hello <?=htmlspecialchars($forename)?></h1>
            <p class="lead mb-0">Here's the latest from our club</p>
          <? } else { ?>
            <h1 class="">Welcome to Chester&#8209;le&#8209;Street ASC</h1>
            <p class="lead mb-0">Here's the latest from our club</p>
          <? }
        } ?>
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
          'group_events_by'   => 'series',
          'event-category'    => 'galas'
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

    <p class="mb-0">
      <strong>
        Chester-le-Street Junior Meet 2018
      </strong>
    </p>
    <p>
      Spectator Gallery Limitations Apply. Chester-le-Street ASC reserves the
      right to refuse entry or to withdraw the Live Results service at any time.
    </p>
  </div>
</div>

<!--<div class="container"><div class="row front-page-content"></div></div>-->
<style>.cls-global-footer-sponsors{margin-top:0}</style>
<?php get_footer(); ?>
