<?php get_header(); ?>
<?php get_template_part( 'pageheader' ); ?>
<!-- Gala Special Page Flagship Content -->
<div class="flagship-content"><div class="container">
  <div class="row"><div class="col-md-8"><div class="row vertical-align"><div class="col-xs-12 col-sm-6"><img src="https://chesterlestreetasc.co.uk/wp-content/uploads/2016/08/juniorMeetLogoWhite.svg" class="img-fluid" style="max-width:300px;height:auto"></div><!--<div class="col-xs-3 col-sm-6"><a href="https://www.ukmail.com/" target="_blank"><img src="https://chesterlestreetasc.co.uk/wp-content/uploads/2016/09/UKMailGalaSponsor.png" srcset="https://chesterlestreetasc.co.uk/wp-content/uploads/2016/09/UKMailGalaSponsor@2x.png 2x, https://chesterlestreetasc.co.uk/wp-content/uploads/2016/09/UKMailGalaSponsor@3x.png 3x" class="img-fluid pull-right"></a></div>--></div><hr><p class="lead">Welcome to our 2016 Junior Meet</p>
<p><strong>Tweet about today</strong> Use #CLSJuniorMeet</p>
<!--<p class="lead"><i class="fa fa-wifi" aria-hidden="true"></i> Free WiFi: DCC Public - Password: XXXXXX</p>--></div>
  <div class="col-md-4"><div class="list-group list-group-flagship-content"><a href="https://www.chesterlestreetasc.co.uk/competitions/galas/cls2016/" class="list-group-item">Open 2016 Homepage</a><a href="https://www.chesterlestreetasc.co.uk/wp-content/uploads/2016/10/CLSJM-Programme-Final.pdf" class="list-group-item">Gala Programme</a><a href="https://www.chesterlestreetasc.co.uk/downloads/galas/juniormeet16" class="list-group-item">Live Results</a><a href="https://www.chesterlestreetasc.co.uk/wp-content/uploads/2016/06/CLS-Junior-Meet-Info-Pack-2016.pdf" class="list-group-item">Meet Information</a><a href="http://www.durham.gov.uk/clsleisurecentre" class="list-group-item">Pool Information <i class="fa fa-external-link" aria-hidden="true"></i></a></div></div></div>
</div></div>
<div class="container"><div class="row"><div class="col-xs-12"><hr></div></div></div>
<!-- END OF Gala Special Page Flagship Content -->
<div class="container">
<!-- Static Info -->
<main class="row row-flex row-flex-wrap flex-panel-group flex-panel-link-group">

<div class="col-sm-4 col-xs-12">
<a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://www.chesterlestreetasc.co.uk/galahome/parkingcharges/"><h3 class="entry">Car Parking Charges</h3><p>Find out about the current Car Parking Charges at CLS Leisure Centre</p>
<aside class="flex-panel-bottom-link chesterBlue"><i class="fa fa-2x fa-arrow-circle-right" aria-hidden="true"></i></aside></a>
</div>
          
<div class="col-sm-4 col-xs-12">
<a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://www.chesterlestreetasc.co.uk/galahome/galasponsors/"><h3 class="entry">Our Gala Sponsors</h3><p>Gala sponsors</p>
<aside class="flex-panel-bottom-link chesterBlue"><i class="fa fa-2x fa-arrow-circle-right" aria-hidden="true"></i></aside></a>
</div>

<div class="col-sm-4 col-xs-12">
<div class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link"><h3 class="entry">#CLSOpen</h3>
<!--<div class="tweet-embed center-block"><a class="twitter-timeline text-center" data-link-color="#005fbd" href="https://twitter.com/search?q=CLSOpen" data-widget-id="790642294030499840" data-tweet-limit="1" data-chrome="nofooter noborders noheader transparent">Loading Tweets<br>CLS ASC is not responsible for Tweet Content</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>-->
Twitter Content
<aside class="flex-panel-bottom-link chesterBlue fa-2x"><i class="fa fa-twitter" aria-hidden="true"></i></aside></div>
</div>
</div>

<div class="row"><div class="col-xs-12"><hr></div></div> <!-- STATIC ENDS -->

<div class="row"><main class="col-md-8"><?php if (have_posts()) : while (have_posts()) : the_post(); ?><div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>><div class="entry clearfix blog-main"><?php the_content(); ?></div><?php comments_template(); ?></div><?php endwhile; endif; ?> </main><!-- /.blog-main --><div class="col-md-4"><?php get_sidebar(); ?></div></div></div>

<div class="cls-global-footer cls-global-footer-body d-print-none" style="margin:21px 0 -21px 0;background-color:#e7e7e7"><div class="container">Our <strong>Normal Homepage</strong> will return on Monday 31 October
<!--<a class="btn btn-success pull-right" href="/galahome/aboutthispage">About this page</a>--><br><br class="d-block">
Spectator Gallery Capacity Limitations Apply - CLS ASC is not responsible for Twitter content on this page</div></div>
<?php get_footer(); ?>