<?php
get_search_form();
?>
<hr>
<?php
    // Display the list of categories
    wp_list_categories(array(
        'title_li' => 'Categories', // Don't display the title
        'orderby' => 'name', // Order by category name
    ));
?>