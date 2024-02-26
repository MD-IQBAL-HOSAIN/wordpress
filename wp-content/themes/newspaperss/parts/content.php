<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newspaperss
 */

 if ( is_front_page() ):
   $layout_page_latest = get_theme_mod('layout_page_latest','content3');
   get_template_part('layouts/part', ''.$layout_page_latest .'');
else :
 $blogpost_style = get_theme_mod('layout_page__gen','content3');
 get_template_part('layouts/part', ''.$blogpost_style .'');
 endif;

?>
