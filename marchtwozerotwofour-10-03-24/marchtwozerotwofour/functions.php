<?php
require __DIR__."/parts/custom-post-taxonomies.php";
require __DIR__."/parts/carousel.php";
require __DIR__."/parts/newsticker.php";
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'gallery','audio','video','standard','link' ) );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height' => 480,
    'width'  => 720,
) );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo', array(
    'height'               => 100,
    'width'                => 400,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true,
    ) );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );


    add_theme_support( 'menus' );

    //action hook
    add_action( 'init', 'register_my_menus' );

    function register_my_menus() {
        register_nav_menus(
            array(
                'primary-menu' => __( 'Primary Menu' ),
                'secondary-menu' => __( 'Secondary Menu' ),
                'sidebar-menu' => __( 'Sidebar Menu' )
            )
        );
    }

//hook example: 2 types of hook. add filter and add action
/* function my_post_titles_filter_title( $title ) {
    $filtered_title = '<span class="entry-title">~~~' . $title . '~~~</span>';
    return $filtered_title;
}
add_filter( 'the_title', 'my_post_titles_filter_title' ); */

function show_total_chars($c){
    $l = mb_strlen( $c );
    return $c."<hr> This article contains $l characters<hr>";
}
add_filter( 'the_content', 'show_total_chars' );

//widgets start
// Creating the widget
class wpb_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'wpb_widget',
 
            // Widget name will appear in UI
            __( 'Widget', 'textdomain' ),
 
            // Widget description
            [
                'description' => __( 'Sample IDB widget based on WPBeginner Tutorial', 'textdomain' ),
            ]
        );
    }
 
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
 
        // This is where you run the code and display the output
        echo __( 'Hello, World!', 'textdomain' );
        echo $args['after_widget'];
    }
 
    // Widget Settings Form
    public function form( $instance ) {
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( 'New title', 'textdomain' );
        }
 
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e( 'Title:', 'textdomain' ); ?>
            </label>
            <input
                    class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                    name="<?php echo $this->get_field_name( 'title' ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"
            />
        </p>
        <?php
    }
 
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
    // Class wpb_widget ends here
}
 
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
 
add_action( 'widgets_init', 'wpb_load_widget' );
//widgets end