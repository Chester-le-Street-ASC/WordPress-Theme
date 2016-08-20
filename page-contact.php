	<?php
	 
	  //response generation function
	  $response = "";
	 
	  //function to generate response
	  function my_contact_form_generate_response($type, $message){
	 
		global $response;
	 
		if($type == "success") $response = "<div class='alert alert-success'>{$message}</div>";
		else $response = "<div class='alert alert-warning'>{$message}</div>";
	 
	  }
	  
	  //response messages
		$not_human       = "Someone can't add up. It wasn't us though.";
		$missing_content = "Please fill out ALL of the boxes.";
		$email_invalid   = "That is not  valid Email Address.";
		$message_unsent  = "Your message was not sent due to an Error on our side. Please Try Again.<br>If the problem persists, please try again later.";
		$message_sent    = "Great! Your message has been sent to the relevant person.";
		 
		//user posted variables
		$name = $_POST['message_name'];
		$email = $_POST['message_email'];
		$radioselect = $_POST['inlineRadioOptions'];
		$message = $_POST['message_text'];
		$human = $_POST['message_human'];
		 
		//php mailer variables
		$to = "chesterlestreetasc@gmail.com" . ', ';
		$to .= $email;
		$subject = "Contact: ". $radioselect . " - From: " . $email . "\r\n";
		$headers = 'From: '. $email . "\r\n" .
		  'Reply-To: ' . $email . "\r\n";
		  
		if(!$human == 0){
		  if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
		  else {
		 
			//validate email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			  my_contact_form_generate_response("error", $email_invalid);
			else //email is valid
			{
			
			//validate presence of name and message
			if(empty($name) || empty($radioselect) || empty($message)){
			  my_contact_form_generate_response("error", $missing_content);
			}
			else //ready to go!
			{
			  
			$sent = wp_mail($to, $subject, strip_tags($name . "\r\n" . $email . "\r\n" . $radioselect . "\r\n\r\n" . $message), $headers);
			if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
			else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

			}
			
			}

		  }
		}
		else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

  
	?>
	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
      
      <!-- Page Content -->
      <div class="container">
      <div class="row">

        <div class="col-md-12 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h2 class="entry chesterRed"><?php the_title(); ?></h2>

						<div class="entry clearfix"><?php the_content(); ?></div>
                        
                        <hr>
                        
                        <div id="respond">
						  <?php echo $response; ?>
                          <form action="<?php the_permalink(); ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="message_name" placeholder="Your Name" value="<?php echo esc_attr($_POST['message_name']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="message_email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="message_email" placeholder="Your Email Address" value="<?php echo esc_attr($_POST['message_email']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="radio-inline" class="col-sm-2 control-label">Subject:</label>
                            <div class="col-md-10">
                            <label class="radio-inline">
                              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Galas"> Galas
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Membership Enquiries"> Membership
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Other Enquiries"> Other
                            </label>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="message_text" class="col-sm-2 control-label">Message:</label>
                            <div class="col-sm-10"><textarea type="text" class="form-control" name="message_text" placeholder="Go on and Talk" rows="6"><?php echo esc_textarea($_POST['message_text']); ?></textarea></div>
                            </div>
                            
                            <div class="form-group hidden">
                            <label for="message_human" class="col-sm-2 control-label">Are you Human?</label>
                            <div class="col-sm-10">
                            <div class="input-group">
                            <input type="text hidden" class="form-control" name="message_human" placeholder="Hint - The Answer is 2" value="2"><span class="input-group-addon"> + 3 = 5</span>
                            </div>
                            </div>
                            </div>
                            
                            <input type="hidden" name="submitted" value="1">
                            
                            <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-success " type="submit">Submit</button>
                            </div>
                            </div>
                            
                          </form>
                       </div>

				</div>
            
	  <?php endwhile; endif; ?>

        </div>

    </div>
    </div>
    <!-- Content ENDS -->

	<?php get_footer(); ?>