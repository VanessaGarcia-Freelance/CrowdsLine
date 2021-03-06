<?php
/*
Template Name: Testimonials
*/
?>  

<section id="<?php echo( basename(get_permalink()) ); ?>" class="blockquote cbp-so-section cbp-so-init clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <div class="row centered clearfix">

    	 <h2 <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>

      <div class="twelve columns">

            <div class="flexslider-container">
                    <div class="flexslider-blockquote">
                        <ul class="slides">

                        	<?php
	$loop = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => -1));
	$count =0;
?>
<?php if ( $loop ) :
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php
                            $single_gallery_attachments = get_posts(
                            array(
                                'orderby' => 'menu_order',
                                'post_type' => 'attachment',
                                'post_parent' => get_the_ID(),
                        		'post_thumbnail' => get_the_ID(),
                        		'post_excerpt' => get_the_ID(),
                                'post_mime_type' => 'image',
                                'post_status' => null,
                                'posts_per_page' => -1
                              )
                          ); 
                            foreach ( $single_gallery_attachments as $single_gallery_attachment ) :
                            if( get_post_meta($single_gallery_attachment->ID, 'be_rotator_include', true) !== '1' ) {
                          ?>
                            <li class="slide">

                            	<img src="<?php echo ( wp_get_attachment_url( $single_gallery_attachment->ID, 'full' )); ?>" alt="<?php echo the_title(); ?>" />
                      			
                      			
        						<h4><?php the_title(); ?></h4>
        
        						<?php the_content(); ?>

                    		</li>

                            <?php } endforeach; ?>
                    		<?php endwhile; else: ?>
							<?php endif; ?>

                        </ul>
                    </div>
        </div>


      </div>
        
    </div>

</section>