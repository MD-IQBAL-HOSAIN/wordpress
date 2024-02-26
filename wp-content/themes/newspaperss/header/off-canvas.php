<!-- Mobile Menu -->

<div class="off-canvas-wrapper " >
  <div class="reveal reveal-menu position-right off-canvas animated " id="mobile-menu-newspaperss" data-reveal >
    <button class="reveal-b-close " aria-label="Close menu" type="button" data-close>
      <i class="fa fa-window-close" aria-hidden="true"></i>
    </button>
    <div class="multilevel-offcanvas " >
       <?php newspaperss_off_canvas_nav(); ?>
    </div>
  </div>

  <div class="mobile-menu off-canvas-content" data-off-canvas-content >
    <?php if ( is_active_sidebar( 'sidebar-headeradvertising' ) ) :?>
     <div class="float-center">
        <?php dynamic_sidebar( 'sidebar-headeradvertising' );?>
     </div>
    <?php endif;?>
    <div class="title-bar no-js "  data-hide-for="large" data-sticky data-margin-top="0" data-top-anchor="main-content-sticky" data-sticky-on="small"  >
      <div class="title-bar-left ">
        <div class="logo title-bar-title ">
          <?php the_custom_logo();?>
          <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          </h1>
          <?php
            $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
              <?php endif; ?>
        </div>
      </div>
      <div class="top-bar-right">
        <div class="title-bar-right nav-bar">
          <li>
            <button class="offcanvas-trigger" type="button" data-open="mobile-menu-newspaperss">

              <div class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
              </div>
            </button>
          </li>
        </div>
      </div>
    </div>
  </div>
</div>
