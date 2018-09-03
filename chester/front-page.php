<?php get_header(); ?>


<div class="homepage-masthead homepage-alert bg-primary d-print-none">
  <div class="container">
    <p class="h3">Chester-le-Street Junior Meet 2018</p>
    <p>Join us for our Junior Meet from 26 to 28 October, including 1500m, 800m, skins and more.</p>
    <a class="btn btn-dark" target="_blank" style="text-decoration:none" href="https://www.chesterlestreetasc.co.uk/competitions/galas/chester-le-street-junior-meet-2018/">
      Find out more
    </a>
  </div>
</div>

<div class="homepage-main">
  <!--[if !IE]>
  <div class="row"><div class="col-md-12"><hr><div class="alert alert-danger"><strong>Unsupported Browser</strong><br>You're using an unsupported browser and this website may not work properly with it. <a class="frontpage-link" href="http://browsehappy.com/" target="_blank">Upgrade your browser today</a> to better experience this site.</p></div><hr></div></div><![endif]-->
  <div class="frontpage1">
    <div class="container">
      <div class="header-content">
        <noscript>
          <div class="alert alert-danger">
            <p class="mb-0"><strong>JavaScript is disabled or not supported</strong>
      		  <br>
      		  It looks like you've got JavaScript disabled or your browser does not support it. JavaScript is essential for our website to function properly, so we recommend you enable it or upgrade to a browser which supports it as soon as possible. <a href="http://browsehappy.com/" class="alert-link" target="_blank">Upgrade your browser today <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
          </div>
        </noscript>
        <div class="row">
					<div class="col-md-7 front-page-drop-shadow">
            <div class="header-content-inner">
							<a class="logowhite" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
              <h1 class="text-hide"><span class="sr-only">"Welcome to Chester&#8209;le&#8209;Street&nbsp;ASC</span></h1>
              <p class="lead">We're an Amateur Swimming Club offering the opportunity to participate in swimming as a competitive sport.</p>
              <p>Established in 1975, we've grown in size and stature over the years, boasting tremendously talented young athletes who have achieved significant success at the local, national and international level.</p>
              <p>Why not <a class="frontpage-link" href="https://www.chesterlestreetasc.co.uk/members/#membership" target="_self">join us</a> for your journey through swimming?</p>
            </div>
					</div>
					<div class="col-md-5 col-lg-4 ml-md-auto">
            <div class="widget cell">
              <h2 class="h3">Latest News</h2>
              <ul class="mb-0">
                <?php
                $args = [
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
                	'post_status' => 'publish',
                	'suppress_filters' => true
                ];
                /* post status, future, pending, private */
                $recent_posts = wp_get_recent_posts($args, ARRAY_A);
              	foreach($recent_posts as $recent) {
              		echo '<li><a class="frontpage-link" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
              	}
              	wp_reset_query();
                ?>
							</ul>
						</div>
						<div class="widget cell mb-0">
							<h2 class="h3">Search our Site</h2>
							<form action="https://google.com/search" id="searchform" method="get">
                <input type="hidden" name="sitesearch" value="https://www.chesterlestreetasc.co.uk">
  							<label for="s" class="sr-only">Search</label>
  							<div class="input-group">
  								<input type="search" class="form-control" id="q" name="q" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?>>
  								<span class="input-group-btn">
  									<button type="submit" class="btn btn-light"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
  								</span>
  							</div> <!-- .input-group -->
							</form>
						</div>
          </div>
        </div>
      </div>
      <!--<div class="row row-flex row-flex-wrap">
        <div class="col-sm-4 col-xs-12">
          <div class="cell">
            <h3 class="m-t-0">Title</h3>
            <p>Blah</p>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="cell">
            <h3 class="m-t-0">Title</h3>
            <p>Blah</p>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="cell">
            <h3 class="m-t-0">Title</h3>
            <p>Blah</p>
          </div>
        </div>
      </div>-->
    </div>
	</div>
	<div class="frontpage-purple">
    <div class="container">
      <div class="row header-content align-items-center">
        <div class="col-md-7">
          <div class="header-content-inner">
            <h2 class="h1">Competitions and Events</h2>
            <p class="lead">We compete at many competitions across the county, region and country throughout the year.</p>
            <p>Competitions range from the smallest galas for our youngest swimmers, running all the way up to Nationals and British Championships for our oldest and fastest swimmers.</p>
            <p>Swimmers can compete in some galas from the age of eight, and most galas from the age of nine. All swimmers can take part in our annual Club Championships at Christmas.</p>
          </div>
        </div>
        <div class="col-md-5 col-lg-4 ml-md-auto">
          <div class="widget cell mb-0">
            <h3>Upcoming Competitions</h3>
						<?php
							 $events = eo_get_events(array(
								  'numberposts'=>8,
								  'event_end_after'=>'today',
                  'group_events_by'=>'series'
							 ));

							 if($events):
								  echo '<ul>';
								  foreach ($events as $event):
									   //Check if all day, set format accordingly
									   $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
									   printf(
											'<li><a class="frontpage-link" href="%s"> %s </a></li>',
											get_permalink($event->ID),
											get_the_title($event->ID),
											eo_get_the_start($format, $event->ID,null,$event->occurrence_id)
									   );
								  endforeach;
								  echo '</ul>';
							 endif;
						 ?>
					</div>
        </div>
      </div>
    </div>
	</div>
	<div class="frontpage-blue">
    <div class="container">
      <div class="row header-content align-items-center">
        <div class="col">
					<div class="header-content-inner">
						<h2 class="h1">New to Swimming and Galas?</h2>
						<p class="lead">We've got a fantastic guide for new parents and swimmers.</p>
						<p class="mb-0">If you don't know your <abbr title="Personal Bests">PBs</abbr> from your <abbr title="Disqualifications">DQs</abbr>, <a class="frontpage-link" href="https://www.chesterlestreetasc.co.uk/newtoswimming">we can help</a>.</p>
					</div>
				</div>
				<!--<div class="col-sm-4 col-sm-offset-1">
					<div class="widget cell m-b-0">
						<h3 class="m-t-0">Side Content Box</h3>
              <p>Vestibulum nec lobortis sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent pellentesque lacinia elit semper consequat. Donec dictum laoreet ex eget mattis.</p>
              <p>Nunc justo neque, scelerisque gravida porttitor vel, congue sed augue. Morbi fringilla at purus quis tristique. Duis volutpat iaculis libero, lacinia pharetra eros tincidunt et.</p>
					</div>
				</div>-->
      </div>
    </div>
	</div>
	<div class="frontpage-purple">
    <div class="container">
      <div class="row header-content align-items-center">
        <div class="col">
					<div class="header-content-inner">
						<h2 class="h1">Help and Support</h2>
						<p class="lead">We provide as much helpful information as possible to help you with our website and online systems.</p>
						<p class="mb-0">Visit our <a class="frontpage-link" href="https://www.chesterlestreetasc.co.uk/support">Online Help and Support Portal</a> for help.</p>
					</div>
				</div>
				<!--<div class="col-sm-4 col-sm-offset-1">
					<div class="widget cell m-b-0">
						<h3 class="m-t-0">Side Content Box</h3>
              <p>Vestibulum nec lobortis sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent pellentesque lacinia elit semper consequat. Donec dictum laoreet ex eget mattis.</p>
              <p>Nunc justo neque, scelerisque gravida porttitor vel, congue sed augue. Morbi fringilla at purus quis tristique. Duis volutpat iaculis libero, lacinia pharetra eros tincidunt et.</p>
					</div>
				</div>-->
      </div>
    </div>
	</div>
	<div class="frontpage-blue">
    <div class="container">
      <div class="row header-content align-items-center">
				<div class="col-md-6 col-lg-7">
					<div class="header-content-inner">
						<h2 class="h1">Follow us on Social Media</h2>
						<p class="lead">We're on Facebook, Twitter and Google Plus</p>
						<p>Following us on social media is a fantastic way to stay up to date with all the latest news and notices about changes to training, galas and more</p>
						<div class="row">
							<div class="col">
                <p><a class="btn btn-light btn-block" href="https://www.facebook.com/Chester-le-Street-ASC-349933305154137/"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></p>
              </div>
							<div class="col">
                <p><a class="btn btn-light btn-block" href="https://www.twitter.com/CLSASC"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></p>
              </div>
							<div class="col">
                <p><a class="btn btn-light btn-block" href="https://plus.google.com/110024389189196283575"><i class="fa fa-google-plus" aria-hidden="true"></i> Google Plus</a></p>
              </div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 ml-md-auto">
					<div class="widget cell mb-0">
						<h3>Tweets from Chester-le-Street ASC</h3>
            <div class="tweet-embed">
              <a class="twitter-timeline" data-link-color="#FFF"
              href="https://twitter.com/CLSASC" data-tweet-limit="1"
              data-theme="dark" data-show-replies="false" data-chrome="nofooter
              noborders noheader transparent" data-dnt="true">Tweets by CLSASC
              are loading. Tracking Protection in Private Browsing may mean we
              cannot display them.</a>
              <script async src="//platform.twitter.com/widgets.js"
              charset="utf-8"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--<div class="container"><div class="row front-page-content"></div></div>-->
<style>.cls-global-footer-sponsors{margin-top:0}</style>
<?php get_footer(); ?>