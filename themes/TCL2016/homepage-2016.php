<?php
/*
Template Name: - TCL Homepage 2016
*/
?>  

<?php get_header(custom); ?>

<!-- Top Panel of the Homepage -->
<div class="top-panel">
	<div class="scoreboard-container">
		<div class="widget-container"></div>
	</div>

	<div class="scroll-down-arrow-container">
		<div class="scroll-arrow">
			<h4>Learn More</h4>
		</div>
	</div>
</div>

<div class="slider-container">
	<div class="tabs">
	  <div><p>your content 1</p></div>
	  <div><p>your content 2</p></div>
	  <div><p>your content 3</p></div>
	</div>

	<div class="featured-slider">
	  <div>
	  	<div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-01.png" />
      </div>
      <div class="copy">
	      <h2>something something</h2>
	      <p class="flex-caption">Adventurer Caramel</p>
      </div>
	  </div>
	  <div>
	  	<div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-02.png" />
      </div>
      <div class="copy">
	      <h2>something something</h2>
	      <p class="flex-caption">Adventurer Caramel</p>
      </div>
	  </div>
	  <div>
	  	<div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-03.png" />
      </div>
      <div class="copy">
	      <h2>something something</h2>
	      <p class="flex-caption">Adventurer Caramel</p>
      </div>
	  </div>
	</div>
</div>

<!-- Latest Posts -->
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
			<div class="prediction">
				<p>Make A Prediction</p>
			</div>
			<div class="post-info">
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