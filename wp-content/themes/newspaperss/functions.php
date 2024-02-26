<?php

/**
 * newspaperss functions and definitions
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 */

global $post;
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newspaperss_content_width()
{
  $GLOBALS['content_width'] = apply_filters('newspaperss_content_width', 1000);
}
add_action('after_setup_theme', 'newspaperss_content_width', 0);


if (!function_exists('newspaperss_setup')) :
  //**************newspaperss SETUP******************//
  function newspaperss_setup()
  {

    //Register Menus
    register_nav_menus(array(
      'primary' => esc_html__('Primary Navigation(Header)', 'newspaperss'),
      'top-bar'    => esc_html__('Top bar menu', 'newspaperss')
    ));
    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support('title-tag');


    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');


    // Declare WooCommerce support
    add_theme_support('woocommerce');

    //Custom Background
    add_theme_support('custom-background', array(
      'default-color' => 'f7f7f7',

    ));

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));
    //Post Thumbnail
    add_theme_support('post-thumbnails');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
    /*

    /*
    * Enable support for custom logo.
    *
    *  @since newspaperss
    */

    $defaults = array(
      'height'      => 80,
      'width'      => 180,
      'flex-width'  => true,
      'flex-height'  => true,
      'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support('post-thumbnails');

    // Add featured image sizes
    //
    // Sizes are optimized and cropped for landscape aspect ratio
    // and optimized for HiDPI displays on 'small' and 'medium' screen sizes.
    add_image_size('newspaperss-small', 735, 400, true); // name, width, height, crop
    add_image_size('newspaperss-medium', 428, 400, true);
    add_image_size('newspaperss-large', 735, 400, true);
    add_image_size('newspaperss-xlarge', 1920, 400, true);
    add_image_size('newspapersstop-medium', 540, 400, true);
    add_image_size('newspaperss-listpost-small', 110, 85, true);
    add_image_size('newspaperss-xxlarge', 1920, 600, true);
    add_image_size('newspaperss-small-grid', 600, 300, true); // name, width, height, crop




    // Add theme support for woocommerce product gallery added in WooCommerce 3.0.
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-slider');

    // Adding support for core block visual styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for custom color scheme.
    add_theme_support('editor-color-palette', array(
      array(
        'name'  => 'strong blue',
        'slug'  => 'strong-blue',
        'color' => '#0073aa',
      ),
      array(
        'name'  => 'lighter blue',
        'slug'  => 'lighter-blue',
        'color' => '#229fd8',
      ),
      array(
        'name'  => 'very light gray',
        'slug'  => 'very-light-gray',
        'color' => '#eee',
      ),
      array(
        'name'  => 'very dark gray',
        'slug'  => 'very-dark-gray',
        'color' => '#444',
      )
    ));

    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If newspaperss're building a theme based on newspaperss, use a find and replace
    * to change 'newspaperss' to the name of newspaperssr theme in all the template files
    */

    load_theme_textdomain('newspaperss', get_template_directory() . '/languages');

    add_theme_support('starter-content', array(

      'posts' => array(
        'home',
        'blog',
      ),

      'options' => array(
        'show_on_front' => 'page',
        'page_on_front' => '{{home}}',
        'page_for_posts' => '{{blog}}',
      ),


      'nav_menus' => array(
        'primary' => array(
          'name' => __('Primary Navigation(Header)', 'newspaperss'),
          'items' => array(
            'page_home',
            'page_blog',
          ),
        ),
      ),
    ));
    if (!function_exists('wp_body_open')) {

      /**
       * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
       */
      function wp_body_open()
      {
        do_action('wp_body_open');
      }
    }

    /**
     * Fix skip link focus in IE11.
     *
     * This does not enqueue the script because it is tiny and because it is only for IE11,
     * thus it does not warrant having an entire dedicated blocking script being loaded.
     *
     * @link https://git.io/vWdr2
     */
    function newspaperss_skip_link_focus_fix()
    {
      // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
?>
      <script>
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
          var t, e = location.hash.substring(1);
          /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
      </script>
<?php
    }
    add_action('wp_print_footer_scripts', 'newspaperss_skip_link_focus_fix');
  }
endif; // newspaperss_setup
add_action('after_setup_theme', 'newspaperss_setup');


/**
 * The CORE functions for newspaperss
 *
 * Stores all the core functions of the template.
 *
 * @package newspaperss
 *
 * @since newspaperss 1.0
 */



/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function newspaperss_custom_excerpt_length($length)
{
  if (is_admin()) {
    return $length;
  }
  return 40;
}
add_filter('excerpt_length', 'newspaperss_custom_excerpt_length', 999);


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function newspaperss_excerpt_more($more)
{
  if (is_admin()) {
    return $more;
  }
  return '...';
}
add_filter('excerpt_more', 'newspaperss_excerpt_more');

/**
 * Checks whether woocommerce is active or not
 *
 * @return boolean
 */
function newspaperss_is_woocommerce_active()
{
  if (class_exists('woocommerce')) {
    return true;
  } else {
    return false;
  }
}
//Load CSS files

function newspaperss_scripts()
{
  wp_enqueue_style('newspaperss_core', get_template_directory_uri() . '/css/newspaperss.min.css', array(), '1.0');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css', 'font_awesome', true);
  wp_enqueue_style('newspaperss-fonts', newspaperss_fonts_url(), array(), null);
  wp_enqueue_style('newspaperss-style', get_stylesheet_uri(), array(), '1.1.0');
}
add_action('wp_enqueue_scripts', 'newspaperss_scripts');


/**
 * Google Fonts
 */

function newspaperss_fonts_url()
{
  $fonts_url = '';

  /* Translators: If there are characters in newspaperssr language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into newspaperssr own language.
    */
  $lato = _x('on', 'Lato font: on or off', 'newspaperss');

  /* Translators: If there are characters in your language that are not
    * supported by Ubuntu, translate this to 'off'. Do not translate
    * into your own language.
    */
  $ubuntu = _x('on', 'Ubuntu font: on or off', 'newspaperss');



  /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
  $open_sans = _x('on', 'Open Sans font: on or off', 'newspaperss');

  if ('off' !== $lato || 'off' !== $ubuntu || 'off' !== newspaperss) {
    $font_families = array();

    if ('off' !== $ubuntu) {
      $font_families[] = 'Ubuntu:400,500,700';
    }

    if ('off' !== $lato) {
      $font_families[] = 'Lato:400,700,400italic,700italic';
    }

    if ('off' !== $open_sans) {
      $font_families[] = 'Open Sans:400,400italic,700';
    }

    $query_args = array(
      'family' => urlencode(implode('|', $font_families)),
      'subset' => urlencode('latin,latin-ext'),
    );

    $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
  }

  return $fonts_url;
}

//Load Java Scripts
function newspaperss_head_js()
{
  if (!is_admin()) {
    wp_enqueue_script('jquery');
    if (is_rtl()) {
      wp_enqueue_script('newspaperss_js_rtl', get_template_directory_uri() . '/js/newspaperss-rtl.min.js', array('jquery'), true);
    } else {
      wp_enqueue_script('newspaperss_js', get_template_directory_uri() . '/js/newspaperss.min.js', array('jquery'), true);
    }
    wp_enqueue_script('newspaperss_other', get_template_directory_uri() . '/js/newspaperss_other.min.js', array('jquery'), true);
    if (is_singular()) {
      wp_enqueue_script('comment-reply');
    }
  }
}
add_action('wp_enqueue_scripts', 'newspaperss_head_js');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function newspaperss_widgets_init()
{
  register_sidebar(array(
    'name'          => __('Right Sidebar', 'newspaperss'),
    'id'            => 'right-sidebar',
    'description'   => __('Right Sidebar', 'newspaperss'),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-12 medium-6 large-12"><div class="widget_wrap ">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
  ));
  $footerwid_row_control = get_theme_mod('footerwid_row_control', 'large-4');
  register_sidebar(array(
    'name'          => __('Footer Widgets', 'newspaperss'),
    'id'            => 'foot_sidebar',
    'description'   => __('Widget Area for the Footer', 'newspaperss'),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-footer cell small-12 medium-6 ' . esc_attr($footerwid_row_control) . ' align-self-top " ><aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
  ));
  register_sidebar(array(
    'name'          => __('Header advertising area ', 'newspaperss'),
    'id'            => 'sidebar-headeradvertising',
    'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title hide">',
    'after_title'   => '</h3>'
  ));
  register_sidebar(array(
    'name'          => __('Home page widgets area', 'newspaperss'),
    'id'            => 'sidebar-homepagewidgets',
    'before_widget' => '<div id="%1$s" class="widget %2$s " data-widget-id="%1$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ));
  register_sidebar(array(
    'name'          => __('Home page sidebar', 'newspaperss'),
    'id'            => 'sidebar-homepagesidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s cell small-12 medium-6 large-12 " data-widget-id="%1$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
  ));
  register_sidebar(array(
    'name'          => __('Woocommerce Sidebar', 'newspaperss'),
    'id'            => 'right-woocommerce-newspaperssidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-12 medium-6 large-12"><div class="widget_wrap ">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
  ));
}

add_action('widgets_init', 'newspaperss_widgets_init');


if (true == get_theme_mod('classic_widgets_setting_silk', 'on')) :
  // Classic Widgets

  // Disables the block editor from managing widgets in the Gutenberg plugin.
  add_filter('gutenberg_use_widgets_block_editor', '__return_false');
  // Disables the block editor from managing widgets.
  add_filter('use_widgets_block_editor', '__return_false');
endif;

/** custom header */
require_once(get_template_directory() . '/functions/custom-header.php');


/** Configure responsive image sizes */
require_once(get_template_directory() . '/functions/hooks.php');

/** Register all navigation menus */
require_once(get_template_directory() . '/functions/menu.php');

/** founctions for color calculation */
require_once(get_template_directory() . '/functions/custom-color.php');

/**  woocommerce founctions */
if (newspaperss_is_woocommerce_active()) {
  require_once(get_template_directory() . '/functions/woo-hooks.php');
}

/** call widgets */
require_once(get_template_directory() . '/inc/widgets/latest-posts-news.php');
require_once(get_template_directory() . '/inc/widgets/list-post-blog.php');
require_once(get_template_directory() . '/inc/widgets/latest-post-blogbig.php');
require_once(get_template_directory() . '/inc/widgets/recent-posts-single.php');


//load widgets ,kirki ,customizer,functions
require_once(get_template_directory() . '/inc/kirki/kirki.php');
require_once(get_template_directory() . '/inc/customizer.php');
require_once(get_template_directory() . '/inc/welcome/welcome-screen.php');
