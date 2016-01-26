<?php
/*
Template Name: - TCL Homepage 2016
*/
?>  

<?php get_header(custom); ?>

<!-- Top Panel of the Homepage -->
<div class="top-panel">
<!-- video bg -->
	<video autoplay  poster="<?php echo get_stylesheet_directory_uri(); ?>/videos/TCL_video_screen.jpg" id="bgvid" loop>
		<source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/TCL_homepage_video.webm" type="video/webm">
		<source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/TCL_homepage_video.mp4" type="video/mp4">
	</video>


	<div class="scoreboard-container">
		<div class="widget-container">
			<div class="games">
				<div class="game nfl active">
					NFL WIDGET
				</div>
				<div class="game nba">
					NBA WIDGET
				</div>
				<div class="game ncaab">
					NCAAB WIDGET
				</div>
			</div>
			
			<div class="more-games">
				<h4>More Games</h4>
				<div class="game-tabs">
				<ul>
					<li class="nfl active">
						<p>NFL</p>
					</li>
					<li class="nba">
						<p>NBA</p>
					</li>
					<li class="ncaab">
						<p>NCAAB</p>
					</li>
				</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="scroll-down-arrow-container">
		<div class="scroll-arrow">
			<h4>Learn More</h4>
		</div>
	</div>
</div>

<div class="slider-container">
	<!-- tabs -->
	<div class="tabs-container">
		<div class="tabs">
		  <div><p>THE POWER OF THE CROWD</p></div>
		  <div><p>PLAY &amp; WIN</p></div>
		  <div><p>SEE HOW YOU STACK UP</p></div>
		</div>
	</div>

	<!-- slides -->
	<div class="featured-slider">
		<div>
	  <div class="slide-container slide-01">
	  	<div class="slide-image">
      	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/iphone-score-illustration.png" />
      </div>
      <div class="copy">
	      <h2>feel the power of the crowd</h2>
	      <p class="flex-caption">Make your prediction to unlock The Crowds Line, the world's most comprehensive line built by fans like you.</p>
	      <button class="primary"><a href="#">Play Now</a></button>
      </div>
	  </div>
	  </div>

	  <div>
	  <div class="slide-container slide-02">
	  	<div class="slide-image">
      	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/iphone-screen.png" />
      	<div class="app-icons">
      		<h2>Download the App</h2>
      		<a href="#" class="google-play"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/google-play-store.png" /></a>
      		<a href="#" class="apple-store"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-ap-store.png" /></a>
      	</div>
      </div>
      <div class="copy">
	      <h2>play &amp; win</h2>
	      <p class="flex-caption">Sign up for The Crowds Line and be instantly eligible to win prizes every week in our contests.</p>
	      <button class="primary"><a href="#">Play Now</a></button>
      </div>
	  </div>
	  </div>

	  <div>
	  <div class="slide-container slide-03">
	  	<div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-03.png" />
      </div>
      <div class="copy">
	      <h2>track your results</h2>
	      <p class="flex-caption">The only platform built around you - track your predictions for the entire season across different leagues, anywhere you go. </p>
	      <button class="primary"><a href="#">Play Now</a></button>
      </div>
	  </div>
	  </div>
	</div>
</div>

<!-- Latest Posts -->
<div class="blog-title"><h3><a href="/blog">From the Blog</a></h3>
<div class="latest-posts">
	<?php
	query_posts( 'posts_per_page=12' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ):

        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
    else : 
        //$image = Array([0] => "http://localhost:8888/Crowdline/wp-content/uploads/2016/01/peyton-300x202.jpg");
    endif;
    ?>

	<div class="post" style="background-image: url(<?php echo $image[0]; ?>)">
		<!-- <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php //the_post_thumbnail( 'medium' ); ?>
		</a> -->
		<div class="content">
			<!-- check if it's in the prediction category to add a prediction button/link -->
				<?php if ( in_category( 'nfl-predictions' ) ) : ?>
				<div class="prediction">
					<button class="secondary"><a href="<?php the_permalink(); ?>">Make A Prediction</a></button>
				</div>
			<?php endif; ?>

			<div class="post-info <?php if ( in_category( 'winners' ) ) { echo 'winner'; }; ?>">
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<span class="date-title"> 
					<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
				</span>
			</div>
		</div>

	</div> 

	<?php endwhile; ?>
	<?php endif; ?>
</div>

<!-- Start displaying special parent pages -->
<?php
	global $wp_query;
	// is Page a parent page
	if ( $post->post_parent == 0 ) {
		// on a parent page, get child pages
		$pages = get_pages( 'hierarchical=0&sort_column=menu_order&parent=' . $post->ID );
		// loop through child pages
		foreach ( $pages as $post ){
			setup_postdata( $post );
			// get the template name for the child page
			$template_name = get_post_meta( $post->ID, '_wp_page_template', true );
			$template_name = ( 'default' == $template_name ) ? 'section-standard.php' : $template_name;
			// default page template_part content-page.php
			$slug = 'page';
			// check if the slug exists for the child page
			if ( locate_template( basename( $template_name ) ) != '' ) {
				$slug = pathinfo( $template_name, PATHINFO_FILENAME );
			}
			// load the content template for the child page
			get_template_part( $slug );
		}
	}
?>

<?php get_footer(); ?>