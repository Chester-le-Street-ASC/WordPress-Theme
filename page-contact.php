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
		$not_human       = "Someone can't add up. It wasn't us though.";		$missing_content = "Please fill out ALL of the boxes.";		$email_invalid   = "Invalid email address.";		$message_unsent  = "Your message was not sent due to an Server Error on our side. Please Try Again.<br>If the problem persists, please try again later or send us an email.";		$message_sent    = "Great! Your message has been sent to us.";		 
		//user posted variables
		$name = $_POST['message_name'];
		$email = $_POST['message_email'];
		$radioselect = $_POST['inlineRadioOptions'];
		$message = $_POST['message_text'];
		$human = $_POST['message_human'];
		
		//php mailer variables
		$subject = $radioselect . " - From: " . $name . "\r\n";
		if($radioselect == "Galas") $headers = array('From: ' . $name . ' <noreply@chesterlestreetasc.co.uk>', 'To: Gala Coordinator <galas@chesterlestreetasc.co.uk>', 'CC: ' . $name . ' <' . $email . '>', 'Reply-To:  ' . $name . ' <' . $email . '>');
		if($radioselect == "Membership Enquiries") $headers = array('From: ' . $name . ' <noreply@chesterlestreetasc.co.uk>', 'To: Membership Secretary <membership@chesterlestreetasc.co.uk>', 'CC: ' . $name . ' <' . $email . '>', 'Reply-To:  ' . $name . ' <' . $email . '>');
		if($radioselect == "Other Enquiries") $headers = array('From: ' . $name . ' <noreply@chesterlestreetasc.co.uk>', 'To: Enquiries <enquiries@chesterlestreetasc.co.uk>', 'CC: ' . $name . ' <' . $email . '>', 'Reply-To:  ' . $name . ' <' . $email . '>');
		  
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
			$sent = wp_mail($to, $subject, strip_tags("Name: " . $name . "\r\n" . "Email Address: " . $email . "\r\n" . "Subject: " . $radioselect . "\r\n\r\n" . "Message" . "\r\n" . $message) . "\r\n\r\n", $headers);
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

        <main class="col-md-12 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h1 class="entry  entry-title"><?php the_title(); ?></h1>

						<div class="row">
						<div class="col-lg-5">
						<div class="entry clearfix"><?php the_content(); ?></div>
						</div>
                        
						<div class="col-lg-7">
                        <div class="well" id="respond">
						  <?php echo $response; ?>
                          <form action="<?php the_permalink(); ?>" method="post" class="form-horizontal" id="contact-form-link">
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="message_name" placeholder="Your Name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                            </div>
                            
                            <div class="form-group">
                            <label for="message_email">Email</label>
                            <input type="text" class="form-control" name="message_email" placeholder="Your Email Address" value="<?php echo esc_attr($_POST['message_email']); ?>">
                            </div>
                            
                            <div class="custom-controls-stacked">
							<label for="inlineRadioOptions">Subject</label>
								<label class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Galas">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Galas</span>
								</label>
								<label class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Membership Enquiries">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Membership Enquiries</span>
								</label>
								<label class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Other Enquiries">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Other Enquiries</span>
								</label>
							</div>
                            
                            <div class="form-group">
                            <label for="message_text">Message</label>
                            <textarea type="text" class="form-control" name="message_text" placeholder="Go on and Talk" rows="6"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                            </div>
                            
                            <div class="form-group d-none">
                            <label for="message_human">Are you Human?</label>
                            <div class="input-group">
                            <input type="text hidden" class="form-control" name="message_human" placeholder="Hint - The Answer is 2" value="2"><span class="input-group-addon"> + 3 = 5</span>
                            </div>
                            </div>
                            
                            <input type="hidden" name="submitted" value="1">
                            
                            <div class="form-group">
                            <button class="btn btn-success " type="submit">Submit</button>
                            </div>
                            
                          </form>
                       </div>
					   </div>
					   </div>

				</div>
            
	  <?php endwhile; endif; ?>

        </main>

    </div>
    </div>
    <!-- Content ENDS -->

	<?php get_footer(); ?>