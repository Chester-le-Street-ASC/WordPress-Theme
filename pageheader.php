<header class="container">
  <!--<div class="row d-print-none" style="margin-top:0px">
    <div class="col-md-8">
	  <h1 class="mb-0">
      <a class="logo" alt="Chester-le-Street ASC" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a><span class="sr-only">"Chester&#8209;le&#8209;Street&nbsp;ASC</span>
    </h1>
	</div>
	<div class="col-md-4 d-none d-md-block">
	  <p class="slogan"><?php bloginfo( 'description' ); ?></p>
    <div class="rounded-bottom bg-primary p-2 text-white ml-auto d-inline float-right" style="margin-top:-1rem;">
      <p class="mb-0 d-inline"><span id="Membership-UserName">Login</span></p>
    </div>
	</div>
</div>-->

  <!--<div class="row d-print-none justify-content-md-center d-none d-md-flex">
	<div class="col-12 col-xl-10">
		<div class="burnsheader">
			<div class="row align-items-center justify-content-between">
				<div class="col">
					<img src="/wp-content/themes/chester/img/promotions/burnsLogo.png" srcset="/wp-content/themes/chester/img/promotions/burnsLogo@2x.png 2x, /wp-content/themes/chester/img/promotions/burnsLogo@3x.png 3x" class="img-fluid" style="margin-bottom:0.5rem" alt="Burns Meet 2019">
					<br>Information for the 2019 Burns Meet on 26 and 27 January 2019 is now available
				</div>
				<div class="col-4 text-center">
					<a class="btn btn-secondary" href="https://www.chesterlestreetasc.co.uk/competitions/galas/burns-meet-2019/" target="_blank">Burns Meet Details</a>
				</div>
				<div class="col-2">
					<img class="img-fluid float-right" src="/wp-content/themes/chester/img/promotions/clsdascLogo.png" srcset="/wp-content/themes/chester/img/promotions/clsdascLogo@2x.png 2x, /wp-content/themes/chester/img/promotions/clsdascLogo@3x.png 3x" alt="Chester-le-Street ASC Icon">
				</div>
			</div>
		</div>
	</div>
</div>-->

  <!--<style>.featureHeader{background:#005fbd;background-image:url("https://www.chesterlestreetasc.co.uk/wp-content/themes/chester/img/christmas.png");background-size:100% auto;padding:1rem;color:#fff;text-shadow: 1px 1px 1px rgba(0,0,0,.5);
  }
  .featureHeader h1 {font-family:'Lobster', cursive;font-weight: 400;}
.featureHeader a{color: #fff;font-weight: bold; text-decoration: underline;}
.featureHeader a:hover, .featureHeader a:active, .featureHeader a:focus {color: #fff; text-decoration: underline;}</style>
  <hr class="d-none d-md-block">
  <div class="row d-print-none justify-content-md-center d-none d-md-flex">
    <div class="col-12 col-xl-10">
      <div class="featureHeader">
        <div class="row align-items-center justify-content-between">
          <div class="col">
            <h1>Happy New Year from Chester-le-Street ASC</h1>
            <img src="/wp-content/themes/chester/img/promotions/merryChristmas.png" srcset="/wp-content/themes/chester/img/promotions/merryChristmas@2x.png 2x, /wp-content/themes/chester/img/promotions/merryChristmas@3x.png 3x" class="img-fluid" style="margin-bottom:0.5rem; margin-right:0.3rem;" alt="Merry Christmas from Chester-le-Street ASC">
            Get the <a class="" href="https://www.chesterlestreetasc.co.uk/2017/09/christmas-closures-2018/">Christmas Training Schedule</a> to make sure you're in the right place at the right time!
          </div>
          <div class="col-4 text-center">
            <a class="btn btn-secondary" href="https://www.chesterlestreetasc.co.uk/competitions/galas/burns-meet-2018/" target="_blank">Burns Meet Details</a>
          </div>
          <div class="col-2">
            <img class="img-fluid float-right" src="/wp-content/themes/chester/img/promotions/clsdascLogo.png" srcset="/wp-content/themes/chester/img/promotions/clsdascLogo@2x.png 2x, /wp-content/themes/chester/img/promotions/clsdascLogo@3x.png 3x" alt="Chester-le-Street ASC Icon">
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <div class="d-none d-print-block">
    <div class="row">
      <div class="col-6">
        <img class="img-fluid logo" src="<?php echo get_template_directory_uri();?>/img/chesterLogo.svg"  alt="Chester-le-Street ASC Logo">
      </div>
    </div>
    <hr>
  </div>
  <!--<hr>-->
    <!--[if !IE]><div class="alert alert-danger"><strong>Unsupported Browser</strong><br>You're using an unsupported browser and this website may not work properly with it. <a href="http://browsehappy.com/" class="alert-link" target="_blank">Upgrade your browser today <i class="fa fa-external-link" aria-hidden="true"></i> </a> or <a href="https://www.google.com/chrome/browser/desktop/index.html" class="alert-link" target="_blank">install Google Chrome <i class="fa fa-external-link" aria-hidden="true"></i> </a> to better experience this site.</p></div><hr><![endif]-->
    <noscript>
    <div class="alert alert-danger">
      <p class="mb-0"><strong>JavaScript is disabled or not supported</strong>
		  <br>
		  It looks like you've got JavaScript disabled or your browser does not support it. JavaScript is essential for our website to function properly, so we recommend you enable it or upgrade to a browser which supports it as soon as possible. <a href="http://browsehappy.com/" class="alert-link" target="_blank">Upgrade your browser today <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
    </div>
    <hr>
  </noscript>
</header>

<script>
function getName() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Membership-UserName").innerHTML = this.responseText;
    } else {
      console.log(this.responseText);
    }
  }
  //xmlhttp.open("POST", "https://account.chesterlestreetasc.co.uk/ajax/name", true);
  //xmlhttp.send();
}
getName();
</script>
