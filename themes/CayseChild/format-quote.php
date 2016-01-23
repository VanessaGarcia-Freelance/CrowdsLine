<div class="entry-wrap">
	<div class="entry-content">
			<header>	
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
			</header>


				<!-- Check if there is a video or image -->
				<?php if ( get_post_meta($post->ID, 'video', true) ) { ?>
					<div class="fitvid">
						<?php echo get_post_meta($post->ID, 'video', true) ?>
					</div>
				<?php } else { ?>
					
				<?php if ( has_post_thumbnail() ) { ?>
					<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'large-image' ); ?>
					</a>
				<?php } ?>
					
				<?php } ?>

				<!-- Quote author -->
				<i class="icon-quote"></i> <?php the_content(''); ?>
	</div>
</div>