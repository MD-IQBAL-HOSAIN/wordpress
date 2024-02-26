<?php
Kirki::add_config('newspaperss', array(
    'capability' => 'edit_theme_options',
    'option_type' => 'theme_mod'
));

if (get_template_directory() === get_stylesheet_directory()) {
    $newspaperss_defult_color = '#2fc2e3';
} else {
    $newspaperss_defult_color = '#383838';
}

//**** newspaperss upsell pro */
Kirki::add_field('newspaperss', array(
    'type'        => 'custom',
    'settings'    => 'newspaperss_view_link_pro',
    'section'     => 'newspaperss_upgradepro_options',
    'default'     => '<a class="button-error  button-upsell" target="_blank" href="' . esc_url('https://silkthemes.com/newspaperss-pro/?utm_source=Upgrade+To+Pro&utm_medium=Theme+Dashboard&utm_campaign=Upgrade+To+Pro&utm_id=upgradetopro#xs_pricing_6') . '">' . esc_html__('Upgrade To Pro', 'newspaperss') . '</a>',
    'priority'    => 10,
));

Kirki::add_field('newspaperss', array(
    'type'        => 'custom',
    'settings'    => 'newspaperss_view_link_pro2',
    'section'     => 'newspaperss_upgradepro_options2',
    'default'     => '<a class="button-error  button-upsell" target="_blank" href="' . esc_url('https://silkthemes.com/newspaperss-pro/?utm_source=Upgrade+To+Pro&utm_medium=Theme+Dashboard&utm_campaign=Upgrade+To+Pro&utm_id=upgradetopro#xs_pricing_6') . '">' . esc_html__('Upgrade To Pro', 'newspaperss') . '</a>',
    'priority'    => 10,
));

Kirki::add_field('newspaperss', array(
    'type'        => 'custom',
    'settings'    => 'newspaperss_view_link3',
    'section'     => 'newspaperss_upgradepro_options',
    'default'     => '<a class="button-warning  button-upsell" target="_blank" href="' . esc_url('https://silkthemes.com/newspaperss-demo/documentation/') . '">' . esc_html__('Read the documentation', 'newspaperss') . '</a>',
    'priority'    => 50,
));
Kirki::add_field('newspaperss', array(
    'type'        => 'custom',
    'settings'    => 'newspaperss_view_link4',
    'section'     => 'newspaperss_upgradepro_options',
    'default'     => '<a class="button-warning  button-upsell" target="_blank" 
    href="' . esc_url('https://silkthemes.com/support/') . '">' . esc_html__('Support', 'newspaperss') . '</a>',
    'priority'    => 50,
));


/* Top header */
Kirki::add_field('newspaperss', array(
    'type' => 'toggle',
    'settings' => 'disable_top_header',
    'label' => esc_attr__('Disable Top Header', 'newspaperss'),
    'section' => 'newspaperss_topheader_settings',
    'default' => '1',
    'priority' => 10
));


Kirki::add_field('newspaperss', array(
    'type' => 'multicolor',
    'settings' => 'newspaperss_topheader_color',
    'label' => esc_attr__('Top Bar color options ', 'newspaperss'),
    'section' => 'newspaperss_topheader_settings',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'text' => esc_attr__('Text (PRO) ', 'newspaperss'),
        'border_color' => esc_attr__('Boder (PRO) ', 'newspaperss'),
        'bgcolor' => esc_attr__('Background(PRO) ', 'newspaperss')
    ),
    'default' => array(
        'text' => '#282828',
        'bgcolor' => '#fff',
        'border_color' => '#ecede7'

    ),

));


Kirki::add_field('newspaperss', array(
    'type' => 'dimension',
    'settings' => 'newspaperss_topheadertext_size',
    'label' => esc_attr__('Top Bar menu text size', 'newspaperss'),
    'section' => 'newspaperss_topheader_settings',
    'help' => esc_attr__('example: 10px, 3em,0.75rem, 48%, 90vh etc.', 'newspaperss'),
    'default' => '0.75rem',
    'priority' => 10,
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '#topmenu .top-bar .top-bar-left .menu a ',

            'property' => 'font-size',
            'units' => ''
        )

    )
));


Kirki::add_field('newspaperss', array(
    'type' => 'custom',
    'settings' => 'silkthemes_seperator_top_social',
    'section' => 'newspaperss_topheader_settings',
    'priority' => 10,
    'default' => '<h2 class="silkthemes-kirki-seperator">' . esc_html__('Social button', 'newspaperss') . '</h2>'
));

Kirki::add_field('newspaperss', array(
    'type' => 'checkbox',
    'settings' => 'open_social_tab',
    'label' => esc_attr__('Open in new tab', 'newspaperss'),
    'section' => 'newspaperss_topheader_settings',
    'default' => '0',
    'priority' => 10
));


Kirki::add_field('newspaperss', array(
    'type' => 'repeater',
    'label' => esc_attr__('Add social icon', 'newspaperss'),
    'section' => 'newspaperss_topheader_settings',
    'priority' => 10,
    'transport'   => 'postMessage',
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Social', 'newspaperss'),
        'field' => 'social_icon'
    ),
    'choices' => array(
        'limit' => 13
    ),
    'settings' => 'social_icons_top',
    'fields' => array(
        'social_icon' => array(
            'type' => 'select',
            'label' => esc_attr__('Icon', 'newspaperss'),
            'default' => '',
            'choices' => array(
                '' => 'Please Select',
                'facebook' => esc_attr__('Facebook', 'newspaperss'),
                'dribbble' => esc_attr__('Dribbble', 'newspaperss'),
                'twitter' => esc_attr__('Twitter', 'newspaperss'),
                'google' => esc_attr__('google plus', 'newspaperss'),
                'skype' => esc_attr__('skype', 'newspaperss'),
                'youtube' => esc_attr__('Youtube', 'newspaperss'),
                'flickr' => esc_attr__('Flickr', 'newspaperss'),
                'pinterest' => esc_attr__('Pinterest', 'newspaperss'),
                'vk' => esc_attr__('vk', 'newspaperss'),
                'rss' => esc_attr__('RSS', 'newspaperss'),
                'tumblr' => esc_attr__('Tumblr', 'newspaperss'),
                'instagram' => esc_attr__('Instagram', 'newspaperss'),
                'xing' => esc_attr__('Xing', 'newspaperss')
            )
        ),
        'social_url' => array(
            'type' => 'text',
            'label' => esc_attr__('Link URL', 'newspaperss'),
            'default' => ''
        )
    )
));

/* header & Logo */
Kirki::add_field('newspaperss', array(
    'type' => 'custom',
    'settings' => 'silkthemes_seperator_siteidentity',
    'section' => 'newspaperss_headtitle_settings',
    'priority' => -1,
    'default' => '<h2 class="silkthemes-kirki-seperator">' . esc_html__('Header Layout', 'newspaperss') . '</h2>'
));

Kirki::add_field('newspaperss', array(
    'type' => 'radio-image',
    'settings' => 'logo_position',
    'label' => esc_html__('Logo Position', 'newspaperss'),
    'section' => 'newspaperss_headtitle_settings',
    'default' => 'logo-left',
    'transport'   => 'postMessage',
    'priority' => 10,
    'choices' => array(
        'logo-left' => get_template_directory_uri() . '/images/logo-left.png',
        'logo-center' => get_template_directory_uri() . '/images/logo-center.png',
        'logo-right' => get_template_directory_uri() . '/images/logo-right.png'
    ),
));


Kirki::add_field('newspaperss', array(
    'type' => 'custom',
    'settings' => 'silkthemes_seperator_headstyle',
    'section' => 'newspaperss_headtitle_settings',
    'priority' => 100,
    'default' => '<h2 class="silkthemes-kirki-seperator">' . esc_html__('Header Styling', 'newspaperss') . '</h2>'
));

new \Kirki\Field\Multicolor(
    [
        'settings'  => 'newspaperss_headerbg_color',
        'label'     => esc_html__('Header background color', 'kirki'),
        'section'   => 'newspaperss_headtitle_settings',
        'priority'  => 100,
        'transport' => 'auto',
        'choices'   => [
            'background'     => esc_html__('Background color (PRO)', 'kirki'),
        ],
        'alpha'     => true,
        'default'   => [
            'background'   => '#ffff',

        ],
    ]
);

/*----------- Main Menu -----------*/

Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'disable_sticky_menu',
    'label' => esc_attr__('Disable sticky menu', 'newspaperss'),
    'section' => 'newspaperss_mainmenu_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));



Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'newspaperss_head2_menubg',
    'label' => esc_attr__(' Menu background color(PRO)', 'newspaperss'),
    'section' => 'newspaperss_mainmenu_settings',
    'default' => '#2fc2e3',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
));

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'newspaperss_current_submenutext',
    'label' => esc_attr__('Current menu text color', 'newspaperss'),
    'section' => 'newspaperss_mainmenu_settings',
    'default' => '#2fc2e3',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => ' .head-bottom-area .dropdown.menu .current-menu-item a',

            'property' => 'color',
            'units' => ''
        )
    )

));
/*  menu typography */
Kirki::add_field('newspaperss', array(
    'type' => 'typography',
    'settings' => 'main_menus_typography',
    'label' => esc_attr__(' Menu Typography', 'newspaperss'),
    'section' => 'newspaperss_mainmenu_settings',
    'transport' => 'auto',
    'default' => array(
        'font-family'    => 'sans-serif',
        'variant'        => '700',
        'font-size'      => '14px',
        'letter-spacing' => '0',
        'text-transform' => 'uppercase',
    ),
    'priority' => 10,
    'output' => array(
        array(
            'element' => '.head-bottom-area .dropdown.menu a'
        )
    )
));

/* * * * * * * Classic Widgets * * * * * * */
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'classic_widgets_setting_silk',
        'label'       => esc_html__('Classic Widgets', 'newspaperss'),
        'section'     => 'newspaperss_cwidgets_settings',
        'default'     => 'on',
        'choices'     => [
            'on'  => esc_html__('Enable', 'newspaperss'),
            'off' => esc_html__('Disable', 'newspaperss'),
        ],
    ]
);
/* * * * * * * Background and site layout * * * * * * */

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'secondary_bgcolor',
    'label' => esc_attr__('Front background color', 'newspaperss'),
    'section' => 'newspaperss_bglayout_settings',
    'default' => '#fff',
    'priority' => -1,
    'choices' => array(
        'alpha' => true
    ),
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => ' #main-content-sticky',
            'property' => 'background',
            'units' => ''
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'newspaperss_body_fullwidth',
            'operator' => '==',
            'value' => '0'
        )
    ),
));

Kirki::add_field('newspaperss', array(
    'type' => 'toggle',
    'settings' => 'newspaperss_body_fullwidth',
    'label' => esc_attr__('Make website fullwidth', 'newspaperss'),
    'section' => 'newspaperss_mainlayout_settings',
    'default' => '0',
    'priority' => 10
));

Kirki::add_field('newspaperss', array(
    'type' => 'dimension',
    'settings' => 'newspaperss_body_topgap',
    'label' => esc_attr__('Site Top margin', 'newspaperss'),
    'tooltip' => esc_attr__('example: 10px, 3em, 48%, 90vh etc.', 'newspaperss'),
    'section' => 'newspaperss_mainlayout_settings',
    'default' => '0px',
    'priority' => 10,
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '#wrapper',
            'property' => 'margin-top',
            'units' => '',
            'media_query' => '@media screen and (min-width: 64em)'
        )
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'dimension',
    'settings' => 'newspaperss_body_bottomgap',
    'label' => esc_attr__('Site bottom margin', 'newspaperss'),
    'section' => 'newspaperss_mainlayout_settings',
    'default' => '0px',
    'transport' => 'auto',
    'tooltip' => esc_attr__('example: 10px, 3em, 48%, 90vh etc.', 'newspaperss'),
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#wrapper',
            'property' => 'margin-bottom',
            'units' => '',
            'media_query' => '@media screen and (min-width: 64em)'
        )
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'typography',
    'settings' => 'typography_Paragraphs_setting',
    'label' => esc_attr__('Main Typography ', 'newspaperss'),
    'section' => 'newspaperss_maintypography_settings',
    'transport' => 'auto',
    'default' => array(
        'font-family' => '',
        'font-size' => 'inherit',
        'line-height' => '1.6',
        'letter-spacing' => '0',
        'subsets' => array(
            'latin-ext'
        ),
        'text-transform' => 'none'
    ),
    'priority' => 10,
    'output' => array(
        array(
            'element' => 'body'
        )
    )
));



/* * * * * * * Home Page options * * * * * * */

/***** SLIDER setting ******/

Kirki::add_field('newspaperss', array(
    'type'                => 'custom',
    'settings'            => 'slider_notice_homepagesettings',
    'label'               => esc_html__('Notice', 'newspaperss'),
    'section'             => 'static_front_page',
    'default'             => '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__('For show Home page like demo . setup home page', 'newspaperss') . '</div>',
    'priority'            => 1,
    'active_callback'     => 'newspaperss_inactive_creative'
));
Kirki::add_field('newspaperss', array(
    'type'                => 'custom',
    'settings'            => 'slider_notice_url',
    'label'               => esc_html__('Create a custom homepage.', 'newspaperss'),
    'section'             => 'static_front_page',
    'default'             => '<a href="' . esc_url(admin_url('themes.php?page=newspaperss-welcome')) . '" target="_blank">' . esc_html__('Learn How to create a custom homepage', 'newspaperss') . '<a><br/><br/>',
    'priority'            => 1,
    'active_callback'     => 'newspaperss_inactive_creative'
));


/* Slider */
Kirki::add_field('newspaperss', array(
    'type'        => 'checkbox',
    'settings'    => 'onof_auto_topection',
    'label'       => esc_attr__('On/Off Top section', 'newspaperss'),
    'section'     => 'newspaperss_homepage_slidersettings',
    'default'     => true,
));

Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'category_show',
    'label' => esc_attr__('Select Category', 'newspaperss'),
    'section' => 'newspaperss_homepage_slidersettings',
    'multiple' => 999,
    'choices' => Kirki_Helper::get_terms('category')

));



Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'post_order_by',
    'label' => esc_attr__('Show post orderby', 'newspaperss'),
    'section' => 'newspaperss_homepage_slidersettings',
    'default' => 'date',
    'multiple' => 1,
    'choices' => array(
        'none' => esc_attr__('None', 'newspaperss'),
        'date' => esc_attr__('Date', 'newspaperss'),
        'ID' => esc_attr__('ID', 'newspaperss'),
        'author' => esc_attr__('Author', 'newspaperss'),
        'title' => esc_attr__('Title', 'newspaperss'),
        'rand' => esc_attr__('Random', 'newspaperss')
    )
));


Kirki::add_field('newspaperss', array(
    'type'        => 'color',
    'settings'    => 'slide_title_bgcolor',
    'label'       => __('Slider content background color', 'newspaperss'),
    'section'     => 'newspaperss_homepage_slidersettings',
    'default'     => 'rgba(0,0,0,0.14)',
    'transport'   => 'auto',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(
        array(
            'element' => '.slider-container .post-header-outer',
            'property' => 'background',
            'units'   => '',
        ),
    ),
));

Kirki::add_field('newspaperss', array(
    'type' => 'multicolor',
    'settings' => 'slidertext_color',
    'label' => esc_attr__('Slider content Color ', 'newspaperss'),
    'section' => 'newspaperss_homepage_slidersettings',
    'transport' => 'auto',
    'choices' => array(
        'text' => esc_attr__('Text color', 'newspaperss'),
        'catbg' => esc_attr__('Category color', 'newspaperss')
    ),

    'default' => array(
        'text' => '#fff',
        'catbg' =>  '' . $newspaperss_defult_color . ''
    ),

    'output' => array(
        array(
            'choice' => 'text',
            'element' => '.slider-container .post-header .post-title a,.slider-container .post-meta-info .meta-info-el a,.slider-container .meta-info-date',
            'property' => 'color'
        ),
        array(
            'choice' => 'catbg',
            'element' => '.slider-container .cat-info-el,.slider-right .post-header .post-cat-info .cat-info-el',
            'property' => 'background-color'
        )

    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'custom',
    'settings' => 'silkthemes_seperator_top_post',
    'section' => 'newspaperss_homepage_slidersettings',
    'default' => '<h2 class="silkthemes-kirki-seperator">' . esc_html__('Top Post (appear in slider right side)', 'newspaperss') . '</h2>'
));

Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'category_toppost_show',
    'label' => esc_attr__('Select Category', 'newspaperss'),
    'section' => 'newspaperss_homepage_slidersettings',
    'multiple' => 999,
    'choices' => Kirki_Helper::get_terms('category'),
));



Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'top_post_order_by',
    'label' => esc_attr__('Show post orderby', 'newspaperss'),
    'section' => 'newspaperss_homepage_slidersettings',
    'default' => 'date',
    'multiple' => 1,
    'choices' => array(
        'none' => esc_attr__('None', 'newspaperss'),
        'date' => esc_attr__('Date', 'newspaperss'),
        'ID' => esc_attr__('ID', 'newspaperss'),
        'author' => esc_attr__('Author', 'newspaperss'),
        'title' => esc_attr__('Title', 'newspaperss'),
        'rand' => esc_attr__('Random', 'newspaperss')
    ),

));



/*=============================================>>>>>
= Featured post =
===============================================>>>>>*/
Kirki::add_field('newspaperss', array(
    'type'        => 'checkbox',
    'settings'    => 'onof_auto_featuredsection',
    'label'       => esc_attr__('On/Off featured post section', 'newspaperss'),
    'section'     => 'newspaperss_homepage_featuredsettings',
    'default'     => true,
));

Kirki::add_field('newspaperss', array(
    'type'     => 'text',
    'settings' => 'featured_post_title',
    'label'    => __('Featured post title', 'newspaperss'),
    'section'  => 'newspaperss_homepage_featuredsettings',
    'default'  => esc_attr__('Featured Story', 'newspaperss'),
    'priority' => 10,
));

Kirki::add_field('newspaperss', array(
    'type'        => 'number',
    'settings'    => 'slide_to_showfeatured',
    'label'       => esc_attr__('Slide to show in row', 'newspaperss'),
    'section'     => 'newspaperss_homepage_featuredsettings',
    'default'     => 4,
    'choices'     => array(
        'min'  => 1,
        'max'  => 8,
        'step' => 1,
    ),

));
Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'category_show_featured',
    'label' => esc_attr__('Select Category', 'newspaperss'),
    'section' => 'newspaperss_homepage_featuredsettings',
    'priority' => 10,
    'multiple' => 999,
    'choices' => Kirki_Helper::get_terms('category')

));


Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'post_order_by_featured',
    'label' => esc_attr__('Show post orderby', 'newspaperss'),
    'section' => 'newspaperss_homepage_featuredsettings',
    'default' => 'date',
    'priority' => 10,
    'multiple' => 1,
    'choices' => array(
        'none' => esc_attr__('None', 'newspaperss'),
        'date' => esc_attr__('Date', 'newspaperss'),
        'ID' => esc_attr__('ID', 'newspaperss'),
        'author' => esc_attr__('Author', 'newspaperss'),
        'title' => esc_attr__('Title', 'newspaperss'),
        'rand' => esc_attr__('Random', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type'        => 'checkbox',
    'settings'    => 'onof_auto_playfeatured',
    'label'       => esc_attr__('On/Off Auto Play', 'newspaperss'),
    'section'     => 'newspaperss_homepage_featuredsettings',
    'default'     => true,
));

/*=============================================>>>>>
= Latest post =
===============================================>>>>>*/

Kirki::add_field('newspaperss', array(
    'type'     => 'text',
    'settings' => 'latestpost_post_title',
    'label'    => __('Latest post title', 'newspaperss'),
    'section'  => 'newspaperss_homepage_latestpostsettings',
    'default'  => esc_attr__('Latest post', 'newspaperss'),
    'priority' => 10,
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));

Kirki::add_field('newspaperss', array(
    'type' => 'radio-image',
    'settings' => 'layout_page_latest',
    'label' => esc_html__('Post Layout', 'newspaperss'),
    'section' => 'newspaperss_homepage_latestpostsettings',
    'default' => 'content3',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/defult-blog.svg',
        'content3' => get_template_directory_uri() . '/images/list-layout-grid.svg',
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));
Kirki::add_field('newspaperss', array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position_latest',
    'label' => esc_html__('Layout Sidebar', 'newspaperss'),
    'section' => 'newspaperss_homepage_latestpostsettings',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'right' => get_template_directory_uri() . '/images/sidebar-right.png',
        'full' => get_template_directory_uri() . '/images/full-width.png',
        'left' => get_template_directory_uri() . '/images/sidebar-left.png'
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));
/* * * * * * * Site Color options * * * * * * */
$newspaperss_flavor_color = get_theme_mod('newspaperss_flavor_color', '#00bcd4');
$box_shadow              = Kirki_Color::get_rgba($newspaperss_flavor_color, .30);

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'newspaperss_flavor_color',
    'label' => esc_attr__('Flavor Color', 'newspaperss'),
    'section' => 'newspaperss_maincolor_settings',
    'default' => '' . $newspaperss_defult_color . '',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => 'a,.comment-title h2,h2.comment-reply-title,.sidebar-inner .widget_archive ul li a::before, .sidebar-inner .widget_categories ul li a::before, .sidebar-inner .widget_pages ul li a::before, .sidebar-inner .widget_nav_menu ul li a::before, .sidebar-inner .widget_portfolio_category ul li a::before,.defult-text a span,.woocommerce .star-rating span::before',
            'property' => 'color',
            'units' => ''
        ),

        array(
            'element' => '.scroll_to_top,.bubbly-button,#blog-content .navigation .nav-links .current,.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce ul.products li.product .button,.tagcloud a,.lates-post-warp .button.secondary,.pagination .current,.pagination li a,.widget_search .search-submit,.widget_wrap .wp-block-search__button,.comment-form .form-submit input#submit, a.box-comment-btn,.comment-form .form-submit input[type="submit"],.cat-info-el,.comment-list .comment-reply-link,.woocommerce div.product form.cart .button, .woocommerce #respond input#submit.alt,.woocommerce a.button.alt, .woocommerce button.button.alt,.woocommerce input.button.alt, .woocommerce #respond input#submit,.woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.mobile-menu  .nav-bar .offcanvas-trigger',
            'property' => 'background',
            'units' => ''
        ),
        array(
            'element' => '.viewall-text .shadow',
            'property' => 'box-shadow',
            'value_pattern' => '0 2px 2px 0 ' . $box_shadow . ', 0 2px 8px 0 ' . $box_shadow . ''

        ),
        array(
            'element' => '.woocommerce .button',
            'property' => 'box-shadow',
            'value_pattern' => '0 2px 2px 0 ' . $box_shadow . ', 0 3px 1px -2px ' . $box_shadow . ', 0 1px 5px 0 ' . $box_shadow . '',
            'units' => '!important'
        ),
        array(
            'element' => '.woocommerce .button:hover',
            'property' => 'box-shadow',
            'value_pattern' => '-1px 11px 23px -4px ' . $box_shadow . ',1px -1.5px 11px -2px  ' . $box_shadow . '',
            'units' => '!important'
        ),
        array(
            'element' => '.bubbly-button',
            'property' => 'box-shadow',
            'value_pattern' => '0 2px 3px ' . $box_shadow . ';',
            'units' => '!important'
        ),

    )
));

$newspaperss_hover_color = get_theme_mod('newspaperss_hover_color', '#2f2f2f');
$box_shadow_hover       = Kirki_Color::get_rgba($newspaperss_hover_color, .43);

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'newspaperss_hover_color',
    'label' => esc_attr__('Hover Color', 'newspaperss'),
    'section' => 'newspaperss_maincolor_settings',
    'default' => '#2f2f2f',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => 'a:hover,.off-canvas .fa-window-close:focus,.tagcloud a:hover,.single-nav .nav-left a:hover, .single-nav .nav-right a:hover,.comment-title h2:hover,h2.comment-reply-title:hover,.meta-info-comment .comments-link a:hover,.woocommerce div.product div.summary a:hover',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => 'bubbly-button:focus,.slider-right .post-header .post-cat-info .cat-info-el:hover,.bubbly-button:hover,.head-bottom-area .desktop-menu .is-dropdown-submenu-parent .is-dropdown-submenu li a:hover,.tagcloud a:hover,.viewall-text .button.secondary:hover,.single-nav a:hover>.newspaper-nav-icon,.pagination .current:hover,.pagination li a:hover,.widget_search .search-submit:hover,.comment-form .form-submit input#submit:hover, a.box-comment-btn:hover, .comment-form .form-submit input[type="submit"]:hover,.cat-info-el:hover,.comment-list .comment-reply-link:hover,.bubbly-button:active',
            'property' => 'background',
            'units' => ''
        ),
        array(
            'element' => '.viewall-text .shadow:hover',
            'property' => 'box-shadow',
            'value_pattern' => '-1px 11px 15px -8px ' . $box_shadow_hover . ''
        ),
        array(
            'element' => '.bubbly-button:hover,.bubbly-button:active',
            'property' => 'box-shadow',
            'value_pattern' => '0 2px 15px ' . $box_shadow_hover . ';',
            'units' => '!important'
        ),
        array(
            'element' => '.comment-form textarea:focus,.comment-form input[type="text"]:focus,.comment-form input[type="search"]:focus,.comment-form input[type="tel"]:focus,.comment-form input[type="email"]:focus,.comment-form [type=url]:focus,.comment-form [type=password]:focus',
            'property' => 'box-shadow',
            'value_pattern' => '0 2px 3px ' . $box_shadow_hover . ';',
            'units' => '!important'
        ),
        array(
            'element' => 'a:focus',
            'property' => 'outline-color',
            'units' => ''
        ),
        array(
            'element' => '.sliderlink:focus,.slider-right .thumbnail-post a:focus img',
            'property' => 'border-color',
            'units' => ''
        ),
        array(
            'element' => 'a:focus',
            'property' => 'text-decoration-color',
            'units' => ''
        ),
        array(
            'element' => '.bubbly-button:before,.bubbly-button:after',
            'property' => 'background-image',
            'value_pattern' => 'radial-gradient(circle,' . $newspaperss_hover_color . ' 20%, transparent 20%), radial-gradient(circle, transparent 20%, ' . $newspaperss_hover_color . ' 20%, transparent 30%), radial-gradient(circle, ' . $newspaperss_hover_color . ' 20%, transparent 20%), radial-gradient(circle, ' . $newspaperss_hover_color . ' 20%, transparent 20%), radial-gradient(circle, transparent 10%, ' . $newspaperss_hover_color . ' 15%, transparent 20%), radial-gradient(circle, ' . $newspaperss_hover_color . ' 20%, transparent 20%), radial-gradient(circle, ' . $newspaperss_hover_color . ' 20%, transparent 20%), radial-gradient(circle, ' . $newspaperss_hover_color . ' 20%, transparent 20%), radial-gradient(circle, ' . $newspaperss_hover_color . ' 20%, transparent 20%);;',
            'units' => '!important'
        )
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'sectionwidgets_title_color',
    'label' => esc_attr__('Change font-page section title and widgets Title color', 'newspaperss'),
    'section' => 'newspaperss_maincolor_settings',
    'default' => '#0a0a0a',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => ' .block-header-wrap .block-title,.widget-title h3',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => ' .block-header-wrap .block-title h3,.widget-title h3',
            'property' => 'border-bottom-color',
            'units' => ''
        )
    )
));



/* * * * * * * Post page setting * * * * * * */

Kirki::add_field('newspaperss', array(
    'type' => 'checkbox',
    'settings' => 'on_of_postpagesubhead',
    'label' => esc_attr__('enabled/disabled Header', 'newspaperss'),
    'section' => 'newspaperss_postpage_settings',
    'default' => '1',
    'priority' => 10
));

new \Kirki\Field\Color(
    [
        'settings'    => 'color_subheader',
        'label'       => __('Sub Header color', 'newspaperss'),
        'section'     => 'newspaperss_postpage_settings',
        'default'     => '#1c2127',
        'transport' => 'auto',
        'choices' => array(
            'alpha' => true
        ),
        'output' => array(
            array(
                'element' => '.postpage_subheader',
                'property' => 'background-color',
                'units' => ''
            ),
        ),
    ]
);



Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'subheader_text_color',
    'label' => esc_attr__('Sub-header text Color', 'newspaperss'),
    'section' => 'newspaperss_postpage_settings',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#sub_banner .breadcrumb-wraps .breadcrumbs li,#sub_banner .heade-content h1,.heade-content h1,.breadcrumbs li,.breadcrumbs a,.breadcrumbs li:not(:last-child)::after',
            'property' => 'color',
            'units' => ''
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'on_of_postpagesubhead',
            'operator' => '==',
            'value' => true
        )
    )
));


Kirki::add_field('newspaperss', array(
    'type' => 'custom',
    'settings' => 'silkthemes_seperator_post_page',
    'section' => 'newspaperss_postpage_settings',
    'priority' => 10,
    'default' => '<h2 class="silkthemes-kirki-seperator">' . esc_html__('Layout options', 'newspaperss') . '</h2>'
));
Kirki::add_field('newspaperss', array(
    'type' => 'radio-image',
    'settings' => 'layout_page__gen',
    'label' => esc_html__('Post Layout', 'newspaperss'),
    'section' => 'newspaperss_postpage_settings',
    'default' => 'content3',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/defult-blog.svg',
        'content3' => get_template_directory_uri() . '/images/list-layout-grid.svg',
    )
));
Kirki::add_field('newspaperss', array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position',
    'label' => esc_html__('Layout Sidebar', 'newspaperss'),
    'section' => 'newspaperss_postpage_settings',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'right' => get_template_directory_uri() . '/images/sidebar-right.png',
        'full' => get_template_directory_uri() . '/images/full-width.png',
        'left' => get_template_directory_uri() . '/images/sidebar-left.png'
    )
));
/*----------- adding single Post Options-----------*/

Kirki::add_field('newspaperss', array(
    'type' => 'checkbox',
    'settings' => 'show_single_ftimage',
    'label' => esc_html__('Hide/Show Feature Image', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10
));

Kirki::add_field('newspaperss', array(
    'type' => 'custom',
    'settings' => 'silkthemes_seperator_post_page',
    'section' => 'newspaperss_singlepost_settings',
    'priority' => 10,
    'default' => '<h2 class="silkthemes-kirki-seperator">' . esc_html__('Meta data Hide/Show option ', 'newspaperss') . '</h2>'
));

Kirki::add_field('newspaperss', array(
    'type' => 'checkbox',
    'settings' => 'show_single_breadcrumb',
    'label' => esc_html__('Hide/Show Breadcrumb', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10
));

Kirki::add_field('newspaperss', array(
    'type' => 'checkbox',
    'settings' => 'show_single_cat',
    'label' => esc_html__('Hide/Show Category', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10
));


Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'newspaperss_show_single_author',
    'label' => esc_html__('Hide/Show Author', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'newspaperss_show_single_date',
    'label' => esc_attr__('Date', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'newspaperss_show_single_comments',
    'label' => esc_attr__('Comments', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'newspaperss_show_single_tags',
    'label' => esc_attr__('Tags', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'newspaperss_show_single_authorbio',
    'label' => esc_attr__('Author Bio', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));


Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'newspaperss_show_single_related',
    'label' => esc_attr__('Related Post', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));
Kirki::add_field('newspaperss', array(
    'type' => 'text',
    'settings' => 'related_post_title',
    'label' => esc_attr__('Related Post title', 'newspaperss'),
    'section' => 'newspaperss_singlepost_settings',
    'default' => esc_attr__('You Might Also Like', 'newspaperss'),
    'priority' => 10,
    'transport' => 'postMessage',
    'js_vars' => array(
        array(
            'element' => '.single-post-box-related .block-header-inner h3 ',
            'function' => 'html'
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'newspaperss_show_single_related',
            'operator' => '==',
            'value' => true
        )
    )
));

/*=============================================>>>>>
= Page Options =
===============================================>>>>>*/

Kirki::add_field('newspaperss', array(
    'type' => 'checkbox',
    'settings' => 'show_page_subheader',
    'label' => esc_html__('Hide/Show Page Header', 'newspaperss'),
    'section' => 'newspaperss_singlepage_settings',
    'default' => '1',
    'priority' => 10
));




Kirki::add_field('newspaperss', array(
    'type'        => 'color-palette',
    'settings' => 'subheader_text_colorpage',
    'label' => esc_attr__('Page title text Color', 'newspaperss'),
    'section' => 'newspaperss_singlepage_settings',
    'default' => '#0a0a0a',
    'transport' => 'auto',
    'priority' => 10,
    'choices'     => array(
        'colors' => Kirki_Helper::get_material_design_colors('primary'),
        'size'   => 25,
    ),
    'output' => array(
        array(
            'element' => '#sub_banner.sub_header_page .heade-content h1',
            'property' => 'color',
            'units' => ''
        )
    )

));

/*=============================================>>>>>
= Footer options =
===============================================>>>>>*/

/*----------- footer widgets -----------*/
Kirki::add_field('newspaperss', array(
    'type' => 'switch',
    'settings' => 'sticky_footer',
    'label' => __('sticky footer on/off', 'newspaperss'),
    'section' => 'newspaperss_footerwid_settings',
    'default' => 'off',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'newspaperss'),
        'off' => esc_attr__('Disable', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type' => 'select',
    'settings' => 'footerwid_row_control',
    'label' => __('Displaying Widgets in a row', 'newspaperss'),
    'section' => 'newspaperss_footerwid_settings',
    'default' => 'large-4',
    'priority' => 10,
    'transport' => 'postMessage',
    'choices' => array(
        'large-12' => esc_attr__('1 widgets', 'newspaperss'),
        'large-6' => esc_attr__('2 widgets', 'newspaperss'),
        'large-4' => esc_attr__('3 widgets', 'newspaperss'),
        'large-3' => esc_attr__('4 widgets', 'newspaperss')
    )
));

Kirki::add_field('newspaperss', array(
    'type'        => 'custom',
    'settings'    => 'add_widgets_footer',
    'section'     => 'newspaperss_footerwid_settings',
    'default'     => '<button type="button" class="button menu-shortcut focus-customizer-widgets-footer" >' . esc_html__('Add Widgtes', 'newspaperss') . '</button>',
));

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'footerwid_bg_color',
    'label' => esc_attr__('Widget section Background Color', 'newspaperss'),
    'section' => 'newspaperss_footerwid_settings',
    'default' => '#282828',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .top-footer-wrap',
            'property' => 'background-color',
            'units' => ''
        )
    )

));

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'footerwid_title_color',
    'label' => esc_attr__('Widget title Color', 'newspaperss'),
    'section' => 'newspaperss_footerwid_settings',
    'default' => '#e3e3e3',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .block-header-wrap .block-title h3,#footer .widget-title h3',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => '#footer .block-header-wrap .block-title h3,#footer .widget-title h3',
            'property' => 'border-bottom-color',
            'units' => ''
        )
    )

));

/*----------- Footer COPYRIGHT options -----------*/

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'news_copyright_bgcolor',
    'label' => esc_attr__('Copyright background color', 'newspaperss'),
    'section' => 'newspaperss_copyright_settings',
    'default' => '#242424',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .footer-copyright-wrap',
            'property' => 'background-color',
            'units' => ''
        )
    )

));

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'news_copyright_textcolor',
    'label' => esc_attr__('Copyright Text color', 'newspaperss'),
    'section' => 'newspaperss_copyright_settings',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .footer-copyright-text,.footer-copyright-text p,.footer-copyright-text li,.footer-copyright-text ul,.footer-copyright-text ol,.footer-copyright-text',
            'property' => 'color',
            'units' => ''
        )
    )

));


Kirki::add_field('newspaperss', array(
    'type' => 'textarea',
    'settings' => 'news_copyright_text',
    'label' => __('Copyright text', 'newspaperss'),
    'section' => 'newspaperss_copyright_settings',
    'priority' => 10,
    'transport' => 'postMessage',
    'js_vars' => array(
        array(
            'element' => '.footer-copyright-text ,.footer-copyright-text p,.footer-copyright-text h1,.footer-copyright-text li,.footer-copyright-text ul',
            'function' => 'html'
        )
    )
));


// TODO: will add woocommerce options


Kirki::add_field('newspaperss', array(
    'type' => 'toggle',
    'settings' => 'newspaperss_woocommerce_title',
    'label' => esc_attr__('Woocommerce title Enable/Disable', 'newspaperss'),
    'section' => 'newspaperss_woocommercecustom_settings',
    'default' => '1',
    'priority' => 10
));

/*----------- gradient color header woocommerce -----------*/

Kirki::add_field('newspaperss', array(
    'type' => 'palette',
    'settings' => 'woocommerce_header_gradient',
    'label' => esc_attr__('Gradient color', 'newspaperss'),
    'section' => 'newspaperss_woocommercecustom_settings',
    'default' => 'linear-gradient(to top, #f77062 0%, #fe5196 100%);',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);' => array(
            'linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);'
        ),
        'linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);' => array(
            'linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);'
        ),
        'linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);' => array(
            'linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);'
        ),
        'radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);' => array(
            'radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);'
        ),
        'linear-gradient(to top, #09203f 0%, #537895 100%);' => array(
            'linear-gradient(to top, #09203f 0%, #537895 100%);'
        ),
        'linear-gradient(to top, #f77062 0%, #fe5196 100%);' => array(
            'linear-gradient(to top, #f77062 0%, #fe5196 100%);'
        ),
        'linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);' => array(
            'linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);'
        ),
        'linear-gradient(-20deg, #fc6076 0%, #ff9a44 100%);' => array(
            'linear-gradient(-20deg, #fc6076 0%, #ff9a44 100%);'
        )
    ),
    'output' => array(
        array(
            'element' => '.woo-header-newspaperss',
            'property' => 'background'
        )
    )

));

Kirki::add_field('newspaperss', array(
    'type' => 'color',
    'settings' => 'newspaperss_woocommerce_extcolor',
    'label' => __('Header text color', 'newspaperss'),
    'section' => 'newspaperss_woocommercecustom_settings',
    'default' => '#020202',
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '.heade-content.woo-header-newspaperss h1,.woocommerce .woocommerce-breadcrumb a,.woocommerce .breadcrumbs li',
            'property' => 'color'
        )
    )
));
