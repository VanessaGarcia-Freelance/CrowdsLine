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

	<?php if (get_header_image() != '') {?>
		<style type="text/css">
			#header, #footer-background {background: url("<?php header_image(); ?>"); background-repeat: no-repeat; background-size: cover !important;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;}
		</style>
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

	    	<div class="sharing">
	    		<!-- Get social icons -->
	    		<ul class="socials">
					<?php if ( get_theme_mod('theme_customizer_footerfacebook') ) { ?>
					<li><a class="facebook" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerfacebook', '' )."\n");?>" target="_blank"><i class="icon-social-facebook"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footertwitter') ) { ?>
					<li><a class="twitter" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footertwitter', '' )."\n");?>" target="_blank"><i class="icon-social-twitter"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footeryoutube') ) { ?>
					<li><a class="youtube" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footeryoutube', '' )."\n");?>" target="_blank"><i class="icon-social-youtube"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footerlinkedin') ) { ?>
					<li><a class="linkedin" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerlinkedin', '' )."\n");?>" target="_blank"><i class="icon-social-linkedin"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footertumblr') ) { ?>
					<li><a class="tumblr" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footertumblr', '' )."\n");?>" target="_blank"><i class="icon-social-tumblr"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footerflickr') ) { ?>
					<li><a class="flickr" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerflickr', '' )."\n");?>" target="_blank"><i class="icon-social-flickr"></i></a></li>
					<?php } ?>
					
					<?php if ( get_theme_mod('theme_customizer_footerdribbble') ) { ?>
					<li><a class="dribbble" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerdribbble', '' )."\n");?>" target="_blank"><i class="icon-social-dribbble"></i></a></li>
					<?php } ?>
					
					<?php if ( get_theme_mod('theme_customizer_footerinstagram') ) { ?>
					<li><a class="instagram" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerinstagram', '' )."\n");?>" target="_blank"><i class="icon-social-instagram"></i></a></li>
					<?php } ?>
					
					<?php if ( get_theme_mod('theme_customizer_footergoogle') ) { ?>
					<li><a class="google" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footergoogle', '' )."\n");?>" target="_blank"><i class="icon-social-google-plus"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footeremail') ) { ?>
					<li><a class="e-mail" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footeremail', '' )."\n");?>" target="_blank"><i class="icon-social-email"></i></a></li>
					<?php } ?>
					
					<?php if ( get_theme_mod('theme_customizer_footerskype') ) { ?>
					<li><a class="skype" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerskype', '' )."\n");?>" target="_blank"><i class="icon-social-skype"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footervimeo') ) { ?>
					<li><a class="vimeo" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footervimeo', '' )."\n");?>" target="_blank"><i class="icon-social-vimeo"></i></a></li>
					<?php } ?>
					
					<?php if ( get_theme_mod('theme_customizer_footerrss') ) { ?>
					<li><a class="rss" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerrss', '' )."\n");?>" target="_blank"><i class="icon-rss"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footerpinterest') ) { ?>
					<li><a class="pinterest" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerpinterest', '' )."\n");?>" target="_blank"><i class="icon-social-pinterest"></i></a></li>
					<?php } ?>

					<?php if ( get_theme_mod('theme_customizer_footerrss') ) { ?>
					<li><a class="rss" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerrss', '' )."\n");?>" target="_blank"><i class="icon-rss"></i></a></li>
					<?php } ?>
				</ul>
			</div>
	    </div>
			
			<?php 
			$theme_showcaseimage = get_theme_mod('theme_customizer_showcaseimage');
			$theme_headertextlineone = get_theme_mod('theme_customizer_headertextlineone');
			$theme_headertextlinetwo = get_theme_mod('theme_customizer_headertextlinetwo');
			$theme_headerbutton = get_theme_mod('theme_customizer_headerbutton');
			$theme_headerbutton2 = get_theme_mod('theme_customizer_headerbutton2');
			$theme_headersubscribe = get_theme_mod('theme_customizer_headersubscribe');
			
			if( $theme_showcaseimage || $theme_headertextlineone || $theme_headertextlinetwo || $theme_headerbutton || $theme_headerbutton2 || $theme_headersubscribe){
			?>
			
			
    	<div class="row extra clearfix z-d<?php if(!get_theme_mod('theme_customizer_showcaseimage')) { ?>extra-padding<?php } ?>">
      		<div class="columns" id="fadeOut">

		        <h2 class="fade-it2 <?php if ( get_theme_mod('theme_customizer_animations0') ) { ?>fadeInDown<?php } else if ( get_theme_mod('theme_customizer_animations1') ) { ?>pulse<?php } else if ( get_theme_mod('theme_customizer_animations2') ) { ?>tada<?php } else if ( get_theme_mod('theme_customizer_animations3') ) { ?>bounceIn<?php } else if ( get_theme_mod('theme_customizer_animations4') ) { ?>flipInX<?php } else { ?>fadeInDown<?php } ?> animated">
		        <!-- Get first header text -->
		        	<?php if ( get_theme_mod('theme_customizer_headertextlineone') ) { ?>
		        		<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_headertextlineone', '' )."\n");?>
			 		<?php } ?>
			 	</h2>
        
		        <p class="lead fade-it2 fadeInDownSlower animated">
		        <!-- Get second header text -->
		        	<?php if ( get_theme_mod('theme_customizer_headertextlinetwo') ) { ?>
		        		<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_headertextlinetwo', '' )."\n");?>
			 		<?php } ?>
			 	</p>

			 	<?php if ( get_theme_mod('theme_customizer_headerbutton') ) { ?>
			 	<!-- Get first header button -->
			 		<a href="<?php if ( get_theme_mod('theme_customizer_headerbuttonlink') ) { ?><?php echo esc_url('' .get_theme_mod( 'theme_customizer_headerbuttonlink', '' )."\n");?><?php } else { ?>#wrapper<?php } ?>" id="downed">
			 			<span class="button-down main-button">
			 			<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_headerbutton', '' )."\n");?>
			 			</span>
			 		</a>
			 	<?php } ?>

			 	<?php if ( get_theme_mod('theme_customizer_headerbutton2') ) { ?>
			 	<!-- Get second header button -->
			 		<a href="<?php if ( get_theme_mod('theme_customizer_headerbuttonlink2') ) { ?><?php echo esc_url('' .get_theme_mod( 'theme_customizer_headerbuttonlink2', '' )."\n");?><?php } ?>">
			 			<span class="button-down main-button">
			 			<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_headerbutton2', '' )."\n");?>
			 			</span>
			 		</a>
			 	<?php } ?>

			 	<?php if ( get_theme_mod('theme_customizer_headersubscribe') ) { ?>
			 	<!-- Get subscribe form -->
			 		<div id="mc_embed_signup" class="lefts">
						<form action="<?php echo '' .get_theme_mod( 'theme_customizer_headersubscribe', '' )."\n";?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
							<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
						</form>
					</div>
			 	<?php } ?>

			</div> 

		      	<?php if(is_front_page() && get_theme_mod('theme_customizer_showcaseimage') ) { ?>
		      	<!-- Get the featured image -->
		      	<div class="headerimage clearfix">
					<?php if ( get_theme_mod('theme_customizer_showcaseimage') ) { ?>
					<img src="<?php echo '' .get_theme_mod( 'theme_customizer_showcaseimage', '' )."\n";?>" alt="" class="header-showcase" />
					<?php } ?>
				</div>    
				<?php } ?>
    	</div>
			<?php } ?>
	</section>

<div id="wrapper" class="clearfix">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div id="main">