<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

//panel option
require_once( get_stylesheet_directory(). '/panel-option.php' );

function show_option() {
    if(!is_admin()) {
        echo '<h1>'.genosha_get_theme_option('input_example').'</h1>';
    }
}

add_action('init', 'show_option');