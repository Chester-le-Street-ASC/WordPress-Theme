</div></div><!-- /.container -->

	<div class="blog-footer">
    <hr>
	<div class="container">
    
    <div class="row noprint">
        <div class="col-sm-3 text-center">
            <h3>Contact</h3>
            <address>
                Burns Green Leisure Centre<br>
				Chester-Le-Street<br>
				DH3 3QH
            </address>
            <p><i class="fa fa-phone chesterRed"></i>  <a href="tel:03000 266 444">03000 266 444</a><br>
            <i class="fa fa-envelope chesterRed"></i> <a href="mailto:chesterlestreetasc@gmail.com" target="new">E-Mail</a></p>
        </div>
        <div class="col-sm-3 text-center">
            <h3>Information</h3>
            <p>
                <a title="About" target="_self" href="/about">About</a><br>
                <a title="Committee" target="_self" href="/committee#executive">Committee Members</a><br>
                <a title="Committee" target="_self" href="/committee#meetings">Committee Meetings</a><br>
                <a title="Policies" target="_self" href="/policies">Policies</a><br>
            </p>
        </div>
        <div class="col-sm-3 text-center">
            <h3>Downloads</h3>
            <p>
               <i class="fa fa-file-text chesterRed"></i> <a title="Link to Page" target="_blank" href="http://www.chesterlestreetasc.co.uk/wp-content/uploads/2014/04/GalaEntryForm2012.doc">Gala Entry Form</a><br>
                <!--<a title="Link to Page" target="_blank" href="<?php echo home_url(); ?>">Kit Order Form</a><br>
                <a title="Link to Page" target="_blank" href="<?php echo home_url(); ?>">Link</a><br>-->
            </p>
        </div>
        <div class="col-sm-3 text-center">         
            <h3>Other Sites</h3>
            <p>
                <a title="British Swimming" target="_blank" href="http://www.swimming.org/britishswimming/">British Swimming</a><br>
                <a title="ASA" target="_blank" href="http://www.swimming.org/asa/">The ASA</a><br>
                <a title="Swim NE" target="_blank" href="http://asaner.org.uk/swim/">Swim North East</a><br>
                <a title="N&amp;D Swimming" target="_blank" href="http://ndcasa.org.uk/swim/">N&amp;D Swimming</a><br>
            </p>
        </div>
    </div>   

    <hr>
    
    <div class="row noprint">
    		<div class="col-md-12 text-center">
            <h3 class="chesterRed">Our Sponsors</h3>
            </div>
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                        <a href="http://www.gblf.co.uk" target="_blank"><img class="img-responsive sponsor center-block" style="display: inline;" src="<?php echo get_bloginfo('template_directory');?>/img/sponsors/gblf.png"  alt="GBLF" /></a>
                        </div>
                        <div class="col-sm-4 text-center">
                        <a href="http://www.ukmail.com" target="_blank"><img class="img-responsive sponsor center-block" style="display: inline;" src="<?php echo get_bloginfo('template_directory');?>/img/sponsors/ukmail.png"  alt="UK Mail" /></a>
                        </div>
                        <div class="col-sm-4 text-center">
                        <a href="http://www.wssrecruitment.co.uk" target="_blank"><img class="img-responsive sponsor center-block" style="display: inline;" src="<?php echo get_bloginfo('template_directory');?>/img/sponsors/wss.png"  alt="WSS Recruitment" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="row">
                        <div class="col-sm-4 text-center">
                        <a href="http://www.nessswimwear.co.uk" target="_blank"><img class="img-responsive sponsor center-block" style="display: inline;" src="<?php echo get_bloginfo('template_directory');?>/img/sponsors/ness.png"  alt="NESS Swimwear" /></a>
                        </div>
                        <div class="col-sm-4 text-center">
                        <a href="http://www.michaelenglishroofing.com" target="_blank"><img class="img-responsive sponsor center-block" style="display: inline;" src="<?php echo get_bloginfo('template_directory');?>/img/sponsors/menglish.png"  alt="GBLF" /></a>
                        </div>
                        <div class="col-sm-4 text-center">
                        <a href="http://www.harlandsaccountants.co.uk" target="_blank"><img class="img-responsive sponsor center-block" style="display: inline;" src="<?php echo get_bloginfo('template_directory');?>/img/sponsors/harlands.png"  alt="GBLF" /></a>
                        </div>
                    </div>
    			</div>
          </div>
          </div>
    </div>
    
    <hr>
    
    <div class="row text-center">
    
        <?php wp_footer(); ?>
    
          <p>&copy; <?php echo date( 'Y' ); ?> Chester&#8209;le&#8209;Street ASC</p>
    
          <p><a href="#"><?php _e( 'Back to top', 'wpboot' ); ?></a></p>
          
          <p class="chesterRed"><strong>CLS Dev</strong><br>
          Page Template: <?php $page_id = $wp_query->get_queried_object_id();
echo get_post_meta( $page_id, '_wp_page_template', true ); ?></p>
        </div> </div> </div> <!-- /.container -->
    
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo get_bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
        

  </body>

</html>