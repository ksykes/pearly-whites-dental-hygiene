<?php
/**
 * The Footer widget areas.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

<?php
	/* Check if any of the footer widget areas have widgets.
	 *
	 * If none of the footer widget areas have widgets, let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-1' )
		&& ! is_active_sidebar( 'footer-2' )
		)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="footer-widgetarea" class="cf">
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div id="footer-one" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- end #footer-column-one -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div id="footer-two" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- end #footer-column-two -->
	<?php endif; ?>

</div><!-- end #footer-widgetarea -->