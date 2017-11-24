<?php
/**
 * A single event in a events loop. Used by eo-loop-single-event.php
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory.
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>

<div class="cell">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://data-vocabulary.org/Event">
		<h2><a href="<?php the_permalink(); ?>" itemprop="url"><span itemprop="summary"><?php the_title() ?></span></a></h2>

		<ul class="mb-0"><li><strong>Date:</strong> <?php echo eo_format_event_occurrence(); ?></li></ul>

		<?php
		//A list of event details: venue, categories, tags.
		echo eo_get_event_meta_list();
		?>

		<div class="row">
			<div class="col">
				<a class="btn btn-primary btn-block" href="<?php the_permalink(); ?>">More Information</a>
			</div>
			<div class="col d-none d-sm-block">
				<?php $url = eo_get_add_to_google_link(); echo '<a class="btn btn-dark btn-block" href="'.esc_url($url).'" target="_blank"> Add to Google Calendar</a>'; ?>
			</div>
		</div>

		<!-- Show Event text as 'the_excerpt' or 'the_content' -->
		<!--<?php the_excerpt(); ?>-->
	</article>
</div>
