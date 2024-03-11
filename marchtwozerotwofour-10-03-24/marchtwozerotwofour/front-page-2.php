<?php get_header();//will add header.php?>
<?php get_template_part("menu"); ?>
    <?php //echo get_stylesheet_uri(); ?>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <!--loop  -->
                <?php 
                $args = 'posts_per_page=15';
                // $args = 'posts_per_page=5&author_name=admin';
                // $args = [
                //     'posts_per_page'=>5,
                //     'author_name' => 'admin'
                // ];
                // $args = [
                //     'posts_per_page'=>15,
                //     'author' => '-12'
                // ];
                // $args = [
                //     'posts_per_page'=>15,
                //     'author' => '1,5,12,11'
                // ];
                // $args = [
                //     'posts_per_page'=>15,
                //     'cat' => '2,6'
                // ];
                // $args = ['p'=>59];
                // $args = ['page_id'=>18];
                // $args = ['has_password'=>true];
                // $args = ['post_type'=>'page'];
                // $args = ['post_type'=>'page'];
                // $args = ['post_status'=>'draft'];
$myPosts = new WP_Query($args);
 while ( $myPosts->have_posts() ) : $myPosts->the_post();
?> 
<!-- content -->
<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p>Written by <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author() ?></a>, Published at <?php the_date()?>, <?php the_time() ?>, listed in <?php the_category() ?></p>
<div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </a>
            </div>

            <?php the_excerpt(); ?>
<hr>
 <?php endwhile; ?> 
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
