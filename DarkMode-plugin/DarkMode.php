<?php
/*
Plugin Name: Dark Mode Plugin
Description: Adds a simple dark mode feature to your WordPress site.
Version: 1.0.0
Author: Bijoy Chowdhury
*/


function dark_mode_enqueue_assets() {
    wp_enqueue_style( 'dark-mode-style', plugins_url( 'assets/dark-mode.css', __FILE__ ));
    wp_enqueue_script( 'dark-mode-script', plugins_url( 'assets/dark-mode.js', __FILE__ ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'dark_mode_enqueue_assets' );


function dark_mode_init(){
    ?>
    <button onclick="toggleDarkMode()" id="darkModeBtn" title="Toggle Dark Mode">Dark Mode</button>
    <?php
}
add_action('wp_footer', 'dark_mode_init');
?>
