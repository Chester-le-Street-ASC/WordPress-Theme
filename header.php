<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-78812259-1', 'auto');
	  ga('require', 'linkid');
	  ga('send', 'pageview');
	
	</script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,400italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/font-awesome/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-ipad-retina.png">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri();?>/img/chesterIcon.svg" color="#bd0000">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no,maximum-scale=1">
    <meta name="apple-mobile-web-app-title" content="CLS ASC" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
    
    <!-- Stop Navbar Hiding Initial Conent when Using Anchors -->
    <script>var shiftWindow = function() { scrollBy(0, -50) };
	if (location.hash) shiftWindow();
	window.addEventListener("hashchange", shiftWindow);</script>
    
    <!-- ESSENTIAL: IE8 and Earlier Support -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
<header>

<nav class="navbar navbar-default navbar-fixed-top">  
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
            </a>
    </div>

		<?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-2',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
		</div>
	</nav>

</header>

<!--<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>-->