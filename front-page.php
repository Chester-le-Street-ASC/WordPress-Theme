<?php get_header(); ?>
<div class="container">
<div class="row hidden-print" style="margin-top:0px">
<div class="col-sm-8"> <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><!--<img class="img-responsive logo" style="display: inline;" src="<?php echo get_template_directory_uri();?>/img/chesterLogo.svg"  alt="Chester-le-Street ASC Logo" />--></a>
</div><div class="col-sm-4 hidden-print hidden-xs"><p class="slogan" style="margin-bottom:0px;"><?php bloginfo( 'description' ); ?></p></div></div>
<div class="row visible-print-block" style="margin-top:-50px">
<div class="col-xs-12">
<img class="img-responsive logo" style="display: inline;" src="<?php echo get_template_directory_uri();?>/img/chesterLogo.svg"  alt="Chester-le-Street ASC Logo">
</div>
</div>
<div class="alert alert-warning alert-dismissible" role="alert" style="margin:15px 0 0 0">
  <button type="button" class="close alert-link" data-dismiss="alert" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
  <strong>Club email accounts are changing</strong> - Find out about the changes at our <a href="/support/email/" target="_self" title="Email Info" class="alert-link">help page</a>
</div>
<!--[if !IE]>        
<div class="row"><div class="col-md-12"><hr><div class="alert alert-danger"><strong>Unsupported Browser</strong><br>You're using an unsupported browser and this website may not work properly with it. <a class="alert-link" href="http://browsehappy.com/" target="_blank">Upgrade your browser today</a> or <a class="alert-link" href="https://www.google.com/chrome/browser/desktop/index.html" target="_blank">install Google Chrome</a> to better experience this site.</p></div><hr></div></div><![endif]-->
</div><div class="container-fluid"><div class="row hidden-print" style="margin-top:20px;"><img src="<?php echo get_template_directory_uri();?>/img/stylish/frontpageheader.jpg" alt="First slide image" class="center-block img-responsive">
<div class="visible-xs visible-sm"><div class="floating_introduction_container content_wrap"><div class="floating_introduction_content-mobile"><div class="container"><h3 class="entry">Welcome to Chester-le-Street ASC</h3><p>We're a local Amateur Swimming Club, offering the opportunity to participate in swimming as a competitive sport. Established in 1975, we've developed in size and stature over the years, boasting tremendously talented young athletes who have achieved significant success on the local, national and international level.</p></div></div></div></div>
<div class="hidden-xs hidden-sm"><div class="container"><div class="floating_introduction_container content_wrap"><div class="floating_introduction_content"><h3 class="entry">Welcome to Chester-le-Street ASC</h3><p>We're a local Amateur Swimming Club, offering the opportunity to participate in swimming as a competitive sport. Established in 1975, we've developed in size and stature over the years, boasting tremendously talented young athletes who have achieved significant success on the local, national and international level.</p></div></div></div></div></div></div>
<div class="container"><div class="row front-page-content"><div class="col-md-8 blog-main"><?php if (have_posts()) : while (have_posts()) : the_post(); ?><div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>><div class="entry clearfix"><?php the_content(); ?></div><?php comments_template(); ?></div><?php endwhile; endif; ?> </div><!-- /.blog-main --><div class="col-md-4"><?php get_sidebar(); ?></div></div></div><?php get_footer(); ?>