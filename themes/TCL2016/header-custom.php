<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title><?php wp_title( '-', true, 'right' ); ?><?php echo bloginfo( 'name' ); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
	
	<!--[if lte IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/css/ie.css" media="screen"/>
	<![endif]-->

	<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script type="text/javascript">
	document.documentElement.className = 'js';
	</script>
	
	<?php if ( get_theme_mod('theme_customizer_favicon') ) { ?>
	<!-- Get the favicon -->
	<link rel="icon" type="image/png" href="<?php echo '' .get_theme_mod( 'theme_customizer_favicon', '' )."\n";?>" />
	<?php } ?>
	<?php 
	$page_id = get_queried_object_id();
	$page_content = get_post_field( 'post_content', $page_id );
	$bgnd_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
	?>

<style type="text/css">
			/*#header, #footer-background {background: url("http://thecrowdsline.staging.wpengine.com/wp-content/uploads/2016/01/top-panel-bg.jpg"); background-repeat: no-repeat; background-size: cover !important;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;}*/
		</style>
	
	<?php if (get_header_image() != '') {?>
		<!-- <style type="text/css">
			#header, #footer-background {background: url("<?php echo $bgnd_image[0] ; ?>"); background-repeat: no-repeat; background-size: cover !important;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;}
		</style> -->
	<?php } ?>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
	<?php gacode(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Mobile menu -->
	<div class="container<?php if( !get_theme_mod( 'theme_customizer_general2' ) == '0') { ?> boxed<?php } ?>">

		<div class="mobile-menu clearfix<?php if( get_theme_mod( 'theme_customizer_general1' ) == '1') { ?> hidden<?php } ?>">
			<section id="collapse">
				<div class="collapse-darker">

				<div class="row clearfix">
					<div class="mobile-menu-inner">
						<?php if (is_front_page()) { ?>
							<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav-mobile')); ?>
						<?php } else { ?>
							<?php wp_nav_menu(array('theme_location' => 'inner', 'menu_class' => 'nav-mobile')); ?>
						<?php } ?>
					</div>
				</div>
				</div>
			</section>
			<div class="collapse-menu-bg clearfix">
				<a href="#" id="collapse-menu"><h3>Menu</h3></a>
			</div>
		</div>

	<!-- Header fade in navigation -->
	<div class="<?php if( get_theme_mod( 'theme_customizer_general1' ) == '1') { ?>hidden<?php } ?> header header-shrink<?php if( !get_theme_mod( 'theme_customizer_general2' ) == '0') { ?> boxed-nav<?php } ?>" id="dynamic">
		
		<nav class="row clearfix">
			<div class="logo">
			<?php if ( get_theme_mod('theme_customizer_logo') ) { ?>
				<a href="<?php echo home_url( '/' ); ?>" class="clearfix"><img class="logo-image" src="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_logo', '' )."\n");?>" alt="<?php the_title(); ?>" /></a>
	    	<?php } else { ?>
	    		<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>" class="logo-text"><?php bloginfo('name') ?></a>
	    	<?php } ?>
	    	</div>
			
			<div id="nav" class="clearfix">
				<div class="special clearfix">
					<a href="#" class="totop"><i class="icon-arrow-up"></i></a>
					<?php if(is_front_page()) { ?>
						<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav')); ?>
					<?php } else { ?>
						<?php wp_nav_menu(array('theme_location' => 'inner', 'menu_class' => 'nav')); ?>
					<?php } ?>
			 	</div>
			</div>
		</nav>	
	</div> 

	<!-- Header showcase area -->
	<section id="header">
		<div class="row row-header clearfix z-d animated fadeIn">
			<div class="logo">
				 <?php if ( get_theme_mod('theme_customizer_logo') ) { ?>
					<a href="<?php echo home_url( '/' ); ?>" class="clearfix"><img class="logo" src="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_logo', '' )."\n");?>" alt="<?php the_title(); ?>" /></a>
	    		<?php } else { ?>
		    		<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name') ?></a>
	    		<?php } ?>
	    	</div>
	    	<div id="nav" class="clearfix">
				<div class="special clearfix">
					<!-- <a href="#" class="totop"><i class="icon-arrow-up"></i></a> -->
					<?php if(is_front_page()) { ?>
						<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav')); ?>
					<?php } else { ?>
						<?php wp_nav_menu(array('theme_location' => 'inner', 'menu_class' => 'nav')); ?>
					<?php } ?>
			 	</div>
			</div>
	    </div>

    	<!-- <div class="row extra clearfix z-d <?php if(!get_theme_mod('theme_customizer_showcaseimage')) { ?><?php } ?>">
				<div class="columns clearfix" id="fadeOut">
					<?php //echo $page_content;?>
				</div>
    	</div> -->
	</section>

<div id="wrapper" class="clearfix">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div id="main">