<?php
/**
 * Print Shop functions and definitions
 * @package Print Shop
 */

/* Theme Setup */
if ( ! function_exists( 'print_shop_setup' ) ) :

function print_shop_setup() {

	load_theme_textdomain( 'print-shop', get_template_directory() . '/languages' );

	$GLOBALS['content_width'] = apply_filters( 'print_shop_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	add_image_size('print-shop-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'print-shop' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		)	
	);

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');

	add_editor_style( array( 'assets/css/editor-style.css', print_shop_font_url() ) );
	
	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'print_shop_activation_notice' );
	}
}
endif; // print_shop_setup
add_action( 'after_setup_theme', 'print_shop_setup' );

// Notice after Theme Activation
function print_shop_activation_notice() {
	echo '<div class="corporatewelcome notice notice-success is-dismissible">';
		echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'print-shop' ) .'</h3>';
		echo '<p>'. esc_html__( ' Our sincere thanks for choosing our Print Shop theme. We assure you a high performing theme for your Print Shop. Please proceed towards welcome section to start an amazing journey with us..', 'print-shop' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=print_shop_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Welcome...', 'print-shop' ) .'</a></p>';
	echo '</div>';
}

/*Site URL*/
define('PRINT_SHOP_SUPPORT',__('https://wordpress.org/support/theme/print-shop/','print-shop'));
define('PRINT_SHOP_BUY_NOW',__('https://www.logicalthemes.com/themes/print-shop-wordpress-theme/','print-shop'));
define('PRINT_SHOP_LIVE_DEMO',__('https://www.logicalthemes.com/print-shop-pro/','print-shop'));
define('PRINT_SHOP_PRO_DOC',__('https://www.logicalthemes.com/docs/print-shop-pro/','print-shop'));
define('PRINT_SHOP_CREDIT',__('https://www.logicalthemes.com/themes/free-printing-wordpress-theme/','print-shop'));
if ( ! function_exists( 'print_shop_credit' ) ) {
	function print_shop_credit(){
		echo "<a href=".esc_url(PRINT_SHOP_CREDIT)." target='_blank'>".esc_html__('Print Shop WordPress Theme','print-shop')."</a>";
	}
}

/* Breadcrumb Begin */
function print_shop_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url(home_url());
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			echo "&nbsp;&#187;&nbsp;";
			the_category(', ');
			if (is_single()) {
				echo "&nbsp;&#187;&nbsp;";
				echo " <span> ";
					the_title();
				echo "</span>";
			}
		} elseif (is_page()) {
			echo "&nbsp;&#187;&nbsp;";
			echo " <span>";
				the_title();
			echo "</span> ";
		}
	}
}

/*radio button sanitization*/
function print_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function print_shop_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function print_shop_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function print_shop_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'print_shop_loop_columns');
if (!function_exists('print_shop_loop_columns')) {
	function print_shop_loop_columns() {
		$columns = get_theme_mod( 'print_shop_products_per_column', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'print_shop_shop_per_page', 20 );
function print_shop_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'print_shop_products_per_page', 9 );
	return $cols;
}

function print_shop_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function print_shop_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Theme Widgets Setup */
function print_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'print-shop' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'print-shop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Posts and Pages Sidebar', 'print-shop' ),
		'description'   => esc_html__( 'Appears on posts and pages', 'print-shop' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 3', 'print-shop' ),
		'description'   => esc_html__( 'Appears on posts and pages', 'print-shop' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'print-shop' ),
		'description'   => esc_html__( 'Appears in footer', 'print-shop' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'print-shop' ),
		'description'   => esc_html__( 'Appears in footer', 'print-shop' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'print-shop' ),
		'description'   => esc_html__( 'Appears in footer', 'print-shop' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'print-shop' ),
		'description'   => esc_html__( 'Appears in footer', 'print-shop' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'print_shop_widgets_init' );

/* Theme Font URL */
function print_shop_font_url(){
	$font_url      = '';
	$font_family   = array(
		'ABeeZee:ital@0;1',
	    'Abril+Fatfac',
	    'Acme',
	    'Anton',
	    'Architects+Daughter',
	    'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	    'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	    'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Alfa+Slab+One',
	    'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	    'Bangers',
	    'Boogaloo',
	    'Bad+Script',
	    'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Bree+Serif',
	    'BenchNine:wght@300;400;700',
	    'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Cardo:ital,wght@0,400;0,700;1,400',
	    'Courgette',
	    'Cherry+Swash:wght@400;700',
	    'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	    'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	    'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Cookie',
	    'Coming+Soon',
	    'Chewy',
	    'Days+One',
	    'Dosis:wght@200;300;400;500;600;700;800',
	    'Economica:ital,wght@0,400;0,700;1,400;1,700',
	    'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Fredoka+One',
	    'Fjalla+One',
	    'Francois+One',
	    'Frank+Ruhl+Libre:wght@300;400;500;700;900',
	    'Gloria+Hallelujah',
	    'Great+Vibes',
	    'Handlee',
	    'Hammersmith+One',
	    'Heebo:wght@100;200;300;400;500;600;700;800;900',
	    'Inconsolata:wght@200;300;400;500;600;700;800;900',
	    'Indie+Flower',
	    'IM+Fell+English+SC',
	    'Julius+Sans+One',
	    'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	    'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	    'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Kaisei+HarunoUmi:wght@400;500;700',
	    'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Lobster',
	    'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
	    'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
	    'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
	    'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
	    'Monda:wght@400;700',
	    'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Marck+Script',
	    'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
	    'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	    'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Overpass+Mono:wght@300;400;500;600;700',
	    'Oxygen:wght@300;400;700',
	    'Orbitron:wght@400;500;600;700;800;900',
	    'Patua+One',
	    'Pacifico',
	    'Padauk:wght@400;700',
	    'Playball',
	    'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	    'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
	    'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
	    'Permanent+Marker',
	    'Poiret+One',
	    'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Quicksand:wght@300;400;500;600;700',
	    'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
	    'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	    'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	    'Russo+One',
	    'Righteous',
	    'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Satisfy',
	    'Slabo+13px',
	    'Slabo+27px',
	    'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	    'Shadows+Into+Light+Two',
	    'Shadows+Into+Light',
	    'Sacramento',
	    'Shrikhand',
	    'Staatliches',
	    'Tangerine:wght@400;700',
	    'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	    'Unica+One',
	    'VT323',
	    'Varela+Round',
	    'Vampiro+One',
	    'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	    'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
	    'ZCOOL+XiaoWei'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}	

/* Theme enqueue scripts */
function print_shop_scripts() {
	wp_enqueue_style( 'print-shop-font', print_shop_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'print-shop-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'print-shop-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Paragraph
    $print_shop_paragraph_color = get_theme_mod('print_shop_paragraph_color', '');
    $print_shop_paragraph_font_family = get_theme_mod('print_shop_paragraph_font_family', '');
    $print_shop_paragraph_font_size = get_theme_mod('print_shop_paragraph_font_size', '');
	// "a" tag
	$print_shop_atag_color = get_theme_mod('print_shop_atag_color', '');
    $print_shop_atag_font_family = get_theme_mod('print_shop_atag_font_family', '');
	// "li" tag
	$print_shop_li_color = get_theme_mod('print_shop_li_color', '');
    $print_shop_li_font_family = get_theme_mod('print_shop_li_font_family', '');
	// H1
	$print_shop_h1_color = get_theme_mod('print_shop_h1_color', '');
    $print_shop_h1_font_family = get_theme_mod('print_shop_h1_font_family', '');
    $print_shop_h1_font_size = get_theme_mod('print_shop_h1_font_size', '');
	// H2
	$print_shop_h2_color = get_theme_mod('print_shop_h2_color', '');
    $print_shop_h2_font_family = get_theme_mod('print_shop_h2_font_family', '');
    $print_shop_h2_font_size = get_theme_mod('print_shop_h2_font_size', '');
	// H3
	$print_shop_h3_color = get_theme_mod('print_shop_h3_color', '');
    $print_shop_h3_font_family = get_theme_mod('print_shop_h3_font_family', '');
    $print_shop_h3_font_size = get_theme_mod('print_shop_h3_font_size', '');
	// H4
	$print_shop_h4_color = get_theme_mod('print_shop_h4_color', '');
    $print_shop_h4_font_family = get_theme_mod('print_shop_h4_font_family', '');
    $print_shop_h4_font_size = get_theme_mod('print_shop_h4_font_size', '');
	// H5
	$print_shop_h5_color = get_theme_mod('print_shop_h5_color', '');
    $print_shop_h5_font_family = get_theme_mod('print_shop_h5_font_family', '');
    $print_shop_h5_font_size = get_theme_mod('print_shop_h5_font_size', '');
	// H6
	$print_shop_h6_color = get_theme_mod('print_shop_h6_color', '');
    $print_shop_h6_font_family = get_theme_mod('print_shop_h6_font_family', '');
    $print_shop_h6_font_size = get_theme_mod('print_shop_h6_font_size', '');

	$print_shop_custom_css ='
		p,span{
		    color:'.esc_html($print_shop_paragraph_color).'!important;
		    font-family: '.esc_html($print_shop_paragraph_font_family).';
		    font-size: '.esc_html($print_shop_paragraph_font_size).'px ;
		}
		a{
		    color:'.esc_html($print_shop_atag_color).'!important;
		    font-family: '.esc_html($print_shop_atag_font_family).';
		}
		li{
		    color:'.esc_html($print_shop_li_color).'!important;
		    font-family: '.esc_html($print_shop_li_font_family).';
		}
		h1{
		    color:'.esc_html($print_shop_h1_color).'!important;
		    font-family: '.esc_html($print_shop_h1_font_family).'!important;
		    font-size: '.esc_html($print_shop_h1_font_size).'px !important;
		}
		h2{
		    color:'.esc_html($print_shop_h2_color).'!important;
		    font-family: '.esc_html($print_shop_h2_font_family).'!important;
		    font-size: '.esc_html($print_shop_h2_font_size).'px !important;
		}
		h3{
		    color:'.esc_html($print_shop_h3_color).'!important;
		    font-family: '.esc_html($print_shop_h3_font_family).'!important;
		    font-size: '.esc_html($print_shop_h3_font_size).'px !important;
		}
		h4{
		    color:'.esc_html($print_shop_h4_color).'!important;
		    font-family: '.esc_html($print_shop_h4_font_family).'!important;
		    font-size: '.esc_html($print_shop_h4_font_size).'px !important;
		}
		h5{
		    color:'.esc_html($print_shop_h5_color).'!important;
		    font-family: '.esc_html($print_shop_h5_font_family).'!important;
		    font-size: '.esc_html($print_shop_h5_font_size).'px !important;
		}
		h6{
		    color:'.esc_html($print_shop_h6_color).'!important;
		    font-family: '.esc_html($print_shop_h6_font_family).'!important;
		    font-size: '.esc_html($print_shop_h6_font_size).'px !important;
		}

	';
	wp_add_inline_style( 'print-shop-basic-style',$print_shop_custom_css );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'print-shop-custom-jquery', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	require get_parent_theme_file_path( '/lt-inline-style.php' );
	wp_add_inline_style( 'print-shop-basic-style',$print_shop_custom_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'print_shop_scripts' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/wptt-webfont-loader.php';
require get_template_directory() . '/inc/get-started/get-started.php';