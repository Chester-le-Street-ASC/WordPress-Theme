	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">

		<h1><?php _e( 'Oops... File or page not found.', 'wpboot' ); ?></h1>
		<p><?php _e( 'We have recently made changes to our website and the page you are looking for might have been deleted or moved. Please', 'wpboot' ); ?> <a href="<?php esc_url (home_url('/')); ?>"><?php _e( 'visit our home page instead', 'wpboot' ); ?></a>.</p>
		<p><?php _e( 'Sorry for the inconvenience', 'wpboot' ); ?>.</p>
        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>
</div>
</div>
	<?php get_footer(); ?>
