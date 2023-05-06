<?php
/**
 * Displaying Footer.
 * @package Print Shop
 */
?>
<footer id="footer-section" role="contentinfo">
	<div class="footer-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-lg-10 col-md-10">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div>
		</div>
	</div>
	<?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );
		
		get_template_part( 'template-parts/footer/site', 'info' );
	?>
</footer>

<?php wp_footer(); ?>

</body>
</html>