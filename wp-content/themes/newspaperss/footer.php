<?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>

</div>
<footer id="footer" class="footer-wrap">
  <?php if (is_active_sidebar('foot_sidebar')) { ?>
    <!--FOOTER WIDGETS-->
    <div class="top-footer-wrap" <?php if (true == get_theme_mod('sticky_footer', false)) : ?> data-sticky="data-sticky" data-stick-to="bottom" data-btm-anchor="footer-copyright:top" data-margin-bottom="0" <?php endif; ?>>
      <div class="grid-container">
        <div class="grid-x grid-padding-x align-top ">
          <?php if (is_active_sidebar('dynamic_sidebar') || !dynamic_sidebar('foot_sidebar')) : ?><?php endif; ?>
        </div>
      </div>
    </div>
    <!--FOOTER WIDGETS END-->
  <?php } ?>
  <!--COPYRIGHT TEXT-->
  <div id="footer-copyright" class="footer-copyright-wrap top-bar ">
    <div class="grid-container">
      <div class="top-bar-left text-center large-text-left">
        <div class="menu-text">
          <?php get_template_part('parts/site', 'info'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  echo '<a href="#0" class="scroll_to_top" data-smooth-scroll>';
  echo '<i class="fa fa-angle-up "></i>';
  echo '</a>';
  ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>