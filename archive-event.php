<?php
/**
 * The template for displaying lists of events
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

<div class="container">
    <div class="row">
    	<div class="col-md-8">
            <!-- <div id="primary" role="main" class="content-area"> -->
            
                	<!-- Page header-->
                    <h1 class="chesterRed">
                    
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
            
					<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
            
            </div><!-- #primary -->
    
    		<!-- Call template sidebar and footer -->
			<?php get_sidebar(); ?>
		</div>
</div>
<?php get_footer();
