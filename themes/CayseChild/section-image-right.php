<?php
/*
Template Name: Image right
*/
?>  
 
<?php 
$bgnd_image = get_post_meta($post->ID, '_playne_imagepickerz', true);
$bgnd_color = get_post_meta($post->ID, '_playne_colorpickerz', true);
$header_color = get_post_meta($post->ID, '_playne_colorpickerz2', true);
$main_color = get_post_meta($post->ID, '_playne_colorpickerz3', true);

 ?>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="cbp-so-section cbp-so-init clearfix <?php post_even(); ?>" <?php if ( $bgnd_image or $bgnd_color or $main_color ) { ?>style="<?php } ?><?php if ( $bgnd_image ) { ?><?php global $post; $image = $bgnd_image; echo "background:url('$image') no-repeat center center" . ($bgnd_color ? ' '. $bgnd_color : '' ) . "; background-size: cover;";  ?><?php } else if ( $bgnd_color ) { ?><?php global $post; $color = $bgnd_color; echo "background-color:$color"; ?>;<?php } ?><?php if( $main_color) { ?><?php global $post; $colormaintext = $main_color; echo "color:$colormaintext"; ?>;<?php } ?><?php if ( $bgnd_image or $bgnd_color or $main_color ) { ?>"<?php } ?>>

    <div class="row clearfix">

        <div class="one-half column-last righty cbp-so-side-img cbp-so-side-right">
      
          <?php if ( has_post_thumbnail() ) { ?>
            <?php the_post_thumbnail( 'large-image' ); ?>
          <?php } ?>

        </div>

        <div class="one-half columns cbp-so-side cbp-so-side-left">

        <h2 <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
        
        <?php the_content(); ?>

        </div>
        
    </div>

</section>