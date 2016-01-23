<?php
 
add_filter( 'customize_register', 'theme_customizer_register' );

function theme_customizer_register($wp_customize) {

	//Add two custom controls to the panel
	class Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    								}
	}	

		class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

	//Remove certain useless functions for this theme
	$wp_customize->remove_control( 'display_header_text');
	$wp_customize->remove_control( 'header_textcolor');
	$wp_customize->remove_section('nav');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('background_image');

	//Section Style Options
	$wp_customize->add_section( 'theme_customizer_basic', array(
		'title' => __( 'Logo image', 'section' ),
		'priority' => 100
	) );
	
	//Logo Image
	$wp_customize->add_setting( 'theme_customizer_logo', array(
		
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_logo', array(
		'label' => __( 'Logo Upload', 'section' ),
		'section' => 'theme_customizer_basic',
		'settings' => 'theme_customizer_logo'
	) ) );

	//Animation options
	$wp_customize->add_section( 'theme_customizer_animations', array(
		'title' => __( 'Header animation Options', 'section' ),
		'priority' => 102
	) );

	$wp_customize->add_setting( 'theme_customizer_animations0', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animations0', array(
		'label' => __( 'Standard', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_animations',
		'settings' => 'theme_customizer_animations0'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_animations1', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animations1', array(
		'label' => __( 'Pulse', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_animations',
		'settings' => 'theme_customizer_animations1'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_animations2', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animations2', array(
		'label' => __( 'Tada', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_animations',
		'settings' => 'theme_customizer_animations2'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_animations3', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animations3', array(
		'label' => __( 'Bounce in', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_animations',
		'settings' => 'theme_customizer_animations3'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_animations4', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animations4', array(
		'label' => __( 'Flip in horizontally', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_animations',
		'settings' => 'theme_customizer_animations4'
	) ) );

	//General options
	$wp_customize->add_section( 'theme_customizer_general', array(
		'title' => __( 'General Options', 'section' ),
		'priority' => 103
	) );

	$wp_customize->add_setting( 'theme_customizer_general1', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general1', array(
		'label' => __( 'Disable navigation completely (to get a pure single page theme)', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general1'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general2', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general2', array(
		'label' => __( 'Enable boxed version', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general2'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general3', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general3', array(
		'label' => __( 'Hide top footer area', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general3'
	) ) );

	//Favicon Image
	$wp_customize->add_section( 'theme_customizer_favicon', array(
		'title' => __( 'Favicon image', 'section' ),
		'priority' => 101
	) );
	
	$wp_customize->add_setting( 'theme_customizer_favicon', array(
		
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_favicon', array(
		'label' => __( 'Favicon Upload', 'section' ),
		'section' => 'theme_customizer_favicon',
		'settings' => 'theme_customizer_favicon'
	) ) );

	//Header Phone Image
	$wp_customize->add_section( 'theme_customizer_showcaseimage', array(
		'title' => __( 'Header Showcase Image', 'section' ),
		'priority' => 120
	) );
	
	$wp_customize->add_setting( 'theme_customizer_showcaseimage', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_showcaseimage', array(
		'label' => __( 'Showcase image Upload', 'section' ),
		'section' => 'theme_customizer_showcaseimage',
		'settings' => 'theme_customizer_showcaseimage'
	) ) );

	//Favicon Image
	$wp_customize->add_section( 'theme_customizer_footersocials', array(
		'title' => __( 'Social Icons', 'section' ),
		'priority' => 111
	) );

	$wp_customize->add_setting( 'theme_customizer_footerfacebook', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerfacebook', array(
		'label' => __( 'Facebook link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footerfacebook'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footeryoutube', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footeryoutube', array(
		'label' => __( 'Youtube link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footeryoutube'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertwitter', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertwitter', array(
		'label' => __( 'Twitter link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footertwitter'
	) ) );


	$wp_customize->add_setting( 'theme_customizer_footervimeo', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footervimeo', array(
		'label' => __( 'Vimeo link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footervimeo'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footeremail', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footeremail', array(
		'label' => __( 'Email link (mailto:youremail@email.com)', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footeremail'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerrss', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerrss', array(
		'label' => __( 'Rss link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footerrss'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerpinterest', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerpinterest', array(
		'label' => __( 'Pinterest link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footerpinterest'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerlinkedin', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerlinkedin', array(
		'label' => __( 'Linkedin link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footerlinkedin'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerdribbble', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerdribbble', array(
		'label' => __( 'Dribbble link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footerdribbble'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footergoogle', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footergoogle', array(
		'label' => __( 'Google plus link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footergoogle'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerflickr', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerflickr', array(
		'label' => __( 'Flickr link', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footersocials',
		'settings' => 'theme_customizer_footerflickr'
	) ) );

	//Intro header text
	$wp_customize->add_section( 'theme_customizer_headertext', array(
		'title' => __( 'Header Intro text & buttons', 'section' ),
		'priority' => 102
	) );
	
	$wp_customize->add_setting( 'theme_customizer_headertextlineone', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headertextlineone', array(
		'label' => __( 'Intro header', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headertext',
		'settings' => 'theme_customizer_headertextlineone',
		'priority' => 1
	) ) );
	
	$wp_customize->add_setting( 'theme_customizer_headertextlinetwo', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_headertextlinetwo', array(
    'label'   => 'Intro header subtext',
    'section' => 'theme_customizer_headertext',
    'settings'   => 'theme_customizer_headertextlinetwo',
    'priority' => 2
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headerbutton', array(	
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbutton', array(
    'label'   => 'First button text',
    'section' => 'theme_customizer_headertext',
    'settings'   => 'theme_customizer_headerbutton',
    'priority' => 3
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headerbuttonlink', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbuttonlink', array(
    'label'   => 'First Button link',
    'section' => 'theme_customizer_headertext',
    'settings'   => 'theme_customizer_headerbuttonlink',
    'priority' => 4
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headerbutton2', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbutton2', array(
    'label'   => 'Second Button text',
    'section' => 'theme_customizer_headertext',
    'settings'   => 'theme_customizer_headerbutton2',
    'priority' => 5
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headerbuttonlink2', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbuttonlink2', array(
    'label'   => 'Second Button link',
    'section' => 'theme_customizer_headertext',
    'settings'   => 'theme_customizer_headerbuttonlink2',
    'priority' => 6
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headersubscribe', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_headersubscribe', array(
    'label'   => 'Mailchimp form action=""',
    'section' => 'theme_customizer_headertext',
    'settings'   => 'theme_customizer_headersubscribe',
    'description'    => sprintf( __('Paste the mailchimp code that comes after the from action=" code inside your mailchimp dashboard.','playne')),
    'priority' => 7
	) ) );

	//Footer header text
	$wp_customize->add_section( 'theme_customizer_footertext', array(
		'title' => __( 'Footer outro text & buttons', 'section' ),
		'priority' => 115
	) );
	
	$wp_customize->add_setting( 'theme_customizer_footertextlineone', array(
		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextlineone', array(
		'label' => __( 'Outro Text Header', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footertextlineone',
		'priority' => 1
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextlinetwo', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_footertextlinetwo', array(
    'label'   => 'Outro text',
    'section' => 'theme_customizer_footertext',
    'settings'   => 'theme_customizer_footertextlinetwo',
    'priority' => 2
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton1', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton1', array(
    'label'   => 'Button 1 (if not filled it will not show)',
    'type' => 'text',
    'section' => 'theme_customizer_footertext',
    'settings'   => 'theme_customizer_footertextbutton1',
    'priority' => 3
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton1url', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton1url', array(
    'label'   => 'Button 1 link (if not filled it will not show)',
    'type' => 'text',
    'section' => 'theme_customizer_footertext',
    'settings'   => 'theme_customizer_footertextbutton1url',
    'priority' => 4
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton2', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton2', array(
    'label'   => 'Button 2 (if not filled it will not show)',
    'type' => 'text',
    'section' => 'theme_customizer_footertext',
    'settings'   => 'theme_customizer_footertextbutton2',
    'priority' => 5
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton2url', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton2url', array(
    'label'   => 'Button 2 link (if not filled it will not show)',
    'type' => 'text',
    'section' => 'theme_customizer_footertext',
    'settings'   => 'theme_customizer_footertextbutton2url',
    'priority' => 6
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextsubscribe', array(	
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_footertextsubscribe', array(
    'label'   => 'Mailchimp form action=""',
    'section' => 'theme_customizer_footertext',
    'settings'   => 'theme_customizer_footertextsubscribe',
    'priority' => 7
	) ) );

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'accent_color', 'default' => '#7bc3d1', 'label' => __( 'Accent Color', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 1, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Header logo
  	$colors = array();
  	$colors[] = array( 'slug'=>'headerlogo_color', 'default' => '#FFF', 'label' => __( 'Header logo & socials Color', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 1, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Header intro
  	$colors = array();
  	$colors[] = array( 'slug'=>'headerintro_color', 'default' => '#FFFFFF', 'label' => __( 'Header intro', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 1, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Header text
  	$colors = array();
  	$colors[] = array( 'slug'=>'headertext_color', 'default' => '#F4F4F4', 'label' => __( 'Header sub text', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 1, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Header & Footer background
  	$colors = array();
  	$colors[] = array( 'slug'=>'footerheader_color', 'default' => '#7bc3d1', 'label' => __( 'Header & Footer Background color', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 4, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Even section color
  	$colors = array();
  	$colors[] = array( 'slug'=>'mainsection_color', 'default' => '#fff', 'label' => __( 'Even Section Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Odd section color
  	$colors = array();
  	$colors[] = array( 'slug'=>'oddsection_color', 'default' => '#f9fbfb', 'label' => __( 'Odd Section Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}
	
	//Real Time Settings Preview
	
	$wp_customize->get_setting('blogname')->transport='postMessage';
	
	if ( $wp_customize->is_preview() && ! is_admin() )
	add_filter( 'wp_footer', 'customizer_preview', 21);
	
	function customizer_preview() {
		?>
		<script type="text/javascript">
		( function( $ ){
		
		wp.customize('blogname',function( value ) {
			value.bind(function(to) {
				$('#logo h1 a, #logo h2 a').html(to);
			});
		});
		
		} )( jQuery )
		</script>
		<?php 
	}
	
}