<?php

/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package SK newspaper
 */



if (!class_exists('sknewspaper_latest_post_blog_grid')) {

  class sknewspaper_latest_post_blog_grid extends WP_Widget
  {

    public function __construct()
    {
      $widget_ops = array(
        'classname' => 'sknewspaper_latest_post_blog_grid',
        'description' => __('(BLOG POST grid STYLE ) Displays latest posts or posts from a choosen category', 'sk-newspaper'),
        'customize_selective_refresh' => true,
      );
      parent::__construct('latest-post-grid', __('&hearts; Newspaperss - Blog Grid', 'sk-newspaper'), $widget_ops);
      $this->alt_option_name = 'sknewspaper_post_grid';
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

      $number_posts = (!empty($instance['number_posts'])) ? absint($instance['number_posts']) : 4;
      if (!$number_posts) {
        $number_posts = 4;
      }
      $sticky_posts = isset($instance['sticky_posts']) ? $instance['sticky_posts'] : false;
      $category = (isset($instance['category'])) ? absint($instance['category']) : '';
      $hide_posts_cat = (isset($instance['hide_posts_cat'])) ? $instance['hide_posts_cat'] : false;
      $hide_autor_date = (isset($instance['hide_autor_date'])) ? $instance['hide_autor_date'] : false;
      $show_post_row = (!empty($instance['show_post_row'])) ? wp_kses_post($instance['show_post_row']) : 'large-6';


      // Latest Posts 1
      if ($sticky_posts) :
        $sticky = get_option('sticky_posts');
      else :
        $sticky = '';
      endif;
      $latest_blog_posts_grid = new WP_Query(
        array(
          'cat'                  => $category,
          'posts_per_page'      => $number_posts,
          'post_status'           => 'publish',
          'post__not_in' => $sticky,
        )
      );

      echo $before_widget;
?>
      <div class="lates-post-grid ">
        <div class="grid-container">
          <?php if (!empty($instance['title'])) : ?>
            <div class="block-header-wrap">
              <div class="block-header-inner">
                <div class="block-title widget-title">
                  <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <div class="grid-x grid-padding-x">
            <?php if ($latest_blog_posts_grid->have_posts()) :
              while ($latest_blog_posts_grid->have_posts()) : $latest_blog_posts_grid->the_post(); ?>
                <div class="<?php echo $show_post_row; ?> medium-6 small-12 cell  ">
                  <div class="card layout3-post">
                    <?php if (has_post_thumbnail()) { ?>
                      <div class=" thumbnail-resize">
                        <?php the_post_thumbnail('newspaperss-small-grid', array('class' => 'float-center card-image')); ?>
                        <?php if (!$hide_posts_cat) : ?>
                          <div class="post-cat-info is-absolute">
                            <?php newspaperss_category_list(); ?>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php } ?>
                    <div class="card-section">
                      <?php if (!has_post_thumbnail()) { ?>
                        <?php if (!$hide_posts_cat) : ?>
                          <div class="post-cat-info">
                            <?php newspaperss_category_list(); ?>
                          </div>
                        <?php endif; ?>
                      <?php } ?>
                      <?php the_title(sprintf('<h3 class="post-title is-size-4  card-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                      <?php the_excerpt(); ?>
                    </div>
                    <?php if (!$hide_autor_date) : ?>
                      <div class="card-divider">
                        <div class="top-bar">
                          <div class="top-bar-left">
                            <span class="meta-info-el mate-info-date-icon">
                              <?php echo newspaperss_time_link(); ?>
                            </span>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
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
      $instance['hide_posts_cat'] = isset($new_instance['hide_posts_cat']) ? (bool) $new_instance['hide_posts_cat'] : false;
      $instance['hide_autor_date'] = isset($new_instance['hide_autor_date']) ? (bool) $new_instance['hide_autor_date'] : false;
      $instance['show_post_row']  = wp_kses_post($new_instance['show_post_row']);


      return $instance;
    }

    function form($instance)
    {
      /* Set up some default widget settings. */
      $defaults = array(

        'category' => 'show_option_all',
        'title' => 'Latest Blog ',
        'show_post_row' => 'large-6',
      );
      $number_posts    = isset($instance['number_posts']) ? absint($instance['number_posts']) : 5;
      $sticky_posts = isset($instance['sticky_posts']) ? (bool) $instance['sticky_posts'] : false;
      $hide_posts_cat = isset($instance['hide_posts_cat']) ? (bool) $instance['hide_posts_cat'] : false;
      $hide_autor_date = isset($instance['hide_autor_date']) ? (bool) $instance['hide_autor_date'] : false;

      $instance = wp_parse_args((array) $instance, $defaults); ?>

      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'sk-newspaper'); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
      </p>
      <p>
        <label><?php esc_html_e('Select a post category', 'sk-newspaper'); ?></label>
        <?php wp_dropdown_categories(array('name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts')); ?>
      </p>

      <p><input class="checkbox" type="checkbox" <?php checked($sticky_posts); ?> id="<?php echo $this->get_field_id('sticky_posts'); ?>" name="<?php echo $this->get_field_name('sticky_posts'); ?>" />
        <label for="<?php echo $this->get_field_id('sticky_posts'); ?>"><?php esc_html_e('Hide sticky posts.', 'sk-newspaper'); ?></label>
      </p>


      <p><label for="<?php echo $this->get_field_id('number_posts'); ?>"><?php esc_html_e('Number of posts to show:', 'sk-newspaper'); ?></label>
        <input class="tiny-text" id="<?php echo $this->get_field_id('number_posts'); ?>" name="<?php echo $this->get_field_name('number_posts'); ?>" type="number" step="1" min="1" value="<?php echo $number_posts; ?>" size="3" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('show_post_row'); ?>"><?php esc_html_e('Show post in a row', 'sk-newspaper') ?></label>
        <select id="<?php echo $this->get_field_id('show_post_row'); ?>" name="<?php echo $this->get_field_name('show_post_row'); ?>" class="widefat">
          <option value="large-12" <?php if ('large-12' == $instance['show_post_row']) echo 'selected="selected"'; ?>><?php esc_html_e('One 1', 'sk-newspaper') ?></option>
          <option value="large-6" <?php if ('large-6' == $instance['show_post_row']) echo 'selected="selected"'; ?>><?php esc_html_e('Two 2', 'sk-newspaper') ?></option>
          <option value="large-4" <?php if ('large-4' == $instance['show_post_row']) echo 'selected="selected"'; ?>><?php esc_html_e('Three 3', 'sk-newspaper') ?></option>
          <option value="large-3" <?php if ('large-3' == $instance['show_post_row']) echo 'selected="selected"'; ?>><?php esc_html_e('Four 4', 'sk-newspaper') ?></option>
        </select>
      </p>
      <p><input class="checkbox" type="checkbox" <?php checked($hide_posts_cat); ?> id="<?php echo $this->get_field_id('hide_posts_cat'); ?>" name="<?php echo $this->get_field_name('hide_posts_cat'); ?>" />
        <label for="<?php echo $this->get_field_id('hide_posts_cat'); ?>"><?php esc_html_e('Hide Categories', 'sk-newspaper'); ?></label>
      </p>

      <p><input class="checkbox" type="checkbox" <?php checked($hide_autor_date); ?> id="<?php echo $this->get_field_id('hide_autor_date'); ?>" name="<?php echo $this->get_field_name('hide_autor_date'); ?>" />
        <label for="<?php echo $this->get_field_id('hide_autor_date'); ?>"><?php esc_html_e('Hide author/date', 'sk-newspaper'); ?></label>
      </p>


<?php
    }
  }
}


// register sknewspaper dual category posts widget
function sknewspaper_latest_post_grid()
{
  register_widget('sknewspaper_latest_post_blog_grid');
}
add_action('widgets_init', 'sknewspaper_latest_post_grid');
