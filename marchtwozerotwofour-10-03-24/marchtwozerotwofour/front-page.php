<?php
get_header();
get_template_part("menu");
?>
<!-- carousel start -->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo esc_url( get_theme_mod( 'my_theme_carousel_image_1' ) ); ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo esc_url( get_theme_mod( 'my_theme_carousel_image_2' ) ); ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo esc_url( get_theme_mod( 'my_theme_carousel_image_3' ) ); ?>" class="d-block w-100" alt="...">
    </div>
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
<!-- news ticker start -->
<?php
$content = get_option('news_ticker_content');
if(strlen($content)){
   $news = "";
   echo '<marquee behavior="" direction="">';
   $lines = explode("\n", $content);
   // var_dump($lines);
   foreach($lines as $line){
      $news .= "<span class='newstick'>".$line . " </span>|";      
   }
   echo rtrim($news,"|");  
   echo '</marquee>';
}
?>
<!-- news ticker end -->
<div class="container">
   <div class="row">
      <div class="col-8">
         <!-- left bar -->
         <?php
         if (have_posts()) :
            while (have_posts()) :
               the_post();
               global $post;

               global $authordata;
               /*  echo "<pre>"; 
var_dump($authordata);
echo "</pre>"; */
               //loop content (template tags, html, etc)
         ?>
               <h1><span class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h1>
               <p><?php echo 'Author: ' . $authordata->display_name; ?> | <?php the_date()?> <?php the_time()?></p>
               <?php echo "<hr>";
               the_tags(); ?>
         <?php
               the_content();
            endwhile;
         endif;
// pagination
// Post Navigation Links
$prev_link = get_previous_posts_link( 'Previous ');
$next_link = get_next_posts_link( 'Next');

if ( $prev_link || $next_link ) : ?>
    <nav class="post-navigation">
        <div class="nav-links">
            <?php
            echo $prev_link;
            echo " | ";
            echo $next_link;
            ?>
        </div>
    </nav>
<?php endif;
// pagination end
         ?>
      </div>
      <!-- left bar -->
   
   <div class="col-4">
      <?php get_sidebar() ?>
   </div>
</div>
</div>

<pre>
<code>
<?php
/*  global $post; 
 print_r( $post ); */ //view all data stored in the $post arra
?>
   </code>
</pre>
<h1>you are using:</h1>
<?php
global $is_lynx, $is_edge, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
if ($is_lynx) {
   echo "You are using Lynx";
} elseif ($is_gecko) {
   echo "You are using Firefox";
} elseif ($is_IE) {
} elseif ($is_edge) {
   echo "You are using Edge";
} elseif ($is_IE) {
   echo "You are using Internet Explorer";
} elseif ($is_opera) {
   echo "You are using Opera";
} elseif ($is_NS4) {
   echo "You are using Netscape";
} elseif ($is_safari) {
   echo "You are using Safari";
} elseif ($is_chrome) {
   echo "You are using Chrome";
} elseif ($is_iphone) {
   echo "You are using an iPhone";
}
echo "<hr>";
if (wp_is_mobile()) {
   echo "You are viewing this website on a mobile device";
} else {
   echo "You are not on a mobile device";
}
?>
<?php get_footer(); //will add footer.php
?>