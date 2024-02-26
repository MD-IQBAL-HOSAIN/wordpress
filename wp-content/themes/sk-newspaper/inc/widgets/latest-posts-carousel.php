<?php

/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package SK newspaper
 */



if (!class_exists('sknewspaper_post_carousel')) {

  class sknewspaper_post_carousel extends WP_Widget
  {
    public function __construct()
    {
      $widget_ops = array(
        'classname' => 'sknewspaper_post_carousel',
        'description' => __('(blog carousel style) Displays latest posts or posts from a choosen category.', 'sk-newspaper'),
        'customize_selective_refresh' => true,
      );
      parent::__construct('sknewspaper-latestpost-carousel', __('&hearts; sknewspaper-Post Carousel', 'sk-newspaper'), $widget_ops);
      $this->alt_option_name = 'sknewspaper_latestpost_carousel';
    }

    /**
     * Display Widget
     *
     * @param $args
     * @param $instance
     */
    function widget($args, $instance)
    {
      extract($args);
      $number_posts = (!empty($instance['number_posts'])) ? absint($instance['number_posts']) : 3;
      if (!$number_posts) {
        $number_posts = 3;
      }
      $sticky_posts = isset($instance['sticky_posts']) ? $instance['sticky_posts'] : false;

      $auto_play = (!empty($instance['auto_play'])) ? wp_kses_post($instance['auto_play']) : 'true';
      $slidesto_show = (!empty($instance['slidesto_show'])) ? absint($instance['slidesto_show']) : 3;
      if (!$slidesto_show) {
        $slidesto_show = 3;
      }
      $hide_autor_date = (isset($instance['hide_autor_date'])) ? $instance['hide_autor_date'] : false;
      $category = (isset($instance['category'])) ? absint($instance['category']) : '';

      // Latest Posts 1
      if (true == $sticky_posts) :
        $sticky = get_option('sticky_posts');
      else :
        $sticky = '';
      endif;
      $latest_bloglist_posts = new WP_Query(
        array(

          'cat'                  => $category,
          'posts_per_page'      => $number_posts,
          'post_status'           => 'publish',
          'post__not_in' => $sticky,
        )
      );

      echo $before_widget;
?>

      <div class="grid-container">
        <?php if (!empty($instance['title'])) : ?>
          <div class="block-title widget-title">
            <h3 class=" blog-title widget-title"><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
          </div>
        <?php endif; ?>
        <div class="grid-x">
          <div class="cell large-auto small-24">
            <div id="slider" class="slick-slider featured slider-post-wrap " data-slick='{"slidesToShow":<?php echo $slidesto_show; ?>,"autoplay":<?php echo $auto_play; ?>}'>
              <?php if ($latest_bloglist_posts->have_posts()) : ?>
                <?php /* Start the Loop */ ?>
                <?php while ($latest_bloglist_posts->have_posts()) : $latest_bloglist_posts->the_post(); ?>
                  <article class="wrap-slider">
                    <div class="slider-thum">
                      <?php
                      if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail('newspaperss-slider2', array('class' => 'img-slider', 'link_thumbnail' => TRUE)); ?>
                      <?php  } else { ?>
                        <img class="img-slider" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slide.jpg" />
                      <?php } ?>
                    </div>
                    <div class="slider-content2">
                      <div class="entry-meta">
                        <?php if (!$hide_autor_date) : ?>
                          <div class="post-cat-info ">
                            <?php newspaperss_category_list(); ?>
                          </div>
                        <?php endif; ?>
                        <?php the_title(sprintf('<h3 class="slider-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                      </div>
                    </div>
                  </article>
                <?php endwhile; ?>
              <?php else : ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php
      echo $after_widget;
    }

    public function update($new_instance, $old_instance)
    {
      $instance = $old_instance;
      $instance['title'] = sanitize_text_field($new_instance['title']);
      $instance['category']  = absint($new_instance['category']);
      $instance['number_posts'] = (int)$new_instance['number_posts'];
      $instance['sticky_posts'] = isset($new_instance['sticky_posts']) ? (bool) $new_instance['sticky_posts'] : false;
      $instance['slidesto_show'] = (int)$new_instance['slidesto_show'];
      $instance['auto_play']  = wp_kses_post($new_instance['auto_play']);
      $instance['hide_autor_date'] = isset($new_instance['hide_autor_date']) ? (bool) $new_instance['hide_autor_date'] : false;


      return $instance;
    }

    function form($instance)
    {
      /* Set up some default widget settings. */
      $defaults = array(

        'category' => 'show_option_all',
        'title' => 'Latest Blog ',
        'auto_play' => 'true',

      );
      $instance = wp_parse_args((array) $instance, $defaults);
      $number_posts    = isset($instance['number_posts']) ? absint($instance['number_posts']) : 5;
      $slidesto_show    = isset($instance['slidesto_show']) ? absint($instance['slidesto_show']) : 3;
      $hide_autor_date = isset($instance['hide_autor_date']) ? (bool) $instance['hide_autor_date'] : false;

      $sticky_posts = isset($instance['sticky_posts']) ? (bool) $instance['sticky_posts'] : false;
    ?>

      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'sk-newspaper'); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
      </p>
      <p>
        <label><?php esc_html_e('Select a post category', 'sk-newspaper'); ?></label>
        <?php $args = array(
          'show_option_all'    => 'Show all posts',
          'orderby'            => 'ID',
          'order'              => 'ASC',
          'show_count'         => 1,
          'hide_empty'         => 1,
          'selected'           => $instance['category'],
          'hierarchical'       => 0,
          'name'               => $this->get_field_name('category'),
          'taxonomy'           => 'category',
          'value_field'       => 'term_id',
        ); ?>
        <?php wp_dropdown_categories($args); ?>
      </p>

      <p><input class="checkbox" type="checkbox" <?php checked($sticky_posts); ?> id="<?php echo $this->get_field_id('sticky_posts'); ?>" name="<?php echo $this->get_field_name('sticky_posts'); ?>" />
        <label for="<?php echo $this->get_field_id('sticky_posts'); ?>"><?php esc_html_e('Hide sticky posts.', 'sk-newspaper'); ?></label>
      </p>

      <p><input class="checkbox" type="checkbox" <?php checked($hide_autor_date); ?> id="<?php echo $this->get_field_id('hide_autor_date'); ?>" name="<?php echo $this->get_field_name('hide_autor_date'); ?>" />
        <label for="<?php echo $this->get_field_id('hide_autor_date'); ?>"><?php esc_html_e('Hide author/date', 'sk-newspaper'); ?></label>
      </p>

      <p><label for="<?php echo $this->get_field_id('number_posts'); ?>"><?php esc_html_e('Number of posts to show:', 'sk-newspaper'); ?></label>
        <input class="tiny-text" id="<?php echo $this->get_field_id('number_posts'); ?>" name="<?php echo $this->get_field_name('number_posts'); ?>" type="number" step="1" min="1" value="<?php echo $number_posts; ?>" size="3" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('slidesto_show'); ?>"><?php esc_html_e('slides to show', 'sk-newspaper'); ?></label>
        <input type="number" id="<?php echo $this->get_field_id('slidesto_show'); ?>" name="<?php echo $this->get_field_name('slidesto_show'); ?>" step="1" min="1" value="<?php echo $slidesto_show; ?>" size="3" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('auto_play'); ?>"><?php esc_html_e('Auto play', 'sk-newspaper') ?></label>
        <select id="<?php echo $this->get_field_id('auto_play'); ?>" name="<?php echo $this->get_field_name('auto_play'); ?>" class="widefat">
          <option value="true" <?php if ('true' == $instance['auto_play']) echo 'selected="selected"'; ?>><?php esc_html_e('ON', 'sk-newspaper') ?></option>
          <option value="false" <?php if ('false' == $instance['auto_play']) echo 'selected="selected"'; ?>><?php esc_html_e('OFF', 'sk-newspaper') ?></option>
        </select>
      </p>



<?php
    }
  }
}


// register  dual category posts widget
function sknewspaper_latest_post_carousel()
{
  register_widget('sknewspaper_post_carousel');
}
add_action('widgets_init', 'sknewspaper_latest_post_carousel');
