<?php
/**
 * The template for displaying lists of events
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
<?php get_template_part( 'pageheader' ); ?>

<main class="container">
  <div class="row">
    <div class="col-lg-8">
      <h1 class="mb-0 entry-title">
        <?php
          if ( eo_is_event_archive( 'day' ) ) {
          //Viewing date archive
            echo __( 'Galas: ','eventorganiser' ).' '.eo_get_event_archive_date( 'jS F Y' );
          } elseif ( eo_is_event_archive( 'month' ) ) {
          //Viewing month archive
            echo __( 'Galas: ','eventorganiser' ).' '.eo_get_event_archive_date( 'F Y' );
          } elseif ( eo_is_event_archive( 'year' ) ) {
          //Viewing year archive
            echo __( 'Galas: ','eventorganiser' ).' '.eo_get_event_archive_date( 'Y' );
          } else {
            _e( 'Galas', 'eventorganiser' );
          }
        ?>
      </h1>
      <hr>
      <?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
    </div>
    <div class="col-lg-4">
      <?php get_sidebar(); ?>
    </div>
	</div>
</main>
<?php get_footer();
