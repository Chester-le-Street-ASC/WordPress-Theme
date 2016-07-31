    <?php
	// if using a custom function, you need this
	// require_once('../../../wp-config.php');
	global $wpdb;
	
	$wpdb->insert( 'wp_galas_members', array( 'FIRST' => $_POST['first'], 'ASA_REG' => $_POST['asa_number'], 'EMAIL' => $_POST['email'], 'DOB' => $_POST['date_birth'], 'LAST' => $_POST['last'], ), array( '%s', '%d' ) )
	
	?>
	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
      
      <!-- Page Content -->
      <div class="container">
      <div class="row">

        <div class="col-md-12">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="entry chesterRed">2<?php the_title(); ?></h2>

						<div class="entry clearfix"><?php the_content(); ?></div>
                        
                        <hr>
                        
                        <div id="respond">
						  <?php echo $response; ?>
                          <form action="<?php the_permalink(); ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                            <label for="first" class="col-sm-2 control-label">First Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="first" placeholder="First Name"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="last" class="col-sm-2 control-label">Last Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="last" placeholder="Last Name"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="asa_number" class="col-sm-2 control-label">ASA Number:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="asa_number" placeholder="eg 123456"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email" placeholder="name@example.com"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="date_birth" class="col-sm-2 control-label">Date of Birth:</label>
                            <div class="col-sm-10"><input type="date" class="form-control" name="date_birth" placeholder="Swimmer's Date of Birth"></div>
                            </div>
                                                        
                            <input type="hidden" name="submitted" value="1">
                            
                            <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-success " type="submit">Submit</button>
                            </div>
                            </div>
                            
                          </form>
                       </div>
                       
                       <hr>
                       <p>You will recieve a copy of your entry as proof your entry has been submitted. Please retain it for your records.<br>
                       Please however be aware that the Proof is not a receipt and does not guarantee entry to a gala. It is up to you to check the accepted entries for the gala, when they are released.</p>

				</div>
            
	  <?php endwhile; endif; ?>

        </div>

    </div>
    </div>
    <!-- Content ENDS -->

	<?php get_footer(); ?>