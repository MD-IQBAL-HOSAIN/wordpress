<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package newspaperss
 */



 if ( !class_exists( 'latest_post_blog_list' ) ) {

    class latest_post_blog_list extends WP_Widget {

        public function __construct() {
          $widget_ops = array(
            'classname' => 'latest_post_blog_list',
            'description' => __( '(BLOG POST LIST STYLE ) Displays latest posts or posts from a choosen category', 'newspaperss' ),
            'customize_selective_refresh' => true,
          );
          parent::__construct( 'latest-post-list', __( '&hearts; Newspaperss - Blog List', 'newspaperss' ), $widget_ops );
          $this->alt_option_name = 'newspaperss_post_list';

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
        // Latest Posts 1
        if ( $sticky_posts ) :
         $sticky = get_option( 'sticky_posts' );
         else:
           $sticky ='';
         endif;
        $latest_blog_posts = new WP_Query(
          array(
            'cat'	                => $category,
            'posts_per_page'	    => $number_posts,
            'post_status'           => 'publish',
            'post__not_in' => $sticky,
                    )
        );

        echo $before_widget;
    ?>


        <div class="lates-post-blog "  >
          <?php if( !empty($instance['title']) ): ?>
            <div class="block-header-wrap">
              <div class="block-header-inner">
                <div class="block-title widget-title">
                  <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
                </div>
              </div>
            </div>
          <?php endif;?>
          <?php if ( $latest_blog_posts -> have_posts() ) :
            while ( $latest_blog_posts -> have_posts() ) : $latest_blog_posts -> the_post(); ?>
            <div class="block-content-wrap">
              <article class="grid-x grid-padding-x align-middle post-wrap-blog ">
                <?php if ( has_post_thumbnail() ) { ?>
                  <div class="large-5 medium-5 small-12 cell  sidebar-homepagesidebar">
                    <div class="post-thumb-outer">
                      <div class="post-thumb thumbnail-resize">
                        <?php the_post_thumbnail( 'newspapersstop-medium',array('class' => 'object-fit-postimg')  ); ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <div class="large-auto medium-auto small-12 cell ">
                  <div class="post-body">
                    <div class="post-list-content">
                      <div class="post-cat-info ">
                        <?php newspaperss_category_list(); ?>
                      </div>
                      <?php the_title( sprintf( '<h3 class="post-title is-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                      <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="post-meta-info ">
                        <div class="post-meta-info-left">
                          <span class="meta-info-el meta-info-author">
                            <a class="vcard author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                              <?php the_author(); ?>
                            </a>
                          </span>
                          <span class="meta-info-el meta-info-date">
                            <time class="date update" ><?php the_time( get_option('date_format') ); ?></time>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
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
 'title' => 'Latest Blog ',
 );
 $number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 5;
$sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : false;
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>

  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'newspaperss' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
  </p>
  <p>
    <label><?php esc_html_e( 'Select a post category', 'newspaperss' ); ?></label>
    <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts' ) ); ?>
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
function newspaperss_latest_post_blog() {
    register_widget( 'latest_post_blog_list' );
}
add_action( 'widgets_init', 'newspaperss_latest_post_blog' );
