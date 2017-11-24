<?php get_header(); ?>
  <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">
        <main class="col-lg-8 blog-main">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
              <h1 class="entry entry-title"><?php the_title(); ?></h1>
           		<p>
                <span class="d-none">
                  <span class="vcard author" rel="author">
                    <?php the_author(); ?>
                  </span> -
                </span>
                <time class="published blog-post-meta" datetime="<?php the_time( 'c' ); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="dtOut"><noscript><?php the_time( 'j F Y' ); ?></noscript></span></time> - <?php the_category(', ');?>
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
            <script>
              var datetime = new Date((<?php the_time( 'U' ); ?>)*1000);
              console.log("DATETIME - " + datetime);
              var today = new Date();
              console.log("TODAY - " + today);
              // var today = today.getTime();
              // console.log("TODAY - " + today);
              var test = parseInt(today-datetime);
              console.log("TEST - " + test);
              var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

              if ( test < 60000 ) {
                var datetimeScreen = "Just Now";
              }
              else if ( test < 120000 ) {
                var datetimeScreen = "1 minute ago";
              }
              else if ( test < 3600000 ) {
                var datetimeScreen = parseInt(test/60000) + " minutes ago";
              }
              else if ( test < 7200000 ) {
                var datetimeScreen = "1 hour ago";
              }
              else if ( test < 86400000 ) {
                var datetimeScreen = parseInt(test/3600000) + " hours ago";
              }
              else if ( test < 172800000 && (today.getDate()-datetime.getDate() == 1) ) {
                var datetimeScreen = "1 day ago";
              }
              else if ( test < 604800000 || (today.getDate()-datetime.getDate() >= 1 && today.getDate()-datetime.getDate() <= 7) ) {
                var datetimeScreen = (today.getDate()-datetime.getDate()) + " days ago";
              }
              /* else if ( test < 604800000 ) {
                var datetimeScreen = parseInt(test/86400000) + " days ago";
              } */
              else {
                var datetimeScreen = datetime.getDate()+ " " + monthNames[datetime.getMonth()]+ " " + datetime.getFullYear();
              }
              var datetimeScreenOutput = document.getElementById('dtOut');
              datetimeScreenOutput.textContent = datetimeScreen;
            </script>
            <?php endwhile; endif; ?>
        </main><!-- /.blog-main -->
      <div class="col-lg-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
