<?php
/*
Plugin Name: My Post Titles
Plugin URI: https://coders24x7.com/my-post-titles
Description: Sets custom color and box shadow for post titles
Version: 1.0
Author: IDB WDPF Round 57
Author URI: https://coders24x7.com
*/

/**
 * Enqueue custom styles for post titles
 */
function my_post_titles_enqueue_styles() {
    wp_enqueue_style( 'my-post-titles', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_post_titles_enqueue_styles' );

function my_post_titles_filter_title( $title ) {
    $filtered_title = '<span class="entry-title">' . $title . '</span>';
    return $filtered_title;
}
add_filter( 'the_title', 'my_post_titles_filter_title' );