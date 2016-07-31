<?php get_header(); ?>
<!-- Fancy Top -->
<div class="topimage-halloffame hidden-print">
       <!-- Portfolio Item Heading -->
          	<div class="container">
            	<div class="center-block text-center" id="topimage-text">
            	    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri();?>/img/stylish/halloffamelogo.png" alt="Hall of Fame Logo">
                 	<h2 style="margin-top:30px;">The Home of Champions</h2>
                    <!--<a href="#content" class="btn btn-success btn-lg page-scroll hidden-xs">Enter</a>-->
                    <a href="#content" style="color:#FFF"><i class="fa fa-3x fa-chevron-down" aria-hidden="true"></i></a>
                </div>
         	</div><!-- Container End -->
      </div><!-- Image End -->
    <!-- /.row -->
<!-- END -->
<!-- POST -->
<div class="container-fluid">
<div class="row">
<div class="col-md-12 blog-main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
<div class="entry clearfix"><?php the_content(); ?></div>
<?php comments_template(); ?>
</div>
<?php endwhile; endif; ?>
</div><!-- /.blog-main -->
</div>
</div>
<?php get_footer(); ?>