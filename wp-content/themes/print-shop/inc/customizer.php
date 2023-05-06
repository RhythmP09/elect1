<?php
/**
 * Print Shop Theme Customizer
 *
 * @package Print Shop
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class print_shop_Customize {

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
		$manager->register_section_type( 'Print_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Print_Shop_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Print Shop Pro', 'print-shop' ),
					'pro_text' => esc_html__( 'Go Pro', 'print-shop' ),
					'pro_url'  => esc_url( 'https://www.logicalthemes.com/themes/print-shop-wordpress-theme/' ),
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

		wp_enqueue_script( 'print-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'print-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
print_shop_Customize::get_instance();

function print_shop_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'print_shop_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'LT Settings', 'print-shop' ),
	) );

	//Layout Setting
	$wp_customize->add_section( 'print_shop_left_right' , array(
    	'title'      => esc_html__( 'General Settings', 'print-shop' ),
		'priority'   => null,
		'panel' => 'print_shop_panel_id'
	) );

	$wp_customize->add_setting('print_shop_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control('print_shop_theme_options',array(
        'type' => 'radio',
        'description' => __( 'Choose sidebar between different options', 'print-shop' ),
        'label' => esc_html__( 'Post Sidebar Layout.', 'print-shop' ),
        'section' => 'print_shop_left_right',
        'choices' => array(
            'One Column' => esc_html__('One Column ','print-shop'),
            'Three Columns' => esc_html__('Three Columns','print-shop'),
            'Four Columns' => esc_html__('Four Columns','print-shop'),
            'Right Sidebar' => esc_html__('Right Sidebar','print-shop'),
            'Left Sidebar' => esc_html__('Left Sidebar','print-shop'),
            'Grid Layout' => esc_html__('Grid Layout','print-shop')
        ),
	));

	$print_shop_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'print_shop_typography', array(
    	'title'      => __( 'Typography', 'print-shop' ),
		'priority'   => null,
		'panel' => 'print_shop_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'print_shop_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_paragraph_color', array(
		'label' => __('Paragraph Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('print_shop_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_paragraph_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'Paragraph Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	$wp_customize->add_setting('print_shop_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'print_shop_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_atag_color', array(
		'label' => __('"a" Tag Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('print_shop_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_atag_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( '"a" Tag Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'print_shop_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_li_color', array(
		'label' => __('"li" Tag Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('print_shop_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_li_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( '"li" Tag Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'print_shop_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_h1_color', array(
		'label' => __('H1 Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('print_shop_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_h1_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'H1 Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('print_shop_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_h1_font_size',array(
		'label'	=> __('H1 Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'print_shop_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_h2_color', array(
		'label' => __('H2 Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('print_shop_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_h2_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'H2 Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('print_shop_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_h2_font_size',array(
		'label'	=> __('H2 Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'print_shop_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_h3_color', array(
		'label' => __('H3 Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('print_shop_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_h3_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'H3 Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('print_shop_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_h3_font_size',array(
		'label'	=> __('H3 Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'print_shop_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_h4_color', array(
		'label' => __('H4 Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('print_shop_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_h4_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'H4 Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('print_shop_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_h4_font_size',array(
		'label'	=> __('H4 Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'print_shop_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_h5_color', array(
		'label' => __('H5 Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('print_shop_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_h5_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'H5 Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('print_shop_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_h5_font_size',array(
		'label'	=> __('H5 Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'print_shop_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_h6_color', array(
		'label' => __('H6 Color', 'print-shop'),
		'section' => 'print_shop_typography',
		'settings' => 'print_shop_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('print_shop_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'print_shop_h6_font_family', array(
	    'section'  => 'print_shop_typography',
	    'label'    => __( 'H6 Fonts','print-shop'),
	    'type'     => 'select',
	    'choices'  => $print_shop_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('print_shop_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_h6_font_size',array(
		'label'	=> __('H6 Font Size','print-shop'),
		'section'	=> 'print_shop_typography',
		'setting'	=> 'print_shop_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('print_shop_topbar',array(
		'title'	=> esc_html__('Topbar','print-shop'),
		'priority'	=> null,
		'panel' => 'print_shop_panel_id',
	));

	$wp_customize->add_setting( 'print_shop_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('print_shop_sticky_header',array(
    	'type' => 'checkbox',
    	'description' => __( 'Click on the checkbox to enable sticky header.', 'print-shop' ),
        'label' => __( 'Sticky Header','print-shop' ),
        'section' => 'print_shop_topbar'
    ));

    //Show /Hide Topbar
	$wp_customize->add_setting( 'print_shop_show_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('print_shop_show_topbar',array(
    	'type' => 'checkbox',
    	'description' => __( 'Click on the checkbox to enable Topbar.', 'print-shop' ),
        'label' => __( 'Topbar','print-shop' ),
        'section' => 'print_shop_topbar'
    ));

	$wp_customize->add_setting('print_shop_topbar_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_topbar_text',array(
		'label'	=> __('Add Topbar text','print-shop'),
		'section' => 'print_shop_topbar',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('print_shop_timings',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_shop_timings',array(
		'label'	=> __('Add timings','print-shop'),
		'section' => 'print_shop_topbar',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('print_shop_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_shop_facebook_url',array(
		'label'	=> __('Add Facebook URL','print-shop'),
		'section' => 'print_shop_topbar',
		'type'	  => 'text'
	));

	$wp_customize->add_setting('print_shop_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_shop_twitter_url',array(
		'label'	=> __('Add Twitter URL','print-shop'),
		'section' => 'print_shop_topbar',
		'type'	  => 'text'
	));

	$wp_customize->add_setting('print_shop_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_shop_instagram_url',array(
		'label'	=> __('Add Instagram URL','print-shop'),
		'section' => 'print_shop_topbar',
		'type'	  => 'text'
	));

	$wp_customize->add_setting('print_shop_telegram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_shop_telegram_url',array(
		'label'	=> __('Add Telegram URL','print-shop'),
		'section' => 'print_shop_topbar',
		'type'	  => 'text'
	));

    $wp_customize->add_setting( 'print_shop_topbar_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_topbar_text_color', array(
		'label' => __('Topbar Text Color', 'print-shop'),
		'section' => 'print_shop_topbar',
		'settings' => 'print_shop_topbar_text_color',
	)));

    $wp_customize->add_setting( 'print_shop_timing_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_timing_color', array(
		'label' => __('Time Color', 'print-shop'),
		'section' => 'print_shop_topbar',
		'settings' => 'print_shop_timing_color',
	)));

    $wp_customize->add_setting( 'print_shop_social_icons_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_social_icons_color', array(
		'label' => __('Social Icons Color', 'print-shop'),
		'section' => 'print_shop_topbar',
		'settings' => 'print_shop_social_icons_color',
	)));

	//Menu Settings
	$wp_customize->add_section( 'print_shop_menu_settings' , array(
    	'title'      => esc_html__( 'Menu Settings', 'print-shop' ),
		'priority'   => null,
		'panel' => 'print_shop_panel_id'
	) );

    $wp_customize->add_setting( 'print_shop_menu_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_menu_color', array(
		'label' => __('Menu Color', 'print-shop'),
		'section' => 'print_shop_menu_settings',
		'settings' => 'print_shop_menu_color',
	)));

    $wp_customize->add_setting( 'print_shop_menu_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_menu_hover_color', array(
		'label' => __('Menu Hover Color', 'print-shop'),
		'section' => 'print_shop_menu_settings',
		'settings' => 'print_shop_menu_hover_color',
	)));

    $wp_customize->add_setting( 'print_shop_submenu_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_submenu_color', array(
		'label' => __('Submenu Color', 'print-shop'),
		'section' => 'print_shop_menu_settings',
		'settings' => 'print_shop_submenu_color',
	)));

    $wp_customize->add_setting( 'print_shop_submenu_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_submenu_hover_color', array(
		'label' => __('Submenu Hover Color', 'print-shop'),
		'section' => 'print_shop_menu_settings',
		'settings' => 'print_shop_submenu_hover_color',
	)));

	//home page slider
	$wp_customize->add_section( 'print_shop_slidersettings' , array(
    	'title'      => esc_html__( 'Slider Settings', 'print-shop' ),
		'priority'   => null,
		'panel' => 'print_shop_panel_id'
	) );

	$wp_customize->add_setting('print_shop_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('print_shop_slider_hide_show',array(
	   'type' => 'checkbox',
	   'description' => __( 'Click on the checkbox to enable slider.', 'print-shop' ),
	   'label' => esc_html__('Show / Hide slider','print-shop'),
	   'section' => 'print_shop_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'print_shop_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'print_shop_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'print_shop_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'print-shop' ),
	   		'description' => __( 'Slider Image Size (1200px x 600px)', 'print-shop' ),
			'section'  => 'print_shop_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('print_shop_slider_btn_text1',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_shop_slider_btn_text1',array(
		'label'	=> __('Add 1nd Button Text','print-shop'),
		'section' => 'print_shop_slidersettings',
		'type'	  => 'text'
	));

	$wp_customize->add_setting('print_shop_slider_btn_url1',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_shop_slider_btn_url1',array(
		'label'	=> __('Add 1nd Button URL','print-shop'),
		'section' => 'print_shop_slidersettings',
		'type'	  => 'url'
	));

	$wp_customize->add_setting('print_shop_slider_btn_text2',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_shop_slider_btn_text2',array(
		'label'	=> __('Add 2nd Button Text','print-shop'),
		'section' => 'print_shop_slidersettings',
		'type'	  => 'text'
	));

	$wp_customize->add_setting('print_shop_slider_btn_url2',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_shop_slider_btn_url2',array(
		'label'	=> __('Add 2nd Button URL','print-shop'),
		'section' => 'print_shop_slidersettings',
		'type'	  => 'url'
	));

	$wp_customize->add_setting( 'print_shop_slider_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_title_color', array(
		'label' => __('Title Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_title_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_text_color', array(
		'label' => __('Text Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_text_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_btn_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_btn_text_color', array(
		'label' => __('Button Text Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_btn_text_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_btn_border_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_btn_border_color', array(
		'label' => __('Button Border Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_btn_border_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_btn_text_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_btn_text_hover_color', array(
		'label' => __('Button Text Hover Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_btn_text_hover_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_btnbg_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_btnbg_hover_color', array(
		'label' => __('Button Background Hover Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_btnbg_hover_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_btn_border_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_btn_border_hover_color', array(
		'label' => __('Button Border Hover Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_btn_border_hover_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_npa_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_npa_color', array(
		'label' => __('Prev/Next Arrow Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_npa_color',
	)));

	$wp_customize->add_setting( 'print_shop_slider_npa_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_slider_npa_bg_color', array(
		'label' => __('Prev/Next Arrow Background Color', 'print-shop'),
		'section' => 'print_shop_slidersettings',
		'settings' => 'print_shop_slider_npa_bg_color',
	)));

	// Services Section
	$wp_customize->add_section('print_shop_services_section',array(
		'title'	=> __('Services Section','print-shop'),
		'panel' => 'print_shop_panel_id',
	));

	$wp_customize->add_setting('print_shop_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_shop_section_title',array(
		'label'	=> __('Section Title','print-shop'),
		'section' => 'print_shop_services_section',
		'type'	  => 'text'
	));

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

	$wp_customize->add_setting('print_shop_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'print_shop_sanitize_choices',
	));
	$wp_customize->add_control('print_shop_service_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category To Display Post','print-shop'),
		'section' => 'print_shop_services_section',
	));

	$wp_customize->add_setting( 'print_shop_service_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_section_title_color', array(
		'label' => __('Section Title Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_section_title_color',
	)));

	$wp_customize->add_setting( 'print_shop_service_section_title_border_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_section_title_border_color', array(
		'label' => __('Section Title Border Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_section_title_border_color',
	)));

	$wp_customize->add_setting( 'print_shop_service_box_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_box_bg_color', array(
		'label' => __('Service Box Background Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_box_bg_color',
	)));

	$wp_customize->add_setting( 'print_shop_service_box_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_box_title_color', array(
		'label' => __('Service Box Title Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_box_title_color',
	)));

	$wp_customize->add_setting( 'print_shop_service_box_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_box_icon_color', array(
		'label' => __('Service Box Icon Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_box_icon_color',
	)));

	$wp_customize->add_setting( 'print_shop_service_box_icon_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_box_icon_bg_color', array(
		'label' => __('Service Box Icon Background Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_box_icon_bg_color',
	)));

	$wp_customize->add_setting( 'print_shop_service_box_icon_border_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_service_box_icon_border_color', array(
		'label' => __('Service Box Icon Border Color', 'print-shop'),
		'section' => 'print_shop_services_section',
		'settings' => 'print_shop_service_box_icon_border_color',
	)));

	//footer
	$wp_customize->add_section('print_shop_footer_section',array(
		'title'	=> esc_html__('Footer Text','print-shop'),
		'panel' => 'print_shop_panel_id'
	));
		
	$wp_customize->add_setting('print_shop_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_shop_footer_copy',array(
		'label'	=> esc_html__('Copyright Text','print-shop'),
		'section'	=> 'print_shop_footer_section',
		'type'		=> 'text'
	));

	//Wocommerce Shop Page
	$wp_customize->add_section('print_shop_woocommerce_shop_page',array(
		'title'	=> __('Woocommerce Shop Page','print-shop'),
		'panel' => 'print_shop_panel_id'
	));

	$wp_customize->add_setting( 'print_shop_products_per_column' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'print_shop_sanitize_choices',
	) );
	$wp_customize->add_control( 'print_shop_products_per_column', array(
		'label'    => __( 'Product Per Columns', 'print-shop' ),
		'description'	=> __('How many products should be shown per Column?','print-shop'),
		'section'  => 'print_shop_woocommerce_shop_page',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	)  );

	$wp_customize->add_setting('print_shop_products_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'print_shop_sanitize_float',
	));	
	$wp_customize->add_control('print_shop_products_per_page',array(
		'label'	=> __('Product Per Page','print-shop'),
		'description'	=> __('How many products should be shown per page?','print-shop'),
		'section'	=> 'print_shop_woocommerce_shop_page',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'print_shop_product_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_title_color', array(
		'label' => __('Product Title Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_title_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_price_color', array(
		'label' => __('Product Price Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_price_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_btn_color', array(
		'label' => __('Product Button Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_btn_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_btn_color', array(
		'label' => __('Button Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_btn_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_btn_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_btn_bg_color', array(
		'label' => __('Button Background Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_btn_bg_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_btn_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_btn_hover_color', array(
		'label' => __('Button Hover Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_btn_hover_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_btn_hover_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_btn_hover_bg_color', array(
		'label' => __('Button Hover Background Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_btn_hover_bg_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_sale_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_sale_color', array(
		'label' => __('Sale Badge Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_sale_color',
	)));

	$wp_customize->add_setting( 'print_shop_product_sale_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_product_sale_bg_color', array(
		'label' => __('Sale Badge Background Color', 'print-shop'),
		'section' => 'print_shop_woocommerce_shop_page',
		'settings' => 'print_shop_product_sale_bg_color',
	)));

	// logo site title
	$wp_customize->add_setting('print_shop_site_title_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('print_shop_site_title_tagline',array(
       'type' => 'checkbox',
       'label' => __('Display Site Title and Tagline in Header','print-shop'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting( 'print_shop_site_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_site_title_color', array(
		'label' => __('Site Title Color', 'print-shop'),
		'section' => 'title_tagline',
		'settings' => 'print_shop_site_title_color',
	)));

    $wp_customize->add_setting( 'print_shop_site_tagline_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_shop_site_tagline_color', array(
		'label' => __('Site Tagline Color', 'print-shop'),
		'section' => 'title_tagline',
		'settings' => 'print_shop_site_tagline_color',
	)));
}
add_action( 'customize_register', 'print_shop_customize_register' );