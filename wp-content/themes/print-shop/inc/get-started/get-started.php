<?php
//about theme info
add_action( 'admin_menu', 'print_shop_gettingstarted' );
function print_shop_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started: Print Shop Theme', 'print-shop'), esc_html__('Get Started', 'print-shop'), 'edit_theme_options', 'print_shop_guide', 'print_shop_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function print_shop_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
}
add_action('admin_enqueue_scripts', 'print_shop_admin_theme_style');

//guidline for about theme
function print_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'print-shop' );
?>

<div class="wrapper-info">
	<div class="top-section">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to Print Shop Theme', 'print-shop' ); ?></h2>
	    	<span class="version">Version: <?php echo esc_html($theme['Version']);?></span>
	    	<p><?php esc_html_e('A print shop is a theme that offers printing services to businesses and individuals. These services can include business cards, flyers, brochures, and other marketing materials. Print shops can also provide copying, mounting, and laminating services. Many print shops are now offering web-to-print services, which allow customers to order and pay for their printing online. This convenience has made print shops more popular than ever. The theme is a copying company that offers photocopying, print, and banner print services. The shop offers a wide range of printing services, including print design, print color, and printing house services. The print shop will also offer a wide range of printing tools, including print color, print company, print studio, and print store. Whether you’re a business owner or an individual who needs printing services, you should consider using a print shop. This article provides an overview of what print shops are and their benefits. The print shop theme is an online printing service that offers a wide range of print products and services. We offer a range of print products and services that are designed to meet the needs of businesses and individuals.', 'print-shop'); ?></p>
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/print-shop.png" alt="" />
			</div>
	    </div>
	    <div class="info-link">
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'print-shop'); ?></a>
			<a href="<?php echo esc_url( PRINT_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'print-shop'); ?></a>
			<a class="get-pro" href="<?php echo esc_url( PRINT_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'print-shop'); ?></a>
		</div>
	</div>

	<div class="accordain-sec">
		<div class="block">
		  	<input type="radio" name="city" id="cityA" checked />   
		  	<label for="cityA"><span><?php esc_html_e( 'Visit to our amazing Premium Theme', 'print-shop' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info1">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'print-shop' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="sec-left-inner">
			  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/print-shop.png" alt="" />
			  		<p class="lite-para"><?php esc_html_e('Print Shop WordPress Theme is a mobile-friendly WordPress theme that can be used to create multi-purpose food-related businesses like printing companies, design studio designers, and more. Additionally, it is useful for graphic design, photography, photocopying business, and more. The theme includes pages with an attractive Call to Action Button displayed on appealing banners. Print Shop WordPress Theme has made the right blend of rational thinking and passion into the design of the theme as well as its style. We’ve added various features that can be added as customizable options, such as hooks, short codes, and other customization options. These features allow for personalization and make making changes to the theme simple. You can quickly add and take away any banner, section, or another element you feel isn’t appropriate or isn’t in line with the image you have of the site. This Premium Print Shop WordPress Theme comes with infinite sliders, numerous template pages, and homepage templates, as well as exclusive features and functionalities including Woo Commerce safe and optimized codes and fonts, Google family and typography, amazing font icons, custom headers background colors, and many more features than may not be enough to wrap the entire thing. The premium WordPress theme will outlast and surpass every other theme under its stunning layout, well-defined layouts and stunning sections, as well as high-resolution images, making it one of the top printing Shop WordPress themes on the web.', 'print-shop'); ?></p>

					<div class="info-link-top">
						<a href="<?php echo esc_url( PRINT_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'print-shop' ); ?></a>
						<a href="<?php echo esc_url( PRINT_SHOP_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'print-shop' ); ?></a>
						<a href="<?php echo esc_url( PRINT_SHOP_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'print-shop' ); ?></a>
					</div>					
			  	</div>
		  	</div>
		</div>
		<div class="block">
		  	<input type="radio" name="city" id="cityB"/>
		  	<label for="cityB"><span><?php esc_html_e( 'Theme Features', 'print-shop' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info2">
			    <h3><?php esc_html_e( 'Lite Theme v/s Premium Theme', 'print-shop' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'print-shop'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'print-shop'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'print-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'print-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'print-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'print-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'print-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'print-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'print-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'print-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'print-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'print-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'print-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'print-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'print-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'print-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'print-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'print-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( PRINT_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'print-shop'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
		 	</div>
		</div>
	</div>
</div>
<?php } ?>