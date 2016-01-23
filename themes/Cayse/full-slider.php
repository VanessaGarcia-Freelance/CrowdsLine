<?php
/*
Template Name: Full width slider
*/
?>  

<section id="<?php echo( basename(get_permalink()) ); ?>" class="fullwidth">

        <div class="flexslider-container">
                    <div class="flexslider">
                        <ul class="slides">
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
                            <div class="row clearfix">
                            <div class="caption">
                                  <?php $attachment_meta = wp_get_attachment($single_gallery_attachment->ID); ?>
                                  <h1><?php echo $attachment_meta['title']; ?></h1>
                                  <p><?php echo $attachment_meta['caption']; ?></p>
                            </div>
                          </div>
                            </li>
                            <?php } endforeach; ?>
                        </ul>
                    </div>
        </div>

</section>