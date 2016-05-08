<?php
/**
 * The template for displaying an event-category page
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
    	<div class="col-md-8">

<div id="primary" role="main" class="content-area">

	<!-- Page header, display category title-->
		<h1 class="chesterRed entry">
			<?php printf( __( 'Gala Category: %s', 'eventorganiser' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
		</h1>
        
        <hr>

		<!-- If the category has a description display it-->
		<?php
		$category_description = category_description();
		if ( ! empty( $category_description ) ) {
			echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
		}
		?>

	<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
	
</div><!-- #primary -->
</div>

<!-- Call template sidebar and footer -->
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer();
