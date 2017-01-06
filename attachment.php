	<?php get_header(); ?>
    <?php get_template_part( 'pageheader' ); ?>
    <div class="container">
      <div class="row">

        <div class="col-md-8 blog-main">
        
        <div class="well">
        <?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

        <h1 class="post-title chesterRed entry-title"><?php the_title(); ?></h1>
        
        <div class="entry">	
            <div class="entry-inner">
                <?php the_content(); ?>
                
                <p>Downloads: 
				<?php
                    $images = array();
                    $image_sizes = get_intermediate_image_sizes();
                    array_unshift( $image_sizes, 'full' );
                    foreach( $image_sizes as $image_size ) {
                        $image = wp_get_attachment_image_src( get_the_ID(), $image_size );
                        $name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
                        $images[] = '<a href="' . $image[0] . '">' . $name . '</a>';
                    }
                    echo implode( ' | ', $images );
                ?>
                </p>
        
            </div>
            <div class="clearfix"></div>				
        </div><!--/.entry-->

			</div>
            </div>

	<div class="col-md-4"><?php get_sidebar(); ?></div>
</div>
</div>
	<?php get_footer(); ?>