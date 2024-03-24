<?php
//https://developer.wordpress.org/reference/classes/wp_query/
// $myPosts = new WP_Query( 'posts_per_page=5' );
// $myPosts = new WP_Query( 'posts_per_page=20' );
// $myPosts = new WP_Query( ['author'=>1]);
/* $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
$myPosts = new WP_Query( [
    'author'=>'1,5,4,10',
    'posts_per_page'=>10,
    'paged'=>$paged
]); */
// $myPosts = new WP_Query( ['author_name'=>"lipi"]);
// $myPosts = new WP_Query( ['cat'=>"11",'posts_per_page'=>20,]);
// $myPosts = new WP_Query( ['category_name'=>"sports",'posts_per_page'=>20,]);
// $myPosts = new WP_Query( [
//     'post_type' => 'post',
//     'comment_count' => ['value'=>1,'compare'=>'>=']
// ]);
//CUSTOM POST QUERY
// $myPosts = new WP_Query( ['posts_per_page'=>20,'order'=>'ASC','post_type' => 'notice']);
// $myPosts = new WP_Query( ['posts_per_page'=>20,'order'=>'ASC']);
// $myPosts = new WP_Query( ['posts_per_page'=>20,'orderby'=>'rand']);
// $myPosts = new WP_Query( 'p=311' );

// $temp = $wp_query;
// $wp_query= null;
// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
// $wp_query = new WP_Query( 'posts_per_page=5&paged='.$paged );
/*
while ( $myPosts->have_posts() )
: $myPosts->the_post();
?>
<a href="<?php the_permalink() ?>"><?php the_title() ?></a> by  -  <?php the_author()?> <br>
<?php endwhile; */?>


<?php
while(have_posts()){
    the_post();
    ?>
<a href="<?php the_permalink() ?>"><?php the_title() ?></a> by  -  <?php the_author()?> <br>
    <?php
}
?>
<hr>
<h3>single post retrieve with get_post example, IDnumber: 195  post</h3>
<hr>
<?php
$my_id = 195;
$myPost = get_post( $my_id );
echo 'Post Title: ' .$myPost->post_title .'<br />';
echo 'Post Content: ' .$myPost->post_content .'<br />';
?>

<hr>
<h1>Mr. MAngoes post</h1>
<?php
$my_id = 193;
$myPost=get_post( $my_id );
setup_postdata( $myPost );
the_title();
the_content();
?>