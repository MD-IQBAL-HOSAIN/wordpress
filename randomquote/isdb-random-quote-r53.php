<?php
/*
Plugin Name: IsDB Random Quotes Plugin
Plugin URI: http://isdbstudents.com/wordpress-plugins/randomquote
Description: Post a random quote with every posts footers
Version: 1.0
Author: IsDB BISEW
Author URI: http://asamamun.wordpress.com
Text Domain: random-quote
License: GPLv2
*/

/* register_activation_hook( __FILE__, 'random_quote' );
function random_quote() {
    global $wp_version;
    if ( version_compare( $wp_version, '4.1', '<' ) ) {
    wp_die( 'This plugin requires WordPress version 4.1 or higher.' );
    }
}


register_deactivation_hook( __FILE__, 'end_random_quote' );
function end_random_quote() {
//do something
} */

//add script and style
function add_random_quote_script(){
    wp_enqueue_style( 'randomquote_css', plugins_url( 'assets/css/randomquote.css', __FILE__ ) , array(), null, 'all');
    //script should be registered first and then added/enqueued
    wp_register_script( 'jquery364', plugins_url( 'assets/js/jquery364.min.js', __FILE__ ), array (), null, true);    
    wp_register_script( 'randomquote_js', plugins_url( 'assets/js/randomquote.js', __FILE__ ), array ( 'jquery' ), null, true);
    wp_enqueue_script('jquery364');
    wp_enqueue_script('randomquote_js');

}
add_action( 'wp_enqueue_scripts', 'add_random_quote_script' );

// change title color
add_filter('the_title','changecolor');
function changecolor($t){
    return "<span style='color:green'>".$t."<span>";
}

//add quote from api after the content
add_filter( 'the_content', 'add_quote' );
function add_quote($c){
    $o = get_quote();
    return $c . "<hr><div id='quoteContainer'>".$o->quote."- ".$o->author."</div><hr>";
}


function get_quote(){
    // create curl resource
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, "https://dummyjson.com/quotes/".rand(1,200));
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output string
    $output = curl_exec($ch);
    // close curl resource to free up system resources
    curl_close($ch); 
    return json_decode($output);
}


// create custom plugin settings menu
add_action( 'admin_menu', 'prowp_create_menu' );
function prowp_create_menu() {
//create new top-level menu
add_menu_page( 'Halloween Plugin Page', 'Halloween Plugin',
'manage_options', 'prowp_main_menu', 'prowp_main_plugin_page',
plugins_url( '/images/wordpress.png', __FILE__ ) );
//create two sub-menus: settings and support
add_submenu_page( 'prowp_main_menu', 'Halloween Settings Page',
'Settings', 'manage_options', 'halloween_settings',
'prowp_settings_page' );
add_submenu_page( 'prowp_main_menu', 'Halloween Support Page',
'Support', 'manage_options', 'halloween_support', 'prowp_support_page' );
}
?>