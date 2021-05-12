<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
 ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Our dental hygienist, dentist, and denturist provide cosmetic and family dental care in Erin, ON and Acton, ON." />
	<meta name="twitter:title" content="Pearly Whites Dental Hygiene">
	<meta name="twitter:card" value="Our dental hygienist, dentist, and denturist provide cosmetic and family dental care in Erin, ON and Acton, ON.">
	<meta name="twitter:image" content="http://staging.pearlywhitesdentalhygiene.com/wp-content/uploads/2020/12/pearly_whites_metadata_logo.png">
	<meta property="og:title" content="Pearly Whites Dental Hygiene" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://pearlywhitesdentalhygiene.com/" />
	<meta property="og:description" content="Our dental hygienist, dentist, and denturist provide cosmetic and family dental care in Erin, ON and Acton, ON." />
	<meta property="og:image" content="http://staging.pearlywhitesdentalhygiene.com/wp-content/uploads/2020/12/pearly_whites_metadata_logo.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57080718-5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-57080718-5');
	</script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

	<div id="spinner"></div>
	<div class="wrap-all">
	<header id="masthead" class="site-header cf" role="banner">

		<div id="mobilenav-open"><span><?php _e( 'Menu', 'blackwalnut' ); ?></span></div>

		<div class="site-branding-wrap">
			<div class="site-branding">

				<?php if ( get_header_image() ) : ?>
				<div class="title-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
				</div><!-- end .title-logo -->
				<?php endif; ?>

				<?php
					if ( is_front_page() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
						<p class="site-sub-description">Denturist and Dentist Available</p>
						<p class="tagline">dream &bull; believe &bull; floss</p>
					<?php endif;
				?>

			</div><!-- end .site-branding -->
		</div><!-- end .site-branding-wrap -->

		<?php if ( get_theme_mod( 'header_intro') !== ''  && is_front_page() ) : ?>
		<div class="more-info-btn"><span><?php _e( 'more info', 'blackwalnut' ); ?></span></div>
		<div class="intro-wrap">
			<?php echo wp_kses_post( wpautop( get_theme_mod( 'header_intro' ) ) ); ?>
		</div><!-- end .intro-wrap -->
		<?php endif; ?>

		</header><!-- end #masthead -->

		<div id="main-menu-wrap" class="sticky-element cf">
		<div class="sticky-anchor"></div>
		<nav id="site-nav" class="sticky-content" role="navigation">
			<div id="mobilenav-close"><span><?php _e( 'Close', 'blackwalnut' ); ?></span></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container' => 'false') ); ?>
		</nav><!-- end #site-nav -->
		</div><!-- end #main-menu-wrap -->

<main class="main-container cf">