<?php

/*-----------------------------------------------------------------------------------*/
/*	00. Load all scripts and stylesheets into the theme
/*-----------------------------------------------------------------------------------*/

function gacode() {
?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-57934059-1', 'auto');
		ga('send', 'pageview');

	</script>
<?php
}

add_action( 'wp_enqueue_scripts', 'child_functions_enqueue_scripts' );
function child_functions_enqueue_scripts() {
    wp_enqueue_script( 'child_functions', get_stylesheet_directory_uri() . '/js/tcl2016.js', '', '', true );
}


