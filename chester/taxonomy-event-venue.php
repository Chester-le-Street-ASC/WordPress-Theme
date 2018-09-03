<?php
/**
 * The template for displaying the venue page
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

<div class="container">
	<div class="row">
  	<div class="col-lg-8">
      <div id="primary" role="main" class="content-area">

        <!-- Page header, display venue title-->

        <?php $venue_id = get_queried_object_id();
        $address = eo_get_venue_address($venue_id);

        ?>

        <h1>
          <?php printf( __( 'Galas at %s', 'eventorganiser' ), '<span>' .eo_get_venue_name( $venue_id ). '</span>' );?>
        </h1>

        <?php
        if ( $venue_description = eo_get_venue_description( $venue_id ) ) {
            echo '<div class="lead mb-0">'.$venue_description.'</div>';
        }
        ?>

        <address class="mb-0">
          <? if ($address['address']) {
            $addressLine = explode(",", $address['address']); ?>
          <strong>
            <? echo $addressLine[0]; ?><br>
          </strong>
          <? for ($i = 1; $i < sizeof($addressLine); $i++) {
            echo $addressLine[$i]; ?><br>
          <? } ?>
          <? } ?>
          <? if ($address['city']) { ?>
          <? echo $address['city']; ?><br>
          <? } ?>
          <? if ($address['postcode']) { ?>
          <? echo $address['postcode']; ?><br>
          <? } ?>
          <? if ($address['country']) { ?>
          <? // echo $address['country']; ?>
          <? } ?>
        </address>

        <hr>

        <!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
        <?php
        if ( eo_venue_has_latlng( $venue_id ) ) {
            echo eo_get_venue_map( $venue_id, array( 'width' => '100%' ) );
        }
        ?>

        <hr>

        <?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
      </div>
    </div><!-- #primary -->

    <!-- Call template sidebar and footer -->
    <div class="col-lg-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer();
