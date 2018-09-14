<?php
date_default_timezone_set('Europe/London');
$search_terms = htmlspecialchars($_GET["s"]);
$theme_dir = get_template_directory_uri();
?>
<!DOCTYPE html>
<!--
Copyright Chris Heppell & Chester-le-Street ASC 2017. Bootstrap CSS and
JavaScript is Copyright Twitter Inc, 2011-2017, jQuery v3.1.0 is Copyright
jQuery Foundation 2016
Designed by Chris Heppell, www.heppellit.com
Yes! We built this in house. Not many clubs do. We don't cheat.
-->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="CLS ASC">
    <meta name="format-detection" content="telephone=no">
    <? if (!getallheaders()['Dnt']) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-78812259-1', 'auto');
      ga('send', 'pageview');
    </script>
    <? } ?>
    <!--<script>var shiftWindow = function() { scrollBy(0, -100) }; if (location.hash) shiftWindow(); window.addEventListener("hashchange", shiftWindow);</script>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Merriweather:400,600" type="text/css">
    <link rel="stylesheet" href="<?=$theme_dir?>/css/chester-2.0.17.css" type="text/css">
    <link rel="stylesheet" href="<?=$theme_dir?>/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="apple-touch-icon" href="<?=$theme_dir?>/img/apple/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=$theme_dir?>/img/apple/apple-touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=$theme_dir?>/img/apple/apple-touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=$theme_dir?>/img/apple/img/apple/apple-touch-icon-ipad-retina.png">
    <link rel="mask-icon" href="<?=$theme_dir?>/img/apple/chesterIcon.svg" color="#bd0000">
    <meta name="application-name" content="Chester-le-Street ASC"/>
    <meta name="msapplication-square70x70logo" content="small.jpg"/>
    <meta name="msapplication-square150x150logo" content="medium.jpg"/>
    <meta name="msapplication-wide310x150logo" content="wide.jpg"/>
    <meta name="msapplication-square310x310logo" content="large.jpg"/>
    <meta name="msapplication-TileColor" content="#bd0000"/>
    <meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=5; cycle=1"/>
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

    <div class="sr-only sr-only-focusable">
      <a href="#maincontent">Skip to main content</a>
    </div>

    <div class="d-print-none">

      <div class="text-white py-2 top-bar bg-primary-dark" style="font-size:0.875rem;">
        <div class="container d-flex">
          <div class="mr-auto hide-a-underline">
            <span class="mr-2">
              <a href="https://www.twitter.com/CLSASC" target="_blank" class="text-white" title="Twitter">
                <i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
                <span class="sr-only">Chester-le-Street ASC on Twitter</span>
              </a>
            </span>

            <span class="mr-2">
              <a href="https://www.facebook.com/CLSASC" target="_blank" class="text-white" title="Facebook">
                <i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
                <span class="sr-only">Chester-le-Street ASC on Facebook</span>
              </a>
            </span>

            <span>
              <a href="https://plus.google.com/110024389189196283575" target="_blank" class="text-white" title="Google Plus">
                <i class="fa fa-google-plus fa-fw" aria-hidden="true"></i>
                <span class="sr-only">Chester-le-Street ASC on Google Plus</span>
              </a>
            </span>
          </div>

          <div class="ml-2 top-bar">
            <span>
              <a href="https://www.chesterlestreetasc.co.uk" class="text-white" title="Club Website">
                Website
              </a>
            </span>
          </div>

          <? if (isset($_COOKIE['CLSASC_AutoLogin'])) { ?>
          <div class="ml-2 top-bar">
            <span>
              <a href="https://account.chesterlestreetasc.co.uk" class="text-white" title="Your Club Membership Account">
                My Account
              </a>
            </span>
          </div>
          <? } else { ?>
          <div class="ml-2 top-bar">
            <span>
              <a href="https://account.chesterlestreetasc.co.uk" class="text-white" title="Sign in to your Club Membership Account">
                Sign in
              </a>
            </span>
          </div>
          <? } ?>

          <div class="ml-2 top-bar d-lg-none">
            <span>
              <a data-toggle="collapse" href="#mobSearch" role="button" aria-expanded="false" aria-controls="mobSearch" class="text-white" title="Search the site">
                Search
              </a>
            </span>
          </div>
        </div>
      </div>

      <div class="collapse <?if($search_terms!=""){echo "show";}?>" id="mobSearch">
        <div class="text-white py-3 d-lg-none bg-primary-darker">
          <form class="container" action="<?=esc_url(home_url('/'))?>" id="head-search" method="get">
            <label for="s" class="sr-only">Search</label>
            <div class="input-group">
              <input class="form-control bg-primary text-white border-primary" id="s" name="s" placeholder="Search the site" type="search" <?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?>>
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>
                  <span class="sr-only">
                    Search
                  </span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="text-white py-3 d-none d-lg-flex bg-primary-darker">
        <div class="container">
          <div class="row align-items-center">
            <div class="col">
              <a class="logowhite" href="<?=esc_url(home_url('/'))?>" title="Website Homepage"></a>
            </div>
            <div class="col d-none d-lg-flex">
              <!--<p class="lead mb-0 ml-auto text-right"><?bloginfo('description')?></p>-->
              <form class="ml-auto" action="<?=esc_url(home_url('/'))?>" id="head-search" method="get">
                <label for="s" class="sr-only">Search</label>
                <div class="input-group">
                  <input class="form-control bg-primary text-white border-primary" id="s" name="s" placeholder="Search the site" type="search" <?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?>>
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-search"></i>
                      <span class="sr-only">
                        Search
                      </span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-primary">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between mb-3 px-0">
            <a class="navbar-brand d-lg-none" href="<?php echo home_url(); ?>">
              <img src="https://account.chesterlestreetasc.co.uk/img/chesterIcon.svg" width="20" height="20"> <?php bloginfo('name'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#chesterNavbar" aria-controls="chesterNavbar" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <?php
              wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'chesterNavbar',
                'menu_class'        => 'nav navbar-nav mr-auto',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
              );
            ?>
          </nav>
        </div>
      </div>

    </div>

    <div id="maincontent"></div>
