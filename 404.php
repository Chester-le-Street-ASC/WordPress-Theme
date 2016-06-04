	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">

		<h2 class="chesterRed entry"><?php _e( 'Oops... File or page not found.', 'wpboot' ); ?></h2>
		<p><?php _e( 'The page you are looking for either does not exist or might have been deleted or moved. Please', 'wpboot' ); ?> <a href="<?php esc_url (home_url('/')); ?>"><?php _e( 'visit our home page instead', 'wpboot' ); ?></a>.</p>
		<p><?php _e( 'Sorry for any inconvenience', 'wpboot' ); ?>.</p>
        <hr>
        <h3 class="chesterRed">Search for what you were looking for instead</h3>
        <?php get_search_form(); ?>
        </div><!-- /.blog-main -->

	<div class="col-md-4"><?php get_sidebar(); ?></div>
</div>
</div>
	<?php get_footer(); ?>
