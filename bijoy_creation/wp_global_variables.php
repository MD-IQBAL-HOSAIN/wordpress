<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h3>post data</h3>
<?php
global $post;
print_r( $post ); //view all data stored in the $post array
?>
<hr>
<?php
echo $post->post_title;
echo "<hr>";
echo get_permalink( $post->ID );
?>
<h3>author data</h3>
<?php
global $authordata;
print_r($authordata);//without loop no authordata
echo "<br>";
echo 'Author: ' .$authordata->display_name;
?>
<hr>
<?php
/*

Valid values for the $field parameter include:

    admin_color
    aim
    comment_shortcuts
    description
    display_name
    first_name
    ID
    jabber
    last_name
    nickname
    plugins_last_view
    plugins_per_page
    rich_editing
    syntax_highlighting
    user_activation_key
    user_description
    user_email
    user_firstname
    user_lastname
    user_level
    user_login
    user_nicename
    user_pass
    user_registered
    user_status
    user_url
    yim
    */
echo $post->post_author;
echo "<br>";
// echo 'Author: ' .get_the_author_meta( $post->post_author );
var_dump(get_the_author_meta('display_name', $post->post_author ));
var_dump(get_the_author_meta('user_email', $post->post_author ))
?>
<h3>User Data</h3>
<?php
global $current_user;
echo $current_user->display_name;
?>
<h3>Environment data</h3>
<?php
global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4,
$is_safari, $is_chrome, $is_iphone;
if ( $is_lynx ) {
echo "You are using Lynx";
}elseif ( $is_gecko ) {
echo "You are using Firefox";
}elseif ( $is_IE ) {
echo "You are using Internet Explorer";
}elseif ( $is_opera ) {
echo "You are using Opera";
}elseif ( $is_NS4 ) {
echo "You are using Netscape";
}elseif ( $is_safari ) {
echo "You are using Safari";
}elseif ( $is_chrome ) {
echo "You are using Chrome";
}elseif ( $is_iphone ) {
echo "You are using an iPhone";
}
?>
<hr>
<?php
if ( wp_is_mobile() ) {
    echo "You are viewing this website on a mobile device";
}else{
    echo "You are not on a mobile device";
    }
    ?>
    <hr>
    <?php
global $is_apache, $is_IIS;
if ( $is_apache ) {
echo "web server is running Apache";
}elseif ( $is_IIS ) {
echo "web server is running IIS";
}
?>




</body>
</html>