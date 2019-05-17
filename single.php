<?php get_header(); ?>
  <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">
        <main class="col-lg-8">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="blog-main">
              <article id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
                <h1 class="entry entry-title"><?php the_title(); ?></h1>
                <p class="d-none mb-0" id="postAuthorDisplay">
                  <!--<i class="fa fa-fw fa-user-circle-o"></i> -->By
                  <span class="vcard author" rel="author" id="postAuthor">
                    <?php the_author(); ?>
                  </span>
                </p>
             		<p>
                  <time id="time" class="published blog-post-meta" datetime="<?php the_time( 'c' ); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <abbr title="<?php the_time( 'c' ); ?>"><span id="dtOut"><noscript><?php the_time( 'j F Y' ); ?></noscript></span></abbr></time>
                   -
                   <?php the_category(', ');?>
                </p>
              <hr>
              <?php if ( has_post_thumbnail()) : ?>
                <div class="post-thumb">
                  <?php the_post_thumbnail('big-thumb'); ?>
                </div>
                 <?php endif; ?>
                <div class="entry entry-content clearfix">
                  <?php the_content(); ?>
                </div>
              </article>
            </div>

            <aside class="d-print-none"><?php wp_link_pages(); ?>
              <p class="p-tags"><?php the_tags(); ?></p>
              <div class="cls-post-footer d-print-none">
                <?php get_template_part( 'sharing' ); ?>
              </div>
              <div class="cls-post-footer d-print-none">
                <h3 class="m-t-0">Other Recent Posts</h3>
                <ul class="cls-pager-parent row no-gutters clearfix">
                  <li class="col"><div class="cls-pager cls-pager-left"><?php previous_post_link( '%link', '' . _x( '<i class="fa fa-chevron-left"></i>', 'Previous post link', 'chester' ) . ' Previous' ); ?></div></li>
                  <li class="col ml-auto"><div class="cls-pager cls-pager-right"><?php next_post_link( '%link', 'Next ' . _x( '<i class="fa fa-chevron-right"></i>', 'Next post link', 'chester' ) . '' ); ?></div></li>
                </ul>
              </div>
              <?php comments_template(); ?>
            </aside>
            <?php endwhile; endif; ?>
        </main><!-- /.blog-main -->
      <div class="col-lg-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
