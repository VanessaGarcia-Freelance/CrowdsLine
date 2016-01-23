<?php get_header('single'); ?>

<?php if (dynamic_sidebar('sidebar-one') || dynamic_sidebar('sidebar-two') || dynamic_sidebar('sidebar-three')) {
	$has_sidebar = true;
} else { 
	$has_sidebar = false;
} ?>
				
				
<?php if(!is_home()) { ?>
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
<?php } ?>


<div id="content" class="clearfix">
	<div class="row clearfix">

			<div class="main-column<?php if ( !is_page()) { echo ($has_sidebar? ' has-sidebar':' no-sidebar') ; }else{echo ' no-sidebar ';} ?>">
				<?php if(is_category()) { ?>
					<div class="archive-title-wrapper clearfix"><h2 class="entry-title"><?php _e('','playne'); ?> <?php single_cat_title(); ?> Blog</h2></div>
				<?php } ?>

				<div class="content-posts">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article <?php post_class('post clearfix'); ?>>
					<?php
						if(!get_post_format()) {
						   get_template_part('format', 'standard');
						} else {
						   //get_template_part('format', get_post_format());
						   get_template_part('format', 'standard');
						};
					?>
					</article>
					<?php endwhile; ?>
					<?php endif; ?>
 
					<?php if( playne_page_has_nav() ) : ?>
					<!-- If there is pagination display nav area -->

						<?php if( !is_home() && !is_archive()) { ?>
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
						<?php } ?>
						<?php if( is_archive()) { ?>
							<div class="view-more-blog">
								<?php next_posts_link(__('View Older Posts', 'playne')) ?>
							</div>
						<?php } ?>
					<?php endif; ?>
			
					<?php if( is_single () || is_home() ) { ?>
						<!-- Comments -->
						<?php if ('open' == $post->comment_status) { ?>
						<div class="comments">
							<?php //comments_template(); ?>
						</div>
						<?php } ?>
			
					<?php if( !is_home() ) { ?>
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
					<?php } ?>

				</div>
				<?php if( is_single () || is_home()) { ?>
					<div class="download-box">
						<div class="download-title">
							<h4>Download the App</h4>
							<p>Track predictions and see how you stack up against the experts</p>
						</div>
						<div class="download-links">
							<a href="https://itunes.apple.com/us/app/the-crowds-line/id954158369?mt=8" target="_blank" class="apple-store-button">Apple Store</a>
							<a href="https://play.google.com/store/apps/details?id=com.thecrowdsline.android" target="_blank" class="google-play-button">Google Play</a>

						</div>
					</div> 
					<?php if( !is_home()) { ?>
					<div class="fb-comments-wrap">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=146687882020188";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-numposts="5" data-width="100%"></div>
						<script>

							jQuery(document).ready(function($) {   
								var setwidth = $('.main-column').width();
								$('.fb-comments').data('width',setwidth);
							});
						</script>
					</div>
					<?php } ?>
					<?php } ?>
			</div> 
			<?php  
					if($has_sidebar){ ?>
				<div class="sidebar-column" id="sidebar">
					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets') ) : else : ?>		
					<?php endif; ?>
					<?php dynamic_sidebar('sidebar-one'); ?>
					<?php dynamic_sidebar('sidebar-two'); ?>
				</div>
			<?php 	}
				  ?>

					
	</div>	
</div>

<?php get_footer(); ?>