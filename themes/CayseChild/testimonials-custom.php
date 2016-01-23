<?php
/*
Template Name: - Press Testimonials
*/
?>  

<?php get_header('single'); ?>

<div id="content" class="clearfix press-content testimonials">
	<div class="row clearfix">
		
				<div class="sidebar-column" id="sidebar"> 
					<ul class="press-side-nav">
						<li id="press-link"><a href="/press">Press Coverage</a></li>
						<li id="testimonials-link" class="active"><a href="/testimonials">Testimonials</a></li>
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
				    'orderby' => 'postdate DESC'
				); 

				// Run the find 
				$mypod = pods( 'customertestimonial', $params ); 

				// Loop through the records returned 
				while ( $mypod->fetch() ) { 
					?>
					<article class="press-item-article <?php if(!$mypod->display( 'image' )){ echo 'noimage'; } ?>">
						<div class="entry-wrap">
							<div class="entry-content">
								<?php if($mypod->display( 'image' )){ ?>
									<div class="img-left">
										<img  src="<?php echo  $mypod->display( 'image' ); ?>" />
									</div>
								<?php } ?>

								<h4><?php echo $mypod->display( 'name' ); ?> <span class="position-title"><?php echo $mypod->display( 'position_title' ); ?>
								<?php if($mypod->display( 'postdate' )){ ?>
									&bull; <?php echo date('F Y', strtotime($mypod->display( 'postdate' ))); ?>
								<?php } ?></span> </h4>
								<?php if($mypod->display( 'rating' )){
									?>

									<div class="rating">
								<?php

									$i = 1;
									while ($i <= $mypod->display( 'rating' )) {
									    echo '<span class="good">&#9733;</span>';
									    $i++;   
									}
									while ($i <= 5) {
									    echo '<span>&#9733;</span>';
									    $i++;   
									}
								 ?> 
									</div>
								<?php } ?>


								<span class="pod-content"><?php echo $mypod->display( 'content' ); ?></span> 
							</div>
						</div>
					</article>
				<?php } ?>
			</div><!-- content-posts -->
		</div><!-- main-column -->
	</div><!-- row -->
</div> <!-- content -->

<?php get_footer(); ?>