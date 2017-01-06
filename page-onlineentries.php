	<?php
	  
		/* // See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_BQokikJOvBiI2HlWgH4olfQ2");
		
		// Get the credit card details submitted by the form
		$token = $_POST['stripeToken'];
		
		// Create a charge: this will charge the user's card
		try {
		  $charge = \Stripe\Charge::create(array(
			"amount" => $amount, // Amount in cents
			"currency" => "gbp",
			"source" => $token,
			"description" => "Gala Payment"
			));
		} catch(\Stripe\Error\Card $e) {
		  // The card has been declined
		} */
	  
	  //response generation function
	  $response = "";
	 
	  //function to generate response
	  function my_contact_form_generate_response($type, $message){
	 
		global $response;
	 
		if($type == "success") $response = "<div class='alert alert-success'>{$message}</div>";
		else $response = "<div class='alert alert-danger'>{$message}</div>";
	 
	  }
	  
	  //response messages
		$not_human       = "Someone can't add up. It wasn't us though.";
		$missing_content = "Please fill out ALL of the boxes.";
		$email_invalid   = "That is not valid Email Address. It should follow the format name@example.com";
		$message_unsent  = "Your entry was not submitted due to an Error on our side. Please Try Again.<br>If the problem persists, please try again later or please enter this gala manually by using a paper entry form.";
		$message_sent    = "Great! Your entry has been submitted. You will receive an email confirmation soon.";
		 
		//user posted variables
		$name = $_POST['message_name'];
		$birth = $_POST['date_birth'];
		$email = $_POST['message_email'];
		$gala = $_POST['gala_name'];
		$parent = $_POST['parent_name'];
		$amount = $_POST['amount_due'];
		$selectedEvents  = 'None';
			if(isset($_POST['events']) && is_array($_POST['events']) && count($_POST['events']) > 0){
				$selectedEvents = implode(', ', $_POST['events']);
			}
			
		$message .= '<br>Selected Events: ' . $selectedEvents;
		$human = $_POST['message_human'];
		 
		//php mailer variables
		$subject = "Gala Entry: ". $gala . " for " . $name . "\r\n";
		$headers = array('From: Chester-le-Street ASC <noreply@chesterlestreetasc.co.uk>', 'To: Competition-Secretary <galaentries@chesterlestreetasc.co.uk>', 'CC: ' . $parent . ' <' . $email . '>', 'Reply-To: Online Gala Entries <galaentries@chesterlestreetasc.co.uk>');
		  
		if(!$human == 0){
		  if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
		  else {
		 
			//validate email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			  my_contact_form_generate_response("error", $email_invalid);
			else //email is valid
			{
			
			//validate presence of name and message
			if(empty($name) || empty($birth) || empty($gala) || empty($selectedEvents) ){
			  my_contact_form_generate_response("error", $missing_content);
			}
			else //ready to go!
			{
			  
			$sent = wp_mail($to, $subject, strip_tags("<strong>Swimmer Name: </strong>" . $name . "\r\n" . "Gala Name: " . $gala . "\r\n" . "Date of Birth: " . $birth . "\r\n". "Parent Name: " . $parent . "\r\n" . "Amount Due: " . $amount . "\r\n" . $message), $headers);
			if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
			else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

			}
			
			}

		  }
		}
		else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);
		
	?>
    
	<?php get_header(); ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <?php get_template_part( 'pageheader' ); ?>
      
      <!-- Page Content -->
      <div class="container">
      <div class="row">

        <div class="col-md-12 blog-main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         		<div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
            			<h1 class="entry chesterRed entry-title"><?php the_title(); ?></h1>

						<div class="entry clearfix"><?php the_content(); ?></div>
                        
                        <hr>
                        
                        <div id="respond">
						  <?php echo $response; ?>
                          <form action="<?php the_permalink(); ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Swimmer Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="message_name" placeholder="Swimmer's Name" value="<?php echo esc_attr($_POST['message_name']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="date_birth" class="col-sm-2 control-label">Date of Birth:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="date_birth" placeholder="Swimmer's Date of Birth" value="<?php echo esc_attr($_POST['date_birth']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="message_email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="message_email" placeholder="Your Email Address" value="<?php echo esc_attr($_POST['message_email']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Parent/Guardian Name (If Applicable):</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="parent_name" placeholder="Parent Name" value="<?php echo esc_attr($_POST['parent_title']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Gala Name:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="gala_name" placeholder="Gala Name" value="<?php echo esc_attr($_POST['gala_title']); ?>"></div>
                            </div>
                            
                            <div class="form-group">
                            <label for="checkbox" class="col-sm-2 control-label">Events:</label>
                            <div class="col-sm-10">
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="50 Fly">50 Fly
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="100 Fly">100 Fly
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="200 Fly">200 Fly
                            </label>
                            
                            <br>
                            
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="50 Back">50 Back
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="100 Back">100 Back
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="200 Back">200 Back
                            </label>
                            
                            <br>
                            
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="50 Breast">50 Breast
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="100 Breast">100 Breast
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="200 Breast">200 Breast
                            </label>
                            
                            <br>
                            
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="50 Free">50 Free
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="100 Free">100 Free
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="200 Free">200 Free
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="400 Free">400 Free
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="800 Free">800 Free
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="1500 Free">1500 Free
                            </label>
                            <br>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="100 IM">100 IM
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="200 IM">200 IM
                            </label>
                            <label class="checkbox-inline">
                              <input class="checkbox" type="checkbox" name="events[]" value="400 IM">400 IM
                            </label>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Amount Due:</label>
                            <div class="col-sm-10"><div class="input-group"><div class="input-group-addon">&pound;</div><input type="text" class="form-control" name="amount_due" placeholder="Price" value="<?php echo esc_attr($_POST['amount_due']); ?>"></div></div>
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
                       <hr>
                       <p class="lead">Rest assured, your personal data is safe with us<br>
                       <small>We use industry standard encryption to keep your data secure.</small></p>
                       <p>You will recieve a copy of your entry as proof your entry has been submitted. Please retain it for your records.<br>
                       Please however be aware that the Proof is not a receipt and does not guarantee entry to a gala. It is up to you to check the accepted entries for the gala, when they are released.</p>
                       <p>We are currently unable to process online payments due to our server setup. We may be able to introduce this feature in the future.</p>

				</div>
            
	  <?php endwhile; endif; ?>

        </div>

    </div>
    </div>
    <!-- Content ENDS -->

	<?php get_footer(); ?>