	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
      
      <!-- Page Content -->
      <div class="container">
      <div class="row">

        <div class="col-md-12">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h1 class="chesterRed"><?php the_title(); ?></h1>
                        
                        <hr>
                        <div class="row">
                        <div class="col-md-8">
                        <h3 class="chesterRed">Names</h3>
                        
                         <?php 
						global $wpdb;
						$wpdb->get_results( 'SELECT "FIRST", "LAST" FROM wp_galas_members');
						$limit = 4;
						   
						   // Open the table
							  echo '<div class="table-responsive"> <table class="table table-striped">';
							  echo '<thead><tr><th>First</th><th>Last</th></tr></thead>';
							  							  
						   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
								{
							  echo 	"<tr><td>{$row['FIRST']}</td>".
								 	"<td>{$row['LAST']}</td></tr>";
						   }
						   
						   // Close the table
							  echo "</table> </div>";
						   
						   implode('-', array_reverse(explode('-', $date)));
						   mysql_free_result($retval);
						   echo "Data: CLS ASC Database";
						   ?>
                         
                        </div>
                        <div class="col-md-4">
                        <h3 class="chesterRed">Important Information</h3>
                        <div class="well">
                        <ul>
                        <li>Half of the weekly scheme funds will be offered as prize money, up to a maximum of &pound;25.00 per week</li>
                        <li>The winning bonus ball number will be taken from each Saturday’s National Lottery Draw</li>
                        <li>Pay &pound;5 every 5 weeks</li>
                        </ul>
                        </div>
                        </div>
                        </div>
                        <hr>

				<div class="entry clearfix"><?php the_content(); ?></div>

			</div>
            
	  <?php endwhile; endif; ?>

        </div>

    </div>
    </div>
    <!-- Content ENDS -->

	<?php get_footer(); ?>