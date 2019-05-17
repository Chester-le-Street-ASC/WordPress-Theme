<?php get_header(); ?>
<div class="masthead">
    	<div class="container">
      		<div class="row align-items-center">

            <div class="col-xs-12 col-sm-8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            			<h1 class="entry entry-title white">My Apps</h1>
           			 	<p class="mb-0">Hi <?php global $current_user;
      get_currentuserinfo();
      echo $current_user->user_firstname;
?>! Here are all of your Club Apps.</p>
                        
            </div>
            <div class="col-xs-12 col-sm-4 d-none d-sm-block d-md-block d-lg-block d-xl-block text-right">
            	<img class="img-fluid text-right" src="/wp-content/themes/chester/img/gsuite/gsuitemasthead.png" srcset="/wp-content/themes/chester/img/gsuite/gsuitemasthead@2x.png 2x">
            </div>

			</div>
         </div>
     </div>
<div class="container">
<main id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
<!-- Static Info -->
<div class="row row-flex row-flex-wrap flex-panel-group flex-panel-link-group">
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="http://mail.chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Gmail</h3><p>Access your Email</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/gmail.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="http://drive.chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Google Drive</h3><p>Access your Docs, Sheets, Slides and other files</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/drive.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="http://calendar.chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Calendar</h3><p>Access your Calendar</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/calendar.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://docs.google.com/a/chesterlestreetasc.co.uk/document/u/0/?tgif=d&amp;ftv=1" target="_blank"><h3 class="entry">Docs</h3><p>Write letters and more in Google Docs</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/docs.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://docs.google.com/a/chesterlestreetasc.co.uk/spreadsheets/u/0/?tgif=d" target="_blank"><h3 class="entry">Sheets</h3><p>Create a spreadsheet in Google Sheets</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/sheets.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://docs.google.com/a/chesterlestreetasc.co.uk/presentation/u/0/?tgif=d&ftv=1" target="_blank"><h3 class="entry">Slides</h3><p>Create a presentation in Google Slides</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/slides.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://www.chesterlestreetasc.co.uk/wp-admin/post-new.php" target="_blank"><h3 class="entry">New Website Post</h3><p>Write a post for our website - Posts are submitted to the editor to publish</p><aside class="flex-panel-bottom-link chesterBlue"><i class="fa fa-2x fa-wordpress" aria-hidden="true"></i></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://drive.google.com/a/chesterlestreetasc.co.uk/open?id=0B0WpFd_Vl3LpcVpZbHVCcDFLTVU" target="_blank"><h3 class="entry">Lost Property</h3><p>Manage the current Lost and Found Property lists</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/sheets.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://drive.google.com/a/chesterlestreetasc.co.uk/open?id=0B0WpFd_Vl3LpaXV5eGJmR3ZxZTA" target="_blank"><h3 class="entry">Club Records</h3><p>Edit Club Records (Individual Times)</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/sheets.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://docs.google.com/a/chesterlestreetasc.co.uk/forms/u/0/?tgif=d" target="_blank"><h3 class="entry">Forms</h3><p>Create Surveys, Questionnaires and Quizes</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/forms.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://contacts.google.com/a/chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Contacts</h3><p>View and edit your Contacts and Directory Contacts</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/contacts.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="http://groups.chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Groups</h3><p>Create mailing lists and collaborative inboxes</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/groups.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="https://keep.google.com/a/chesterlestreetasc.co.uk/" target="_blank"><h3 class="entry">Keep</h3><p>Make and share notes, checklists and more</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/keep.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="http://trello.chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Trello</h3><p> Trello keeps track of everything, from the big picture to the minute details</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/trello.png" aria-hidden="true"></aside></a></div>
<div class="col-sm-4 col-xs-12"><a class="flex-panel flex-panel-default flex-panel-body flex-panel-top-blue flex-panel-link" href="http://zohosubscriptions.chesterlestreetasc.co.uk" target="_blank"><h3 class="entry">Subscriptions Manager</h3><p>This is a test service to see if we can make billing simpler and as such access may be restricted</p><aside class="flex-panel-bottom-link chesterBlue"><img class="flex-panel-aside-icon" src="/wp-content/themes/chester/img/gsuite/zohosubscriptions.png" aria-hidden="true"></aside></a></div>
</div>

<div class="row"><div class="col-xs-12"><hr></div></div> <!-- STATIC ENDS -->

<div class="row"><div class="col-md-12"><div class="entry clearfix blog-main"><?php the_content(); ?></div><?php comments_template(); ?></div><?php endwhile; endif; ?> </div><!-- /.blog-main --></main></div>

<div class="cls-global-footer cls-global-footer-body d-print-none" style="margin:0;background-color:#e7e7e7"><div class="container"><div class="row justify-content-between align-items-center"><div class="col mr-auto"><strong>G Suite is provided by Google Inc.</strong><br>
Use of these services is subject to terms and conditions. Authorised users only.</div><div class="col-md-3"><a class="btn btn-light btn-block" href="https://gsuite.google.com/intl/en_in/terms/2013/1/premier_terms.html">Terms of Use</a></div></div></div></div>
<style>.cls-global-footer-sponsors{margin-top:0}</style>
<?php get_footer(); ?>