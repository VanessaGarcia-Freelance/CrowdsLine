
<div id="content" class="clearfix press-content single-press">
	<div class="row clearfix">

			<div class="main-column has-sidebar">
				<div class="entry-wrap">
						<div class="entry-content">
								<?php if(is_page()) { ?> 
								<?php } else { ?>

					 
								<header>	
										<span class="date-title"><!--<?php  _e('By','playne'); ?> <?php the_author_posts_link(); ?>-->
											<?php  
					  
												?>
												<?php echo '' .human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>

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
									
					 
					 				<div class="post-content"> 
					 					<div class="press-image">
					 						<?php  
												$metapod = get_post_meta($post->ID, 'image',TRUE);
												echo '<img src="'.$metapod['guid'].'" />';
					 
					 						?>
					 					</div>
										<?php the_content(''); ?>
										<?php if(is_search() || is_archive()) { ?>
											<div class="excerpt-more">
												<?php playne_readmore(); ?>
											</div>
										<?php } else { ?>
										
										<!-- Post content -->
											<?php if(is_page() or is_single()) { ?>
											<?php } else { ?>
											<div class="clearfix">
												<a href="<?php the_permalink(); ?>" class="more-link button normal" title="<?php _e('read more','playne'); ?>"><?php _e('Read more','playne'); ?></a>
											</div>							
											<?php } ?>						
										 
										<?php } ?>
					 	 

									</div> 

						</div>
										
					</div>

 
		</div><!-- main-column -->
				<div class="sidebar-column" id="sidebar"> 
					<ul class="press-side-nav">
						<li id="press-link" class="active"><a href="/press">Press Coverage</a></li>
						<li id="testimonials-link"><a href="/testimonial">Testimonials</a></li>
					</ul>
				</div>
	</div><!-- row -->
</div> <!-- content -->