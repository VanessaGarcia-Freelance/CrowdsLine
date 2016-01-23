<div class="entry-wrap">
	<div class="entry-content">
			<header>	
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
					<!--<?php  _e('By','playne'); ?> <?php the_author_posts_link(); ?>--> <?php _e('on','playne'); ?> <?php echo get_the_date(); ?> <!--<?php _e('in','playne'); ?> <?php the_category(', '); ?> --><?php if ( is_sticky () ) { ?><?php _e('featured','playne'); ?><?php } ?>
			</header>
		
				<div class="posts-content">
								
					<?php if ( has_post_thumbnail() ) { ?>
						<a class="featured-image" href="<?php echo get_post_meta($post->ID, 'link', true) ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
					<?php } ?>
					
					<?php if(is_search() || is_archive()) { ?>
						<div class="excerpt-more">
							<?php playne_readmore(); ?>
						</div>
					<?php } else { ?>
						<?php the_content(''); ?>																	
							<div class="centered clearfix">
								<a href="<?php echo get_post_meta($post->ID, 'link', true) ?>" class="more-link" title="<?php _e('visit','playne'); ?>"><?php _e('Visit the link','playne'); ?>
								</a>
							</div>	
									
						<?php if(is_single() || is_page()) { ?>
							<div class="pagelink">
								<?php wp_link_pages(); ?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
	</div>
</div>