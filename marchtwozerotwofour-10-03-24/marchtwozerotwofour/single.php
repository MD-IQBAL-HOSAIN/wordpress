<?php get_header();//will add header.php?>
<?php get_template_part("menu"); ?>
    <?php //echo get_stylesheet_uri(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-danger">
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

  //related post start
  $tags = wp_get_post_terms( get_the_ID() );
  if ( $tags ) {
     echo 'Related Posts';
     $tagcount = count( $tags ); 
     for ( $i = 0; $i < $tagcount; $i++ ) {
     $tagIDs[$i] = $tags[$i]->term_id;
     }
     $args=array(
     'tag__in' => $tagIDs,
     'post__not_in' => array( $post->ID ), 
     'posts_per_page' => 5,
     'ignore_sticky_posts' => 1 
     ); 
     $relatedPosts = new WP_Query( $args );
     if( $relatedPosts->have_posts() ) {
     //loop through related posts based on the tag
     while ( $relatedPosts->have_posts() ) : 
     $relatedPosts->the_post(); ?>
     <p><a href="<?php the_permalink(); ?>">
     <?php the_title(); ?></a></p> 
     <?php
     endwhile;
     } 
     }//related post end

endwhile;
 endif;
?>

                <!-- lop ends  -->
                <hr>
                <h3>Post LINKS: </h3>
                <?php
    echo previous_post_link();;
    echo " | ";
    echo next_post_link();
                ?>
                <hr>
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
