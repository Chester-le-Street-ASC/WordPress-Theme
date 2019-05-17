<?php get_header(); ?>
<?php get_template_part( 'pageheader' ); ?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-4 order-1 order-md-2">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Pages for Members</h4>
					<p class="card-text">Links to all pages relevant to members on our site.</p>
				</div>
				<div class="list-group list-group-flush">
					<a class="list-group-item" href="/committee" target="_self">Committee</a>
					<a class="list-group-item" href="#general">General Information</a>
					<a class="list-group-item" href="https://training.chesterlestreetasc.co.uk/" target="_self">Squads and Training Times</a>
					<a class="list-group-item" href="/members/newtoswimming" target="_self">Guide to Swimming</a>
					<a class="list-group-item" href="#membership">Join the Club</a>
					<a class="list-group-item" href="/members/fundraising" target="_self">Fundraising</a>
					<a class="list-group-item" href="/members/events" target="_self">Club Events</a>
					<a class="list-group-item" href="/members/welfare">Welfare</a>
					<a class="list-group-item" href="/members/welfare">Club Policies</a>
					<a class="list-group-item" href="/members/fees">Club and ASA Fees</a>
					<a class="list-group-item" href="/members/payments">Making Payments to the Club</a>
					<a class="list-group-item" href="/members/kit">Team Kit</a>
					<a class="list-group-item" href="/members/records#shortcourserankings">Short Course Rankings</a>
					<a class="list-group-item" href="/members/records#longcourserankings">Long Course Rankings</a>
					<a class="list-group-item" href="/members/records#alltime">All Time Short Course Records</a>
					<a class="list-group-item" href="/members/halloffame">Club Hall of Fame</a>
					<a class="list-group-item" href="/sections/club-gallery/">Club Gallery</a>
					<a class="list-group-item" href="/services/lostandfound/" target="_blank" rel="noopener noreferrer">Lost and Found Property</a>
					<a class="list-group-item" href="/members/links">Links to Related Sites</a>
					<a class="list-group-item" href="https://www.chesterlestreetasc.co.uk/guides" target="_blank">Off the Blocks Guides</a>
				</div>
			</div>
			<hr class="d-md-none">
		</div>
		<div class="col-12 col-md-8 order-2 order-md-1 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         	<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
           		<h1><?php the_title(); ?></h1>
				<div class="entry clearfix">
					<?php the_content(); ?>
				</div>
				
				<?php comments_template(); ?>

			</div>
            
		<?php endwhile; endif; ?>

        </div><!-- /.blog-main -->
	</div>
</div>
<?php get_footer(); ?>