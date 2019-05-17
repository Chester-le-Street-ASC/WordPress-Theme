<?php

get_header(); ?>

<?
$fp_img;
if (!isset($_COOKIE['CLSASC_AutoLogin']) && !isset($_COOKIE['CLSASC_UserInformation'])) {
  $fp_img = "front-page-image";
} ?>

<style>
.text-burns {
  color: #0288d1 !important;
}
</style>

<div class="front-page pt-0 mb-n3 <?=$fp_img?>">
  <!--[if !IE]>
  <div class="row"><div class="col-md-12"><hr><div class="alert alert-danger"><strong>Unsupported Browser</strong><br>You're using an unsupported browser and this website may not work properly with it. <a  href="http://browsehappy.com/" target="_blank">Upgrade your browser today</a> to better experience this site.</p></div><hr></div></div><![endif]-->
  <div class="" style="background:#0288d1">
    <div class="container">
      <div class="row mb-4 text-white">
  			<div class="col-md-9">

          <h1 class="mt-3 sr-only">Burns Meet 2019</h1>
          <img src="/wp-content/themes/chester/img/Burns2019Logo.svg" class="my-4 d-block" style="height:2.0rem;">
          <p class="mb-0"><strong>Tweet about today</strong> Use <a href="https://twitter.com/search?q=%23BurnsMeet" target="_blank" class="text-white">#BurnsMeet</a></p>

        </div>
      </div>

      <div class="row pb-4 mb-4">
        <div class="col">

          <div class="news-grid">
            <a target="_blank" href="https://www.burnsmeet.org.uk/2019">
              <span class="title"><span class="spinner-grow spinner-grow-sm live" aria-hidden="true"></span> Live Results</span>
              <span class="category text-burns">SPORTSYSTEMS</span>
            </a>

            <a href="/wp-content/uploads/2019/01/Burns-Meet-2019-Draft-Programme.pdf" target="_blank">
              <span class="title">Gala Programme</span>
              <span class="category text-burns"><abbr title="PDF Files may be harder to view on mobile phones">PDF</abbr></span>
            </a>

            <!--<a href="/competitions/galas/chester-le-street-junior-meet-2018/">
              <span class="title">Latest Results</span>
              <span class="category text-burns">Gala Results (<abbr title="PDF Files may be harder to view on mobile phones">PDF</abbr>)</span>
            </a>-->

            <a href="/wp-content/uploads/2018/06/2019-Burns-Meet-programme-of-events.pdf">
              <span class="title">Programme of Events</span>
              <span class="category text-burns">Galas</span>
            </a>

            <a href="https://www.siv.org.uk/page/ponds-forge">
              <span class="title">Ponds Forge ISC Website</span>
              <span class="category text-burns">Help and Support</span>
            </a>

            <a href="https://membership.chesterlestreetasc.co.uk/timeconverter">
              <span class="title">Online Swim Time Converter</span>
              <span class="category text-burns">Convert between short course and long course</span>
            </a>

            <a href="https://www.burnsmeet.org.uk/">
              <span class="title">Burns Meet Website</span>
              <span class="category text-burns">Galas</span>
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
      	<a href="<?=get_permalink($recent["ID"])?>" title="<?=$recent["post_title"]?>">
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
          $format = (eo_is_all_day($event->ID) ? 'j F' :  'H:i, j F');
          ?>
      	<a href="<?=get_permalink($event->ID)?>" title="<?=get_the_title($event->ID)?>, <?=eo_get_venue_name(eo_get_venue($event->ID))?>">
          <div>
            <span class="title mb-0"><?=get_the_title($event->ID)?></span>
            <span class="d-flex mb-3"><?=eo_get_venue_name(eo_get_venue($event->ID))?></span>
          </div>
          <?
          $output = "";
          $start = eo_get_the_start($format, $event->ID, null, $event->occurrence_id);
          $end = eo_get_the_end($format, $event->ID, null, $event->occurrence_id);
          if ($start != $end) {
            $output = $start . " to " . $end;
          } else {
            $output = $start;
          } ?>
          <span class="category"><?=$output?></span>
        </a>
      	<? }
      	wp_reset_query();
        ?>
			</div>
		</div>

    <? if ($asa != null && $asa != "") { ?>
    <div class="mb-4">
      <h2 class="mb-4">Swim England News</h2>
      <div class="news-grid">
        <?
        $site = get_site_url();
        $max_posts = 6;
        if (sizeof($asa) < $max_posts) {
          $max_posts = sizeof($asa);
        }
        for ($i = 0; $i < $max_posts; $i++) { ?>
  			<a href="<?=$asa[$i]->link?>" target="_blank" title="<?=$asa[$i]->title->rendered?>">
  				<span class="mb-3">
            <span class="title mb-0">
  						<?=$asa[$i]->title->rendered?>
  					</span>
  				</span>
          <span class="category">
  					News
  				</span>
        </a>
        <? } ?>
  		</div>
  	</div>
    <? } ?>

    <?php if ($asa_ne != null) { ?>
    <div class="mb-4">
      <h2 class="mb-4">Swim England North East News</h2>
      <div class="news-grid">
        <?
        $max_posts = 6;
        if (sizeof($asa_ne->channel->item) < $max_posts) {
          $max_posts = sizeof($asa_ne->channel->item);
        }
        for ($i = 0; $i < $max_posts; $i++) { ?>
  			<a href="<?=$asa_ne->channel->item[$i]->link?>" target="_blank" title="<?=$asa_ne->channel->item[$i]->title?> (<?=$asa_ne->channel->item[$i]->category?>)">
  				<span class="mb-3">
            <span class="title mb-0">
  						<?=$asa_ne->channel->item[$i]->title?>
  					</span>
  				</span>
          <span class="category">
  					<?=$asa_ne->channel->item[$i]->category?>
  				</span>
        </a>
        <?php } ?>
  		</div>
  	</div>
    <?php } ?>

    <div class="mb-4">
      <h2 class="mb-4">Help and Support</h2>
      <div class="news-grid">
        <a href="https://www.chesterlestreetasc.co.uk/support/website/">
          <span class="mb-3">
            <span class="title mb-0">
              Website Help
            </span>
          </span>
          <span class="category">
            Support
          </span>
        </a>
        <a href="https://www.chesterlestreetasc.co.uk/support/onlinemembership/">
          <span class="mb-3">
            <span class="title mb-0">
              Online Membership Help
            </span>
          </span>
          <span class="category">
            Support
          </span>
        </a>
        <a href="https://www.chesterlestreetasc.co.uk/support/">
          <span class="mb-3">
            <span class="title mb-0">
              More Help and Support
            </span>
          </span>
          <span class="category">
            Support
          </span>
        </a>
      </div>
    </div>

    <div class="mb-4">
      <h2>Protecting your personal data</h2>
      <div class="bg-warning p-3 mb-3">
        <p>
          The Government has <a class="text-dark font-weight-bold"
          href="https://www.gov.uk/government/publications/data-protection-if-theres-no-brexit-deal/data-protection-if-theres-no-brexit-deal"
          target="_blank">published a Technical Notice on data protection if there’s
          no Brexit deal</a> which states that we will continue to be able to store
          your personal data in the European Economic Area as required under the
          General Data Protection Regulation. The club currently stores member data
          on servers within the EEA, but not always within the United Kingdom.
        </p>
        <p class="mb-0">
          Chester-le-Street ASC will continue to follow advice from the Government
          and will update members if the situation changes.
        </p>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
