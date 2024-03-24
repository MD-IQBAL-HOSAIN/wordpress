<style>
    * {
  box-sizing: border-box;
}

@-webkit-keyframes ticker {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    visibility: visible;
  }
  100% {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}
@keyframes ticker {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    visibility: visible;
  }
  100% {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}
.ticker-wrap {
  position: fixed;
  bottom: 0;
  width: 100%;
  overflow: hidden;
  height: 4rem;
  background-color: rgba(200, 200, 200, 0.9);
  padding-left: 100%;
  box-sizing: content-box;
  z-index: 10;
}
.ticker-wrap .ticker {
  display: inline-block;
  height: 4rem;
  line-height: 4rem;
  white-space: nowrap;
  padding-right: 100%;
  box-sizing: content-box;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-name: ticker;
  animation-name: ticker;
  -webkit-animation-duration: 30s;
  animation-duration: 30s;
}
.ticker-wrap .ticker__item {
  display: inline-block;
  padding: 0 2rem;
  font-size: 2rem;
  color: white;
}

body {
  padding-bottom: 5rem;
}

h1, h2, p {
  padding: 0 5%;
}

/* latest transform speed  */

  .ticker-wrap .ticker {
    /* Add vendor prefixes for wider browser support */
    animation: ticker 60s linear infinite; /* Adjust the duration (20s) to control the speed */
  }

  @keyframes ticker {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-100%);
    }
  }
</style>
<!--  -->
<?php
/*
$enable_newsticker = get_option('mytheme_enable_newsticker', false);
// $newsticker_content = get_option('mytheme_newsticker_content', '');

if ($enable_newsticker && !empty($newsticker_content)) {
    
$lines = explode("\n", $newsticker_content);
    ?>
    <div class="ticker-wrap">
        <div class="ticker">
<?php
foreach($lines as $line){
    ?>
    <div class="ticker__item"><a href="#"><?= wp_kses_post($line) ?></a></div>
    <?php
 }
?>
</div>
</div>
    <?php
} 
*/

$args = array(
  'post_type' => 'post',
  'posts_per_page' => 3, // Number of posts to display in the newsticker
  'orderby' => 'date',
  'order' => 'DESC',
);
$recent_posts = new WP_Query($args);

if ($recent_posts->have_posts()) :
?>
  <div class="ticker-wrap">
      <div class="ticker">
          <?php
          while ($recent_posts->have_posts()) : $recent_posts->the_post();
          ?>
              <div class="ticker__item">
                  <a href="<?php the_permalink(); ?>">
                      <li>
                          <?php the_title(); ?>
                      </li>
                  </a>
              </div>
          <?php endwhile; ?>
      </div>
  </div>
<?php
  wp_reset_postdata(); // Reset post data
endif;

?>
