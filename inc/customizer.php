<?php
/**
 * Iqra Education: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function iqra_education_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'iqra_education_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'iqra-education' ),
	    'description' => __( 'Description of what this panel does.', 'iqra-education' ),
	) );

	// font array
	$iqra_education_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );
    
	//Typography

	$wp_customize->add_section( 'iqra_education_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'iqra-education' ),
		'panel' => 'iqra_education_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'iqra_education_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_paragraph_color', array(
		'label' => __('Paragraph Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('iqra_education_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_paragraph_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'Paragraph Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	$wp_customize->add_setting('iqra_education_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'iqra_education_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_atag_color', array(
		'label' => __('"a" Tag Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('iqra_education_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_atag_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( '"a" Tag Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'iqra_education_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_li_color', array(
		'label' => __('"li" Tag Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('iqra_education_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_li_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( '"li" Tag Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'iqra_education_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_h1_color', array(
		'label' => __('H1 Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('iqra_education_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_h1_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'H1 Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('iqra_education_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_h1_font_size',array(
		'label'	=> __('H1 Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'iqra_education_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_h2_color', array(
		'label' => __('h2 Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('iqra_education_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_h2_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'h2 Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('iqra_education_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_h2_font_size',array(
		'label'	=> __('h2 Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'iqra_education_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_h3_color', array(
		'label' => __('h3 Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('iqra_education_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_h3_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'h3 Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('iqra_education_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_h3_font_size',array(
		'label'	=> __('h3 Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'iqra_education_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_h4_color', array(
		'label' => __('h4 Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('iqra_education_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_h4_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'h4 Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('iqra_education_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_h4_font_size',array(
		'label'	=> __('h4 Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'iqra_education_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_h5_color', array(
		'label' => __('h5 Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('iqra_education_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_h5_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'h5 Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('iqra_education_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_h5_font_size',array(
		'label'	=> __('h5 Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'iqra_education_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_h6_color', array(
		'label' => __('h6 Color', 'iqra-education'),
		'section' => 'iqra_education_typography',
		'settings' => 'iqra_education_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('iqra_education_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'iqra_education_h6_font_family', array(
	    'section'  => 'iqra_education_typography',
	    'label'    => __( 'h6 Fonts','iqra-education'),
	    'type'     => 'select',
	    'choices'  => $iqra_education_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('iqra_education_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_h6_font_size',array(
		'label'	=> __('h6 Font Size','iqra-education'),
		'section'	=> 'iqra_education_typography',
		'setting'	=> 'iqra_education_h6_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'iqra_education_theme_color_option', array( 
		'panel' => 'iqra_education_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'iqra-education' ) )
	);

  	$wp_customize->add_setting( 'iqra_education_theme_color_first', array(
	    'default' => '#fdd333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_theme_color_first', array(
  		'label' =>  __( 'First Color Option', 'iqra-education' ),
	    'description' => __('One can change complete theme color on just one click.', 'iqra-education'),
	    'section' => 'iqra_education_theme_color_option',
	    'settings' => 'iqra_education_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'iqra_education_theme_color_second', array(
	    'default' => '#3c3e79',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_theme_color_second', array(
  		'label' => __( 'Second Color Option', 'iqra-education' ),
	    'description' => __('One can change complete theme color on just one click.', 'iqra-education'),
	    'section' => 'iqra_education_theme_color_option',
	    'settings' => 'iqra_education_theme_color_second',
  	)));

  	//Layout Settings
	$wp_customize->add_section( 'iqra_education_width_layout', array(
    	'title'      => __( 'Layout Settings', 'iqra-education' ),
		'panel' => 'iqra_education_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'iqra_education_fixed_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('iqra_education_fixed_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Fixed Header','iqra-education' ),
        'section' => 'iqra_education_width_layout'
    ));

	$wp_customize->add_setting('iqra_education_loader_setting',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_loader_setting',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','iqra-education'),
       'section' => 'iqra_education_width_layout'
    ));

    $wp_customize->add_setting('iqra_education_preloader_types',array(
        'default' => __('Default','iqra-education'),
        'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_preloader_types',array(
        'type' => 'radio',
        'label' => __('Preloader Option','iqra-education'),
        'section' => 'iqra_education_width_layout',
        'choices' => array(
            'Default' => __('Default','iqra-education'),
            'Circle' => __('Circle','iqra-education'),
            'Two Circle' => __('Two Circle','iqra-education')
        ),
	) );

    $wp_customize->add_setting( 'iqra_education_loader_color_setting', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_loader_color_setting', array(
  		'label' => __('Preloader Color Option', 'iqra-education'),
	    'section' => 'iqra_education_width_layout',
	    'settings' => 'iqra_education_loader_color_setting',
  	)));

  	$wp_customize->add_setting( 'iqra_education_loader_background_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iqra_education_loader_background_color', array(
  		'label' => __('Preloader Background Color Option', 'iqra-education'),
	    'section' => 'iqra_education_width_layout',
	    'settings' => 'iqra_education_loader_background_color',
  	)));

	$wp_customize->add_setting('iqra_education_theme_options',array(
    'default' => __('Default','iqra-education'),
        'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control('iqra_education_theme_options',array(
        'type' => 'select',
        'label' => __('Container Box','iqra-education'),
        'description' => __('Here you can change the Width layout. ','iqra-education'),
        'section' => 'iqra_education_width_layout',
        'choices' => array(
            'Default' => __('Default','iqra-education'),
            'Wide Layout' => __('Wide Layout','iqra-education'),
            'Box Layout' => __('Box Layout','iqra-education'),
        ),
	) );

	// Button Settings
	$wp_customize->add_section( 'iqra_education_button_option', array(
		'title' => 'Button',
		'panel' => 'iqra_education_panel_id',
	));

	$wp_customize->add_setting('iqra_education_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_top_bottom_padding',array(
		'label'	=> __('Top and Bottom Padding ','iqra-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'iqra_education_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('iqra_education_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_left_right_padding',array(
		'label'	=> __('Left and Right Padding','iqra-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'iqra_education_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'iqra_education_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'iqra_education_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','iqra-education' ),
		'section'     => 'iqra_education_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );


	$wp_customize->add_section( 'iqra_education_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'iqra-education' ),
		'panel' => 'iqra_education_panel_id'
	) );

	$wp_customize->add_setting('iqra_education_layout_settings',array(
        'default' => __('Right Sidebar','iqra-education'),
        'sanitize_callback' => 'iqra_education_sanitize_choices'	        
	));
	$wp_customize->add_control('iqra_education_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'iqra-education'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'iqra-education'),
        'section' => 'iqra_education_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','iqra-education'),
            'Right Sidebar' => __('Right Sidebar','iqra-education'),
            'One Column' => __('Full Width','iqra-education'),
            'Grid Layout' => __('Grid Layout','iqra-education')
        ),
	));

	//Topbar section
	$wp_customize->add_section('iqra_education_contact_details',array(
		'title'	=> __('Topbar Section','iqra-education'),
		'description'	=> __('Add Header Content here','iqra-education'),
		'panel' => 'iqra_education_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'iqra_education_show_hide_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('iqra_education_show_hide_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Top Header','iqra-education' ),
        'section' => 'iqra_education_contact_details'
    ));

	$wp_customize->add_setting('iqra_education_contact_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_contact_number',array(
		'label'	=> __('Add Phone Number','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_contact_number',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('iqra_education_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('iqra_education_email_address',array(
		'label'	=> __('Add Email','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('iqra_education_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('iqra_education_time',array(
		'label'	=> __('Add Time','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('iqra_education_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('iqra_education_facebook_url',array(
		'label'	=> __('Add Facebook link','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('iqra_education_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('iqra_education_twitter_url',array(
		'label'	=> __('Add Twitter link','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_twitter_url',
		'type'	=> 'url'
	));
	
	$wp_customize->add_setting('iqra_education_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('iqra_education_youtube_url',array(
		'label'	=> __('Add Youtube link','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('iqra_education_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('iqra_education_linkedin_url',array(
		'label'	=> __('Add Linkedin link','iqra-education'),
		'section'	=> 'iqra_education_contact_details',
		'setting'	=> 'iqra_education_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('iqra_education_login_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('iqra_education_login_url',array(
		'label'	=> __('Add Login Button URL','iqra-education'),
		'section'=> 'iqra_education_contact_details',
		'type'=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'iqra_education_slider' , array(
    	'title'      => __( 'Slider Settings', 'iqra-education' ),
		'priority'   => null,
		'panel' => 'iqra_education_panel_id'
	) );

	$wp_customize->add_setting('iqra_education_slider_arrows',array(
        'default' => false,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','iqra-education'),
      	'section' => 'iqra_education_slider',
	));

	$wp_customize->add_setting('iqra_education_slider_title',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_slider_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Title','iqra-education'),
       'section' => 'iqra_education_slider'
    ));

    $wp_customize->add_setting('iqra_education_slider_content',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_slider_content',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Content','iqra-education'),
       'section' => 'iqra_education_slider'
    ));

    $wp_customize->add_setting('iqra_education_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Button','iqra-education'),
       'section' => 'iqra_education_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'iqra_education_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'iqra_education_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'iqra_education_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'iqra-education' ),
			'section'  => 'iqra_education_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'iqra_education_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'iqra_education_slider_speed',array(
		'label' => esc_html__( 'Slider Speed','iqra-education' ),
		'section' => 'iqra_education_slider',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('iqra_education_slider_height_option',array(
		'default'=> __('600','iqra-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_slider_height_option',array(
		'label'	=> __('Slider Height Option','iqra-education'),
		'section'=> 'iqra_education_slider',
		'type'=> 'text'
	));

	//content layout
    $wp_customize->add_setting('iqra_education_slider_content_option',array(
    'default' => __('Left','iqra-education'),
        'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control('iqra_education_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Layout','iqra-education'),
        'section' => 'iqra_education_slider',
        'choices' => array(
            'Center' => __('Center','iqra-education'),
            'Left' => __('Left','iqra-education'),
            'Right' => __('Right','iqra-education'),
        ),
	) );

	$wp_customize->add_setting('iqra_education_slider_button_text',array(
		'default'=> __('READ MORE','iqra-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_slider_button_text',array(
		'label'	=> __('Slider Button Text','iqra-education'),
		'section'=> 'iqra_education_slider',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'iqra_education_slider_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'iqra_education_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','iqra-education' ),
		'section'     => 'iqra_education_slider',
		'type'        => 'range',
		'settings'    => 'iqra_education_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('iqra_education_slider_opacity_color',array(
      'default'              => 0.3,
      'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control( 'iqra_education_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','iqra-education' ),
	'section'     => 'iqra_education_slider',
	'type'        => 'select',
	'settings'    => 'iqra_education_slider_opacity_color',
	'choices' => array(
		'0' =>  esc_attr('0','iqra-education'),
		'0.1' =>  esc_attr('0.1','iqra-education'),
		'0.2' =>  esc_attr('0.2','iqra-education'),
		'0.3' =>  esc_attr('0.3','iqra-education'),
		'0.4' =>  esc_attr('0.4','iqra-education'),
		'0.5' =>  esc_attr('0.5','iqra-education'),
		'0.6' =>  esc_attr('0.6','iqra-education'),
		'0.7' =>  esc_attr('0.7','iqra-education'),
		'0.8' =>  esc_attr('0.8','iqra-education'),
		'0.9' =>  esc_attr('0.9','iqra-education')
	),
	));

	//About
	$wp_customize->add_section('iqra_education_about',array(
		'title'	=> __('About Us','iqra-education'),
		'description'	=> __('Add About Us Section below.','iqra-education'),
		'panel' => 'iqra_education_panel_id',
	));

	$wp_customize->add_setting('iqra_education_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('iqra_education_title',array(
		'label'	=> __('Section Title','iqra-education'),
		'section'=> 'iqra_education_about',
		'setting'=> 'iqra_education_title',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'iqra_education_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'iqra_education_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'iqra_education_about_page', array(
		'label'    => __( 'Select About Page', 'iqra-education' ),
		'section'  => 'iqra_education_about',
		'type'     => 'dropdown-pages'
	) );

	//404 Page Setting
	$wp_customize->add_section('iqra_education_page_not_found_setting',array(
		'title'	=> __('Page Not Found Settings','iqra-education'),
		'panel' => 'iqra_education_panel_id',
	));	

	$wp_customize->add_setting('iqra_education_page_not_found_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_page_not_found_title',array(
		'label'	=> __('Page Not Found Title','iqra-education'),
		'section'=> 'iqra_education_page_not_found_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('iqra_education_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_page_not_found_content',array(
		'label'	=> __('Page Not Found Content','iqra-education'),
		'section'=> 'iqra_education_page_not_found_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('iqra_education_mobile_media',array(
		'title'	=> __('Mobile Media Settings','iqra-education'),
		'panel' => 'iqra_education_panel_id',
	));

	$wp_customize->add_setting('iqra_education_enable_disable_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_enable_disable_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Sidebar','iqra-education'),
       'section' => 'iqra_education_mobile_media'
    ));

	$wp_customize->add_setting('iqra_education_enable_disable_topbar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_enable_disable_topbar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Top Header','iqra-education'),
       'section' => 'iqra_education_mobile_media'
    ));

    $wp_customize->add_setting('iqra_education_enable_disable_fixed_header',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_enable_disable_fixed_header',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Fixed Header','iqra-education'),
       'section' => 'iqra_education_mobile_media'
    ));

    $wp_customize->add_setting('iqra_education_enable_disable_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_enable_disable_slider',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider','iqra-education'),
       'section' => 'iqra_education_mobile_media'
    ));

    $wp_customize->add_setting('iqra_education_show_hide_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_show_hide_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Button','iqra-education'),
       'section' => 'iqra_education_mobile_media'
    ));

    $wp_customize->add_setting('iqra_education_enable_disable_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_enable_disable_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Scroll To Top','iqra-education'),
       'section' => 'iqra_education_mobile_media'
    ));

	//Blog Post
	$wp_customize->add_section('iqra_education_blog_post',array(
		'title'	=> __('Post Settings','iqra-education'),
		'panel' => 'iqra_education_panel_id',
	));	

	$wp_customize->add_setting('iqra_education_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','iqra-education'),
       'section' => 'iqra_education_blog_post'
    ));

    $wp_customize->add_setting('iqra_education_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Comments','iqra-education'),
       'section' => 'iqra_education_blog_post'
    ));

    $wp_customize->add_setting('iqra_education_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Author','iqra-education'),
       'section' => 'iqra_education_blog_post'
    ));

    $wp_customize->add_setting('iqra_education_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('iqra_education_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Tags','iqra-education'),
       'section' => 'iqra_education_blog_post'
    ));

    //Blog layout
    $wp_customize->add_setting('iqra_education_blog_post_layout',array(
        'default' => __('Default','iqra-education'),
        'sanitize_callback' => 'iqra_education_sanitize_choices'
    ));
    $wp_customize->add_control('iqra_education_blog_post_layout',array(
        'type' => 'radio',
        'label' => __('Post Layout Option','iqra-education'),
        'section' => 'iqra_education_blog_post',
        'choices' => array(
            'Default' => __('Default','iqra-education'),
            'Center' => __('Center','iqra-education'),
            'Image and Content' => __('Image and Content','iqra-education'),
        ),
	) );

	$wp_customize->add_setting('iqra_education_blog_description',array(
    	'default'   => __('Post Excerpt','iqra-education'),
        'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control('iqra_education_blog_description',array(
        'type' => 'select',
        'label' => __('Post Description','iqra-education'),
        'section' => 'iqra_education_blog_post',
        'choices' => array(
            'None' => __('None','iqra-education'),
            'Post Excerpt' => __('Post Excerpt','iqra-education'),
            'Post Content' => __('Post Content','iqra-education'),
        ),
	) );

    $wp_customize->add_setting( 'iqra_education_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'iqra_education_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','iqra-education' ),
		'section'     => 'iqra_education_blog_post',
		'type'        => 'number',
		'settings'    => 'iqra_education_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'iqra_education_post_excerpt_suffix', array(
		'default'   => __('{...}','iqra-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'iqra_education_post_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Indicator','iqra-education' ),
		'section'     => 'iqra_education_blog_post',
		'type'        => 'text',
		'settings'    => 'iqra_education_post_excerpt_suffix',
	) );

	$wp_customize->add_setting('iqra_education_button_text',array(
		'default'=>__('READ MORE','iqra-education'), 
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_button_text',array(
		'label'	=> __('Add Button Text','iqra-education'),
		'section'=> 'iqra_education_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'iqra_education_pagination_option', array(
        'default'			=> __('Default','iqra-education'),
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'iqra_education_pagination_option', array(
        'section' => 'iqra_education_blog_post',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'iqra-education' ),
        'choices'		=> array(
            'Default'  => __( 'Default', 'iqra-education' ),
            'next-prev' => __( 'Next / Previous', 'iqra-education' ),
    )));

	//Footer
	$wp_customize->add_section( 'iqra_education_footer' , array(
    	'title'   => __( 'Footer Section', 'iqra-education' ),
		'priority'   => null,
		'panel' => 'iqra_education_panel_id'
	) );

	$wp_customize->add_setting('iqra_education_footer_widget',array(
        'default'           => 4,
        'sanitize_callback' => 'iqra_education_sanitize_choices',
    ));
    $wp_customize->add_control('iqra_education_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer widget area', 'iqra-education'),
        'section'     => 'iqra_education_footer',
        'description' => __('Select the number of footer widget areas and after that, go to Appearance > Widgets and add your widgets in the footer.', 'iqra-education'),
        'choices' => array(
            '1'     => __('One', 'iqra-education'),
            '2'     => __('Two', 'iqra-education'),
            '3'     => __('Three', 'iqra-education'),
            '4'     => __('Four', 'iqra-education')
        ),
    )); 

    $wp_customize->add_setting('iqra_education_copyright_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top and Bottom Padding','iqra-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'iqra_education_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('iqra_education_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll To Top','iqra-education'),
      	'section' => 'iqra_education_footer',
	));

	$wp_customize->add_setting('iqra_education_footer_options',array(
        'default' => __('Right align','iqra-education'),
        'sanitize_callback' => 'iqra_education_sanitize_choices'
	));
	$wp_customize->add_control('iqra_education_footer_options',array(
        'type' => 'select',
        'label' => __('Scroll To Top','iqra-education'),
        'description' => __('Here you can change the Footer layout. ','iqra-education'),
        'section' => 'iqra_education_footer',
        'choices' => array(
            'Left align' => __('Left align','iqra-education'),
            'Right align' => __('Right align','iqra-education'),
            'Center align' => __('Center align','iqra-education'),
        ),
	) );

	$wp_customize->add_setting('iqra_education_scroll_top_fontsize',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_scroll_top_fontsize',array(
		'label'	=> __('Scroll To Top Font Size','iqra-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'iqra_education_footer',
		'type'=> 'range'
	));

	$wp_customize->add_setting('iqra_education_scroll_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_scroll_top_bottom_padding',array(
		'label'	=> __('Scroll Top Bottom Padding ','iqra-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'iqra_education_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('iqra_education_scroll_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('iqra_education_scroll_left_right_padding',array(
		'label'	=> __('Scroll Left Right Padding','iqra-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'iqra_education_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'iqra_education_scroll_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'iqra_education_scroll_border_radius', array(
		'label'       => esc_html__( 'Scroll To Top Border Radius','iqra-education' ),
		'section'     => 'iqra_education_footer',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('iqra_education_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('iqra_education_footer_text',array(
		'label'	=> __('Add Copyright Text','iqra-education'),
		'section'	=> 'iqra_education_footer',
		'setting'	=> 'iqra_education_footer_text',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'iqra_education_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'iqra_education_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'iqra_education_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Iqra Education 1.0
 * @see iqra-education_customize_register()
 *
 * @return void
 */
function iqra_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Iqra Education 1.0
 * @see iqra-education_customize_register()
 *
 * @return void
 */
function iqra_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function iqra_education_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Iqra_Education_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Iqra_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Iqra_Education_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Iqra Education Pro', 'iqra-education' ),
					'pro_text' => esc_html__( 'Go Pro', 'iqra-education' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/education-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'iqra-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'iqra-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Iqra_Education_Customize::get_instance();