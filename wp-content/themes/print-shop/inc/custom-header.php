<?php
/**
 * @package Print Shop
 * Setup the WordPress core custom header feature.
 *
 * @uses print_shop_header_style()
*/
function print_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'print_shop_custom_header_args', array(
		'default-text-color'    => 'fff',
		'header-text' 		    => false,
		'width'                 => 1200,
		'height'                => 100,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'      => 'print_shop_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'print_shop_custom_header_setup' );

if ( ! function_exists( 'print_shop_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see print_shop_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'print_shop_header_style' );
function print_shop_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$print_shop_custom_css = "
		.menu-section{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'print-shop-basic-style', $print_shop_custom_css );
	endif;
}
endif; // print_shop_header_style