<?php
/**
 * The template for displaying the footer.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

</main><!-- end .main-container -->

<footer id="colophon" class="site-footer cf" role="contentinfo">

	<?php get_sidebar( 'footer' ); ?>

	<div id="site-info" class="credit" role="contentinfo">
		<p>&copy; <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?></a> 2020–<?php echo date('Y'); ?>.</p>

		<ul class="legal">
			<li>Theme by <a href="https://www.elmastudio.de/en/">Elmastudio</a>, custom design by <a href="https://kaitsykes.com">Kait Sykes</a></li>
			<li><a href="http://staging.pearlywhitesdentalhygiene.com/privacy-policy/">Privacy Policy</a></li>
			<li><a href="http://staging.pearlywhitesdentalhygiene.com/credits/">Website Credits</a></li>
		</ul><!-- end .legal -->
	</div><!-- end .credit / #site-info -->
	<div class="top"><span><?php _e('Top', 'blackwalnut') ?></span></div>
</footer><!-- end #colophon -->
</div><!-- end .wrap-all -->

<?php wp_footer(); ?>

</body>
</html>
