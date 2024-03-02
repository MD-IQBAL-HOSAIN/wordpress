<?php get_header();//will add header.php?>
<?php get_template_part("menu"); ?>
    <?php //echo get_stylesheet_uri(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-info">
                <!--loop  -->
                <?php 
 if ( have_posts() ) :
 while ( have_posts() ) : the_post(); 
 //loop content (template tags, html, etc)
?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>-<?php the_author() ?></a></h2>

<?php
/*  echo "<a href='".the_permalink()."'><h1 class='post-title'>";
 the_title();
 echo " - ";
 the_author();
 echo "</h1></a>"; */
 echo "<br>";
 the_content();
 echo "<hr>";

endwhile;
 endif;
?>

                <!-- lop ends  -->
                <!-- comment -->
                <?php //comment_form(); ?>
                <hr>
                <?php
// Check if comments are open or we have at least one comment.
if (comments_open() || get_comments_number()) {
    comments_template();//will add comments.php
}
?>
                <!-- comment end -->
            </div>
            <div class="col-12">
                <?php get_sidebar();//will add sidebar.php?>
                <hr>
                <?php get_template_part("home-sidebar");?>
            </div>
        </div>

</div>
<?php get_footer();//will add footer.php?>
