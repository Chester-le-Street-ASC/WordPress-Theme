	<?php get_header(); ?>
    
    <!-- USE 1920x400 px IMAGES FOR THE SLIDER -->
    <div id="carousel1" class="carousel slide hidden-xs" data-ride="carousel" style="margin-top:-20px;">
      <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active"><img src="<?php echo get_template_directory_uri();?>/img/slider/slider1.jpg" alt="First slide image" class="center-block">
          <div class="carousel-caption">
            <h3>Chester-le-Street ASC</h3>
            <p>with swimmers who have represented Great Britain</p>
          </div>
        </div>
        <div class="item"><img src="https://placehold.it/1920x400.jpg" alt="Second slide image" class="center-block">
          <div class="carousel-caption">
            <h3>Second slide Heading</h3>
            <p>Second slide Caption</p>
          </div>
        </div>
        <div class="item"><img src="<?php echo get_template_directory_uri();?>/img/slider/slider3.jpg" alt="Third slide image" class="center-block">
          <div class="carousel-caption">
            <h3>Join Us</h3>
            <p>Third slide Caption</p>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
      
          <div class="hidden-xs" style="margin-top:25px">
		  <?php get_template_part( 'pageheader' ); ?>
          </div>
          
          <div class="hidden-sm hidden-md hidden-lg">
		  <?php get_template_part( 'pageheader' ); ?>
          </div>

    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>

				<div class="entry clearfix"><?php the_content(); ?></div>

			  <?php comments_template(); ?>

			</div>
            
	  <?php endwhile; endif; ?>

        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>

</div>
</div>

	<?php get_footer(); ?>