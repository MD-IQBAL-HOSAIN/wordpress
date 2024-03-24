<?php
require __DIR__ . "/parts/carousel.php";
// require __DIR__."/parts/newsticker.php";
require __DIR__ . "/parts/widget-area.php";
require __DIR__ . "/parts/class-wp-bootstrap-navwalker.php";


//nav menue start
add_theme_support('menus');
//action hook
add_action('init', 'register_my_menus');

function register_my_menus()
{
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu'),
			//'secondary-menu' => __( 'Secondary Menu' ),
			//'sidebar-menu' => __( 'Sidebar Menu' )
		)
	);
}
//nav menu end.
//Add selective refresh for sidebar widget
add_theme_support('customize-selective-refresh-widgets');

// woocommerce support
add_theme_support('woocommerce');

/**
 * Custom background support.
 */
add_theme_support('custom-background', apply_filters('news_custom_background_args', array(
	'default-color' => 'ffffff',
	'default-image' => '',
)));

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
add_theme_support('post-thumbnails');
add_theme_support('custom-header');
add_theme_support('custom-logo');
add_theme_support('editor-styles');
add_theme_support('align-wide');
add_theme_support('html5', array('navigation-widgets'));
add_theme_support('wp-block-styles');
add_theme_support('custom-background');


add_action('init', 'prowp_register_my_post_types');
function prowp_register_my_post_types()
{

	register_post_type(
		'notice',
		array(
			'public' => true,
			'labels' => array('name' => 'Notice',),
			'taxonomies' => array('category', 'Course', 'post_tag'),
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields')
		)
	);
	register_post_type(
		'results',
		array(
			'labels' => array('name' => 'Results'),
			'taxonomies' => array('post_tag'),
			'public' => true,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments')
		)
	);
}

function itbari_wp_widget_areas() {
	register_sidebar( array(
		'name' => __( 'Right Menu 2', 'itbari' ),
		'id' => 'right_sidebar2',
		'before_widget' => '<div class="single_sidebar">',
		'after_widget' => '</div>',
	    'before_title' => '<h2>',
	    'after_title' => '</h2>',
	) );
}
add_action('widgets_init', 'itbari_wp_widget_areas');