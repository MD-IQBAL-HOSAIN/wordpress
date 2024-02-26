<?php

/**
 * Add sections
 */

/*----------- adding Page section -----------*/
Kirki::add_section('newspaperss_upgradepro_options2', array(
    'panel'          => 'newsupgradepro_options', // Not typically needed.
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
));


Kirki::add_section('newspaperss_upgradepro_options', array(
    'title'          => esc_attr__('About Theme Info ', 'newspaperss'),
    'panel'          => 'upgradepro_options', // Not typically needed.
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
));


/* adding Header Options section*/
Kirki::add_section('newspaperss_topheader_settings', array(
    'title'          => esc_attr__('Top Header Settings', 'newspaperss'),
    'panel'          => 'header_options', // Not typically needed.
    'priority'       => 1,


));

Kirki::add_section('newspaperss_headtitle_settings', array(
    'title'          => esc_attr__('Logo and header layout', 'newspaperss'),
    'panel'          => 'header_options', // Not typically needed.
    'priority'       => 1,


));
Kirki::add_section('newspaperss_mainmenu_settings', array(
    'title'          => esc_attr__('Main Menu Styling', 'newspaperss'),
    'panel'          => 'header_options', // Not typically needed.
    'priority'       => 2,


));

Kirki::add_section('newspaperss_subheader_settings', array(
    'title'          => esc_attr__('Sub-header or page title', 'newspaperss'),
    'panel'          => 'header_options', // Not typically needed.
    'priority'       => 2,


));

/* adding Homepage Options section*/

Kirki::add_section('newspaperss_homepage_slidersettings', array(
    'title'          => esc_attr__('Slider and Right post', 'newspaperss'),
    'panel'          => 'homepage_options', // Not typically needed.
    'priority'       => 1,

));

Kirki::add_section('newspaperss_homepage_featuredsettings', array(
    'title'          => esc_attr__('Featured post', 'newspaperss'),
    'panel'          => 'homepage_options', // Not typically needed.
    'priority'       => 1,

));
Kirki::add_section('newspaperss_homepage_latestpostsettings', array(
    'title'          => esc_attr__('Latest post Section', 'newspaperss'),
    'panel'          => 'homepage_options', // Not typically needed.
    'priority'       => 1,

));

Kirki::add_section('newspaperss_homepagecolor_settings', array(
    'title'          => esc_attr__('Color', 'newspaperss'),
    'panel'          => 'homepage_options', // Not typically needed.
    'priority'       => 1,

));

Kirki::add_section('newspaperss_homepagetypho_settings', array(
    'title'          => esc_attr__('Typography', 'newspaperss'),
    'panel'          => 'homepage_options', // Not typically needed.
    'priority'       => 1,

));

/* adding General Options section*/

Kirki::add_section('newspaperss_cwidgets_settings', array(
    'title'          => esc_attr__('Widgets Settings ', 'newspaperss'),
    'panel'          => 'bglayout_options', // Not typically needed.
    'priority'       => 3,

));
Kirki::add_section('newspaperss_bglayout_settings', array(
    'title'          => esc_attr__('Background color ', 'newspaperss'),
    'panel'          => 'bglayout_options', // Not typically needed.
    'priority'       => 3,

));

Kirki::add_section('newspaperss_mainlayout_settings', array(
    'title'          => esc_attr__('Site Layout ', 'newspaperss'),
    'panel'          => 'bglayout_options', // Not typically needed.
    'priority'       => 3,

));

Kirki::add_section('newspaperss_maintypography_settings', array(
    'title'          => esc_attr__('Site typography ', 'newspaperss'),
    'panel'          => 'bglayout_options', // Not typically needed.
    'priority'       => 3,

));

Kirki::add_section('newspaperss_maincolor_settings', array(
    'title'          => esc_attr__('Site Color options ', 'newspaperss'),
    'panel'          => 'bglayout_options', // Not typically needed.
    'priority'       => 3,

));

/*----------- adding Post Options section -----------*/

Kirki::add_section('newspaperss_postpage_settings', array(
    'title'          => esc_attr__('categories-archive-blog etc. page options ', 'newspaperss'),
    'panel'          => 'newspapersspost_options', // Not typically needed.
    'priority'       => 1,

));

Kirki::add_section('newspaperss_singlepost_settings', array(
    'title'          => esc_attr__('Single Post settings', 'newspaperss'),
    'panel'          => 'newspapersspost_options', // Not typically needed.
    'priority'       => 1,

));

/*----------- adding Page section -----------*/

Kirki::add_section('newspaperss_singlepage_settings', array(
    'title'          => esc_attr__('Page settings ', 'newspaperss'),
    'panel'          => 'newspapersspage_options', // Not typically needed.
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
));
/*----------- adding footer section -----------*/

Kirki::add_section('newspaperss_footerwid_settings', array(
    'title'          => esc_attr__('Footer Widgets options ', 'newspaperss'),
    'panel'          => 'newspaperssfooter_options', // Not typically needed.
    'priority'       => 1,
));
Kirki::add_section('newspaperss_copyright_settings', array(
    'title'          => esc_attr__('Footer Copyright options ', 'newspaperss'),
    'panel'          => 'newspaperssfooter_options', // Not typically needed.
    'priority'       => 1,
));

/*----------- adding woocommerce options -----------*/

Kirki::add_section('newspaperss_woocommercecustom_settings', array(
    'title'          => esc_attr__('Woocommerce settings ', 'newspaperss'),
    'panel'          => 'woocommercecustom_options', // Not typically needed.
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
));
