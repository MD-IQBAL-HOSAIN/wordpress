<?php

/**
 * post layout3 for displaying postpage
 *
 * @package silk
 * @subpackage newspaperss
 * @since newspaperss 1.0
 */
?>
<?php if (is_front_page() && is_home()) : ?>
  <?php $sidbar_position = esc_attr(get_theme_mod('sidbar_position_latest', 'right')); ?>
  <div class="medium-6 small-12 cell <?php if ('full' == $sidbar_position  || !is_active_sidebar('right-sidebar')) : ?> large-4 <?php else : ?> large-6 <?php endif; ?> ">
  <?php else : ?>
    <?php $sidbar_position = esc_attr(get_theme_mod('sidbar_position', 'right')); ?>
    <div class="medium-6 small-12 cell <?php if ('full' == $sidbar_position || !is_active_sidebar('right-sidebar')) : ?> large-4 <?php else : ?> large-6 <?php endif; ?> ">
    <?php endif; ?>
    <div class="card layout3-post">
      <?php if (has_post_thumbnail()) { ?>
        <div class=" thumbnail-resize">
          <?php the_post_thumbnail('newspaperss-small-grid', array('class' => 'float-center card-image')); ?>
          <div class="post-cat-info is-absolute">
            <?php newspaperss_category_list(); ?>
          </div>
        </div>
      <?php } ?>
      <div class="card-section">
        <?php if (!has_post_thumbnail()) { ?>
          <div class="post-cat-info ">
            <?php newspaperss_category_list(); ?>
          </div>
        <?php } ?>
        <?php the_title(sprintf('<h3 class="post-title is-size-4  card-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
        <?php the_excerpt(); ?>
      </div>
      <div class="card-divider">
        <span class="meta-info-el mate-info-date-icon">
          <?php echo newspaperss_time_link(); ?>
        </span>
        <span class="meta-info-el meta-info-author">
          <a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
            <?php echo get_the_author(); ?>
          </a>
        </span>
      </div>
    </div>
    </div>