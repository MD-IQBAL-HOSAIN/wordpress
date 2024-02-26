<?php

/**
 * Branding
 */
?>
<?php $image_heade2 = get_header_image(); ?>

<div class="head-top-area " <?php if (!empty($image_heade2)) : ?>style="background:url(<?php echo esc_url($image_heade2); ?>);background-size:cover; background-repeat:no-repeat;" <?php endif; ?>>
  <div class="grid-container ">
    <?php newspaperss_logo_position(); ?>
  </div>
</div>