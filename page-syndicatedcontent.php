<?php

if ($_REQUEST['post'] == null && $_REQUEST['source'] != "swimengland") {
  header("Location: " . get_site_url());
}

$asa = "";
if ($asa = file_get_contents('https://www.swimming.org/sport/wp-json/wp/v2/posts/' . $_REQUEST['post'])) {
  $asa = json_decode($asa);
} else {
  header("Location: " . get_site_url());
}

$override_page_title = $asa->title->rendered;

//var_dump($asa);

get_header(); ?>
<div class="row d-none d-print-block" style="margin-top:-50px">
  <div class="col-xs-12">
    <img class="img-fluid logo center-block" style="display: block;" src="<?php echo get_template_directory_uri();?>/img/chesterLogo.svg"  alt="Chester-le-Street ASC Logo" />
  </div>
</div>

<?

$guidance = "Swim England News";

?>

<div class="container">
	<div class="row">
    <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
      <div class="h4 text-muted mb-3"><?=$guidance?></div>
      <div class="bg-primary text-white p-4 mb-4 d-inline-block">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="entry entry-title"><?=$asa->title->rendered?></h1>
        <time id="time" class="blog-post-meta mb-0" datetime="<?=date('c', strtotime($asa->date_gmt))?>">
          <i class="fa fa-clock-o" aria-hidden="true"></i> <span id="dtOut"><noscript><?=date('j F Y', strtotime($asa->date_gmt))?></noscript></span>
        </time>
      </div>
    </div>
  </div>
</div>

<style>
main img {
  margin-bottom: 1rem !important;
}
</style>
<div class="container">
	<div class="row justify-content-center">
   	<div class="col-lg-8 col-md-10">
   		<main class="blog-main">
        <div class="entry clearfix">
          <?=$asa->content->rendered?>
        </div>
      </main>
      <p class="mb-0 small text-muted">Syndicated Content &copy; Swim England</p>
      <?php endwhile; endif; ?>
    </div><!-- /.col -->
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8 col-sm-10 text-center">
      <hr>
      <?php get_template_part( 'morecontent' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
