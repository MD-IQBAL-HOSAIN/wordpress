
<?php
wp_tag_cloud();
get_search_form();
wp_list_pages();
echo "<h3>Categories</h3>";
wp_list_categories();
?>
<hr>
<?php
    // Display the list of categories
    wp_list_categories(array(
        'title_li' => 'Categories', // Don't display the title
        'orderby' => 'name', // Order by category name
    ));
?>