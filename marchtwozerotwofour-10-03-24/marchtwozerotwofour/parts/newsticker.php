<?php
// Add the options page
add_action('admin_menu', 'news_ticker_add_options_page');
// Register plugin settings
add_action('admin_init', 'news_ticker_register_settings');
// Add the options page
function news_ticker_add_options_page() {
    add_menu_page(
        'News Ticker Settings',
        'News Ticker',
        'manage_options',
        'news-ticker',
        'news_ticker_options_page'
    );
}

// Render the options page HTML
function news_ticker_options_page() {
    ?>
    <div class="wrap">
        <h1>News Ticker Settings</h1>
        <form method="post" action="options.php">
            <?php
            //Outputs nonce, action, and option_page fields for a settings page.
            settings_fields('news_ticker_settings');
            do_settings_sections('news-ticker');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register plugin settings
function news_ticker_register_settings() {
    //Registers a setting and its data into options table.
    register_setting(
        'news_ticker_settings',
        'news_ticker_content',
        'news_ticker_sanitize_content'
    );

    add_settings_section(
        'news_ticker_section',
        'News Ticker Content',
        'news_ticker_section_callback',
        'news-ticker'
    );

    add_settings_field(
        'news_ticker_content_field',
        'News Ticker Content',
        'news_ticker_content_field_callback',
        'news-ticker',
        'news_ticker_section'
    );
}

// Sanitize the news ticker content
function news_ticker_sanitize_content($content) {
    // Sanitize the content here
    // return sanitize_text_field($content);
    return $content;
}

// Settings section callback
function news_ticker_section_callback() {
    echo '<p>Enter the news ticker content here.</p>';
}

// Settings field callback
function news_ticker_content_field_callback() {
    //you can get any option table value using get_option function
    $content = get_option('news_ticker_content');
    echo '<textarea name="news_ticker_content" rows="5" cols="50">' . esc_textarea($content) . '</textarea>';
}



// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'news_ticker_enqueue_scripts');

// Enqueue scripts and styles
function news_ticker_enqueue_scripts() {
    wp_enqueue_style('news-ticker-style', get_template_directory_uri().'/css/news-ticker.css');
    wp_enqueue_script('news-ticker-script', get_template_directory_uri().'/js/news-ticker.js', array('jquery'), '1.0', true);
}
// Add the shortcode to display the news ticker
// add_shortcode('news_ticker', 'news_ticker_display');




