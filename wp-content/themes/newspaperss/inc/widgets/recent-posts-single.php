<?php
/**
 * Recent post single Widget
 *
 * @since 1.0.0
 *
 * @package newspaperss
 */



 if ( !class_exists( 'recent_post_single' ) ) {

    class recent_post_single extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'recent-post-single',
          __( '&hearts; Newspaperss - Recent Post', 'newspaperss' ),
          array(
            'description' => __( '(Recent Post) Displays latest posts or posts from a choosen category. ', 'newspaperss' ),
            'customize_selective_refresh' => true,
          )
        );

      }
      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);

        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 4;
        if ( ! $number_posts ) {
          $number_posts = 4;
        }
        $sticky_posts = isset( $instance['sticky_posts'] ) ? $instance['sticky_posts'] : false;
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
        echo $before_widget;
        ?>

  <div class="lates-post-warp recent-post-warp " data-equalizer-watch>
    <?php if( !empty($instance['title']) ): ?>
      <div class="block-header-wrap">
        <div class="block-header-inner">
          <div class="block-title widget-title">
            <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
          </div>
        </div>
      </div>
    <?php endif;?>

      <div class="block-content-recent card">
      <?php
      if ( $sticky_posts ) :
       $sticky = get_option( 'sticky_posts' );
       else:
         $sticky ='';
       endif;

      $recent_list_posts = new WP_Query(
        array(
          'cat'	                => $category,
          'posts_per_page'	    => $number_posts,
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => $sticky_posts,
        )
      );
      ?>
      <div class="card-section">
      <?php if ( $recent_list_posts -> have_posts() ) :
        while ( $recent_list_posts -> have_posts() ) : $recent_list_posts -> the_post(); ?>
        <article class="post-list">
          <div class="post-thumb-outer">
            <?php the_post_thumbnail( 'newspaperss-listpost-small' ); ?>
          </div> 
          <div class="post-body">
            <?php the_title( sprintf( '<h3 class="post-title is-size-5"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            <div class="post-meta-info ">
              <span class="meta-info-el ">
                <i class="fa fa-clock-o"></i>
                <time>
                  <span><?php the_time( get_option('date_format') ); ?></span>
                </time>
              </span>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
    </div>
    </div>


  <?php
  echo $after_widget;
  }

public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
  $instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
  $instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
  $instance['sticky_posts'] = isset( $new_instance['sticky_posts'] ) ? (bool) $new_instance['sticky_posts'] : false;
  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(
 'category' => 'show_option_all',
 'title' => 'Latest News',
  );
 $number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 4;
 $sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : false;
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
  <!-- Form for category 1 -->
  <h5><?php esc_html_e( 'News style', 'newspaperss' ); ?></h5>
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'newspaperss' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
  </p>
  <p>
    <label><?php esc_html_e( 'Select a post category', 'newspaperss' ); ?></label>
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
	'value_field'	     => 'term_id',
); ?>
    <?php wp_dropdown_categories( $args ); ?>
  </p>
  <p><input class="checkbox" type="checkbox"<?php checked( $sticky_posts ); ?> id="<?php echo $this->get_field_id( 'sticky_posts' ); ?>" name="<?php echo $this->get_field_name( 'sticky_posts' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'sticky_posts' ); ?>"><?php _e( 'Hide sticky posts.', 'newspaperss' ); ?></label></p>


  <p><label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php _e( 'Number of posts to show:' , 'newspaperss'); ?></label>
  <input class="tiny-text" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="number" step="1" min="1" value="<?php echo $number_posts; ?>" size="3" /></p>

  <?php
    }
  }
}
// register newspaperss dual category posts widget
function newspaperss_recent_post_single() {
    register_widget( 'recent_post_single' );
}
add_action( 'widgets_init', 'newspaperss_recent_post_single' );
