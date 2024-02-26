<?php



// Top Bar Menu
function newspaperss_top_bar() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => ' menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
        'theme_location' => 'top-bar',        			// Where it's located in the theme
        'depth' => 1,                                   // Limit the depth of the nav
        'fallback_cb' => false,                          // Fallback function (see below)

    ));
}

// The Main Menu
function newspaperss_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'horizontal menu ',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s " class="%2$s desktop-menu" data-responsive-menu="dropdown"  data-trap-focus="true"  >%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                          // Fallback function (see below)
        'walker' => new Newspaperss_Topbar_Menu_Walker()
    ));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Newspaperss_Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Off Canvas Menu
function newspaperss_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu accordion-menu ',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-close-on-click-inside="false">%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new newspaperss_Off_Canvas_Menu_Walker()
    ));
}

class newspaperss_Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu nested\">\n";
    }
}



/**
 * Adapted  from http://thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
 *
 * @param bool $showhome should the breadcrumb be shown when on homepage (only one deactivated entry for home).
 * @param bool $separatorclass should a separator class be added (in case :before is not an option).
 */

if ( ! function_exists( 'newspaperss_breadcrumb' ) ) {
	function newspaperss_breadcrumb( $showhome = true, $separatorclass = false ) {

		// Settings
		$separator  = '&gt;';
		$id         = 'breadcrumbs';
		$class      = 'breadcrumbs';
		$home_title = esc_attr__('Homepage','newspaperss');

		// Get the query & post information
		global $post,$wp_query;
		$category = get_the_category();

		// Build the breadcrums
		echo '<ul id="' .esc_attr($id). '" class="' . esc_attr($class) . '">';

		// Do not display on the homepage
		if ( ! is_front_page() ) {

			// Home page
			echo '<li class="item-home"><a class="bread-link bread-home" href="' .esc_url( get_home_url() ). '" title="' . esc_html($home_title) . '">' . esc_html($home_title) . '</a></li>';
			if ( $separatorclass ) {
				echo '<li class="separator separator-home"> ' . esc_html($separator) . ' </li>';
			}

			if ( is_single() && ! is_attachment() ) {

				// Single post (Only display the first category)
				echo '<li class="item-cat item-cat-' . esc_attr($category[0]->term_id) . ' item-cat-' . esc_attr($category[0]->category_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($category[0]->term_id) . ' bread-cat-' . esc_attr($category[0]->category_nicename) . '" href="' .esc_url( get_category_link($category[0]->term_id) ). '" title="' . esc_html($category[0]->cat_name) . '">' . esc_html($category[0]->cat_name) . '</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . esc_attr($category[0]->term_id) . '"> ' . esc_html($separator) . ' </li>';
				}
				echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

			} elseif ( is_category() ) {

				// Category page
				// Get the current category
				$current_category = $wp_query->queried_object;
				echo '<li class="item-current item-cat-' . $current_category->term_id . ' item-cat-' . $current_category->category_nicename . '"><strong class="bread-current bread-cat-' . $current_category->term_id . ' bread-cat-' . $current_category->category_nicename . '">' . $current_category->cat_name . '</strong></li>';

			} elseif ( is_tax() ) {

				// Tax archive page
				$queried_object = get_queried_object();
				$name = $queried_object->name;
				$slug = $queried_object->slug;
				$tax = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$parent = $queried_object->parent;

				if( $parent ) {

					// Loop through all term ancestors
					while ( $parent ) {
						$parent_term = get_term($parent, $tax);
						// The output will be reversed, so separator goes first
						if ( $separatorclass ) {
							$parents[] = '<li class="separator separator-' . $parent . '"> ' . esc_html($separator) . ' </li>';
						}
						$parents[] = '<li class="item-parent item-parent-' . $parent . '"><a class="bread-parent bread-parent-' . $parent . '" href="' .esc_url( get_term_link($parent) ). '" title="' . $parent_term->name . '">' . $parent_term->name . '</a></li>';

						$parent = $parent_term->parent;
					}

					echo implode( array_reverse( $parents ) );
				}

				echo '<li class="item-current item-tax-' . $term_id . ' item-tax-' . $slug . '">' .esc_html( $name ). '</li>';

		} elseif ( is_page() ) {

				// Standard page
				if ( $post->post_parent ) {

					// If child page, get parents
					$anc = get_post_ancestors( $post->ID );

					// Get parents in the right order
					$anc = array_reverse( $anc );

					// Parent page loop
					$parents = '';
					foreach ( $anc as $ancestor ) {
						$parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' .esc_url( get_permalink($ancestor) ). '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
						if ( $separatorclass ) {
							$parents .= '<li class="separator separator-' . esc_attr($ancestor) . '"> ' . esc_html($separator) . ' </li>';
						}
					}

					// Display parent pages
					echo $parents;

					// Current page
					echo '<li class="current item-' . $post->ID . '">' . esc_html(get_the_title()) . '</li>';

				} else {

					// Just display current page if not parents
					echo '<li class="current item-' . $post->ID . '"> ' . esc_html(get_the_title()) . '</li>';

				}
			} elseif ( is_tag() ) {

				// Tag page
				// Get tag information
				$term_id = get_query_var('tag_id');
				$taxonomy = 'post_tag';
				$args = 'include=' . $term_id;
				$terms = get_terms($taxonomy, $args);

				// Display the tag name
				echo '<li class="current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</li>';

			} elseif ( is_day() ) {

				// Day archive
				// Year link
				echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' .esc_url( get_year_link(get_the_time('Y'))) . '" title="' . get_the_time('Y') . '">' . esc_html( get_the_time( __( 'Y', 'newspaperss' ) ) ) .'</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($separator) . ' </li>';
				}

				// Month link
				echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '" title="' . get_the_time('M') . '">' . esc_html( get_the_time( __( 'M', 'newspaperss' ) ) ) . '</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_html($separator) . ' </li>';
				}

				// Day display
				echo '<li class="current item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . '</li>';

			} elseif ( is_month() ) {

				// Month Archive
				// Year link
				echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url(get_year_link(get_the_time('Y')) ). '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($separator) . ' </li>';
				}

				// Month display
				echo '<li class="item-month item-month-' . get_the_time('m') . '">' . get_the_time('M') . ' </li>';

			} elseif ( is_year() ) {

				// Display year archive
				echo '<li class="current item-current-' . get_the_time('Y') . '">' . get_the_time('Y') . '</li>';

			} elseif ( is_author() ) {

				// Auhor archive
				// Get the author information
				global $author;
				$userdata = get_userdata($author);

				// Display author name
				echo '<li class="current item-current-' . $userdata->user_nicename . '">'. __('Author :', 'newspaperss' ) . $userdata->display_name . '</li>';

			} elseif ( get_query_var('paged') ) {

				// Paginated archives
				echo '<li class="current item-current-' . get_query_var('paged') . '">' . __('Page', 'newspaperss' ) . ' ' . get_query_var('paged') . '</li>';

			} elseif ( is_search() ) {

				// Search results page
				echo '<li class="current item-current-search">'. __('Search results for: ', 'newspaperss' ) . get_search_query() . '</li>';

			} elseif ( is_post_type_archive() ) {

				// Custom Post Type Archive Page
				echo '<li class="current">' . post_type_archive_title( '', false ) . '</li>';

			} elseif ( is_404() ) {

				// 404 page
				echo '<li>'. __('Error 404','newspaperss').'</li>';
			} // End if().
		} else {
			if ( $showhome ) {
				echo '<li class="item-home current">' . esc_html($home_title) . '</li>';
			}
		} // End if().
		echo '</ul>';
	}
} // End if().
