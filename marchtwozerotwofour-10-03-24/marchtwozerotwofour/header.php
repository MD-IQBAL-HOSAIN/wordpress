<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
    <!-- head start -->
    <?php wp_head(); ?>
    <!-- head end -->
</head>
<body <?php body_class(); ?> style="background-color: <?php echo __(get_theme_mod("my_theme_background_color")) ?>;">
<h1><?php echo get_bloginfo( 'title', 'display' ); ?></h1>
<h1><?php echo get_bloginfo( 'description', 'display' ); ?></h1>