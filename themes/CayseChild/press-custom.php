<?php
/*
Template Name: - press
*/
?>  

<?php get_header('single'); ?>

 		

<div id="content" class="clearfix press-content">
	<div class="row clearfix">

			<div class="sidebar-column" id="sidebar"> 
				<ul class="press-side-nav">
					<li id="press-link" class="active"><a href="/press">Press Coverage</a></li>
					<li id="testimonials-link"><a href="/testimonials">Testimonials</a></li>
				</ul>
			</div>
			
			<div class="main-column has-sidebar">
				<div class="press-media-header">
						<h1>Press &amp; Media</h1>
						<h3>For media inquiries, contact <a href="mailto:press@thecrowdsline.com">press@thecrowdsline.com</a></h3>
				</div>
				<div class="press-title-area">
						<h2 class="entry-title"><?php the_title(); ?></h2>

					<?php while (have_posts()) : the_post(); ?>
							<?php the_content(''); ?>
		            <?php endwhile; // end of the loop. ?> 
		        </div>
				<div class="content-posts">
				    <?php  
 
				$params = array( 
				    'limit' => 99,
				    'orderby' => 'article_date DESC'
				); 

				// Run the find 
				$mypod = pods( 'pressitem', $params ); 

				// Loop through the records returned 
				while ( $mypod->fetch() ) { 
					?>
					<article class="press-item-article">
						<div class="entry-wrap">
							<div class="entry-content">
								<?php if($mypod->display( 'image' )){ ?>
									<div class="img-left">
										<img  src="<?php echo  $mypod->display( 'image' ); ?>" />
									</div>
								<?php } ?>

								<h4><a href="<?php echo $mypod->display( 'url' ); ?>" target="_blank"><?php echo $mypod->display( 'name' ); ?></a></h4>

								<span class="pod-content"><?php echo '<p>'.wp_trim_words( $mypod->display( 'content' ), 20, '...' ) . '</p>'; ?></span>
								<?php if($mypod->display( 'article_date' )){ ?>
								<p><a  href="<?php echo $mypod->display( 'url' ); ?>" target="_blank" class="pod-date"><?php echo date('F Y',strtotime($mypod->display( 'article_date' ))); ?><?php if($mypod->display( 'source' )){ ?>
									<br /> <?php echo $mypod->display( 'source' ); ?>
								<?php } ?></a></p>
								<?php } ?>

							</div>
						</div>
					</article>
				<?php } ?>
			</div><!-- content-posts -->
		</div><!-- main-column -->
	</div><!-- row -->
</div> <!-- content -->
						<script>

							jQuery(document).ready(function($) {    
								$( ".img-left" ).each(function( index ) {
								   var parentHeight = $(this).parent().height();
      								$(this).height(parentHeight);    
      								$(this).children('img').height(parentHeight);  
      								$(this).children('img').css('max-width','1000px');  
								});
							});
						</script>

<?php get_footer(); ?>