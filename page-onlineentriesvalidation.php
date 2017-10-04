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
		$asaNumber = $_POST['asa_number'];
		$email = $_POST['message_email'];
		$gala = $_POST['gala_name'];
		$parent = $_POST['parent_name'];
		$amount = $_POST['amount_due'];
		$radioselect = $_POST['inlineRadioOptions'];
		$selectedEvents  = 'None';
			if(isset($_POST['events']) && is_array($_POST['events']) && count($_POST['events']) > 0){
				$selectedEvents = implode(', ', $_POST['events']);
			}
			
		$message .= '<br>Selected Events: ' . $selectedEvents;
		$human = $_POST['message_human'];
		 
		//php mailer variables
		$subject = "Gala Entry: ". $gala . " for " . $name . "\r\n";
		$headers = array('From: Chester-le-Street ASC <noreply@chesterlestreetasc.co.uk>', 'To: Competition-Secretary <galas@chesterlestreetasc.co.uk>', 'CC: ' . $parent . ' <' . $email . '>', 'Reply-To: Online Gala Entries <galas@chesterlestreetasc.co.uk>');
		  
		if(!$human == 0){
		  if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
		  else {
		 
			//validate email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			  my_contact_form_generate_response("error", $email_invalid);
			else //email is valid
			{
			
			//validate presence of name and message
			if(empty($name) || empty($birth) || empty($asaNumber) || empty($gala) || empty($parent) || empty($amount) || empty($radioselect) || empty($selectedEvents ) ){
			  my_contact_form_generate_response("error", $missing_content);
			}
			else //ready to go!
			{
			  
			$sent = wp_mail($to, $subject, strip_tags("<strong>Swimmer Name: </strong>" . $name . "\r\n" . "ASA Number: " . $asaNumber . "\r\n" . "Gala Name: " . $gala . "\r\n" . "Date of Birth (YYYY-MM-DD): " . $birth . "\r\n". "Parent Name: " . $parent . "\r\n" . "Amount Due: £" . $amount . "\r\n" . "Payment by: " . $radioselect . "\r\n" . $message), $headers);
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
            			<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry clearfix"><?php the_content(); ?></div>
                        
                        <hr>
                        
						<script type="text/javascript">
 
					   $(document).ready(function() {
						$('#reg_form').bootstrapValidator({
							// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
							fields: {
								message_name: {
									validators: {
											stringLength: {
											min: 2,
										},
											notEmpty: {
											message: "You must provide the swimmer's name"
										}
									}
								},
						 message_email: {
									validators: {
										notEmpty: {
											message: 'Please enter your email address'
										},
										emailAddress: {
											message: 'Please supply a valid email address'
										}
									}
								}
								}
							})
		
 	
							.on('success.form.bv', function(e) {
								$('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
									$('#reg_form').data('bootstrapValidator').resetForm();
 
								// Prevent form submission
								e.preventDefault();
 
								// Get the form instance
								var $form = $(e.target);
 
								// Get the BootstrapValidator instance
								var bv = $form.data('bootstrapValidator');
 
								// Use Ajax to submit form data
								$.post($form.attr('action'), $form.serialize(), function(result) {
									console.log(result);
								}, 'json');
							});
					});
 
</script>

                        <div id="respond">
						  <?php echo $response; ?>
                          <form action="<?php the_permalink(); ?>" method="post">
						  <h2>1. Swimmer Details</h2>
                            <div class="form-group">
                            <label for="name" class="control-label">Swimmer Name:</label>
                            <input type="text" class="form-control" name="message_name" placeholder="Swimmer's Name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                            </div>
                            
                            <div class="form-group">
                            <label for="date_birth" class="control-label">Date of Birth:</label>
                            <input type="date" class="form-control" name="date_birth" placeholder="2000-01-01" value="<?php echo esc_attr($_POST['date_birth']); ?>">
                            </div>

							<div class="form-group">
                            <label for="name" class="control-label">ASA Number:</label>
                            <input type="number" class="form-control" name="asa_number" placeholder="ASA Number" value="<?php echo esc_attr($_POST['asa_number']); ?>">
                            </div>

							<div class="form-group">
                            <label for="name" class="control-label">Gala Name:</label>
                            <input type="text" class="form-control" name="gala_name" placeholder="Gala Name" value="<?php echo esc_attr($_POST['gala_name']); ?>">
                            </div>
                          
						  <hr>
						  <h2>2. Select Swims</h2>
                            
                            <div class="form-group">
                            <label for="checkbox" class="control-label">Events:</label>

							<br>

							<div class="row">
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="50 Free">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">50 Free</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="100 Free">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">100 Free</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="200 Free">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">200 Free</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="400 Free">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">400 Free</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="800 Free">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">800 Free</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="1500 Free">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">1500 Free</span>
								</label>
								</div>
							</div>
                            
                            <br>
                            
							<div class="row">
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="50 Back">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">50 Back</span>
								</label>
								</div>
									<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="100 Back">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">100 Back</span>
								</label>
								</div>
									<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="200 Back">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">200 Back</span>
								</label>
								</div>
							</div>
                            
                            <br>
                            
							<div class="row">
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="50 Breast">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">50 Breast</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="100 Breast">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">100 Breast</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="200 Breast">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">200 Breast</span>
								</label>
								</div>
							</div>
                            
                            <br>

							<div class="row">
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="50 Fly">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">50 Fly</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="100 Fly">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">100 Fly</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="200 Fly">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">200 Fly</span>
								</label>
								</div>
							</div>

							<br>
                            
							<div class="row">
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="100 IM">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">100 IM</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="200 IM">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">200 IM</span>
								</label>
								</div>
								<div class="col-md-2">
								<label class="custom-control custom-checkbox">
								  <input class="custom-control-input" type="checkbox" name="events[]" value="400 IM">
								  <span class="custom-control-indicator"></span>
								  <span class="custom-control-description">400 IM</span>
								</label>
								</div>
                            </div>
							</div>

							<hr>
							<h2>3. Parent and Payment Details</h2>

                            <div class="form-group">
                            <label for="message_email" class="control-label">Email:</label>
                            <input type="email" class="form-control" name="message_email" placeholder="Your Email Address" value="<?php echo esc_attr($_POST['message_email']); ?>">
                            </div>
                            
                            <div class="form-group">
                            <label for="name" class="control-label">Parent/Guardian Name (If Applicable):</label>
                            <input type="text" class="form-control" name="parent_name" placeholder="Parent Name" value="<?php echo esc_attr($_POST['parent_name']); ?>">
                            </div>
                            
                            <div class="form-group">
                            <label for="name" class="control-label">Amount Due:</label>
                            <div class="input-group"><div class="input-group-addon">&pound;</div><input type="text" class="form-control" name="amount_due" placeholder="Price" value="<?php echo esc_attr($_POST['amount_due']); ?>">
							</div>
							<small class="form-text">You can make payments by Cash, Cheque or Bank Transfer. For more information about payments to the club, contact <a class="text-truncate" href="mailto:payments@chesterlestreetasc.co.uk">payments@chesterlestreetasc.co.uk</a> or go to our <a class="text-truncate" target="_blank" href="www.chesterlestreetasc.co.uk/payments">payments information page</a>.</small>
							</div>
                            
                            <div class="custom-controls-stacked">
							<label for="radio-inline">I intend to pay by</label>
							
								<label class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Cash">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Cash</span>
								</label>
								<label class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Cheque">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Cheque</span>
								</label>
								<label class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Electronic Bank Transfer">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Electronic Bank Transfer
								</label>
							</div>

							<hr>
							<h2>4. Submit</h2>
							<p>I have checked that the details are correct. I understand that I must contact the Gala Coordinator if I believe I have made a mistake while completing this form.</p>
							
							<div class="form-group d-none">
                            <div class="input-group">
                            <input type="text" class="form-control" name="message_human" placeholder="Hint - The Answer is 2" value="2"><span class="input-group-addon"> + 3 = 5</span>
                            </div>
							</div>

                            <input type="hidden" name="submitted" value="1">
                            <div class="form-group">
                            <button class="btn btn-success " type="submit">Submit</button>
                            </div>
                          </form>
                       </div>
                       <hr>
					   <h3>General Terms and Conditions<br><small>(For using the online form)</small></h3>
                       <ul>
							<li>Your data is kept secure in transit by using HTTPS</li>
                       		<li>Data will be held by Chester-le-Street ASC and the Gala Host within the terms of the Data Protection Act 1998.</li>
                       		<li>You will recieve a copy of your entry as proof that your entry has been submitted. Please retain it for your records.</li>
                       		<li>Please be aware that the email you recieve is not a receipt and does not guarantee entry to a gala. You must check the accepted entries for the gala, when they are released.</li>
                       		<li>We are currently unable to process online payments due to our server setup. We may be able to introduce this feature in the future.</li>
						<ul>

				</div>
            
	  <?php endwhile; endif; ?>

        </div>

    </div>
	</div></div>
    <!-- Content ENDS -->

	<?php get_footer(); ?>