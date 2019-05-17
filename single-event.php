<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>
<?php get_template_part('pageheader'); ?>

<div class="container">

<!--<div id="primary">
<div id="content" role="main">-->

  <div class="row">
    <div class="col-lg-8">

    <?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Display event title -->
			<h1 class="mb-0 entry-title"><?php the_title(); ?></h1>

			<hr>

			<div class="entry-content">
				<!-- Get event information, see template: event-meta-event-single.php -->
				<?php eo_get_template_part( 'event-meta', 'event-single' ); ?>

				<!-- The content or the description of the event-->
				<?php the_content(); ?>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->

    <div class="cls-post-footer d-print-none">
      <?php get_template_part( 'sharing' ); ?>
    </div>

  	<?php endwhile; // end of the loop. ?>

    </div>
    <div class="col-lg-4"><?php get_sidebar(); ?></div>
  </div>
</div><!-- #content -->

<!-- Call template footer -->
<?php get_footer();
