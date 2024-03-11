<?php
// Define arguments for wp_nav_menu
$menu_args = array(
    'theme_location' => 'primary-menu', // Change 'primary-menu' to your registered theme location.
      
);

// Display the menu
wp_nav_menu($menu_args);
?>