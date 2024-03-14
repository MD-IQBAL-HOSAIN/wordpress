<?php
// Enqueue parent theme styles
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_styles' );
function enqueue_parent_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
