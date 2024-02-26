<?php
$related_post_title =  get_theme_mod('related_post_title',esc_attr__('You Might Also Like','newspaperss'));
?>
<?php
$categories = get_the_category($post->ID);

if ($categories) {
    $category_ids = array();
    foreach ($categories as $individual_category) {
        $category_ids[] = $individual_category->term_id;
    }
    $args=array(
          'category__in' => $category_ids,
          'post__not_in' => array($post->ID),
          'posts_per_page'=> 4, // Number of related posts that will be shown.
          'ignore_sticky_posts'   => true,
          'orderby'			=> 'rand',
        );
    $my_query = new wp_query($args);?>

  <div class="single-post-box-related ">
    <?php if ($my_query->have_posts()) : ?>
    <?php if (!empty($related_post_title)):?>
      <div class="box-related-header block-header-wrap">
        <div class="block-header-inner">
          <div class="block-title widget-title">
            <h3><?php echo esc_html($related_post_title); ?></h3>
          </div>
        </div>
      </div>
    <?php endif;?>
    <?php endif;?>
    <div class="block-content-wrap ">
      <div class="grid-x grid-margin-x medium-margin-collapse ">
        <?php if ($my_query->have_posts()) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <div class="cell large-6 medium-6 small-12  ">
              <article class="post-wrap ">
                <?php if ( has_post_thumbnail() ): ?>
                  <div class="post-image-warp">
                    <div class="post-thumb-overlay"></div>
                    <span class="thumbnail-post">
                        <?php the_post_thumbnail( 'newspaperss-medium',array('class' => 'thumbnail object-fit-postimg_250') ); ?>
                    </span>
                  </div>
                <?php else : ?>
                  <div class="object-fit-postimg_250 noimage"></div>
                <?php endif; ?>

                <div class="post-header-outer  is-absolute ">
                  <div class="post-header">
                    <?php if (has_category()) {
                      ?>
                      <div class="post-cat-info ">
                        <?php newspaperss_firstcategory_link(); ?>
                      </div>
                      <?php
                    } ?>
                    <?php the_title(sprintf('<h3 class="post-title is-size-4 entry-title is-lite"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                    <div class="post-meta-info ">
                      <span class="meta-info-el meta-info-author">
                        <a class="vcard author is-lite" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                          <?php the_author(); ?>
                        </a>
                      </span>
                      <span class="meta-info-el meta-info-date ">
                        <time class="date is-lite update">
                          <span><?php the_time(get_option('date_format')); ?></span>
                        </time>
                      </span>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php }
