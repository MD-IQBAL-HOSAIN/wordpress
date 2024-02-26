<?php
/**
 * latest post single blog (big) style  Widget
 *
 * @since 1.0.0
 *
 * @package newspaperss
 */



 if ( !class_exists( 'latest_post_blog_big' ) ) {

    class latest_post_blog_big extends WP_Widget {

      public function __construct() {
        $widget_ops = array(
          'classname' => 'latest-post-blog-big',
          'description' => __( '(BLOG POST LIST CLASSIC ) Displays latest posts or posts from a choosen category', 'newspaperss' ),
          'customize_selective_refresh' => true,
        );
        parent::__construct( 'latest-post-blog-big', __( '&hearts; Newspaperss - Blog Classic', 'newspaperss' ), $widget_ops );
        $this->alt_option_name = 'newspaperss_post_classic';

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
        $latest_big_posts = new WP_Query(
          array(
            'cat'	                => $category,
            'posts_per_page'	    => $number_posts,
            'post_status'           => 'publish',
            'post__not_in' => $sticky,
                    )
        );

        echo $before_widget;
    ?>

<div class="lates-post-blog lates-post-blogbig ">
  <?php if( !empty($instance['title']) ): ?>
    <div class="block-header-wrap">
      <div class="block-header-inner">
        <div class="block-title widget-title">
          <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
        </div>
      </div>
    </div>
  <?php endif;?>

  <?php if ( $latest_big_posts -> have_posts() ) :
    while ( $latest_big_posts -> have_posts() ) : $latest_big_posts -> the_post(); ?>
    <div class="block-content-wrap">
      <article class="grid-x grid-padding-x post-wrap-blog ">
        <?php if ( has_post_thumbnail() ) { ?>
          <div class=" small-12 cell ">
          <span class="thumbnail-resize">
            <?php the_post_thumbnail( 'newspaperss-xlarge',array('class' => 'float-center') ); ?>
          </span>
          </div>
        <?php } ?>
        <div class=" small-12 cell ">
          <?php if ( has_post_thumbnail() ) : ?>
  					<div class="post-body ">
  					<?php else : ?> 
  						<div class="post-body post-body-noimg ">
  						<?php endif;?>
            <div class="post-list-content">
              <div class="post-cat-info ">
                <?php newspaperss_category_list(); ?>
              </div>
              <?php the_title( sprintf( '<h3 class="post-title is-size-2"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
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
 'title' => 'Latest Blog Post',
 );
$number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 5;
$sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : false;
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
  <!-- Form for category 1 -->
  <h4><?php esc_html_e( 'Blog style big', 'newspaperss' ); ?></h4>
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
function newspaperss_latest_post_blogbig() {
    register_widget( 'latest_post_blog_big' );
}
add_action( 'widgets_init', 'newspaperss_latest_post_blogbig' );
