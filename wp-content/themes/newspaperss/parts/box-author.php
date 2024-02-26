<?php
/**
 *
 * Displays Author Box
 *
 * @package newspaperss
 *
 * @since newspaperss 1.0.0
 */
;?>


<div class="single-box-author">
  <div class="grid-x grid-padding-x">
    <div class="cell large-3 medium-3 small-12 align-self-middle medium-text-left text-center">
      <div class="author-thumb-wrap">
        <?php echo get_avatar(get_the_author_meta('ID'), '140'); ?>
      </div>
    </div>
    <div class="cell large-9 medium-9 small-12 align-self-middle medium-text-left text-center ">
      <div class="author-content-wrap">
        <div class="author-title">
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
            <h3><?php echo get_the_author();?></h3>
          </a>
        </div>
        <div class="author-description">
          <?php the_author_meta( 'description' ); ?>
        </div>
        <div class="newspaperss-author-bttom-wrap">
          <div class="author-links">
            <a class="bubbly-button" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
              <?php printf( esc_html__( 'View all posts', 'newspaperss' ), esc_attr( get_the_author() ) ); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
