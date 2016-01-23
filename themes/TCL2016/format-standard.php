<?php 
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect; 
?>

<div class="entry-wrap">
	<div class="entry-content">
			<?php if(is_page()) { ?> 
			<?php } else { ?>


			<?php if ( has_post_thumbnail() && is_home() || has_post_thumbnail() && is_archive() ) { ?>
				<div class="featured-image-wrap <?php $categories = get_the_category();
 
									$predictions = 'n';

								    echo ' ' .strtolower(esc_html( $categories[0]->name ));

								    if(strpos(strtolower(esc_html( $categories[0]->name )),'predictions') !== false){
								    	$predictions = 'y';
								    }

								    echo ' ' . strtolower(esc_html( $categories[1]->name ));  

								    if(strpos(strtolower(esc_html( $categories[1]->name )),'predictions') !== false){
								    	$predictions = 'y';
								    }

							$image = wp_get_attachment_image_src( get_post_thumbnail_id(), '');
						    $image_w = $image[1];
						    $image_h = $image[2];

						    if ($image_w > $image_h) { 
								if ( ! empty( $categories ) ) {
								    echo ' fullbar';   
								}
							}
							?>">
					<a class="featured-image left-image <?php 

						    if ($image_w > $image_h) { 
						        echo 'landscape';
						    }
						    elseif ($image_w == $image_h) { 
						        echo 'square';
						    }
						    else { 
						        echo 'portrait';
						    } ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'large' ); ?>
					</a>
					<?php 
						if($predictions == 'y'){
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="predict-score-flag">Predict<br />Score</a>

					<?php 
						}
					?>
				</div> 
			<?php } ?>
			<header>	
					<span class="date-title"><!--<?php  _e('By','playne'); ?> <?php the_author_posts_link(); ?>-->
						<?php $categories = get_the_category();
 
							if ( ! empty( $categories ) ) {
							    echo '<span class="category">'.esc_html( $categories[0]->name ).'</span>';   
							}
							?>
							<?php echo '- ' .human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>

 <!--<?php _e('in','playne'); ?> <?php the_category(', '); ?> --><?php if ( is_sticky () ) { ?><?php _e('featured','playne'); ?><?php } ?></span>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php
				$key = 'subtitle';
				$themeta = get_post_meta($post->ID, $key, TRUE);
				if($themeta != '') {
				echo '<h3>'.$themeta.'</h3>';
				}
				?>

				<?php if(is_home()) { ?>

					<?php 
						echo '<p class="except">'.wp_trim_words( get_the_content(), 30, '...' ).'</p>';?>

				<?php } ?>

			</header>
			<?php } ?>
			<?php

				$key = 'widget-position';
				$themeta = get_post_meta($post->ID, $key, TRUE); 
				if($detect->isMobile() && $themeta == 'top'){
					echo '<div id="widget-move"></div>';
				}
			?>

				<!-- Check if there is a video or image -->
				<?php if ( get_post_meta($post->ID, 'video', true) ) { ?>
					<div class="fitvid">
						<?php echo get_post_meta($post->ID, 'video', true) ?>
					</div>
					
				<?php } else { ?> 
					<?php if ( has_post_thumbnail() && is_single() ) { ?>
						<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'large' ); ?>
						</a>
						<?php if(is_single()){ ?>
						<span class="image-caption"><?php 
							function the_post_thumbnail_caption() {
								  global $post;

								  $thumbnail_id    = get_post_thumbnail_id($post->ID);
								  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

								  if ($thumbnail_image && isset($thumbnail_image[0])) {
								    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
								  }
								}

							the_post_thumbnail_caption(); ?></span>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				

			<?php  if ( !is_home()) { ?>
 				<div class="post-content">
					<?php  if ( !is_page() && !is_archive()) {
						?>
					<div class="widgetwrap">
						<a href="https://contests.thecrowdsline.com/" class="whatsayyou">
							<strong>WHAT SAY YOU?</strong>
							<span>Enter a score prediction and an email and you could be eligible for an Amazon gift certificate. Most accurate wins!</span>
						</a>
						<?php
						$key = 'widget';
						$themeta = get_post_meta($post->ID, $key, TRUE);
						if($themeta != '') {
						echo ''.$themeta.'';
						}
						?>
						<?php
						$key = 'winner-email';
						$thewinner = get_post_meta($post->ID, $key, TRUE);
						$key = 'winner-prize';
						$theprize = get_post_meta($post->ID, $key, TRUE);
						if($thewinner != '') {
							?>
							<div class="winner-box">
								<div class="winner-inner">
									<h4>Congratulations</h4>
									<span class="winner-email">- &nbsp; <?php echo ''.$thewinner.''; ?> &nbsp; -</span>
									<span class="winner-prize"><?php echo ''.$theprize.''; ?></span>
								</div>
							</div>
							<?php
						}
						?>
					</div>



					<?php } ?>
					<?php if(is_search() || is_archive()) { ?>
						<div class="excerpt-more">
							<?php playne_readmore(); ?>
						</div>
					<?php } else { ?>
					
					<!-- Post content -->
					<?php the_content(''); ?>
						<?php if(is_page() or is_single()) { ?>
						<?php } else { ?>
						<div class="clearfix">
							<a href="<?php the_permalink(); ?>" class="more-link button normal" title="<?php _e('read more','playne'); ?>"><?php _e('Read more','playne'); ?></a>
						</div>							
						<?php } ?>						
					
					<?php if(is_single() || is_page()) { ?>
						<div class="pagelink">
							<?php wp_link_pages(); ?>
						</div>
					<?php } ?>	
					<?php } ?>

					<?php if(is_single()) { ?>
					<?php
					$key = 'prediction';
					$themeta = get_post_meta($post->ID, $key, TRUE);
					if($themeta != '') {
					echo '<div class="prediction">'.$themeta.'</div>';
					}
					?>
					<?php } ?>		 

				</div>
			<? } ?>

	</div>
					
</div>

					<?php if(is_single()) { ?>
						<script>

							jQuery(document).ready(function($) {    
								$('.addtoany_list a img').css('width','32px'); 
							});
						</script>
					<?php } ?>
					<?php if(is_home()) { ?> 
					<?php } ?>		

			<?php

				$key = 'widget-position';
				$themeta = get_post_meta($post->ID, $key, TRUE); 
				if($detect->isMobile() && $themeta == 'top'){
					?>

						<script>

							jQuery(document).ready(function($) {    
								$(".widgetwrap").detach().appendTo("#widget-move");
							});
						</script>
					<?php
				}
			?>