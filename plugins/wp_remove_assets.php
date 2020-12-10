<?php
/*
 * Plugin Name: WP Remove Assets
 * Plugin URI: https://www.cozmsolabs.com
 * Version: 0.1
 * Description: Filter particular scripts and style to load in posts or pages that don't need it.
 * Author: Cristian Antohe
 * Author URI: https://www.cozmoslabs.com/
*/


// remove script handles we don't need, each with their own conditions

add_action( 'wp_print_scripts', 'wra_filter_scripts', 100000 );
add_action( 'wp_print_footer_scripts', 'wra_filter_scripts', 100000 );

function wra_filter_scripts() {
	#wp_deregister_script($handle);
	#wp_dequeue_script($handle);

	wp_deregister_script( 'bbpress-editor' );
	wp_dequeue_script( 'bbpress-editor' );

	// Device Pixels support
	// This improves the resolution of gravatars and wordpress.com uploads on hi-res and zoomed browsers. We only have gravatars so we should be ok without it.
	wp_deregister_script( 'devicepx' );
	wp_dequeue_script( 'devicepx' );

	if ( ! is_singular( 'docs' ) ) {
		// the table of contents plugin is being used on documentation pages only
		wp_deregister_script( 'toc-front' );
		wp_dequeue_script( 'toc-front' );
	}

	if ( ! is_singular( array( 'docs', 'post' ) ) ) {
		wp_deregister_script( 'codebox' );
		wp_dequeue_script( 'codebox' );
	}


}

// Jetpack
add_action( 'jetpack_implode_frontend_css', 'wra_remove_jetpack' );
function wra_remove_jetpack() {
	return false;
}


// remove styles we don't need
add_action( 'wp_print_styles', 'wra_filter_styles', 100000 );
add_action( 'wp_print_footer_scripts', 'wra_filter_styles', 100000 );
function wra_filter_styles() {

	#wp_deregister_style($handle);
	#wp_dequeue_style($handle);

	//no more bbpress styles.
	wp_deregister_style( 'bbp-default' );
	wp_dequeue_style( 'bbp-default' );

	// download monitor is not used in the front-end.
	wp_deregister_style( 'wp_dlmp_styles' );
	wp_dequeue_style( 'wp_dlmp_styles' );

	if ( ! is_singular( 'docs' ) ) {
		// the table of contents plugin is being used on documentation pages only
		wp_deregister_style( 'toc-screen' );
		wp_dequeue_style( 'toc-screen' );
	}

	if ( ! ( is_page( 'account' ) || is_page( 'edit-profile' ) ) ) {
		// this should not be like this. Need to look into it.
		wp_deregister_style( 'wppb_stylesheet' );
		wp_dequeue_style( 'wppb_stylesheet' );
	}

	if ( ! is_singular( array( 'docs', 'post' ) ) ) {
		wp_deregister_style( 'codebox' );
		wp_dequeue_style( 'codebox' );
	}
}


// list loaded assets by our theme and plugins so we know what we're dealing with. This is viewed by admin users only.
add_action( 'wp_print_footer_scripts', 'wra_list_assets', 900000 );
function wra_list_assets() {
	if ( ! current_user_can( 'delete_users' ) ) {
		return;
	}

	echo '</pre><h2>List of all scripts loaded on this particular page.</h2>';
	echo 'This can differ from page to page depending of what is loaded in that particular web page.';

	// Print all loaded Scripts (JS)
	global $wp_scripts;
	wra_print_assets($wp_scripts);

	// Print all loaded Scripts (JS) global $wp_scripts; wra_print_assets($wp_scripts);
	echo '<h2>List of all css styles loaded on this particular page.</h2>';
	echo 'This can differ from page to page depending of what is loaded in that particular page.';

	// Print all loaded Styles (CSS)
	global $wp_styles;
	wra_print_assets( $wp_styles );
}

function wra_print_assets( $wp_asset ) {
	$nb_of_asset = 0;
	foreach ( $wp_asset->queue as $asset ) : $nb_of_asset ++;
		$asset_obj = $wp_asset->registered[ $asset ];
		wra_asset_template( $asset_obj, $nb_of_asset );
	endforeach;
}

function wra_asset_template( $asset_obj, $nb_of_asset ) {
	if ( is_object( $asset_obj ) ) {
		echo '<div class="wra_asset" style="padding: 2rem; font-size: 14px; border-bottom: 1px solid #ccc;">';
		echo '<div class="wra_asset_nb"><span style="width: 150px; display: inline-block;">Number:</span>';
		echo $nb_of_asset . '</div>';

		echo '<div class="wra_asset_handle"><span style="width: 150px; display: inline-block;">Handle:</span>';
		echo $asset_obj->handle . '</div>';
		echo '<div class="wra_asset_src"><span style="width: 150px; display: inline-block;">Source:</span>';
		echo $asset_obj->src . '</div>';
		echo '<div class="wra_asset_deps"><span style="width: 150px; display: inline-block;">Dependencies:</span>';
		foreach ( $asset_obj->deps as $deps ) {
			echo $deps . ' / ';
		}

		echo '</div>';
		echo '<div class="wra_asset_ver"><span style="width: 150px; display: inline-block;">Version:</span>';
		echo $asset_obj->ver . '</div>';
		echo '</div>';
	}
}