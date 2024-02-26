<?php
/**
 * Magazine right post
 *
 * Displays the right post function of the theme.
 *
 * @package newspaperss
 */
?>

    <?php
    $category_show = get_theme_mod( 'category_toppost_show');
    $post_order_by = get_theme_mod( 'top_post_order_by','date');

    $args=array(
                'post_type' => 'post',
                'posts_per_page'=>4,
                'cat' => $category_show,
                'orderby' => $post_order_by,
                'ignore_sticky_posts'   => 1
    );
    $top_right_post = new WP_Query($args);?>

    <div class="cell large-6 medium-12 small-12 nopadding-left" >
      <div class="slider-right" >
        <div class=" grid-x" >
        <?php if ( $top_right_post->have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( $top_right_post->have_posts() ) : $top_right_post->the_post(); ?>

          <div class="cell large-6 medium-6 small-6 " >
          <article class="post-wrap ">
            <div class="post-image-warp">
              <div class="post-thumb-overlay"></div>
                <span class="thumbnail-post">
                    <?php
                  if ( has_post_thumbnail() ) {?>
                    <?php the_post_thumbnail( 'newspaperss-medium',array('class' => 'object-fit-postimg')  ); ?>
                  <?php  } else {?>
                    <img class="object-fit-postimg" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/right-thum.jpg" / />
                  <?php }?>

                </span>
            </div>
            <div class="post-header-outer  is-absolute ">
              <div class="post-header">
                <?php if( has_category() ) { ?>
                  <div class="post-cat-info ">
                    <?php newspaperss_firstcategory_link(); ?>
                  </div>
                <?php } ?>
                <?php the_title( sprintf( '<h3 class="post-title is-size-4 entry-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <div class="post-meta-info ">
                  <span class="meta-info-el meta-info-author">
                    <a class="vcard author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                      <?php the_author(); ?>
                    </a>
                  </span>
                  <span class="meta-info-el meta-info-date ">
                    <time class="date update" >
                      <span><?php the_time( get_option('date_format') ); ?></span>
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
