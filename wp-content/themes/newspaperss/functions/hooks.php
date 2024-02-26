<?php

if (!function_exists('newspaperss_get_sidebar')) {
  /**
   * Display storefront sidebar
   *
   * @uses get_sidebar()
   * @since 1.0.0
   */
  function newspaperss_get_sidebar()
  {
    get_sidebar();
  }
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since newspaperss 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function newspaperss_front_page_template($template)
{
  return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'newspaperss_front_page_template');


/**
 * Link all post thumbnails to the post permalink.
 *
 * @param string $html          Post thumbnail HTML.
 * @param int    $post_id       Post ID.
 * @param int    $post_image_id Post image ID.
 * @return string Filtered post image HTML.
 */
function newspaperss_post_image_html($html, $post_id, $post_image_id)
{
  $html = '<a href="' . esc_url(get_permalink($post_id)) . '">' . $html . '</a>';
  return $html;
}
add_filter('post_thumbnail_html', 'newspaperss_post_image_html', 10, 3);

/**
 * Category list prin
 * @var $categories
 */
if (!function_exists('newspaperss_category_list')) :
  function newspaperss_category_list()
  {
    $categories = get_the_category();
    $separator = ' ';
    $output = '';
    if (!empty($categories)) {
      foreach ($categories as $category) {
        $output .=
          '<a class="cat-info-el" href="' . esc_url(get_category_link($category->term_id)) .
          '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'newspaperss'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
      }
      echo trim($output, $separator);
    }
  }
endif;

/**
 * Prints first category link and name
 */
if (!function_exists('newspaperss_firstcategory_link')) :
  function newspaperss_firstcategory_link()
  {
    $categories = get_the_category();
    if (!empty($categories)) {
      echo  '<a class="cat-info-el" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
    }
  }
endif;

/**
 * Prints first category link and name
 */
if (!function_exists('newspapersscarousel_firstcategory_link')) :
  function newspapersscarousel_firstcategory_link()
  {
    $categories = get_the_category();
    if (!empty($categories)) {
      echo  '<a class="hollow button secondary radius" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
    }
  }
endif;
/**
 * comments meta
 */
if (!function_exists('newspaperss_meta_comment')) :
  function newspaperss_meta_comment()
  {
    if (!post_password_required() && (comments_open() || get_comments_number())) {
      echo '<span class="comments-link">';
      /* translators: %s: post title */
      comments_popup_link(sprintf(wp_kses(__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'newspaperss'), array('span' => array('class' => array()))), get_the_title()));
      echo '</span>';
    }
  }
endif;


if (!function_exists('newspaperss_meta_tag')) :
  /**
   * Prints HTML with meta information for the tags .
   */
  function newspaperss_meta_tag()
  {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list();
      if ($tags_list) {
        echo '<span class="single-tag-text">';
        _e('Tagged:', 'newspaperss');
        echo '</span>';
        echo $tags_list;
      }
    }
  }
endif;

if (!function_exists('newspaperss_edit_link')) :
  /**
   * Prints HTML with meta information for the tags .
   */
  function newspaperss_edit_link()
  {
    edit_post_link(
      sprintf(
        /* translators: %s: Name of current post */
        esc_html__('Edit %s', 'newspaperss'),
        the_title('<span class="screen-reader-text">"', '"</span>', false)
      )
    );
  }
endif;

if (!function_exists('newspaperss_time_link')) :
  /**
   * Gets a nicely formatted string for the published date.
   */
  function newspaperss_time_link()
  {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
      $time_string,
      get_the_date(DATE_W3C),
      get_the_date(),
      get_the_modified_date(DATE_W3C),
      get_the_modified_date()
    );
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');


    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(
      /* translators: %s: post date */
      __('<span class="screen-reader-text">Posted on</span> %s', 'newspaperss'),
      '<a href="' . esc_url(get_month_link($archive_year, $archive_month)) . '" rel="bookmark">' . $time_string . '</a>'
    );
  }
endif;

/**
 * newspaperss gradient color set .
 */
if (!function_exists('newspaperss_gradient_color')) :

  function newspaperss_gradient_color()
  {
    if (is_page()) {
      $saved_palette = get_theme_mod('page_subheader_gradient', 'gradient4');
    } else {
      $saved_palette = get_theme_mod('subheader_post_gradient', 'gradient4');
    }

    if ('gradient1' == $saved_palette) {
      $background_gradient   = 'linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%)';
    }

    if ('gradient2' == $saved_palette) {
      $background_gradient   = 'linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%)';
    }
    if ('gradient3' == $saved_palette) {
      $background_gradient   = 'linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%)';
    }
    if ('gradient4' == $saved_palette) {
      $background_gradient   = 'radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%)';
    }
    if ('gradient5' == $saved_palette) {
      $background_gradient   = 'linear-gradient(to top, #09203f 0%, #537895 100%)';
    }
    if ('gradient6' == $saved_palette) {
      $background_gradient   = 'linear-gradient(to top, #f77062 0%, #fe5196 100%)';
    }
    if ('gradient7' == $saved_palette) {
      $background_gradient   = 'linear-gradient(-45deg, #f857a6, #ff5858)';
    }

    $styles = "background-image:{$background_gradient};";
    return $styles;
  }

endif;

// filters for get_the_archive_title

function newspaperss_archive_title($title)
{
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  }

  return $title;
}

add_filter('get_the_archive_title', 'newspaperss_archive_title');

/**
 * newspaperss Post Page subheader .
 */
if (!function_exists('newspaperss_subheader_post')) :
  function newspaperss_subheader_post()
  { ?>

    <div id="sub_banner" class="postpage_subheader">
      <div class="grid-container">
        <div class="grid-x grid-padding-x ">
          <div class="cell small-12 ">
            <div class="heade-content">
              <?php
              the_archive_title('<h1 class="text-center">', '</h1>');
              ?>
              <div class="breadcrumb-wraps center-conetent"><?php newspaperss_breadcrumb(); ?> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }
endif;

if (!function_exists('newspaperss_subheader_page') && (true == get_theme_mod('show_page_subheader', true))) :
  function newspaperss_subheader_page()
  { ?>

    <div id="sub_banner" class="sub_header_page">
      <div class="grid-container">
        <div class="grid-x grid-padding-x ">
          <div class="cell small-12 ">
            <div class="heade-content">
              <h1 class="text-center">
                <?php the_title(); ?>
              </h1>
            </div>
            <?php $sub_header_style = get_theme_mod('sub_header_page', 'img_subheader'); ?>
            <?php $page_id = get_queried_object_id(); ?>
            <?php if (('img_subheader' == $sub_header_style)) : ?>
              <?php
              // If a featured image is set, insert into layout and use Interchange
              // to select the optimal image size per named media query.
              if (has_post_thumbnail($page_id)) : ?>
                <div class="header-image-container" role="banner" data-interchange="[<?php echo esc_url(the_post_thumbnail_url('newspaperss-small')); ?>, small], [<?php echo esc_url(the_post_thumbnail_url('newspaperss-large')); ?>, medium], [<?php echo esc_url(the_post_thumbnail_url('newspaperss-xlarge')); ?>, large], [<?php echo esc_url(the_post_thumbnail_url('newspaperss-xlarge')); ?>, xlarge]">
                </div>
                <div class="overlay"></div>
              <?php else : ?>
                <?php if (is_customize_preview() && current_user_can('edit_theme_options')) : ?>
                  <button class="preview radius z-depth-2 button expanded">
                    <?php echo esc_attr__('For add Header Image => Page => Edit  and Set featured image', 'newspaperss') ?> </button>
                <?php endif; ?>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php }
endif;
/**
 * newspaperss Logo position .
 */

/*----------- Top bar social icon-----------*/
if (!function_exists('newspaperss_topbar_social')) :
  function newspaperss_topbar_social()
  { ?>
    <?php $social_icons_top = get_theme_mod('social_icons_top', ''); ?>
    <?php if (!empty($social_icons_top)) : ?>
      <div class="social-btns">

        <?php foreach ($social_icons_top as $row) : ?>
          <?php if (!empty($row['social_url'])) : ?>
            <a class="btn <?php echo esc_attr($row['social_icon']); ?>" <?php if (true == get_theme_mod('open_social_tab', false)) : ?>target="_blank" <?php endif; ?> href="<?php echo esc_url($row['social_url']); ?>">
              <i class="fa fa-<?php echo esc_attr($row['social_icon']); ?>"></i>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  <?php }
endif;
/*----------- sidebar layout -----------*/

if (!function_exists('newspaperss_sidebar_layout')) :
  function newspaperss_sidebar_layout()
  {
    $sidbar_position = get_theme_mod('sidbar_position', 'right');
    if ((!is_active_sidebar('right-sidebar') || 'full' == $sidbar_position)) {
      $siderbar = 'large-12 medium-12';
    } elseif (is_active_sidebar('right-sidebar') && ('right' == $sidbar_position)) {
      $siderbar = 'large-8';
    } elseif (is_active_sidebar('right-sidebar') && ('left' == $sidbar_position)) {
      $siderbar = 'large-8 large-order-2';
    }
    $siderbars = $siderbar;
    return $siderbars;
  }
endif;

/*----------- sidebar layout latest -----------*/

if (!function_exists('newspaperss_sidebar_layout_latest')) :
  function newspaperss_sidebar_layout_latest()
  {
    $sidbar_positionlatest = get_theme_mod('sidbar_position_latest', 'right');
    if ((!is_active_sidebar('right-sidebar') || 'full' == $sidbar_positionlatest)) {
      $siderbar = 'large-12 medium-12';
    } elseif (is_active_sidebar('right-sidebar') && ('right' == $sidbar_positionlatest)) {
      $siderbar = 'large-8';
    } elseif (is_active_sidebar('right-sidebar') && ('left' == $sidbar_positionlatest)) {
      $siderbar = 'large-8 large-order-2';
    }
    $siderbars = $siderbar;
    return $siderbars;
  }
endif;


/**
 * Enable Foundation responsive embeds for WP video embeds
 */
if (!function_exists('newspaperss_responsive_video_oembed_html')) :
  function newspaperss_responsive_video_oembed_html($html, $url, $attr, $post_id)
  {
    // Whitelist of oEmbed compatible sites that **ONLY** support video.
    // Cannot determine if embed is a video or not from sites that
    // support multiple embed types such as Facebook.
    // Official list can be found here https://codex.wordpress.org/Embeds
    $video_sites = array(
      'youtube', // first for performance
      'collegehumor',
      'dailymotion',
      'funnyordie',
      'ted',
      'videopress',
      'vimeo',
    );
    $is_video = false;
    // Determine if embed is a video
    foreach ($video_sites as $site) {
      // Match on `$html` instead of `$url` because of
      // shortened URLs like `youtu.be` will be missed
      if (strpos($html, $site)) {
        $is_video = true;
        break;
      }
    }
    // Process video embed
    if (true == $is_video) {
      // Find the `<iframe>`

      $class = 'responsive-embed widescreen'; // Foundation class
      // Wrap oEmbed markup in Foundation responsive embed
      return '<div class="' . esc_attr($class) . '">' . $html . '</div>';
    } else { // not a supported embed
      return $html;
    }
  }
  add_filter('embed_oembed_html', 'newspaperss_responsive_video_oembed_html', 10, 4);
endif;

/*----------- desktop menu -----------*/
if (!function_exists('newspaperss_logo_position')) :
  function newspaperss_logo_position()
  { ?>
    <div id="main-header" class="grid-x grid-padding-x grid-margin-y align-justify ">
      <!--  Logo -->
      <?php $logo_position = get_theme_mod('logo_position', 'logo-left'); ?>
      <div class="cell  align-self-middle <?php if ('logo-left' == $logo_position) : ?>auto medium-order-1 <?php elseif ($logo_position == 'logo-right') : ?>auto medium-order-2 text-right<?php else : ?> large-12 float-center logo-center <?php endif; ?> ">
        <div id="site-title">
          <?php the_custom_logo(); ?>
          <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
          </h1>
          <?php
          $description = get_bloginfo('description', 'display');
          if ($description || is_customize_preview()) : ?>
            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
          <?php endif; ?>
        </div>
      </div>
      <!-- /.End Of Logo -->
      <?php if (is_active_sidebar('sidebar-headeradvertising')) : ?>
        <div class="cell align-self-middle <?php if ('logo-left' == $logo_position) : ?> medium-order-2 large-8 <?php elseif ($logo_position == 'logo-right') : ?>large-8 medium-order-1 <?php else : ?> large-12 float-center logo-center  <?php endif; ?> ">
          <?php dynamic_sidebar('sidebar-headeradvertising'); ?>
        </div>
      <?php endif; ?>
    </div>
<?php }
endif;
