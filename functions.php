<?php
/* Black Walnut child theme functions and definitions */

// Include the parent theme style.css

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

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