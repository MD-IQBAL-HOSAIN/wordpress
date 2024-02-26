<?php get_header(); ?>

<?php if (true == get_theme_mod('on_of_postpagesubhead', true)) : ?>
  <!--Call Sub Header-->
  <?php newspaperss_subheader_post();?>
  <!--Call Sub Header-->
<?php endif; ?>

  <div id="blog-content">
    <div class="grid-container">
      <div class="grid-x grid-padding-x align-center <?php if ( !is_active_sidebar( 'right-sidebar' ) ){ ?> no-left-padding  <?php }?>">
        <div class="cell  small-12 margin-vertical-1 <?php echo esc_attr(newspaperss_sidebar_layout());?>">
          <div class="lates-post-blog lates-post-blogbig <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?> margin-horizontal <?php endif;?> "  >

            <?php if ( have_posts() ) : ?>

              <?php /* Start the Loop */ ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <?php
                /*
                * Include the Post-Format-specific template for the content.
                * If newspaperss want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
                get_template_part( 'parts/content', get_post_format() );
                ?>

              <?php endwhile; ?>

              <?php the_posts_pagination(); ?>

            <?php else : ?>

              <?php get_template_part( 'parts/content', 'none' ); ?>

            <?php endif; ?>
          </div><!--POST END-->
        </div>
        <?php $sidbar_position = get_theme_mod( 'sidbar_position', 'right' );?>
        <?php if ( 'full' !== $sidbar_position) : ?>
      <?php get_template_part('sidebar'); ?>
    <?php endif;?>
        <!--sidebar END-->
      </div>
    </div>
  </div><!--container END-->


<?php get_footer(); ?>
