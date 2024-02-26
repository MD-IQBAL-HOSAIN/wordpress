<?php
/*
Template Name: Page for elementor
*/
?>
<?php get_header(); ?>


<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <?php the_content(); ?>
    <?php endwhile ?>
  <?php endif; ?>
  <!--PAGE END-->

    </div>
    <?php get_footer(); ?>