<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="CLS ASC" />	<script>	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');	  ga('create', 'UA-78812259-1', 'auto');	  ga('require', 'linkid');	  ga('send', 'pageview');	</script>	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/font-awesome/css/font-awesome.min.css">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />	<link rel="apple-touch-icon" href="apple-touch-icon.png">    <link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-ipad.png">    <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-iphone-retina.png">    <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-ipad-retina.png">    <link rel="mask-icon" href="<?php echo get_template_directory_uri();?>/img/chesterIcon.svg" color="#bd0000">	<?php wp_head(); ?>
    
    <!-- Stop Navbar Hiding Initial Conent when Using Anchors -->
    <script>var shiftWindow = function() { scrollBy(0, -50) }; if (location.hash) shiftWindow(); window.addEventListener("hashchange", shiftWindow);</script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
<header>
<nav class="navbar navbar-dark navbar-fixed-top bg-primary">  
  <div class="container">
  <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
  </a>
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
    &#9776;
  </button>
   <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
    	<?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-toggleable-xs',
        		'container_id'      => 'exCollapsingNavbar2',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
		</div>
	</nav>
</header>