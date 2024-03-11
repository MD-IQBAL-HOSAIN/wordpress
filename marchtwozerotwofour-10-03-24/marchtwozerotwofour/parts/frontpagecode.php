<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Notice</h3>
    <marquee behavior="" direction="">
    <?php
$args = array(
	'post_type'      => 'notice_post',
	'posts_per_page' => 10,
);
$loop = new WP_Query($args);
while ( $loop->have_posts() ) {
	$loop->the_post();
	?>
<a href="<?php the_permalink() ?>"><?php the_title() ?></a> |
    
	<?php
}

?>
</marquee>
<?php

?>
</body>
</html>

