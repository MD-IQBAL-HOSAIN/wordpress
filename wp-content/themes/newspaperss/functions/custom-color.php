<?php

/**
 * newspaperss Theme Custom color
 *
 * @package silkthemes
 * @subpackage newspaperss
 * @since newspaperss 1.0.0
 */

function newspaperss_inline_style()
{
	$inline_css = '';
	// Get the background color for text hover
	$newspaperss_hover_color =  get_theme_mod('newspaperss_hover_color', '#2f2f2f');

	/*=============================================>>>>>
	= Main flavor color =
	===============================================>>>>>*/

	// Get the background color for text
	$newspaperss_flavor_color   =  get_theme_mod('newspaperss_flavor_color', '#00bcd4');

	// TODO: box_shadow test
	if (225 > ariColor::newColor($newspaperss_flavor_color)->luminance) {
		// Our background color is dark, so we need to create a light text color.
		$text_color = Kirki_Color::adjust_brightness($newspaperss_flavor_color, 500);
	} else {

		// Our background color is light, so we need to create a dark text color
		$text_color = Kirki_Color::adjust_brightness($newspaperss_flavor_color, -225);
	}
	/*  Color calculation for text */
	$inline_css .=
		".tagcloud a ,
	.post-cat-info a,
	.lates-post-warp .button.secondary,
	.comment-form .form-submit input#submit,
	a.box-comment-btn,
	.comment-form .form-submit input[type='submit'],
	h2.comment-reply-title,
	.widget_search .search-submit,
	.woocommerce nav.woocommerce-pagination ul li span.current,
	.woocommerce ul.products li.product .button,
	.woocommerce div.product form.cart .button,
	.woocommerce #respond input#submit.alt, .woocommerce a.button.alt,
	.woocommerce button.button.alt, .woocommerce input.button.alt,
	.woocommerce #respond input#submit, .woocommerce a.button,
	.woocommerce button.button, .woocommerce input.button,
	.pagination li a,
	.author-links a,
	#blog-content .navigation .nav-links .current,
	.bubbly-button,
	.scroll_to_top
	{
		color: $text_color !important;
	}";

	/*=============================================>>>>>
= Main Hover color =
===============================================>>>>>*/

	// Get the background color for text hover
	$newspaperss_hover_color =  get_theme_mod('newspaperss_hover_color', '#2f2f2f');

	if (225 > ariColor::newColor($newspaperss_hover_color)->luminance) {
		// Our background color is dark, so we need to create a light text color.
		$hover_text_color = Kirki_Color::adjust_brightness($newspaperss_hover_color, 500);
	} else {
		// Our background color is light, so we need to create a dark text color
		$hover_text_color = Kirki_Color::adjust_brightness($newspaperss_hover_color, -225);
	}

	/* Color calculation for text */
	$inline_css .=
		".tagcloud a:hover ,
		.post-cat-info a:hover,
		.lates-post-warp .button.secondary:hover,
		.comment-form .form-submit input#submit:hover,
		a.box-comment-btn:hover,
		.comment-form .form-submit input[type='submit']:hover,
		.widget_search .search-submit:hover,
		.pagination li a:hover,
		.author-links a:hover,
		.head-bottom-area  .is-dropdown-submenu .is-dropdown-submenu-item :hover,
		.woocommerce div.product div.summary a,
		.bubbly-button:hover,
		.slider-right .post-header .post-cat-info .cat-info-el:hover
		{
			color: $hover_text_color !important;
		}";
	/*----------- Get the background color for slider cat -----------*/

	$default = array(
		'text'    => '#fff',
		'catbg'   => '#A683F5',
	);
	$value      = get_theme_mod('slidertext_color', $default);
	// Sanitize values and convert to valid HEX values.
	$catbg_hex   = ariColor::newColor($value['catbg'])->toCSS('hex');

	if (225 > ariColor::newColor($catbg_hex)->luminance) {

		// Our background color is dark, so we need to create a light text color.
		$catbg_hex = Kirki_Color::adjust_brightness($catbg_hex, 225);
	} else {

		// Our background color is light, so we need to create a dark text color
		$catbg_hex = Kirki_Color::adjust_brightness($catbg_hex, -255);
	}

	$inline_css .=
		".slider-container .cat-info-el,
		.slider-right .post-header .post-cat-info .cat-info-el
		{
			color: $catbg_hex !important;
		}";

	// Get the background color for text
	$secondary_bgcolor = get_theme_mod('secondary_bgcolor');

	if (125 > ariColor::newColor($secondary_bgcolor)->luminance) {

		// Our background color is dark, so we need to create a light text color.
		$body_text_color = Kirki_Color::adjust_brightness($secondary_bgcolor, 200);
	} else {

		// Our background color is light, so we need to create a dark text color
		$body_text_color = Kirki_Color::adjust_brightness($secondary_bgcolor, -220);
	}
	$inline_css .=
		"
		woocommerce-product-details__short-description,
		.woocommerce div.product .product_title,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price
		{
			color: $body_text_color ;
		}";

	if (true == get_theme_mod('newspaperss_body_fullwidth', false)) :
		$inline_css .=
			".single-content-wrap,
			.single-post-header
			{
				box-shadow: 0 1px 3px 0 rgba(28, 28, 28, .05);
				-wekit-box-shadow: 0 1px 3px 0 rgba(28, 28, 28, .05);
			}";
	endif;

	// Footer widgets area
	// Get the background color
	$newspaperss_footerwidbg_color =  get_theme_mod('footerwid_bg_color', '#282828');

	if (225 > ariColor::newColor($newspaperss_footerwidbg_color)->luminance) {
		// Our background color is dark, so we need to create a light text color.
		$footerwid_text_color = Kirki_Color::adjust_brightness($newspaperss_footerwidbg_color, 225);
	} else {
		// Our background color is light, so we need to create a dark text color
		$footerwid_text_color = Kirki_Color::adjust_brightness($newspaperss_footerwidbg_color, -225);
	}

	/* Color calculation for text */
	$inline_css .=
		"#footer .top-footer-wrap .textwidget p,
		#footer .top-footer-wrap,
		#footer .block-content-recent .card-section .post-list .post-title a,
		#footer .block-content-recent .post-list .post-meta-info .meta-info-el,
		#footer .widget_nav_menu .widget li a,
		#footer .widget li a
		{
			color: $footerwid_text_color  ;
		}";
	/*----------- menu color -----------*/

	$newspaperss_head2_menubg = get_theme_mod('newspaperss_head2_menubg', '#767676');
	if (225 > ariColor::newColor($newspaperss_head2_menubg)->luminance) {
		$text_color_menu = '#fff';
	} else {
		$text_color_menu = '#0a0a0a';
	}
	/* Color calculation for text */
	$inline_css .=
		".head-bottom-area .dropdown.menu a,
	.search-wrap .search-field,
	.head-bottom-area .dropdown.menu .is-dropdown-submenu > li a,
	.home .head-bottom-area .dropdown.menu .current-menu-item a
	{
		color: $text_color_menu  ;
	}
	.search-wrap::before
	{
		background-color: $text_color_menu  ;
	}
	.search-wrap
	{
		border-color: $text_color_menu  ;
	}
	.main-menu .is-dropdown-submenu .is-dropdown-submenu-parent.opens-left > a::after,
	.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right > a::after
	{
		border-right-color: $text_color_menu  ;
	}";
	wp_add_inline_style('newspaperss-style', $inline_css);
}
add_action('wp_enqueue_scripts', 'newspaperss_inline_style', 10);
