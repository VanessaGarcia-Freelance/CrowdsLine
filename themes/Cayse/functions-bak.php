<?php

/*-----------------------------------------------------------------------------------*/
/*	00. Load all scripts and stylesheets into the theme
/*-----------------------------------------------------------------------------------*/

function playne_scripts_styles() {
	
	//Main Stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	//Media queries css
	wp_enqueue_style( 'mediaqueries_css', get_template_directory_uri() . "/media-queries.css", array(), '0.1', 'screen' );
	
	//Google Fonts
	wp_enqueue_style('google_sourcesanspro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400');
	wp_enqueue_style('google_opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400');
	wp_enqueue_style('google_montserrat', 'http://fonts.googleapis.com/css?family=Montserrat');
	wp_enqueue_style('google_raleway', 'http://fonts.googleapis.com/css?family=Raleway:200,400');

	//Metrize css
	wp_enqueue_style( 'metrize_css', get_template_directory_uri() . "/includes/fonts/style.css", array(), '0.1', 'screen' );

	//PrettyPhoto css
	wp_enqueue_style( 'prettyPhoto_css', get_template_directory_uri() . "/includes/lightbox/css/lightbox.css", array(), '0.1', 'screen' );

	//jQuery
	wp_enqueue_script('jquery');

	//Modernizr
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/includes/js/modernizr.custom.js', array(), '2.6.2', false );

	//Parallax
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/includes/js/parallax.js', false, false , true);

	//waypoints
	wp_enqueue_script('waypoints_js', get_template_directory_uri() . '/includes/js/waypoints.min.js', false, false , true);

	//scroll to
	wp_enqueue_script('scrollto_js', get_template_directory_uri() . '/includes/js/jquery.scrollto.js', false, false , true);

	//Fitvid
	wp_enqueue_script('fitvids_js', get_template_directory_uri() . '/includes/js/fitvids.js', false, false , true);

	//Flexslider
	wp_enqueue_script('flexslider_js', get_template_directory_uri() . '/includes/js/flexslider-min.js', false, false , true);

	//Scroller
	wp_enqueue_script('scroller_js', get_template_directory_uri() . '/includes/js/scroller.js', false, false , true);

	//Lightbox
	wp_enqueue_script('lightbox_js', get_template_directory_uri() . '/includes/lightbox/lightbox.js', false, false , true);
	
	//main
	wp_enqueue_script('main_js', get_template_directory_uri() . '/includes/js/main.js', false, false , true);

}
add_action( 'wp_enqueue_scripts', 'playne_scripts_styles' );

/*-----------------------------------------------------------------------------------*/
/*	01. Support customizer panel
/*-----------------------------------------------------------------------------------*/

require_once(dirname(__FILE__) . "/customizer.php");

function playne_setup() {

/*-----------------------------------------------------------------------------------*/
/*	02. Add support for the custom header background image
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'custom-header');

/*-----------------------------------------------------------------------------------*/
/*	03. Add customised read more link for blog posts
/*-----------------------------------------------------------------------------------*/

function playne_new_excerpt_more($more) {
       global $post;
	return '<div class="centered"><a class="more-linkd" href="'. get_permalink() . '">Read More</a></div>';
}
add_filter('excerpt_more', 'playne_new_excerpt_more');

function playne_readmore() {
	global $post;
	$ismore = @strpos( $post->post_content, '<!--more-->');
	if($ismore) : the_content(__( '<div class="centered"><a class="more-linkd" href="'. get_permalink() . '">Read More</a></div>','playne'));
	else : the_excerpt(__( '<div class="centered"><a class="more-linkd" href="'. get_permalink() . '">Read More</a></div>','playne'));
	endif;
}

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	04. Add custom background color support
/*-----------------------------------------------------------------------------------*/

$argss = array(
	'default-color'          => '#363d40'
);
add_theme_support( 'custom-background', $argss );

/*-----------------------------------------------------------------------------------*/
/*	05. Flexslider support
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() .'/includes/scripts/rotator.php' );

/*-----------------------------------------------------------------------------------*/
/*	06. Translatable theme files
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain( 'playne', get_template_directory() . '/includes/languages' );
 
$locale = get_locale();
$locale_file = get_template_directory_uri() . "/includes/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);	

/*-----------------------------------------------------------------------------------*/
/*	07. Support shortcodes inside widgets
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	08. Pagination support
/*-----------------------------------------------------------------------------------*/

function playne_page_has_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*-----------------------------------------------------------------------------------*/
/*	10. Add support for standard wordpress custom formats
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-formats', array( 'quote', 'image', 'video', 'link', 'aside', 'gallery', 'chat'));

/*-----------------------------------------------------------------------------------*/
/*	11. Custom fonts inside the post editor 
/*-----------------------------------------------------------------------------------*/

require_once(dirname(__FILE__) . "/includes/scripts/add-styles.php");

add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/*	12. Custom menu support for the main menu
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'menus' );
register_nav_menu('main', 'Main front page menu');
register_nav_menu('inner', 'Inner pages menu');

/*-----------------------------------------------------------------------------------*/
/*	13. Post thumbnails add specific size for responsiveness
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-thumbnails');
add_image_size( 'large-image', 9999, 9999, false ); // Large Post Image

if ( ! isset( $content_width ) ) $content_width = 720;

/*-----------------------------------------------------------------------------------*/
/*	14. Footer widgets 
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebars') )

register_sidebar(array(

	'name' => __( 'Sidebar 1', 'playne'),

	'id' => 'sidebar-one',

	'description' => __( 'Widgets in this area are used in the first sidebar column', 'playne'),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Sidebar 2', 'playne'),

	'id' => 'sidebar-two',

	'description' => __( 'Widgets in this area are used in the second sidebar column', 'playne' ),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Sidebar 3', 'playne'),

	'id' => 'sidebar-three',

	'description' => __( 'Widgets in this area are used in the third sidebar column', 'playne' ),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

/*-----------------------------------------------------------------------------------*/
/*	15. Specific comments block 
/*-----------------------------------------------------------------------------------*/

function playne_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		
		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">	
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
					
					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>', 'playne'), get_comment_author_link()) ?>
						<div style="clear:both;"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'playne'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'playne'),'  ','') ?>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
			
			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</p>
			</div>
		
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'playne') ?></em>
			<?php endif; ?>    
		</div>
<?php
}

function playne_alter_comment_form_fields($fields){

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name *', 'playne' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="Your Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email">' . '<label for="email">' . __( 'Your Email *', 'playne' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email" type="text" placeholder="Your Email *" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url">' . '<label for="url">' . __( 'Your Website', 'playne' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="url" name="url" type="text" placeholder="Your Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' /></p>';

    return $fields;
}
add_filter('comment_form_default_fields','playne_alter_comment_form_fields');


function playne_cancel_comment_reply_button($html, $link, $text) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="icon-remove-sign"></i> </div>';
}
 
add_action('cancel_comment_reply_link', 'playne_cancel_comment_reply_button', 10, 3);

/*-----------------------------------------------------------------------------------*/
/*	16. Add home link to the menu options
/*-----------------------------------------------------------------------------------*/

add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/*-----------------------------------------------------------------------------------*/
/*	17. Custom CSS styles set via the customizer panel
/*-----------------------------------------------------------------------------------*/

function accent_color()
{
    $accent_color = get_option( 'accent_color' );
    $headerlogo_color = get_option ('headerlogo_color');
    $headerintro_color = get_option ('headerintro_color');
    $headertext_color = get_option ('headertext_color');
    $footerheader_color = get_option ('footerheader_color');
    $mainsection_color = get_option( 'mainsection_color' );
    $oddsection_color = get_option ('oddsection_color');
    $footerbottom_color = get_option ('footerbottom_color');
    ?>
        <style type="text/css"> 
.container .even, .even .entry-content {background:<?php echo $mainsection_color; ?>;}
.logo a, .socials a {color:<?php echo $headerlogo_color; ?>;}
#header h2 {color:<?php echo $headerintro_color; ?>;}
.button, .button.normal, .button.white:hover, #commentform #submit, #sidebar select, .button-down:hover, .button-hover {border: 1px solid <?php echo $accent_color; ?>;}
.button:hover, .button.normal:hover, #commentform #submit:hover, .tagcloud a:hover, .button-down:hover, .button-hover {background: <?php echo $accent_color; ?> !important;}
#header .lead, #footer .columns .lead {color:<?php echo $headertext_color; ?>;}
.flex-control-paging li a:hover, .flex-control-paging li a.flex-active, .flex-control-paging li a, .flexslider-container .flexslider-blockquote .flex-control-paging li a.flex-active, .flexslider-container .flexslider-blockquote .flex-control-paging li a:hover, .flexslider-container .flexslider-blockquote .flex-control-paging li a, .tagcloud a, #sidebar .widget input.search-form-input, #sidebar .widget_archive select, #sidebar .widget_categories select#cat {border-color: <?php echo $accent_color; ?>;} 
#sidebar .widget a, #sidebar .widget li a, .button, .button.normal, .header-shrink #nav a.selected, .header-shrink #nav a:hover, body a, .entry-title a:hover, #commentform #submit, #sidebar select, #sidebar .widget input.search-form-input, #sidebar .widget_archive select, #sidebar .widget_categories select#cat {color:<?php echo $accent_color; ?>;} .container .odd, .odd .entry-content, #page-header, #respond input[type="text"], #respond textarea {background:<?php echo $oddsection_color; ?>;} .blog .entry-wrap, #sidebar .widget, .single .entry-content, .commentlist li:last-child {border-bottom: 1px solid <?php echo $oddsection_color; ?>;} #header, .header-shrink, .header, .collapse-menu-bg, #collapse, #preloader, .footer-below {background-color:<?php echo $footerheader_color; ?>;} </style>
    <?php
}
add_action( 'wp_head', 'accent_color');


function post_even() {
	global $post_num;

	if ( ++$post_num % 2 )
		$class = 'even';
	else
		$class = 'odd';

	echo $class;
}
	
/*-----------------------------------------------------------------------------------*/
/*	18. Alter length of excerpts 
/*-----------------------------------------------------------------------------------*/

function string_limit_words($string, $word_limit) {
$words = explode(' ', $string, ($word_limit + 1));
if(count($words) > $word_limit)
array_pop($words);
return implode(' ', $words);
}

/*-----------------------------------------------------------------------------------*/
/*	19. Full width slider 
/*-----------------------------------------------------------------------------------*/

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

/*-----------------------------------------------------------------------------------*/
/*	20. Testimonials
/*-----------------------------------------------------------------------------------*/

	add_action('init', 'testimonials_custom_init');
	/*-- Custom Post Init Begin --*/
	function testimonials_custom_init()
	{
	  $labels = array(
		'name' => _x('Testimonials', 'post type general name', 'playne'),
		'singular_name' => _x('Testimonial', 'post type singular name', 'playne'),
		'add_new' => _x('Add New', 'Testimonial', 'playne'),
		'add_new_item' => __('Add New Testimonial', 'playne'),
		'edit_item' => __('Edit Testimonial', 'playne'),
		'new_item' => __('New Testimonial', 'playne'),
		'view_item' => __('View Testimonial', 'playne'),
		'search_items' => __('Search Testimonials', 'playne'),
		'not_found' =>  __('No Testimonials found', 'playne'),
		'not_found_in_trash' => __('No Testimonials found in Trash', 'playne'),
		'parent_item_colon' => '',
		'menu_name' => 'Testimonial'
	  );
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments', 'post-meta-box-slider', 'custom-fields')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('testimonial',$args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Categories', 'taxonomy general name', 'playne' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'playne' ),
		'search_items' =>  __( 'Search Types', 'playne' ),
		'all_items' => __( 'All Categories', 'playne' ),
		'parent_item' => __( 'Parent Category', 'playne' ),
		'parent_item_colon' => __( 'Parent Category:', 'playne' ),
		'edit_item' => __( 'Edit Categoriess', 'playne' ),
		'update_item' => __( 'Update Category', 'playne' ),
		'add_new_item' => __( 'Add New Category', 'playne' ),
		'new_item_name' => __( 'New Category Name', 'playne' ),
	  );
		// Custom taxonomy for Project Tags
		register_taxonomy('tagportfolio',array('project'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag-portfolio' ),
	  ));
	}
	/*-- Custom Post Init Ends --*/

	/*--- Custom Messages - project_updated_messages ---*/
	add_filter('post_updated_messages', 'testimonial_updated_messages');
	function testimonial_updated_messages( $messages ) {
	  global $post, $post_ID;
	  $messages['testimonial'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Testimonial updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', 'playne'),
		3 => __('Custom field deleted.', 'playne'),
		4 => __('Testimonial updated.', 'playne'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Testimonial restored to revision from %s', 'playne'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Testimonial published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Testimonial saved.', 'playne'),
		8 => sprintf( __('Testimonial submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i', 'playne'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Testimonial draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );
	  return $messages;
	}
	/*--- #end playne - project_updated_messages ---*/	


/*-----------------------------------------------------------------------------------*/
/*	21. Custom meta boxes
/*-----------------------------------------------------------------------------------*/

function playne_metaboxes( $meta_boxes ) {
	$prefix = '_playne_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'test_metabox',
		'title' => 'Homepage item options',
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(

	            'name' => 'Background color',

	            'desc' => 'Change the background color of the homepage item',

	            'id'   => $prefix . 'colorpickerz',

	            'type' => 'colorpicker'

	        ),
			array(

	            'name' => 'Header text color',

	            'desc' => 'Change the header text color of the homepage item',

	            'id'   => $prefix . 'colorpickerz2',

	            'type' => 'colorpicker',

		    'std'  => '#363b40'

	        ),
			array(

	            'name' => 'Main text color',

	            'desc' => 'Change the main text color of the homepage item',

	            'id'   => $prefix . 'colorpickerz3',

	            'type' => 'colorpicker',

		    'std'  => '#55606E'

	        ),

			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image or enter an URL as background of the homepage item (this will overwrite the color background)',
				'id'   => $prefix . 'imagepickerz',
				'type' => 'file',
			),

		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'playne_metaboxes' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'includes/metabox/init.php' );
	}
}

}
add_action( 'after_setup_theme', 'playne_setup' );