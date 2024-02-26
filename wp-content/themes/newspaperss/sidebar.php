<?php

/**
 * The template for displaying sidebar
 *
 * @package WordPress
 * @subpackage newspaperss
 * @since newspaperss 1.0
 */

?>

<?php if (!is_active_sidebar('right-sidebar')) {
  return;
}
?>
<?php if (newspaperss_is_woocommerce_active() && is_woocommerce()) : ?>
  <div class="cell small-11 medium-11 large-3 large-order-1  ">
  <?php else : ?>
    <div class="cell small-11 medium-11 large-4 large-order-1  ">
    <?php endif; ?>
    <div id="sidebar" class="sidebar-inner ">
      <div class="grid-x grid-margin-x ">
        <?php dynamic_sidebar('right-sidebar'); ?>
      </div>
    </div>
    </div>