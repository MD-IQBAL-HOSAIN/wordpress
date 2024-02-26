<?php
/**
 * Slider template
 *
 * @package newspaperss
 */
?>

      <?php
        $category_show = get_theme_mod( 'category_show_featured');
        $post_order_by = get_theme_mod( 'post_order_by_featured', 'date' );
        $value = get_theme_mod( 'onof_auto_playfeatured', true );
        $latest_post_title =  get_theme_mod('featured_post_title',esc_attr__('Featured Story','newspaperss'));


        $args=array(
                'post_type' => 'post',
                'cat' => $category_show,
                'orderby' => $post_order_by,
                'ignore_sticky_posts'   => true
        );
        $featured_slider = new WP_Query($args);
      ?>
          <div class="grid-x grid-padding-x grid-padding-y ">
            <div class="cell small-24 featured-section">
              <?php if (!empty($latest_post_title) ): ?>
              <div class="block-title widget-title">
                <h3 class="blog-title " >
                  <?php echo esc_html( $latest_post_title); ?>
                </h3>
              </div>
            <?php endif; ?>

              <div id="slider" class="slick-slider featured slider-post-wrap" data-slick='{"slidesToShow": <?php echo esc_attr(get_theme_mod( 'slide_to_showfeatured', '4' )); ?> , "slidesToScroll":1 ,"autoplay":<?php echo ( $value ) ? 'true' : 'false'; ?>}' >
                <?php if ( $featured_slider->have_posts() ) : ?>
                  <?php /* Start the Loop */ ?>
                  <?php while ( $featured_slider->have_posts() ) : $featured_slider->the_post(); ?>
                    <article class="wrap-slider">
                      <div class="slider-thum" >
                        <?php
                        if ( has_post_thumbnail() ) {?>
                          <?php the_post_thumbnail( 'magazineart-slider2',array('class' => 'img-slider','link_thumbnail' =>TRUE)  ); ?>
                        <?php  } else {?>
                          <img class="img-slider" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img-550x350-3.jpg" />
                        <?php }?>
                      </div>
                      <div class="slider-content2" >
                        <div class="entry-meta">
                          <div class="post-cat-info ">
                          <?php newspaperss_category_list(); ?>
                        </div>
                          <?php the_title( sprintf( '<h3 class="slider-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        </div>
                      </div>
                    </article >
                  <?php endwhile; ?>
                <?php else : ?>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
              </div>
