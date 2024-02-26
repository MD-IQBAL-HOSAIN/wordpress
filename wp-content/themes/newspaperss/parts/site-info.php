<?php

/**
 * Displays footer site info
 *
 * @package silk themes
 * @subpackage newspaperss
 * @since 1.0
 * @version 1.0
 */
?>

<div class="footer-copyright-text">
  <?php
  $newspaperss_footertext = html_entity_decode(get_theme_mod('news_copyright_text'));
  echo html_entity_decode($newspaperss_footertext);
  ?>
  <p class="display-inline defult-text">
    <a class="theme-by silkthemesc" target="_blank" href="<?php echo esc_url('https://silkthemes.com/'); ?>"><?php printf(esc_html__('Theme by %s', 'newspaperss'), 'Silk Themes'); ?></a>
  </p>

</div>