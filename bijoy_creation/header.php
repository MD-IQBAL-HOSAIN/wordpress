<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/footer.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<?php wp_head(); ?>
</head>

<div class="site row container-fluid d-flex" style="background-color: darkcyan; color: white; padding: 5px;" id="page">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'newspaper-theme'); ?></a>
	

	<div class="col-md-4 d-flex-right">
		<!-- Header icon  -->
		<!-- <img src="<?php //echo get_template_directory_uri( ); ?>/assets/img/logo6.png" class="img-thumbnail" alt="..." style="background-color: darkcyan; height: 100px; width: 150px" > -->
		<img src="<?php echo get_header_image();?>" alt="..." height="100px;" width="200px;">
	</div>

	<div class="col-md-8 d-flex-right">
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				else :
				?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
				endif;
				$newspaper_theme_description = get_bloginfo('description', 'display');
				if ($newspaper_theme_description || is_customize_preview()) :
				?>
					<p class="site-description"><?php echo $newspaper_theme_description; ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</header>
		
	</div>
	<?php get_template_part("nav"); ?>
	

</div>

<body translate="no" <?php body_class(); ?>>