<?php
/**
 * Display Header.
 * @package Print Shop
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'print-shop' ); ?></a>
		<div id="header">
			<div class="container position-relative">
				<div class="header-box">
					<div class="row">
						<div class="col-lg-2 col-md-4 align-self-center pe-md-0">
							<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
						</div>
						<div class="col-lg-10 col-md-8 align-self-end">
							<?php  get_template_part( 'template-parts/header/top', 'bar' ); ?>
							<div class="menu-section">
								<div class="<?php if( get_theme_mod( 'print_shop_sticky_header', false) != '') { ?>sticky-menubox<?php } else { ?>close-sticky <?php } ?>">
						    		<?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if(is_singular()) {?>
		<div class="inner-head">
			<div class="container text-center">
				<h1><?php single_post_title(); ?></h1>
				<div class="lt-breadcrumbs mt-3">
					<?php print_shop_breadcrumb(); ?>
				</div>
			</div>
		</div>
	<?php }?>