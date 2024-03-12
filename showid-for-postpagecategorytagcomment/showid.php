<?php
/*
Plugin Name: ShowID for Post/Page/Category/Tag/Comment
Plugin URI: http://ounziw.com/2010/02/05/showid/
Description: This plugin shows post/page/category/tag/comment/media/user IDs on admin's edit post/page/category/tag/commentmedia/user pages. You can see the IDs when you visit an edit post/page/category/tag/comment/media/user page. This plugin requires WP3.9 or later.
Version: 2.5
Author: Fumito Mizuno
Author URI: http://ounziw.com/
License: GPL ver.2 or later
 */

function showid_always_showid() {
?>
<style type="text/css">div.row-actions{visibility:visible !important;}</style>
<?php
}
add_action( 'admin_head', 'showid_always_showid' );

function showid_userid_add($actions,$user_object) {
    if( isset( $actions['edit'] ) ) {
        $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $user_object->ID ) . '</span>' . " | " . $actions['edit'];
    }
    return $actions;
}
add_filter( 'user_row_actions', 'showid_userid_add', '10', '2' );

function showid_mediaid_add($actions,$post) {
    if( isset( $actions['edit'] ) ) {
        $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $post->ID ) . '</span>' . " | " . $actions['edit'];
    }
    return $actions;
}
add_filter( 'media_row_actions', 'showid_mediaid_add', '10', '2' );

function showid_link_catid_add($actions,$category) {
    if( isset( $actions['edit'] ) ) {
        $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $category->term_id ) . '</span>' . " | " . $actions['edit'];
    }
    return $actions;
}
add_filter( 'link_cat_row_actions', 'showid_link_catid_add', '10', '2' );

function showid_postid_show($actions,$post) {
    if ( current_user_can( 'edit_posts' ) ) {
        if( isset( $actions['edit'] ) ) {
            $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $post->ID ) . '</span>' . " | " . $actions['edit'];
        }
    }
    return $actions;
}
add_filter( 'post_row_actions', 'showid_postid_show', '10', '2' );

function showid_pageid_show($actions,$page) {
    if ( current_user_can( 'edit_pages' ) ) {
        if( isset( $actions['edit'] ) ) {
            $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $page->ID ) . '</span>' . " | " . $actions['edit'];
        }
    }
    return $actions;
}
add_filter( 'page_row_actions', 'showid_pageid_show', '10', '2' );

function showid_catid_show($actions,$category) {
    if ( current_user_can( 'manage_categories' ) ) {
        if( isset( $actions['edit'] ) ) {
            $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval ( $category->term_id ) . '</span>' . " | " . $actions['edit'];
        }
    }
    return $actions;
}
add_filter( 'cat_row_actions', 'showid_catid_show', '10', '2' );

function showid_tagid_show($actions,$tag) {
    if ( current_user_can( 'edit_posts' ) ) {
        if( isset( $actions['edit'] ) ) {
            $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $tag->term_id ) . '</span>' . " | " . $actions['edit'];
        }
    }
    return $actions;
}
add_filter( 'tag_row_actions', 'showid_tagid_show', '10', '2' );

function showid_commentid_show($actions,$comment) {
    if ( current_user_can( 'moderate_comments' ) ) {
        if( isset( $actions['edit'] ) ) {
            $actions['edit'] = '<span class="wp-ui-text-primary">' . "ID:" . intval( $comment->comment_ID ) . '</span>' . " | " . $actions['edit'];
        }
    }
    return $actions;
}
add_filter( 'comment_row_actions', 'showid_commentid_show', '10', '2' );
