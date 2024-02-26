<?php
/**
* newspaperss Theme Customizer
*
* @package newspaperss
*/


/**
* Add postMessage support for site title and description for the Theme Customizer.
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/

function newspaperss_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



    /*----------- Move Customizer default Control -----------*/
    $newspaperss_bglayout_settings = $wp_customize->get_control('background_color');
    if ($newspaperss_bglayout_settings) {
        $newspaperss_bglayout_settings->section = 'newspaperss_bglayout_settings';
    }
    $header_textcolor = $wp_customize->get_control('header_textcolor');
    if (! empty($header_textcolor)) {
        $header_textcolor->section = 'newspaperss_headtitle_settings';
        $header_textcolor->priority = 1;
    }
    $header_options = $wp_customize->get_section('header_image');
    if (! empty($header_options)) {
        $header_options->panel = 'header_options';
        $header_options->title   = __('Header Image', 'newspaperss');
        $header_options->priority = 2;
    }

    /*----------- Add section for widgets -----------*/

    $headeradvertising_section = $wp_customize->get_section('sidebar-widgets-sidebar-headeradvertising');
    if (! empty($headeradvertising_section)) {
        $headeradvertising_section->panel = 'header_options';
        $headeradvertising_section->title   = __('Header advertising area', 'newspaperss');
        $headeradvertising_section->priority = 2;
    }
    $homewidgetsarea_section = $wp_customize->get_section('sidebar-widgets-sidebar-homepagewidgets');
    if (! empty($homewidgetsarea_section)) {
        $homewidgetsarea_section->panel = 'homepage_options';
        $homewidgetsarea_section->title   = __('Home page widgets area', 'newspaperss');
        $homewidgetsarea_section->priority = 2;
    }
    $homesidebar_section = $wp_customize->get_section('sidebar-widgets-sidebar-homepagesidebar');
    if (! empty($homesidebar_section)) {
        $homesidebar_section->panel = 'homepage_options';
        $homesidebar_section->title   = __('Home page Sidebar', 'newspaperss');
        $homesidebar_section->priority = 3;
    }
    if (is_child_theme()) {
      $ubderswidgetsarea_section = $wp_customize->get_section('sidebar-widgets-sidebar-undersliderwidgets');
      if (! empty($ubderswidgetsarea_section)) {
          $ubderswidgetsarea_section->panel = 'homepage_options';
          $ubderswidgetsarea_section->title   = __('Under slider widgets area', 'newspaperss');
          $ubderswidgetsarea_section->priority = 2;
      }

    }
    if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'logo_position', array(
         'selector'            => '#main-header',
         'container_inclusive' => true,
         'render_callback'     => 'newspaperss_logo_position',
         'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
     ) );


     }
}
add_action('customize_register', 'newspaperss_customize_register');


/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function newspaperss_customize_preview_js()
{
    wp_enqueue_script('newspaperss_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true);
}
add_action('customize_preview_init', 'newspaperss_customize_preview_js');

function newspaperss_registers()
{
    wp_enqueue_style('newspaperss_customizer_style', get_template_directory_uri() . '/css/admin.css', 'newspaperss-style', true);
    wp_enqueue_script('newspaperss-customizer-js',get_template_directory_uri().'/js/customizer-controls.js', array('customize-controls'), true);

}
add_action('customize_controls_enqueue_scripts', 'newspaperss_registers');

/**
 * Returns false if Creative Homepage is activated.
 */
function newspaperss_is_active_homepage() {

	if ( 'page' == get_option( 'show_on_front' ) ) {

		$frontpage_id = get_option( 'page_on_front' );

        if ( $frontpage_id  ) {
            return true;
        } else {
			return false;
		}

	} else {
		return false;
	}

}

function newspaperss_inactive_creative() {
	if ( true == newspaperss_is_active_homepage() ) {
		return false;
	} else {
		return true;
	}
}



require get_template_directory() . '/inc/customizer/panels.php';
require get_template_directory() . '/inc/customizer/sections.php';
require get_template_directory() . '/inc/customizer/fields.php';
