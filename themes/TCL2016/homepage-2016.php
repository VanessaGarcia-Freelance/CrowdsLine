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
			

<!-- <div id="tabs" class="flexslider">
  <ul class="slides">
    <li>
      <p>slide 1</p>
    </li>
    <li>
      <p>slide 2</p>
    </li>
    <li>
      <p>slide 3</p>
    </li>
  </ul>
</div> -->
<!-- Gallery Slider -->
<!-- <div id="featured-slide" class="flexslider">
  <ul class="slides">
    <li>
    	<div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-01.png" />
      </div>
      <div class="copy">
	      <h2>something something</h2>
	      <p class="flex-caption">Adventurer Caramel</p>
      </div>
    </li>
    <li>
      <div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-02.png" />
      </div>
      <div class="copy">
	      <h2>something something</h2>
	      <p class="flex-caption">Adventurer Caramel</p>
      </div>
    </li>
    <li>
    	<div class="slide-image">
      	<img src="http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/slide-03.png" />
      </div>
      <div class="copy">
	      <h2>something something</h2>
	      <p class="flex-caption">Adventurer Caramel</p>
      </div>
    </li>
  </ul>
</div> -->

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