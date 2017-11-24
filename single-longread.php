<?php get_header(); ?>
<div class="masthead">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h1 class="entry entry-title"><?php the_title(); ?></h1>
          <p class="blog-post-meta mb-0"><?php the_time( 'F j, Y' ); ?> - <?php the_category(', ');?></p>
        </div>
      </div>
    </div>
 </div>
 <div class="container">
   <div class="row justify-content-center">
     <div class="col-lg-8 col-md-10">
       <div class="blog-main">
         <?php if ( has_post_thumbnail()) : ?>
           <div class="post-thumb">
             <?php the_post_thumbnail('big-thumb'); ?>
           </div>
           <?php endif; ?>
           <div class="entry clearfix">
             <?php the_content(); ?>
           </div>
           <aside class="d-print-none">
             <?php wp_link_pages(); ?>
             <p class="p-tags">
               <?php the_tags(); ?>
             </p>
				     <div class="cls-post-footer d-print-none">
               <?php get_template_part( 'sharing' ); ?>
             </div>
             <div class="cls-post-footer d-print-none">
              <h3 class="m-t-0">Other Recent Posts</h3>
              <ul class="cls-pager-parent row no-gutters clearfix">
                <li class="col">
                  <div class="cls-pager cls-pager-left">
                    <?php previous_post_link( '%link', '' . _x( '<i class="fa fa-chevron-left"></i>', 'Previous post link', 'chester' ) . ' Previous' ); ?>
                  </div>
                </li>
                <li class="col ml-auto">
                  <div class="cls-pager cls-pager-right">
                    <?php next_post_link( '%link', 'Next ' . _x( '<i class="fa fa-chevron-right"></i>', 'Next post link', 'chester' ) . '' ); ?>
                  </div>
                </li>
              </ul>
            </div>
            <?php comments_template(); ?>
          </aside>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8 col-sm-10 text-center">
    <hr>
    <?php get_template_part( 'morecontent' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
