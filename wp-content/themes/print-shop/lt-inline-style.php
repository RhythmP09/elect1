<?php 

	$print_shop_custom_css = '';

	// Site Title Color
	$print_shop_site_title_color = get_theme_mod('print_shop_site_title_color');
	$print_shop_custom_css .= '.logo h1 a, .logo p.site-title a {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_site_title_color) . ';';
	$print_shop_custom_css .= '}';

	// Site Tagline Color
	$print_shop_site_tagline_color = get_theme_mod('print_shop_site_tagline_color');
	$print_shop_custom_css .= '.logo p.site-description {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_site_tagline_color) . ';';
	$print_shop_custom_css .= '}';

	// Slider
	$print_shop_slider_hide_show = get_theme_mod('print_shop_slider_hide_show',false);
	if($print_shop_slider_hide_show == true){
		$print_shop_custom_css .= '.page-template-home-custom .inner-head {';
			$print_shop_custom_css .= 'display: none;';
		$print_shop_custom_css .= '}';
	}

	// Menus Color
	$print_shop_menu_color = get_theme_mod('print_shop_menu_color');
	$print_shop_custom_css .= '.primary-navigation ul li a {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_menu_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_menu_hover_color = get_theme_mod('print_shop_menu_hover_color');
	$print_shop_custom_css .= '.primary-navigation ul li a:hover {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_menu_hover_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_submenu_color = get_theme_mod('print_shop_submenu_color');
	$print_shop_custom_css .= '.primary-navigation ul.sub-menu li a {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_submenu_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_submenu_hover_color = get_theme_mod('print_shop_submenu_hover_color');
	$print_shop_custom_css .= '.primary-navigation ul.sub-menu li a:hover {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_submenu_hover_color) . ';';
	$print_shop_custom_css .= '}';

	//Topbar color
	$print_shop_topbar_text_color = get_theme_mod('print_shop_topbar_text_color');
	$print_shop_custom_css .= 'p.topbar-text {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_topbar_text_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_social_icons_color = get_theme_mod('print_shop_social_icons_color');
	$print_shop_custom_css .= '.social-icons i {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_social_icons_color) . ';';
	$print_shop_custom_css .= '}';
	
	$print_shop_timing_color = get_theme_mod('print_shop_timing_color');
	$print_shop_custom_css .= '.contact-detail p {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_timing_color) . ';';
	$print_shop_custom_css .= '}';

	// Slider Color
	$print_shop_slider_title_color = get_theme_mod('print_shop_slider_title_color');
	$print_shop_custom_css .= '#slider .inner_carousel h1 {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_slider_title_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_slider_text_color = get_theme_mod('print_shop_slider_text_color');
	$print_shop_custom_css .= '#slider .inner_carousel p {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_slider_text_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_slider_btn_text_color = get_theme_mod('print_shop_slider_btn_text_color');
	$print_shop_slider_btn_border_color = get_theme_mod('print_shop_slider_btn_border_color');
	$print_shop_custom_css .= '#slider .read-btn a {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_slider_btn_text_color) . '; border-color: ' . esc_attr($print_shop_slider_btn_border_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_slider_btn_text_hover_color = get_theme_mod('print_shop_slider_btn_text_hover_color');
	$print_shop_slider_btnbg_hover_color = get_theme_mod('print_shop_slider_btnbg_hover_color');
	$print_shop_slider_btn_border_hover_color = get_theme_mod('print_shop_slider_btn_border_hover_color');
	$print_shop_custom_css .= '#slider .read-btn a:hover {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_slider_btn_text_hover_color) . '; border-color: ' . esc_attr($print_shop_slider_btn_border_hover_color) . '; background-color: ' . esc_attr($print_shop_slider_btnbg_hover_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_slider_npa_color = get_theme_mod('print_shop_slider_npa_color');
	$print_shop_slider_npa_bg_color = get_theme_mod('print_shop_slider_npa_bg_color');
	$print_shop_custom_css .= '#slider .carousel-control-next-icon i, #slider .carousel-control-prev-icon i {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_slider_npa_color) . '; border-color: ' . esc_attr($print_shop_slider_btn_border_hover_color) . '; background-color: ' . esc_attr($print_shop_slider_btnbg_hover_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_custom_css .= '#slider .carousel-control-next-icon i, #slider .carousel-control-prev-icon i {';
		$print_shop_custom_css .= 'background-color: ' . esc_attr($print_shop_slider_npa_bg_color) . '; border-color: ' . esc_attr($print_shop_slider_btn_border_hover_color) . '; background-color: ' . esc_attr($print_shop_slider_btnbg_hover_color) . ';';
	$print_shop_custom_css .= '}';

	// Service Section color
	$print_shop_service_section_title_color = get_theme_mod('print_shop_service_section_title_color');
	$print_shop_service_section_title_border_color = get_theme_mod('print_shop_service_section_title_border_color');
	$print_shop_custom_css .= '#service-section h2 {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_service_section_title_color) . '; border-color: ' . esc_attr($print_shop_service_section_title_border_color) . ';';
	$print_shop_custom_css .= '}';
	$print_shop_custom_css .= '#service-section h2:before, #service-section h2:after {';
		$print_shop_custom_css .= 'border-color: ' . esc_attr($print_shop_service_section_title_border_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_service_box_bg_color = get_theme_mod('print_shop_service_box_bg_color');
	$print_shop_custom_css .= '#service-section .service-box {';
		$print_shop_custom_css .= 'background-color: ' . esc_attr($print_shop_service_box_bg_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_service_box_title_color = get_theme_mod('print_shop_service_box_title_color');
	$print_shop_custom_css .= '#service-section .service-box h3 a {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_service_box_title_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_service_box_icon_color = get_theme_mod('print_shop_service_box_icon_color');
	$print_shop_service_box_icon_bg_color = get_theme_mod('print_shop_service_box_icon_bg_color');
	$print_shop_service_box_icon_border_color = get_theme_mod('print_shop_service_box_icon_border_color');
	$print_shop_custom_css .= '#service-section .service-content i {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_service_box_icon_color) . '; background-color: ' . esc_attr($print_shop_service_box_icon_bg_color) . '; border-color: ' . esc_attr($print_shop_service_box_icon_border_color) . ';';
	$print_shop_custom_css .= '}';

	// Product color options
	$print_shop_product_title_color = get_theme_mod('print_shop_product_title_color');
	$print_shop_custom_css .= '.woocommerce ul.products li.product .woocommerce-loop-product__title {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_product_title_color) . ' !important;';
	$print_shop_custom_css .= '}';

	$print_shop_product_price_color = get_theme_mod('print_shop_product_price_color');
	$print_shop_custom_css .= '.woocommerce ul.products li.product .price {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_product_price_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_product_btn_color = get_theme_mod('print_shop_product_btn_color');
	$print_shop_product_btn_bg_color = get_theme_mod('print_shop_product_btn_bg_color');
	$print_shop_custom_css .= '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, a.added_to_cart.wc-forward {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_product_btn_color) . '; background-color: ' . esc_attr($print_shop_product_btn_bg_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_product_btn_hover_color = get_theme_mod('print_shop_product_btn_hover_color');
	$print_shop_product_sale_color = get_theme_mod('print_shop_product_sale_color');
	$print_shop_custom_css .= '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, a.added_to_cart.wc-forward:hover {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_product_sale_color) . '; background-color: ' . esc_attr($print_shop_product_btn_hover_color) . ';';
	$print_shop_custom_css .= '}';

	$print_shop_product_sale_bg_color = get_theme_mod('print_shop_product_sale_bg_color');
	$print_shop_product_sale_color = get_theme_mod('print_shop_product_sale_color');
	$print_shop_custom_css .= '.woocommerce span.onsale {';
		$print_shop_custom_css .= 'color: ' . esc_attr($print_shop_product_sale_color) . '; background-color: ' . esc_attr($print_shop_product_sale_bg_color) . ';';
	$print_shop_custom_css .= '}';