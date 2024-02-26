<?php
/**
* Change WC hooks
*/


/**
* Layout
*
* @see  newspaperss_before_content()
* @see  newspaperss_after_content()
* @see  woocommerce_breadcrumb()
* @see  newspaperss_shop_messages()
*/

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
add_action('woocommerce_before_main_content', 'newspaperss_before_content', 10);
add_action('woocommerce_after_main_content', 'newspaperss_after_content', 10);
if (is_active_sidebar('right-woocommerce-newspaperssidebar')) {
    add_filter('loop_shop_columns', 'newspaperss_loop_columns');
    add_action('woocommerce_before_shop_loop', 'newspaperss_product_columns_wrapper', 40);
}
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10); /* Remove unused link */
add_action('woocommerce_before_shop_loop_item', 'newspaperss_woocommerce_before_shop_loop_item', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5); /* Remove unused link */
add_action('woocommerce_after_shop_loop_item', 'newspaperss_woocommerce_after_shop_loop_item', 20);

/* Remove title on shop main */
add_filter('woocommerce_show_page_title', 'newspaperss_woocommerce_hide_page_title');

/**
* Remove title on shop main
*
* @return bool
*/
function newspaperss_woocommerce_hide_page_title()
{
    return false;
}
add_filter('woocommerce_breadcrumb_defaults', 'newspaperss_woocommerce_breadcrumbs');
function newspaperss_woocommerce_breadcrumbs()
{
    return array(
									'delimiter'   => '  ',
									'wrap_before' => ' <ul id="breadcrumbs" class="breadcrumbs woocommerce-breadcrumb" itemprop="breadcrumb">',
									'wrap_after'  => '</ul> ',
									'before'      => '<li class="item-home">',
									'after'       => '</li>',
									'home'        => _x('Home', 'breadcrumb', 'newspaperss'),
								);
}


if (! function_exists('newspaperss_before_content')) {
    /**
    * Before Content
    * Wraps all WooCommerce content in wrappers which match the theme markup
    *
    * @since   1.0.0
    * @return  void
    */
    function newspaperss_before_content()
    {?>

<div class="heade-content woo-header-newspaperss border-none primary padding-vertical-3 ">
	<div class="grid-container">
		<div class="top-bar">
			<div class="top-bar-left">
				<h1 class="is-size-2 text-uppercase text-center medium-text-left large-text-left"><?php woocommerce_page_title(); ?></h1>
			</div>
			<div class="top-bar-right float-center-small">
				<?php woocommerce_breadcrumb(); ?>
			</div>
		</div>
	</div>
</div>
<div class="grid-container shop-warp">
	<div class="grid-x grid-margin-x">
		<div class="cell large-auto small-12">
<?php
    }
}


if (! function_exists('newspaperss_after_content')) {

function newspaperss_after_content()
{
  ?>
  <?php if (is_active_sidebar('right-woocommerce-newspaperssidebar')): ?>
    </div>
  <?php endif; ?>
</div>
<?php if (is_active_sidebar('right-woocommerce-newspaperssidebar')  && ! is_product()): ?>
  <div class="cell small-12 medium-6 large-3">
    <div id="woocommerce-sidebar" class="sidebar-inner" >
      <div  class="grid-x grid-margin-x ">
        <?php dynamic_sidebar('right-woocommerce-newspaperssidebar'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
</div>
<?php
}
}

if (is_active_sidebar('right-woocommerce-newspaperssidebar')) {
    if (! function_exists('newspaperss_product_columns_wrapper')) {
        /**
        * Product columns wrapper
        *
        * @since   2.2.0
        * @return  void
        */
        function newspaperss_product_columns_wrapper()
        {
            echo '<div class="columns-3">';
        }
    }

    if (! function_exists('newspaperss_loop_columns')) {
        /**
        * Default loop columns on product archives
        *
        * @return integer products per row
        * @since  1.0.0
        */
        function newspaperss_loop_columns()
        {
            return apply_filters('newspaperss_loop_columns', 3); // 3 products per row
        }
    }

    if (! function_exists('newspaperss_product_columns_wrapper_close')) {
        /**
        * Product columns wrapper close
        *
        * @since   2.2.0
        * @return  void
        */
        function newspaperss_product_columns_wrapper_close()
        {
            echo '</div>';
        }
    }
}

/**
* Change the layout before each single product listing
*/
function newspaperss_woocommerce_before_shop_loop_item()
{
    echo '<div class="card card-product">';
}

/**
* Change the layout after each single product listing
*/
function newspaperss_woocommerce_after_shop_loop_item()
{
    echo '</div>';
}
