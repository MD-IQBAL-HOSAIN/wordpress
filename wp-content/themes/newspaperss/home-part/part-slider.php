<?php

/**
 * Slider template
 *
 * @package newspaperss
 */
?>

<?php
$category_show = get_theme_mod('category_show');
$post_order_by = get_theme_mod('post_order_by', 'date');

$args = array(
  'post_type' => 'post',
  'posts_per_page' => 4,
  'cat' => $category_show,
  'orderby' => $post_order_by,
  'ignore_sticky_posts'   => true
);
$main_slider = new WP_Query($args);
?>
<div class="cell large-auto small-12">
  <div id="slider" class="slick-slider">
    <?php if ($main_slider->have_posts()) : ?>
      <?php /* Start the Loop */ ?>
      <?php while ($main_slider->have_posts()) : $main_slider->the_post(); ?>
        <?php
        if (has_post_thumbnail()) {
          $featured_img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'newspaperss-large');
        } else {
          $featured_img_url = get_template_directory_uri() . '/images/slide.jpg';
        } ?>
        <!-- items mirrored twice, total of 4 -->
        <div class=" projectitem">
          <a class="sliderlink" href="<?php echo esc_url(get_permalink()); ?>"> </a>
          <div class="slider-container" style="background: url(<?php echo esc_url($featured_img_url); ?>)50% no-repeat;">
            <div class="post-header-outer is-absolute">
              <div class="post-header">
                <div class="post-cat-info ">
                  <?php newspaperss_firstcategory_link(); ?>
                </div>
                <?php the_title(sprintf('<h3 class="post-title is-size-2"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                <div class="post-meta-info ">
                  <div class="post-meta-info-left">
                    <span class="meta-info-el meta-info-author">
                      <a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php the_author(); ?>
                      </a>
                    </span>
                    <span class="meta-info-el meta-info-date">
                      <time class="date update"><?php the_time(get_option('date_format')); ?></time>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>