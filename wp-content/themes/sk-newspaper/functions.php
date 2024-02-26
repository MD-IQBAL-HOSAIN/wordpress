<?php

/**
 * Theme functions and definitions
 *
 * @package Sk Newspaper
 */
if (!function_exists('sknewspaper_enqueue_styles')) :
	/**
	 * @since 1.0.0
	 */
	function sknewspaper_enqueue_styles()
	{
		wp_enqueue_style('newspaperss-style-parent', get_template_directory_uri() . '/style.css');
		wp_enqueue_style('sknewspaper-style', get_stylesheet_directory_uri() . '/style.css', array('newspaperss-style-parent'), '1.0.0');
		if (is_rtl()) {
			wp_enqueue_style('sknewspaper_css_rtl', get_stylesheet_directory_uri() . '/sknewspaper-rtl.css', array(), '1.0');
		}
	}

endif;
add_action('wp_enqueue_scripts', 'sknewspaper_enqueue_styles', 9999);


/* Remove parent theme page templates */

function sknewspaper_remove_page_templates($page_templates)
{
	unset($page_templates['header.php']);
	unset($page_templates['front-page.php']);
	return $page_templates;
}
add_filter('theme_page_templates', 'sknewspaper_remove_page_templates');

/** call widgets */

require get_theme_file_path('/inc/widgets/latest-posts-carousel.php');
require get_theme_file_path('/inc/widgets/grid-post-blog.php');
