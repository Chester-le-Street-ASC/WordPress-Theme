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
                        <h3 class="chesterRed">Latest Balls</h3>
                        
                        <!-- 	THE LATEST BALLS SYSTEM REQUIRES MYSQL, PHP AND PHPMYADMIN AS DATA IS DYNAMICALLY SOURCED FROM THE WORDPRESS SQL DATABASE.
                        		IF THERE IS NO CONNECTION, THE SYSTEM WILL NOT BE UP TO DATE AND NO DATA WILL BE RETREIVED.
                                SYSTEM SHOWS THE LATEST 4 BALLS ONLY. THIS CAN BE CHANGED BY EDITING THE PHP SCRIPT FOR THIS TEMPLATE. 	-->
                        
                        <p><?php $wpdb->get_results( 'SELECT * FROM `wp_bonusball`');
						
						while($row = mysqli_fetch_array($wpdb))
						  {
						  echo $row['Date'] . " " . $row['Ball']; //these are the fields that you have stored in your database table wp_bonusball
						  echo "<br />";
						  }
						
						?> </p>
                        <?php 
							$dbhost = 'localhost:3306';
						   $dbuser = 'bn_wordpress';
						   $dbpass = 'f799229c46';
						   
						   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
						
							if(! $conn ) {
							  die('Could not connect: ' . mysql_error());
						   }
						   
						   $limit = 4;      
						   $sql = 'SELECT Date, Ball FROM wp_bonusball '
							. 'ORDER BY `wp_bonusball`.`Date` DESC '
							. 'LIMIT 4';
						   mysql_select_db('bitnami_wordpress');
						   $retval = mysql_query( $sql, $conn );
						   						   
						   if(! $retval ) {
							  die('Could not get data: ' . mysql_error());
						   }
						   
						   // Open the table
							  echo '<div class="table-responsive"> <table class="table table-striped">';
							  echo '<thead><tr><th>Date</th><th>Bonus Ball</th></tr></thead>';
							  							  
						   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
								{
							  echo 	"<tr><td>{$row['Date']}</td>".
								 	"<td>{$row['Ball']}</td></tr>";
						   }
						   
						   // Close the table
							  echo "</table> </div>";
						   
						   implode('-', array_reverse(explode('-', $date)));
						   mysql_free_result($retval);
						   echo "Data: National Lottery";
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