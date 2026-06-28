<?php
/**
 * Event Management Theme Customizer
 * @package Event Management
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function event_management_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'event_management_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','event-management' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('event_management_site_title_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_site_title_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Title','event-management'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('event_management_site_title_font_size',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','event-management' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site title color
   $wp_customize->add_setting('event_management_site_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_site_title_color', array(
		'label'    => __('Site Title Color', 'event-management'),
		'section'  => 'title_tagline',
		'settings' => 'event_management_site_title_color',
	)));

   $wp_customize->add_setting('event_management_site_tagline_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
   $wp_customize->add_control('event_management_site_tagline_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Tagline','event-management'),
       'section' => 'title_tagline'
    ));

   $wp_customize->add_setting('event_management_site_tagline_font_size',array(
		'default'=> 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','event-management' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site tagline color
	$wp_customize->add_setting('event_management_site_tagline_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_site_tagline_color', array(
		'label'    => __('Site Tagline Color', 'event-management'),
		'section'  => 'title_tagline',
		'settings' => 'event_management_site_tagline_color',
	)));

    $wp_customize->add_setting('event_management_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','event-management'),
       'section' => 'title_tagline',
    ));

      $wp_customize->add_setting('event_management_logo_padding_font_size',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control(new event_management_Custom_Control( $wp_customize, 'event_management_logo_padding_font_size',array(
		'label' => esc_html__( 'Logo Padding  (px)','event-management' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('event_management_logo_margin',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control(new event_management_Custom_Control( $wp_customize, 'event_management_logo_margin',array(
		'label' => esc_html__( 'Logo Margin  (px)','event-management' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

    $wp_customize->add_setting('event_management_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','event-management'),
        'description' => __('Here you can add the background skin along with the background image.','event-management'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','event-management'),
            'Without Background' => __('Without Background Skin','event-management'),
        ),
	) );

	//add home page setting pannel
	$wp_customize->add_panel( 'event_management_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'event-management' ),
	    'description' => __( 'Description of what this panel does.', 'event-management' ),
	) );

	$event_management_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('event_management_typography', array(
		'title'    => __('Typography', 'event-management'),
		'panel'    => 'event_management_panel_id',
	));

	//This is body FontFamily picker setting
	$wp_customize->add_setting('event_management_body_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_body_color', array(
		'label'    => __('Body Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_body_color',
	)));

	$wp_customize->add_setting('event_management_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(	'event_management_body_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('Body Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	$wp_customize->add_setting('event_management_body_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_body_font_size', array(
		'label'   => __('Body Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_body_font_size',
		'type'    => 'text',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('event_management_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_paragraph_color', array(
		'label'    => __('Paragraph Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('event_management_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(	'event_management_paragraph_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('Paragraph Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	$wp_customize->add_setting('event_management_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_paragraph_font_size',
		'type'    => 'text',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('event_management_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_paragraph_color', array(
		'label'    => __('Paragraph Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('event_management_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(	'event_management_paragraph_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('Paragraph Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	$wp_customize->add_setting('event_management_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('event_management_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_atag_color', array(
		'label'    => __('"a" Tag Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('event_management_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(	'event_management_atag_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('"a" Tag Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('event_management_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_li_color', array(
		'label'    => __('"li" Tag Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('event_management_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(	'event_management_li_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('"li" Tag Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('event_management_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_h1_color', array(
		'label'    => __('H1 Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('event_management_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control('event_management_h1_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('H1 Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('event_management_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_h1_font_size', array(
		'label'   => __('H1 Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('event_management_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_h2_color', array(
		'label'    => __('h2 Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('event_management_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(
	'event_management_h2_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('h2 Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('event_management_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_h2_font_size', array(
		'label'   => __('H2 Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('event_management_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_h3_color', array(
		'label'    => __('H3 Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('event_management_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control(
	'event_management_h3_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('H3 Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('event_management_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_h3_font_size', array(
		'label'   => __('H3 Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('event_management_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_h4_color', array(
		'label'    => __('H4 Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('event_management_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control('event_management_h4_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('H4 Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('event_management_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_h4_font_size', array(
		'label'   => __('H4 Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('event_management_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_h5_color', array(
		'label'    => __('H5 Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('event_management_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control('event_management_h5_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('H5 Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('event_management_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_h5_font_size', array(
		'label'   => __('H5 Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('event_management_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_h6_color', array(
		'label'    => __('H6 Color', 'event-management'),
		'section'  => 'event_management_typography',
		'settings' => 'event_management_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('event_management_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control('event_management_h6_font_family', array(
		'section' => 'event_management_typography',
		'label'   => __('H6 Fonts', 'event-management'),
		'type'    => 'select',
		'choices' => $event_management_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('event_management_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_h6_font_size', array(
		'label'   => __('H6 Font Size', 'event-management'),
		'section' => 'event_management_typography',
		'setting' => 'event_management_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'event_management_option', array(
    	'title'      => __( 'Layout Settings', 'event-management' ),
    	'panel'    => 'event_management_panel_id',
	) );

	$wp_customize->add_setting( 'event_management_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ) );
    $wp_customize->add_control('event_management_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','event-management' ),
        'section' => 'event_management_option'
    ));

	$wp_customize->add_setting('event_management_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','event-management'),
       'section' => 'event_management_option'
    ));

    $wp_customize->add_setting('event_management_preloader_type',array(
        'default' => 'First Preloader Type',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Types','event-management'),
        'section' => 'event_management_option',
        'choices' => array(
            'First Preloader Type' => __('First Preloader Type','event-management'),
            'Second Preloader Type' => __('Second Preloader Type','event-management'),
        ),
	) );

	$wp_customize->add_setting('event_management_preloader_bg_color_option', array(
		'default'           => '#1A093F',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'event-management'),
		'section'  => 'event_management_option',
	)));

	$wp_customize->add_setting('event_management_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'event-management'),
		'section'  => 'event_management_option',
	)));

	$wp_customize->add_setting('event_management_width_layout_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_width_layout_options',array(
        'type' => 'radio',
        'label' => __('Container Box','event-management'),
        'description' => __('Here you can change the Width layout. ','event-management'),
        'section' => 'event_management_option',
        'choices' => array(
            'Default' => __('Default','event-management'),
            'Container Layout' => __('Container Layout','event-management'),
            'Box Layout' => __('Box Layout','event-management'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('event_management_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'event_management_sanitize_choices'
	) );
	$wp_customize->add_control('event_management_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','event-management'),
        'section' => 'event_management_option',
        'choices' => array(
            'One Column' => __('One Column','event-management'),
            'Three Columns' => __('Three Columns','event-management'),
            'Four Columns' => __('Four Columns','event-management'),
            'Grid Layout' => __('Grid Layout','event-management'),
            'Left Sidebar' => __('Left Sidebar','event-management'),
            'Right Sidebar' => __('Right Sidebar','event-management')
        ),
	)   );

	$wp_customize->add_setting('event_management_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','event-management'),
        'section' => 'event_management_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','event-management'),
            'Sidebar 1/4' => __('Sidebar 1/4','event-management'),
        ),
	) );

	$wp_customize->add_setting( 'event_management_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize,  'event_management_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','event-management' ),
		'section'     => 'event_management_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'event_management_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize,  'event_management_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','event-management' ),
		'section' => 'event_management_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Blog Post Settings
	$wp_customize->add_section('event_management_post_settings', array(
		'title'    => __('Post General Settings', 'event-management'),
		'panel'    => 'event_management_panel_id',
	));

	$wp_customize->add_setting('event_management_post_layouts',array(
     'default' => 'Layout 2',
     'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control(new event_management_Image_Radio_Control($wp_customize, 'event_management_post_layouts', array(
        'type' => 'select',
        'label' => __('Post Layouts','event-management'),
        'description' => __('Here you can change the 3 different layouts of post','event-management'),
        'section' => 'event_management_post_settings',
        'choices' => array(
            'Layout 1' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Layout 2' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Layout 3' => esc_url(get_template_directory_uri()).'/images/layout3.png',
    ))));

	$wp_customize->add_setting('event_management_metafields_date',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','event-management'),
       'section' => 'event_management_post_settings'
    ));

	$wp_customize->add_setting('event_management_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_post_date_icon',array(
		'label'	=> __('Post Date Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('event_management_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','event-management'),
       'section' => 'event_management_post_settings'
    ));

    $wp_customize->add_setting('event_management_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_post_author_icon',array(
		'label'	=> __('Post Author Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('event_management_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','event-management'),
       'section' => 'event_management_post_settings'
    ));

    $wp_customize->add_setting('event_management_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('event_management_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','event-management'),
       'section' => 'event_management_post_settings'
    ));

    $wp_customize->add_setting('event_management_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_post_time_icon',array(
		'label'	=> __('Post Time Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'event_management_sanitize_choices'
    ));
    $wp_customize->add_control('event_management_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','event-management'),
       'choices' => array(
            'Image' => __('Image','event-management'),
            'Color' => __('Color','event-management'),
            'None' => __('None','event-management'),
        ),
      	'section'	=> 'event_management_post_settings',
    ));

    $wp_customize->add_setting('event_management_post_featured_color', array(
		'default'           => '#FD5056',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_post_featured_color', array(
		'label'    => __('Post Color', 'event-management'),
		'section'  => 'event_management_post_settings',
		'settings' => 'event_management_post_featured_color',
		'active_callback' => 'event_management_post_color_enabled'
	)));

	$wp_customize->add_setting( 'event_management_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'event_management_show_post_color'
	)));

	$wp_customize->add_setting( 'event_management_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'event_management_show_post_color'
	)));

	$wp_customize->add_setting('event_management_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'event_management_sanitize_choices'
    ));
    $wp_customize->add_control('event_management_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','event-management'),
       'choices' => array(
            'Default' => __('Default','event-management'),
            'Custom' => __('Custom','event-management'),
        ),
      	'section'	=> 'event_management_post_settings',
      	'active_callback' => 'event_management_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'event_management_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'event_management_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'event_management_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'event_management_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'event_management_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'event_management_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','event-management' ),
		'section'     => 'event_management_post_settings',
		'type'        => 'number',
		'settings'    => 'event_management_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('event_management_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','event-management'),
        'section' => 'event_management_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','event-management'),
            'Content' => __('Content','event-management'),
        ),
	) );

	$wp_customize->add_setting( 'event_management_post_discription_suffix', array(
		'default'   => __('[...]','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'event_management_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','event-management' ),
		'section'     => 'event_management_post_settings',
		'type'        => 'text',
		'settings'    => 'event_management_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'event_management_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'event_management_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','event-management' ),
		'section'     => 'event_management_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','event-management'),
		'type'        => 'text',
		'settings'    => 'event_management_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('event_management_button_text',array(
		'default'=> __('View More','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_button_text',array(
		'label'	=> __('Add Button Text','event-management'),
		'section'=> 'event_management_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('event_management_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_button_icon',array(
		'label'	=> __('Button Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'event_management_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_post_button_border_radius',array(
		'default' => 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','event-management' ),
		'section' => 'event_management_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('event_management_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','event-management'),
       'section' => 'event_management_post_settings'
    ));

    $wp_customize->add_setting( 'event_management_post_pagination_position', array(
        'default'			=>  'Bottom',
        'sanitize_callback'	=> 'event_management_sanitize_choices'
    ));
    $wp_customize->add_control( 'event_management_post_pagination_position', array(
        'section' => 'event_management_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'event-management' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'event-management' ),
            'Bottom' => __( 'Bottom', 'event-management' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'event-management' ),
    )));

	$wp_customize->add_setting( 'event_management_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'event_management_sanitize_choices'
    ));
    $wp_customize->add_control( 'event_management_pagination_settings', array(
        'section' => 'event_management_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'event-management' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'event-management' ),
            'next-prev' => __( 'Next / Previous', 'event-management' ),
    )));

    $wp_customize->add_setting('event_management_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','event-management'),
        'section' => 'event_management_post_settings',
        'choices' => array(
            'By Block' => __('By Block','event-management'),
            'By Without Block' => __('By Without Block','event-management'),
        ),
	) );

    //Single Post Settings
	$wp_customize->add_section('event_management_single_post_settings', array(
		'title'    => __('Single Post Settings', 'event-management'),
		'panel'    => 'event_management_panel_id',
	));

	$wp_customize->add_setting('event_management_single_post_bradcrumb',array(
			'default' => false,
			'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_single_post_bradcrumb',array(
			'type' => 'checkbox',
			'label' => __('Enable / Disable Breadcrumb','event-management'),
			'section' => 'event_management_single_post_settings',
	));

	$wp_customize->add_setting('event_management_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

    $wp_customize->add_setting('event_management_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

   $wp_customize->add_setting('event_management_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
      $wp_customize,'event_management_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','event-management'),
		'section' => 'event_management_single_post_settings'
	));

 	$wp_customize->add_setting('event_management_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer( $wp_customize, 'event_management_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

    $wp_customize->add_setting('event_management_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','event-management'),
       'section' => 'event_management_single_post_settings',
    ));

    $wp_customize->add_setting('event_management_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','event-management'),
       'section' => 'event_management_single_post_settings',
    ));

	$wp_customize->add_setting('event_management_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','event-management'),
       'section' => 'event_management_single_post_settings',
    ));

		$wp_customize->add_setting('event_management_show_hide_single_post_categories',array(
			'default' => true,
			'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	  ));
	 $wp_customize->add_control('event_management_show_hide_single_post_categories',array(
			'type' => 'checkbox',
			'label' => __('Single Post Categories','event-management'),
			'section' => 'event_management_single_post_settings'
	   ));

	$wp_customize->add_setting('event_management_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'event_management_sanitize_choices'
	) );
	$wp_customize->add_control('event_management_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','event-management'),
        'section' => 'event_management_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','event-management'),
            'Left Sidebar' => __('Left Sidebar','event-management'),
            'Right Sidebar' => __('Right Sidebar','event-management')
        ),
	)   );

	$wp_customize->add_setting( 'event_management_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'event_management_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','event-management' ),
		'section'     => 'event_management_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','event-management'),
		'type'        => 'text',
		'settings'    => 'event_management_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'event_management_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','event-management' ),
		'section' => 'event_management_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('event_management_title_comment_form',array(
       'default' => __('Leave a Reply','event-management'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('event_management_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

    $wp_customize->add_setting('event_management_comment_form_button_content',array(
       'default' => __('Post Comment','event-management'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('event_management_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

	$wp_customize->add_setting('event_management_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

	$wp_customize->add_setting('event_management_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('event_management_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

    $wp_customize->add_setting('event_management_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('event_management_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','event-management'),
       'section' => 'event_management_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('event_management_related_settings', array(
		'title'    => __('Related Post Settings', 'event-management'),
		'panel'    => 'event_management_panel_id',
	));

	$wp_customize->add_setting( 'event_management_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ) );
    $wp_customize->add_control('event_management_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','event-management' ),
        'section' => 'event_management_related_settings'
    ));

    $wp_customize->add_setting('event_management_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_related_title',array(
		'label'	=> __('Add Section Title','event-management'),
		'section'	=> 'event_management_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'event_management_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'event_management_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','event-management' ),
		'section'     => 'event_management_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('event_management_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','event-management'),
        'section' => 'event_management_related_settings',
        'choices' => array(
            'categories' => __('Categories','event-management'),
            'tags' => __('Tags','event-management'),
        ),
	) );

	$wp_customize->add_setting( 'event_management_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','event-management' ),
		'section' => 'event_management_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Top Bar Section
	$wp_customize->add_section('event_management_topbar',array(
		'title'	=> __('Topbar','event-management'),
		'description'	=> __('Add contact us here','event-management'),
		'priority'	=> null,
		'panel' => 'event_management_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'event_management_show_top_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ) );
    $wp_customize->add_control('event_management_show_top_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Topbar','event-management' ),
        'section' => 'event_management_topbar'
    ));

    $wp_customize->add_setting( 'event_management_topbar_padding_settings', array(
		'default'=> 15,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'event_management_topbar_padding_settings', array(
		'label'       => esc_html__( 'Topbar Padding','event-management' ),
		'section'     => 'event_management_topbar',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('event_management_menu_font_size_option',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize,'event_management_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','event-management'),
		'section'=> 'event_management_topbar',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('event_management_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize,'event_management_menu_padding',array(
		'label'	=> __('Main Menu Padding','event-management'),
		'section'=> 'event_management_topbar',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('event_management_text_tranform_menu',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'event_management_sanitize_choices'
 	));
 	$wp_customize->add_control('event_management_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','event-management'),
		'section' => 'event_management_topbar',
		'choices' => array(
		   'Uppercase' => __('Uppercase','event-management'),
		   'Lowercase' => __('Lowercase','event-management'),
		   'Capitalize' => __('Capitalize','event-management'),
		),
	) );

	$wp_customize->add_setting('event_management_font_weight_option_menu',array(
		'default' => '600',
		'sanitize_callback' => 'event_management_sanitize_choices'
 	));
 	$wp_customize->add_control('event_management_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','event-management'),
		'section' => 'event_management_topbar',
		'choices' => array(
			'100' => __('100','event-management'),
			'200' => __('200','event-management'),
			'300' => __('300','event-management'),
			'400' => __('400','event-management'),
			'500' => __('500','event-management'),
			'600' => __('600','event-management'),
			'700' => __('700','event-management'),
			'800' => __('800','event-management'),
			'900' => __('900','event-management'),
		),
	) );

	$wp_customize->add_setting('event_management_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_menu_color', array(
		'label'    => __('Menu Color', 'event-management'),
		'section'  => 'event_management_topbar',
		'settings' => 'event_management_menu_color',
	)));

	$wp_customize->add_setting('event_management_sub_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_sub_menu_color', array(
		'label'    => __('Submenu Color', 'event-management'),
		'section'  => 'event_management_topbar',
		'settings' => 'event_management_sub_menu_color',
	)));

	$wp_customize->add_setting('event_management_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'event-management'),
		'section'  => 'event_management_topbar',
		'settings' => 'event_management_menu_hover_color',
	)));

	$wp_customize->add_setting('event_management_sub_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_sub_menu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'event-management'),
		'section'  => 'event_management_topbar',
		'settings' => 'event_management_sub_menu_hover_color',
	)));

	$wp_customize->add_setting( 'event_management_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ) );
    $wp_customize->add_control('event_management_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Sticky Header','event-management' ),
        'section' => 'event_management_topbar'
    ));

   $wp_customize->add_setting('event_management_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
      $wp_customize,'event_management_email_icon',array(
		'label'	=> __('Email Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('event_management_email_address',array(
		'label'	=> __('Add Email Address','event-management'),
		'section'	=> 'event_management_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('event_management_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
      $wp_customize,'event_management_phone_icon',array(
		'label'	=> __('Phone Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_call',array(
		'default'	=> '',
		'sanitize_callback' => 'event_management_sanitize_phone_number'
	));
	$wp_customize->add_control('event_management_call',array(
		'label'	=> __('Add Phone Number','event-management'),
		'section'	=> 'event_management_topbar',
		'type'		=> 'text'
	));

   $wp_customize->add_setting('event_management_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
      $wp_customize,'event_management_location_icon',array(
		'label'	=> __('Location Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_location',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_location',array(
		'label' => __('Add Location Address','event-management'),
		'section' => 'event_management_topbar',
		'type'    => 'text'
	));

	$wp_customize->add_setting('event_management_request_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_request_text',array(
		'label'	=> __('Add Button Text','event-management'),
		'section'	=> 'event_management_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('event_management_request_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('event_management_request_link',array(
		'label'	=> __('Add Button Link','event-management'),
		'section'	=> 'event_management_topbar',
		'type'		=> 'url'
	));

	//Social Media Section
	$wp_customize->add_section( 'event_management_social_section' , array(
    	'title'      => __( 'Social Media Section', 'event-management' ),
		'priority'   => null,
		'panel' => 'event_management_panel_id'
	) );

   $wp_customize->add_setting('event_management_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_facebook_icon',array(
		'label'	=> __('Facebook Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_facebook_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('event_management_facebook_link',array(
		'label'	=> __('Add Facebook Link','event-management'),
		'section'	=> 'event_management_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('event_management_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_twitter_icon',array(
		'label'	=> __('Twitter Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_twitter_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('event_management_twitter_link',array(
		'label'	=> __('Add Twitter Link','event-management'),
		'section'	=> 'event_management_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('event_management_linkdin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_linkdin_icon',array(
		'label'	=> __('Linkdin Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_linkdin_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('event_management_linkdin_link',array(
		'label'	=> __('Add Linkdin Link','event-management'),
		'section'	=> 'event_management_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('event_management_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_instagram_icon',array(
		'label'	=> __('Instagram Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_instagram_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('event_management_instagram_link',array(
		'label'	=> __('Add Instagram Link','event-management'),
		'section'	=> 'event_management_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('event_management_pintrest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_pintrest_icon',array(
		'label'	=> __('Pintrest Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_pintrest_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('event_management_pintrest_link',array(
		'label'	=> __('Add Pintrest Link','event-management'),
		'section'	=> 'event_management_social_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('event_management_social_icons_size',array(
		'default'=> 13,
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('event_management_social_icons_size',array(
		'label'	=> __('Social Icons Size ','event-management'),
		'section'=> 'event_management_social_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	//Slider Section
	$wp_customize->add_section( 'event_management_slider_section' , array(
    	'title'      => __( 'Slider Section', 'event-management' ),
		'priority'   => null,
		'panel' => 'event_management_panel_id'
	) );

	$wp_customize->add_setting('event_management_slider_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable slider','event-management'),
       'section' => 'event_management_slider_section',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'event_management_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'event_management_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'event_management_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'event-management' ),
			'description' => __('Slider image size (1500 x 600)','event-management'),
			'section'  => 'event_management_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('event_management_show_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_show_slider_button',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Slider Button','event-management'),
		'section' => 'event_management_slider_section'
	));

	$wp_customize->add_setting('event_management_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','event-management'),
		'section' => 'event_management_slider_section'
	));

	$wp_customize->add_setting('event_management_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','event-management'),
		'section' => 'event_management_slider_section'
	));

	$wp_customize->add_setting('event_management_enable_slider_overlay',array(
		'default' => true,
		'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_enable_slider_overlay',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Image Overlay','event-management'),
		'section' => 'event_management_slider_section'
	));

   $wp_customize->add_setting('event_management_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'event-management'),
		'section'  => 'event_management_slider_section',
		'settings' => 'event_management_slider_overlay_color',
	)));

	//Opacity
	$wp_customize->add_setting('event_management_slider_opacity',array(
		'default'           => 0.4,
		'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control( 'event_management_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','event-management' ),
		'section'     => 'event_management_slider_section',
		'type'        => 'select',
		'settings'    => 'event_management_slider_opacity',
		'choices' => array(
			'0' =>  esc_attr('0','event-management'),
			'0.1' =>  esc_attr('0.1','event-management'),
			'0.2' =>  esc_attr('0.2','event-management'),
			'0.3' =>  esc_attr('0.3','event-management'),
			'0.4' =>  esc_attr('0.4','event-management'),
			'0.5' =>  esc_attr('0.5','event-management'),
			'0.6' =>  esc_attr('0.6','event-management'),
			'0.7' =>  esc_attr('0.7','event-management'),
			'0.8' =>  esc_attr('0.8','event-management'),
			'0.9' =>  esc_attr('0.9','event-management')
		),
	));

	//content layout
    $wp_customize->add_setting('event_management_slider_content_layout',array(
    	'default' => 'Left',
		'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','event-management'),
		'section' => 'event_management_slider_section',
		'choices' => array(
		   'Center' => __('Center','event-management'),
		   'Left' => __('Left','event-management'),
		   'Right' => __('Right','event-management'),
		),
	) );

	$wp_customize->add_setting('event_management_option_slider_height',array(
		'default'=> __('550','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_option_slider_height',array(
		'label'	=> __('Slider Height','event-management'),
		'section'=> 'event_management_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('event_management_slider_content_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize,  'event_management_slider_content_top_padding',array(
		'label' => __('Top Bottom Slider Content Spacing','event-management'),
		'section'=> 'event_management_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
	)));

	$wp_customize->add_setting('event_management_slider_content_left_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize,  'event_management_slider_content_left_padding',array(
		'label' => __('Left Right Slider Content Spacing','event-management'),
		'section'=> 'event_management_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
  		),
	)));

	//Slider excerpt
	$wp_customize->add_setting( 'event_management_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'event_management_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','event-management' ),
		'section'     => 'event_management_slider_section',
		'type'        => 'number',
		'settings'    => 'event_management_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'event_management_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','event-management' ),
		'section' => 'event_management_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('event_management_category_section',array(
		'title' => __('Our Events','event-management'),
		'description' => '',
		'priority'  => null,
		'panel' => 'event_management_panel_id',
	));

	$wp_customize->add_setting('event_management_ourevents_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_ourevents_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Events','event-management'),
		'section' => 'event_management_category_section'
	));

	$wp_customize->add_setting('event_management_events_small_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_events_small_title',array(
		'type' => 'text',
		'label' => __('Small Title','event-management'),
		'section' => 'event_management_category_section'
	));

	$wp_customize->add_setting('event_management_events_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_events_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','event-management'),
		'section' => 'event_management_category_section'
	));

	// category
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

   $wp_customize->add_setting('event_management_ourevents',array(
		'default' => 'select',
		'sanitize_callback' => 'event_management_sanitize_choices',
  	));
  	$wp_customize->add_control('event_management_ourevents',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Events','event-management'),
		'section' => 'event_management_category_section',
	));

	//footer text
	$wp_customize->add_section('event_management_footer_section',array(
		'title'	=> __('Footer Text','event-management'),
		'panel' => 'event_management_panel_id'
	));

	$wp_customize->add_setting('event_management_footer_bg_color', array(
		'default'           => '#1A093F',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'event-management'),
		'section'  => 'event_management_footer_section',
	)));

	$wp_customize->add_setting('event_management_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'event_management_footer_bg_image',array(
        'label' => __('Footer Background Image','event-management'),
        'section' => 'event_management_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'event_management_sanitize_choices',
    ));
    $wp_customize->add_control('footer_widget_areas',array(
        'type'        => 'radio',
        'label'       => __('Footer widget area', 'event-management'),
        'section'     => 'event_management_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'event-management'),
        'choices' => array(
            '1'     => __('One', 'event-management'),
            '2'     => __('Two', 'event-management'),
            '3'     => __('Three', 'event-management'),
            '4'     => __('Four', 'event-management')
        ),
    ));

    $wp_customize->add_setting('event_management_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'event_management_sanitize_checkbox'
	));
	$wp_customize->add_control('event_management_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','event-management'),
      	'section' => 'event_management_footer_section',
	));

	$wp_customize->add_setting('event_management_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','event-management'),
		'section'=> 'event_management_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('event_management_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','event-management'),
        'section' => 'event_management_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','event-management'),
            'Right align' => __('Right Align','event-management'),
            'Center align' => __('Center Align','event-management'),
        ),
	) );

	$wp_customize->add_setting( 'event_management_top_bottom_scroll_padding',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','event-management' ),
		'section' => 'event_management_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','event-management' ),
		'section' => 'event_management_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','event-management' ),
		'section' => 'event_management_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('event_management_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_footer_copy',array(
		'label'	=> __('Copyright Text','event-management'),
		'section'	=> 'event_management_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','event-management'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('event_management_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','event-management'),
        'section' => 'event_management_footer_section',
        'choices' => array(
            'left' => __('Left Align','event-management'),
            'right' => __('Right Align','event-management'),
            'center' => __('Center Align','event-management'),
        ),
	) );

	$wp_customize->add_setting('event_management_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','event-management' ),
		'section'=> 'event_management_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'event_management_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','event-management' ),
		'section' => 'event_management_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('event_management_footer_text_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_footer_text_bg_color', array(
		'label'    => __('Copyright Text Background Color', 'event-management'),
		'section'  => 'event_management_footer_section',
	)));

	//Responsive Media Settings
	$wp_customize->add_section('event_management_responsive_media',array(
		'title'	=> __('Responsive Media','event-management'),
		'panel' => 'event_management_panel_id',
	));

	$wp_customize->add_setting('event_management_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_open_menu_label',array(
       'default' => __('Menu','event-management'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('event_management_open_menu_label',array(
       'type' => 'text',
       'label' => __('Open Menu Label','event-management'),
       'section' => 'event_management_responsive_media'
    ));

	$wp_customize->add_setting('event_management_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Icon_Changer(
        $wp_customize,'event_management_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','event-management'),
		'transport' => 'refresh',
		'section'	=> 'event_management_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('event_management_close_menu_label',array(
       'default' => __('Close Menu','event-management'),
       'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('event_management_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','event-management'),
       'section' => 'event_management_responsive_media'
    ));

	// site toggle button color
	$wp_customize->add_setting('event_management_toggle_button_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'event_management_toggle_button_color', array(
		'label'    => __('Toggle Button Color', 'event-management'),
		'section'  => 'event_management_responsive_media',
		'settings' => 'event_management_toggle_button_color',
	)));

	$wp_customize->add_setting('event_management_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','event-management'),
       'section' => 'event_management_responsive_media'
    ));

    $wp_customize->add_setting('event_management_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','event-management'),
       'section' => 'event_management_responsive_media'
    ));

    $wp_customize->add_setting('event_management_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','event-management'),
       'section' => 'event_management_responsive_media'
    ));

    $wp_customize->add_setting('event_management_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','event-management'),
       'section' => 'event_management_responsive_media'
    ));

	$wp_customize->add_setting('event_management_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','event-management'),
       'section' => 'event_management_responsive_media'
    ));

    $wp_customize->add_setting('event_management_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','event-management'),
       'section' => 'event_management_responsive_media'
    ));

    $wp_customize->add_setting('event_management_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','event-management'),
       'section' => 'event_management_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('event_management_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','event-management'),
		'panel' => 'event_management_panel_id',
	));

	$wp_customize->add_setting('event_management_page_not_found_heading',array(
		'default'=> __('404 Not Found','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_page_not_found_heading',array(
		'label'	=> __('404 Heading','event-management'),
		'section'=> 'event_management_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('event_management_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_page_not_found_text',array(
		'label'	=> __('404 Content','event-management'),
		'section'=> 'event_management_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('event_management_page_not_found_button',array(
		'default'=>  __('Back to Home Page','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_page_not_found_button',array(
		'label'	=> __('404 Button','event-management'),
		'section'=> 'event_management_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('event_management_no_search_result_heading',array(
		'default'=> __('Nothing Found','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','event-management'),
		'description'=>__('The search page heading display when no results are found.','event-management'),
		'section'=> 'event_management_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('event_management_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','event-management'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_no_search_result_text',array(
		'label'	=> __('No Search Results Text','event-management'),
		'description'=>__('The search page text display when no results are found.','event-management'),
		'section'=> 'event_management_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'event_management_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'event-management' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','event-management'),
		'priority'   => null,
		'panel' => 'event_management_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'event_management_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'event_management_per_columns', array(
		'label'    => __( 'Product per columns', 'event-management' ),
		'section'  => 'event_management_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('event_management_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('event_management_product_per_page',array(
		'label'	=> __('Product per page','event-management'),
		'section'	=> 'event_management_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('event_management_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','event-management'),
       'section' => 'event_management_woocommerce_section',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('event_management_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control('event_management_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'event-management'),
		'section'        => 'event_management_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'event-management'),
			'Right Sidebar' => __('Right Sidebar', 'event-management'),
		),
	));

    $wp_customize->add_setting('event_management_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','event-management'),
       'section' => 'event_management_woocommerce_section',
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('event_management_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'event_management_sanitize_choices',
	));
	$wp_customize->add_control('event_management_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'event-management'),
		'section'        => 'event_management_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'event-management'),
			'Right Sidebar' => __('Right Sidebar', 'event-management'),
		),
	));

    $wp_customize->add_setting('event_management_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','event-management'),
       'section' => 'event_management_woocommerce_section',
    ));

    $wp_customize->add_setting( 'event_management_woo_product_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','event-management'),
        'section'  => 'event_management_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('event_management_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','event-management'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'event_management_woocommerce_section',
	)));

    $wp_customize->add_setting('event_management_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','event-management'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'event_management_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('event_management_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Event_Management_Custom_Control( $wp_customize, 'event_management_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','event-management'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'event_management_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('event_management_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'event_management_sanitize_choices'
	));
	$wp_customize->add_control('event_management_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','event-management'),
        'section' => 'event_management_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','event-management'),
            'Left' => __('Left','event-management'),
        ),
	));

	$wp_customize->add_setting( 'event_management_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_woocommerce_button_border_radius',array(
		'default' => 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

    $wp_customize->add_setting('event_management_woocommerce_product_border_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'event_management_sanitize_checkbox'
    ));
    $wp_customize->add_control('event_management_woocommerce_product_border_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','event-management'),
       'section' => 'event_management_woocommerce_section',
    ));

	$wp_customize->add_setting( 'event_management_woocommerce_product_padding_top',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_woocommerce_product_padding_right',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_woocommerce_product_border_radius',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'event_management_woocommerce_product_box_shadow',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'event_management_sanitize_integer'
	));
	$wp_customize->add_control( new Event_Management_Custom_Control( $wp_customize, 'event_management_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','event-management' ),
		'section' => 'event_management_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('event_management_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'event_management_sanitize_choices'
    ));
    $wp_customize->add_control('event_management_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','event-management'),
       'choices' => array(
            'Yes' => __('Yes','event-management'),
            'No' => __('No','event-management'),
        ),
       'section' => 'event_management_woocommerce_section',
    ));

}
add_action( 'customize_register', 'event_management_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Event_Management_Customize {

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
		$manager->register_section_type( 'Event_Management_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Event_Management_Customize_Section_Pro(
				$manager,
				'event_management_example_1',
				array(
					'title'   =>  esc_html__( 'Event Management Pro', 'event-management' ),
					'pro_text' => esc_html__( 'Go Pro', 'event-management' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/event-management-wordpress-theme/' ),
					'priority'   => 9
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

		wp_enqueue_script( 'event-management-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'event-management-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function event_management_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'event-management'),
	        '2'     => __('Two', 'event-management'),
	        '3'     => __('Three', 'event-management'),
	        '4'     => __('Four', 'event-management')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Event_Management_Customize::get_instance();
