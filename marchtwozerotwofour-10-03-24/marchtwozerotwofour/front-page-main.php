<?php get_header();//will add header.php?>
<?php get_template_part("menu"); ?>
    <?php //echo get_stylesheet_uri(); ?>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <!--loop  -->
                <?php 
 if ( have_posts() ) :
 while ( have_posts() ) : the_post(); 
 //loop content (template tags, html, etc)
?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p>Written by <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author() ?></a>, Published at <?php the_date()?>, <?php the_time() ?>, listed in <?php the_category() ?></p>
<div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </a>
            </div>
<?php
/*  echo "<a href='".the_permalink()."'><h1 class='post-title'>";
 the_title();
 echo " - ";
 the_author();
 echo "</h1></a>"; */
 echo "<br>";
 if(is_home()){
    the_excerpt();
 }
 else{
    the_content();
 }

 echo "<hr>";

endwhile;
 endif;
?>
                <!-- lop ends  -->
            </div>
            <div class="col-3">
                <?php get_sidebar();//will add sidebar.php?>
                <hr>
                <?php get_template_part("home-sidebar");?>
            </div>
        </div>

</div>
<?php get_footer();//will add footer.php?>
