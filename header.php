<?php date_default_timezone_set('Europe/London'); ?>
<!DOCTYPE html>
<!-- 	Copyright Chris Heppell & Chester-le-Street ASC 2017. Bootstrap CSS and JavaScript is Copyright Twitter Inc, 2011-2017, jQuery v3.1.0 is Copyright jQuery Foundation 2016
		  Designed by Chris Heppell, www.heppellit.com
      Yes! We built this in house. Not many clubs do. We don't cheat.	-->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="CLS ASC">
    <meta name="format-detection" content="telephone=no">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-78812259-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script>var shiftWindow = function() { scrollBy(0, -100) }; if (location.hash) shiftWindow(); window.addEventListener("hashchange", shiftWindow);</script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" type="text/css">
    <link rel="stylesheet" href="https://www.chesterlestreetasc.co.uk/wp-content/themes/chester/css/chester-2.0.11.css" type="text/css">
    <link rel="stylesheet" href="https://www.chesterlestreetasc.co.uk/wp-content/themes/chester/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="apple-touch-icon" href="https://www.chesterlestreetasc.co.uk/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://www.chesterlestreetasc.co.uk/apple-touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://www.chesterlestreetasc.co.uk/apple-touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.chesterlestreetasc.co.uk/apple-touch-icon-ipad-retina.png">
    <link rel="mask-icon" href="https://www.chesterlestreetasc.co.uk/wp-content/themes/chester/img/chesterIcon.svg" color="#bd0000">
    <meta name="application-name" content="Chester-le-Street ASC"/>
    <meta name="msapplication-square70x70logo" content="small.jpg"/>
    <meta name="msapplication-square150x150logo" content="medium.jpg"/>
    <meta name="msapplication-wide310x150logo" content="wide.jpg"/>
    <meta name="msapplication-square310x310logo" content="large.jpg"/>
    <meta name="msapplication-TileColor" content="#bd0000"/>
    <meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=https://www.chesterlestreetasc.co.uk/feed/atom/&amp;id=5; cycle=1"/>
    <?php wp_head(); ?>
    <style>
      .burnsheader {
        background: #0288d1;
        color: #fff;
        padding: 1rem;
      }
    </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary justify-content-between">
      <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#chesterNavbar" aria-controls="chesterNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
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
      </div>
    </nav>
