<?php get_header(); ?>

<?php if (true == get_theme_mod('show_page_subheader', true)) : ?>
<!--Call Sub Header-->
<?php echo newspaperss_subheader_page(); ?>
<!--Content-->
<?php endif; ?>

<div id="content-page" <?php if (is_active_sidebar('right-sidebar')) : ?> class="content-page" <?php endif;?>>
  <div class="grid-container <?php if (!is_active_sidebar('right-sidebar') && ( false == get_theme_mod( 'newspaperss_body_fullwidth', false ))) : ?> no-paading <?php endif;?>">
    <div class="grid-x grid-margin-x align-center">
      <div class="cell large-auto small-12">
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
          <?php if ( comments_open() || get_comments_number() ) {?>
          <div class="comments_template">
            <?php
              comments_template();?>
          </div>
          <?php }?>
        <?php endif ;?>
        </div>
      </div>
      <!--PAGE END-->
      <?php get_template_part('sidebar'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
