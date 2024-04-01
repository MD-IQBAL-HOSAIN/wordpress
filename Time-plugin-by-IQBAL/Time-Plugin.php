<?php
/*
Plugin Name: Time Plugin
Description: Adds a simple time display to the header of your WordPress site.
Version: 1.0.0
Author: MD IQBAL HOSSAIN
*/

function time_enqueue_assets() {
    // css file
    wp_enqueue_style('time-plugin-style', plugins_url('assets/css/time-plugin.css', __FILE__));
    
    // js file
    wp_enqueue_script('time-plugin-script', plugins_url('assets/js/time-plugin.js', __FILE__), array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'time_enqueue_assets');


function time_display_in_header() {
    ?>
    <div id="time-display">
        <?php echo date('F j, Y, g:i a'); ?>
    </div>
    <?php
}
add_action('wp_head', 'time_display_in_header');
?>
