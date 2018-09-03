<?php get_header(); ?>
<!-- Fancy Top -->
<div class="topimage-halloffame d-print-none">
       <!-- Portfolio Item Heading -->
          	<div class="container-fluid">
            	<div class="center-block text-center" id="topimage-text">
            	    <img class="img-fluid center-block" src="<?php echo get_template_directory_uri();?>/img/stylish/halloffamelogo.png" srcset="<?php echo get_template_directory_uri();?>/img/stylish/halloffamelogo@2x.png 2x" alt="Hall of Fame Logo">
                 	<h1 style="margin-top:30px;" class="entry-title">The Home of Champions</h1>
                    <!--<a href="#content" class="btn btn-success btn-lg page-scroll d-none">Enter</a>-->
                    <a href="#content" style="color:#FFF"><i class="fa fa-3x fa-chevron-down" aria-hidden="true"></i></a>
                </div>
         	</div><!-- Container End -->
      </div><!-- Image End -->
    <!-- /.row -->
<!-- END -->
<!-- POST -->
<div class="container">
<div class="row">
<main class="col-md-12 blog-main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
<div class="entry clearfix"><?php the_content(); ?></div>
<?php comments_template(); ?>
</div>
<?php endwhile; endif; ?>
</main><!-- /.blog-main -->
</div>
</div>
<?php get_footer(); ?>