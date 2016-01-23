<div class="entry-wrap">
	<div class="entry-content">
		<!-- Check if there is a video or image -->
				<?php if ( get_post_meta($post->ID, 'video', true) ) { ?>
					<div class="fitvid">
						<?php echo get_post_meta($post->ID, 'video', true) ?>
					</div>
					
				<?php } ?>

			<header>	
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
					<span class="date-title"><?php _e('By','playne'); ?> <?php the_author_posts_link(); ?> <?php _e('on','playne'); ?> <?php echo get_the_date(); ?> <?php _e('in','playne'); ?> <?php the_category(', '); ?> <?php if ( is_sticky () ) { ?><?php _e('featured','playne'); ?><?php } ?></span>
			</header>

				<div class="post-content">
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
						<ul class="meta">
							<li class="author">
								<li><?php the_tags('', ', ', ''); ?></li>
								<?php } ?>			
						</ul>	
				</div>
	</div>
</div>