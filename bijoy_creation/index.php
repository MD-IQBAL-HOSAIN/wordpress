<?php get_header() ?>

<!-- news ticker start -->
<?php
get_template_part("newsticker");
?>
<!-- news ticker end -->

<!-- carousel start -->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators data-bs-interval='1000'">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active data-bs-interval='1000'" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="active data-bs-interval='1000'"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" class="active data-bs-interval='1000'"></button>
  </div>
  <div class="carousel-inner data-bs-interval='1000'">
    <?php
    $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'post_status'    => 'publish', // Only retrieve published posts
      'ignore_sticky_posts' => true // Ignore sticky posts
    );

    $query = new WP_Query($args);
    $counter = 0;
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $counter++;
    ?>
        <div class="carousel-item <?php echo ($counter == 1) ? 'active' : ''; ?>" style="height: 400px;">
          <img src="<?php echo the_post_thumbnail_url(); ?>" class="d-block w-100" alt="...">

          <div class="carousel-caption d-none d-md-block">
            <h1><?php the_title(); ?></h1>
            <h5>written by <?php the_author(); ?> at <?php the_date(); ?> <?php the_time(); ?></h5>
            <!-- <p>Some representative placeholder content for the first slide.</p> -->
          </div>

        </div>
    <?php
      }
    } else {
      // no posts found
      echo 'No posts found';
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- carousel end -->

<div class="container">
  <hr>
  <hr>
  <div class="row">
    <div class="col-9">
      <?php
      // 
      // $myPosts = new WP_Query( 'posts_per_page=20' );
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          //loop content (template tags, html, etc)
      ?>

          <div class="row">
            <div class="col-4 p-3">
              <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
            </div>
            <div class="col-8">
              <a href="<?php the_permalink() ?>">
                <h3><?php the_title(); ?></h3>
              </a>
              written by <?php the_author(); ?> at <?php the_date(); ?> <?php the_time(); ?>
              <br>
              Category:<?php the_category(); ?>
              <h6>Post ID: <?php the_ID(); ?></h6>
              <p><?php the_tags(); ?></p>

              <?php if (is_home()) { ?>
                <p><?php the_excerpt(); ?></p>
              <?php } else { ?>
                <p><?php the_content(); ?></p>
              <?php } ?>
              <?php edit_post_link() ?>
              <hr>
              <div>
                <?php
                // comment_form()
                comments_template();
                ?>
              </div>

            </div>
          </div>
      <?php
        endwhile;
      endif;
      ?>
      <!-- previous move -->
      <div>
        <div style="background-color: darkcyan; color: white; text-align:center; padding: 15px;" class="nav-previous alignleft">
          <?php previous_posts_link('Previous posts'); ?>
        </div>
        <div style="background-color: darkcyan; color: white; text-align:center; padding: 15px;" class="nav-next alignright">
          <?php next_posts_link('Next Posts'); ?>
        </div>
      </div>
      <!-- next move -->
    </div>
    <div class="col-3">
      <div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
        <h3><b>Sidebar</b></h3>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>

</div>
<?php get_footer() ?>