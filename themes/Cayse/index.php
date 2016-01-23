<?php get_header(); ?>
<div id="page-header" class="clearfix">
	<div class="row">
				<div class="twelve columns">
				<?php if(is_search()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Results for','playne'); ?> "<?php the_search_query() ?>" </h2></div>
				<?php } else if(is_home()) { ?>
					<div class="archive-title-wrapper clearfix">
						<h2 class="entry-title"><?php single_post_title(); ?></h2>
					</div>
				<?php } else if(is_tag()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Archive:','playne'); ?> <?php single_tag_title(); ?></h2></div>
				<?php } else if(is_day()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Archive:','playne'); ?> <?php echo get_the_date(); ?></h2></div>
				<?php } else if(is_month()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Archive:','playne'); ?> <?php echo get_the_date('F Y'); ?></h2></div>
				<?php } else if(is_year()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Archive:','playne'); ?> <?php echo get_the_date('Y'); ?></h2></div>
				<?php } else if(is_404()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Page Not Found!','playne'); ?></h2></div>
				<?php } else if(is_category()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('Archive:','playne'); ?> <?php single_cat_title(); ?></h2></div>
				<?php } else if(is_author()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php
					$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->display_name; ?></h2>
					</div>
				<?php } else if(is_page()) { ?>
					<div class="archive-title-wrapper clearfix">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</div>
				<?php } ?>
				</div>
	</div>
</div>

<div id="content" class="clearfix">
	<div class="row clearfix">

			<div class="main-column">
				<div class="content-posts">
				
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article <?php post_class('post clearfix'); ?>>
					<?php
						if(!get_post_format()) {
						   get_template_part('format', 'standard');
						} else {
						   get_template_part('format', get_post_format());
						};
					?>
					</article>
					<?php endwhile; ?>
					<?php endif; ?>


					<?php if( playne_page_has_nav() ) : ?>
					<!-- If there is pagination display nav area -->
					<div id="nav-footer">
						<div class="archive-title-wrapper">
							<?php if(!$link = get_previous_posts_link()) { ?>
							<?php } else { ?>
							<div class="post-nav-left button normal clearfix">
							<?php previous_posts_link(__('Newer', 'playne')) ?>
							</div>
							<?php } ?>
		
							<?php if(!$link = get_next_posts_link()) { ?>
							<?php } else { ?>
							<div class="post-nav-right button normal clearfix">
							<?php next_posts_link(__('Older', 'playne')) ?>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php endif; ?>
			
					<?php if( is_single () ) { ?>
					<!-- Comments -->
					<?php if ('open' == $post->comment_status) { ?>
					<div class="comments">
						<?php comments_template(); ?>
					</div>
					<?php } ?>
			
					<!-- Footer navigation -->
					<div id="nav-footer">
						<?php if(!$link = get_previous_post_link()) { ?>
						<?php } else { ?>
						<div class="post-nav-left button normal clearfix">
						<?php previous_post_link('%link', 'Next'); ?>
						</div>
						<?php } ?>
						<?php if(!$link = get_next_post_link()) { ?>
						<?php } else { ?>
						<div class="post-nav-right button normal clearfix">
						<?php next_post_link('%link', 'Prev'); ?>
						</div>
						<?php } ?>
					</div>
					<?php } ?>

				</div>
			</div>
			
			
			<div class="sidebar-column" id="sidebar">
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets') ) : else : ?>		
				<?php endif; ?>
				<?php dynamic_sidebar('sidebar-one'); ?>
				<?php dynamic_sidebar('sidebar-two'); ?>
				<?php dynamic_sidebar('sidebar-three'); ?>
			</div>

	</div>	
</div>

<?php get_footer(); ?>