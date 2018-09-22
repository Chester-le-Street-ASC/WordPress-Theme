<?php
/*
Event Organiser META AREA (Top of Page)
 */
?>

<div class="eventorganiser-event-meta">

	<div class="row">
		<div class="col">

			<!-- Event details -->
			<h4><?php _e( 'About this gala', 'eventorganiser' ); ?></h4>

			<!-- Is event recurring or a single event -->
			<?php if ( eo_recurs() ) :?>
				<!-- Event recurs - is there a next occurrence? -->
				<?php $next = eo_get_next_occurrence( eo_get_event_datetime_format() );?>

				<?php if ( $next ) : ?>
					<!-- If the event is occurring again in the future, display the date -->
					<?php printf( '<p>' . __( 'This gala is running from %1$s until %2$s. It is also running on %3$s', 'eventorganiser' ) . '</p>', eo_get_schedule_start( 'j F Y' ), eo_get_schedule_last( 'j F Y' ), $next );?>

				<?php else : ?>
					<!-- Otherwise the event has finished (no more occurrences) -->
					<?php printf( '<p>' . __( 'This gala finished on %s', 'eventorganiser' ) . '</p>', eo_get_schedule_last( 'd F Y', '' ) );?>
				<?php endif; ?>
			<?php endif; ?>
			<ul class="list-unstyled">

				<?php if ( ! eo_recurs() ) { ?>
					<!-- Single event -->
					<li><strong><?php esc_html_e( 'Date', 'eventorganiser' );?>:</strong> <?php echo eo_format_event_occurrence();?></li>
				<?php } ?>

				<?php if ( eo_get_venue() ) {
					$tax = get_taxonomy( 'event-venue' ); ?>
					<li><strong><?php echo esc_html( $tax->labels->singular_name ) ?>:</strong> <a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></li>
				<?php } ?>

				<?php if ( get_the_terms( get_the_ID(), 'event-category' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-category' ) ) ) { ?>
					<li><strong><?php esc_html_e( 'Categories', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></li>
				<?php } ?>

				<?php if ( get_the_terms( get_the_ID(), 'event-tag' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-tag' ) ) ) { ?>
					<li><strong><?php esc_html_e( 'Tags', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(), 'event-tag', '', ', ', '' ); ?></li>
				<?php } ?>

				<?php if ( eo_recurs() ) {
						//Event recurs - display dates.
						$upcoming = new WP_Query(array(
							'post_type'         => 'event',
							'event_start_after' => 'today',
							'posts_per_page'    => -1,
							'event_series'      => get_the_ID(),
							'group_events_by'   => 'occurrence',
						));

						if ( $upcoming->have_posts() ) : ?>

							<li><strong><?php _e( 'The gala is running on', 'eventorganiser' ); ?>:</strong>
								<ul class="eo-upcoming-dates">
									<?php
									while ( $upcoming->have_posts() ) {
										$upcoming->the_post();
										echo '<li>' . eo_format_event_occurrence() . '</li>';
									};
									?>
								</ul>
							</li>

							<?php
							wp_reset_postdata();
							//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
							wp_enqueue_script( 'eo_front' );
							?>
						<?php endif; ?>
				<?php } ?>

				<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

			</ul>

      <? $address = eo_get_venue_address(eo_get_venue());
      if ($address) { ?>
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
      <? } ?>

      <span class="d-block d-sm-none mb-3"></span>
		</div>

		<!-- Does the event have a venue? -->
		<?php if ( eo_get_venue() && eo_venue_has_latlng( eo_get_venue() ) ) : ?>
			<!-- Display map -->
			<div class="col-sm-6">
				<?php echo eo_get_venue_map( eo_get_venue(), array( 'width' => '100%' ) ); ?>
			</div>
		<?php endif; ?>
	</div>

	<hr>

</div><!-- .entry-meta -->
