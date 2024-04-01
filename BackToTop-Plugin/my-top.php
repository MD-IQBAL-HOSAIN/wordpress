<?php
/*
Plugin Name: Back To Top plugin
Description: Adds a simple "Hello, World!" widget to your WordPress site.
Version: 1.0.0
Author: Bijoy Chowdhury
*/


function my_top_enqueue_assets() {
    wp_enqueue_style( 'my-top-style', plugins_url( 'assets/style.css', __FILE__ ));
    wp_enqueue_script( 'my-top-script', plugins_url( 'assets/script.js', __FILE__ ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_top_enqueue_assets' );


/* function my_top_init(){
    echo <<<HTML
<!-- <button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top">Top <img src="" alt=""></button> -->
<button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images2top.png" alt="Image Description">
</button>

HTML;
} */
function my_top_init(){
    ?>
    <button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top">
        <img src="<?php echo plugins_url( 'assets/img/images2top.png', __FILE__ ); ?>" alt="Image Description" style="height: 30px; width:30px">
    </button>
    <?php
}

add_action('wp_footer', 'my_top_init');
?>


