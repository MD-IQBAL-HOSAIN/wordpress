<?php
/*
Plugin Name: Top Button
Description: Adds a simple "Hello, World!" widget to your WordPress site.
Version: 2.0
Author: Israt Ahamed Sabbir
*/


function my_top_enqueue_assets() {
    wp_enqueue_style( 'my-top-style', plugins_url( 'assets/style.css', __FILE__ ));
    wp_enqueue_script( 'my-top-script', plugins_url( 'assets/script.js', __FILE__ ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_top_enqueue_assets' );


function my_top_init(){
    echo <<<HTML
<button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top">Top</button>
HTML;
}
add_action('wp_footer', 'my_top_init');
?>
