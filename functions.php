<?php
/* Black Walnut child theme functions and definitions */

// Include the parent stylesheet

function blackwalnut_enqueue_styles() {
    // parent theme style.css
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'blackwalnut_enqueue_styles' );

// Remove unneeded parent theme page templates

function child_remove_page_templates( $page_templates ) {
    unset( $page_templates['page-templates/centered-page.php'] );
    unset( $page_templates['page-templates/contact-page.php'] );
    unset( $page_templates['page-templates/front-page-one.php'] );
    unset( $page_templates['page-templates/front-page-two.php'] );
    unset( $page_templates['page-templates/menu-page.php'] );
    unset( $page_templates['page-templates/testimonials-page.php'] );

    return $page_templates;
}

add_filter( 'theme_page_templates', 'child_remove_page_templates' );

// Remove 'Protected:' from password-protected post titles

add_filter( 'protected_title_format', 'remove_protected_text' );
    function remove_protected_text() {
    return __('%s');
}

// Customize footer widget area

function remove_footer_widgets() {
    // remove footer widgets
    unregister_sidebar( 'footer-1' );
    unregister_sidebar( 'footer-2' );
    unregister_sidebar( 'footer-3' );
}

add_action( 'widgets_init', 'remove_footer_widgets', 15 );

function blackwalnut_child_widgets_init() {
    // re-add first and second footer widgets
    register_sidebar( array (
		'name' => __( 'Footer: 2-columns (left)', 'blackwalnut' ),
		'id' => 'footer-1',
		'description' => __( 'First widget area of the two-column Footer widget area.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
    ) );
    
    register_sidebar( array (
		'name' => __( 'Footer: 2-columns (right)', 'blackwalnut' ),
		'id' => 'footer-2',
		'description' => __( 'Second widget area of the two-column Footer widget area.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'blackwalnut_child_widgets_init', 20 );