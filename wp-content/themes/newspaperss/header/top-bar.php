<?php
/**
 * The TOP header
 */
?>
<?php if ( (has_nav_menu( 'top-bar' ) ) || ( get_theme_mod( 'social_icons_top') ) ): ?>
<div id="topmenu"   >
  <div  class="grid-container">
    <div class="top-bar">
      <div class="top-bar-left">
          <?php newspaperss_top_bar(); ?>
      </div>
      <div class="top-bar-right">
        <?php newspaperss_topbar_social();?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
