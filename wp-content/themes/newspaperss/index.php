<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package newspaperss
 */

get_header(); ?>
<!--Call Sub Header-->
<?php if (is_front_page() && is_home()) : ?>

  <?php
  if (true == get_theme_mod('onof_auto_topection', true)) :
    echo '<div id="top-content">';/* satrt top section */
    echo  '<div class=" grid-x align-center" >';
    get_template_part('home-part/part', 'slider');
    get_template_part('home-part/part', 'rightpost');
    echo '</div>';
    echo '</div>';
  endif;
  if (true == get_theme_mod('onof_auto_featuredsection', true)) :
    get_template_part('home-part/part', 'featured');
  endif;
  get_template_part('home-part/latest', 'post');
  ?>

  <?php
  $latestpost_post_title =  get_theme_mod('latestpost_post_title', esc_html__('Latest post', 'newspaperss')); ?>

  <div id="blog-content">
    <div class="grid-container">
      <div class="grid-x grid-padding-x align-center ">
        <div class="cell  small-12 margin-vertical-1 <?php echo esc_attr(newspaperss_sidebar_layout_latest()); ?>">
          <div class="lates-post-blog lates-post-blogbig <?php if (is_active_sidebar('right-sidebar')) : ?> margin-horizontal <?php else : ?> margin-right-post <?php endif; ?>" id="site-content">
            <?php $layout_page_latest = get_theme_mod('layout_page_latest', 'content3'); ?>
            <div class="grid-x  <?php if ('content3' == $layout_page_latest) : ?> grid-margin-x <?php else : ?> align-center  <?php endif; ?>">
              <?php if (!empty($latestpost_post_title)) : ?>
                <div class="cell block-title widget-title">
                  <h3 class="blog-title ">
                    <?php echo esc_html($latestpost_post_title); ?>
                  </h3>
                </div>
              <?php endif; ?>

              <?php if (have_posts()) : ?>

                <?php /* Start the Loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php
                  /*
                * Include the Post-Format-specific template for the content.
                * If newspaperss want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
                  get_template_part('parts/content', get_post_format());
                  ?>

                <?php endwhile; ?>

                <?php the_posts_pagination(); ?>

              <?php else : ?>

                <?php get_template_part('parts/content', 'none'); ?>

              <?php endif; ?>
            </div>
            <!--POST END-->
          </div>
        </div>
        <?php $sidbar_position_latest = get_theme_mod('sidbar_position_latest', 'right'); ?>
        <?php if ('full' !== $sidbar_position_latest) : ?>
          <?php get_template_part('sidebar'); ?>
        <?php endif; ?>
        <!--sidebar END-->
      </div>
    </div>
  </div>
  <!--container END-->


<?php elseif (!is_front_page()) : ?>
  <div id="blog-content">
    <div class="grid-container">
      <div class="grid-x grid-padding-x align-center ">
        <div class="cell  small-12 margin-vertical-1 <?php echo esc_attr(newspaperss_sidebar_layout()); ?>">
          <div class="lates-post-blog lates-post-blogbig <?php if (is_active_sidebar('right-sidebar')) : ?> margin-horizontal <?php else : ?> margin-right-post <?php endif; ?> ">
            <?php $layout_style = get_theme_mod('layout_page__gen', 'content3'); ?>
            <div class="grid-x  <?php if ('content3' == $layout_style) : ?> grid-margin-x <?php else : ?> align-center  <?php endif; ?>">

              <?php if (have_posts()) : ?>

                <?php /* Start the Loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php
                  /*
                * Include the Post-Format-specific template for the content.
                * If newspaperss want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
                  get_template_part('parts/content', get_post_format());
                  ?>

                <?php endwhile; ?>

                <?php the_posts_pagination(); ?>

              <?php else : ?>

                <?php get_template_part('parts/content', 'none'); ?>

              <?php endif; ?>
            </div>
            <!--POST END-->
          </div>
        </div>
        <?php $sidbar_position = get_theme_mod('sidbar_position', 'right'); ?>
        <?php if ('full' !== $sidbar_position) : ?>
          <?php get_template_part('sidebar'); ?>
        <?php endif; ?>
        <!--sidebar END-->
      </div>
    </div>
  </div>
  <!--container END-->

<?php endif; ?>
<?php get_footer(); ?>