</div>
</div>
</div>
<!-- Standard footer -->
<section id="footer">
	<?php if( !get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>

	<?php if(!is_single() && !is_page_template( 'press-custom.php' )   ) { ?>
	<?php if(is_archive()){ $setcategory = 'y'; } ?>
	<!-- First footer area -->
	<div id="footer-background">
		<div class="row clearfix">
			<div id="footer-inside" class="clearfix">

      			<div class="columns">
        			<?php if ( get_theme_mod('theme_customizer_footertextlineone') ) { ?>
        			<h2 class="fade-it2 fadeInDown animated">
        			<?php if ( get_theme_mod('theme_customizer_footertextlineone') ) { ?>
        				<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextlineone', '' )."\n");?>
	 				<?php } ?>
	 				</h2>
	 				<?php } ?>
        
        			<?php if ( get_theme_mod('theme_customizer_footertextlinetwo') ) { ?>
        			<p class="lead fade-it2 fadeInUp animated">
        			<?php if ( get_theme_mod('theme_customizer_footertextlinetwo') ) { ?>
        				<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextlinetwo', '' )."\n");?>
	 				<?php } ?>
	 				</p> 
	 				<?php } ?>

				 	<?php if ( get_theme_mod('theme_customizer_footertextbutton1') ) { ?>
				 		<a href="<?php if ( get_theme_mod('theme_customizer_footertextbutton1url') ) { ?><?php echo esc_url('' .get_theme_mod( 'theme_customizer_footertextbutton1url', '' )."\n");?><?php } ?>">
				 			<span class="button-down">
				 			<i class="icon-arrow-right"></i> <?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextbutton1', '' )."\n");?>
				 			</span>
				 		</a>
				 	<?php } ?>

				 	<?php if ( get_theme_mod('theme_customizer_footertextbutton2') ) { ?>
				 		<a href="<?php if ( get_theme_mod('theme_customizer_footertextbutton2url') ) { ?><?php echo esc_url('' .get_theme_mod( 'theme_customizer_footertextbutton2url', '' )."\n");?><?php } ?>">
				 			<span class="button-down">
				 			<i class="icon-arrow-right"></i> <?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextbutton2', '' )."\n");?>
				 			</span>
				 		</a>
				 	<?php } ?>

				 	<?php if ( get_theme_mod('theme_customizer_footertextsubscribe') ) { ?>
				 		<div id="mc_embed_signup" class="lefts">
							<form action="<?php echo '' .get_theme_mod( 'theme_customizer_footertextsubscribe', '' )."\n";?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<label for="mce-EMAIL"></label>
								<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
								<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
							</form>
						</div>
				 	<?php } ?>

				</div> 
			</div>
		</div>
	</div>
	<?php } ?>
	<?php } ?>
	<!-- Second footer area -->
	<div class="footer-below clearfix">
		<div class="row clearfix">

				<div class="logo-footer">
				 	<?php if ( get_theme_mod('theme_customizer_logo') ) { ?>
						&copy;<a href="<?php echo home_url( '/' ); ?>" class="clearfix"><img class="logo-image" src="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_logo', '' )."\n");?>" alt="<?php the_title(); ?>" /></a>
	    			<?php } else { ?>
		    			&copy;<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>" class="logo-text"><?php bloginfo('name') ?></a> 
	    			<?php } ?>
	    		</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://mixpanel.com/f/partner"><img src="//cdn.mxpnl.com/site_media/images/partner/badge_light.png" alt="Mobile Analytics" /></a>

	    		<div class="sharing">
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
	<div class="clearfix ft-links">
 		<a href="/terms">Terms of Service</a>  | <a href="/privacy">Privacy Policy</a>
	</div>
		</div>
	</div>

</section>

</div>
</div>
<!-- Load the scripts -->
<?php wp_footer(); ?>

	<script type="text/javascript"> 
		jQuery(document).ready(function($){
		   $(".blog-subnav").slideUp();
		  $(".menu-main-menu-container a[title|='blog']").mouseover(function(){
		   	$(".blog-subnav").stop().slideDown("slow"); 
		   	$(".menu-main-menu-container a[title|='blog']").addClass('highlight');
		  });
		  $(".blog-subnav").mouseleave(function(){   
		  	 	setTimeout(function(){
		  	 		$(".blog-subnav").stop().slideUp("slow");  
		   			$(".menu-main-menu-container a[title|='blog']").removeClass('highlight');
				}, 100);
		  });
		 });

	</script>
</body>
</html>