<?php
/*
Template Name: Page with No sidebar
*/
?>
<?php get_header(); ?>
<!--Call Sub Header-->

<div id="sub_banner" style="<?php echo esc_attr(newspaperss_gradient_color()); ?>">
  <div class="grid-container ">
    <div class="grid-x grid-padding-x ">
      <div class="cell small-12 ">
        <div class="heade-content">
          <h1 class="text-center">
            <?php the_title(); ?>
          </h1>
        </div>

        <?php
        // If a featured image is set, insert into layout and use Interchange
        // to select the optimal image size per named media query.
        if ( has_post_thumbnail( $post->ID ) ) : ?>
          <div  class="header-image-container" role="banner" data-interchange="[<?php echo esc_url(the_post_thumbnail_url('newspaperss-small')); ?>, small], [<?php echo esc_url(the_post_thumbnail_url('newspaperss-large')); ?>, medium], [<?php echo esc_url(the_post_thumbnail_url('newspaperss-xlarge')); ?>, large], [<?php echo esc_url(the_post_thumbnail_url('newspaperss-xlarge')); ?>, xlarge]" >
          </div>
          <div class="overlay"></div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<!--Content-->
<!--Content-->
<div id="content-page" >
  <div class="grid-container no-padding">
    <div class="grid-x grid-margin-x align-center">
      <div class="auto cell">
        <div class="page_content">
          <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
              <?php the_post();?>
              <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <div class="metadate">
                  <?php
                  edit_post_link(
                    sprintf(
                      /* translators: %s: Name of current post */
                      __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'newspaperss' ),
                      get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                  );
                  ?>
                </div>

              <div class="post_info_wrap">
                <?php the_content();
                wp_link_pages( array(
                  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'newspaperss' ) . '</span>',
                  'after'       => '</div>',
                  'link_before' => '<span>',
                  'link_after'  => '</span>',
                  'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'newspaperss' ) . ' </span>%',
                  'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                ?>

              </div>
            <?php endwhile ?>

          </div>
          <div class="comments_template">
            <?php if ( comments_open() || get_comments_number() ) {
              comments_template();
            }?>
          </div>
        <?php endif ;?>
        </div>
      </div>
      <!--PAGE END-->
    </div>
  </div>
</div>
<?php get_footer(); ?>
