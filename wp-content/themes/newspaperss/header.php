<?php

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if (is_singular() && pings_open(get_queried_object())) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#main-content-sticky">
		<?php _e('Skip to content', 'newspaperss'); ?>
	</a>

	<div id="wrapper" class="grid-container no-padding small-full <?php if (true == get_theme_mod('newspaperss_body_fullwidth', false)) : ?> full <?php endif; ?> z-depth-2">
		<!-- Site HEADER -->
		<?php if (true == get_theme_mod('disable_top_header', true)) : ?>
			<?php get_template_part('header/top', 'bar'); ?>
		<?php endif; ?>
		<header id="header-top" class="header-area">
			<?php get_template_part('header/site', 'branding'); ?>
			<!-- Mobile Menu -->
			<?php get_template_part('header/off', 'canvas'); ?>
			<!-- Mobile Menu -->
			<!-- Start Of bottom Head -->
			<div id="header-bottom" class="head-bottom-area animated" <?php if (true == get_theme_mod('disable_sticky_menu', true)) : ?> data-sticky data-sticky-on="large" data-options="marginTop:0;" style="width:100%" data-top-anchor="main-content-sticky" <?php endif; ?>>
				<div class="grid-container">
					<div class="top-bar main-menu no-js" id="the-menu">
						<?php $newspaperss_mainmenu_position = get_theme_mod('newspaperss_mainmenu_position', 'left'); ?>
						<div class="menu-position <?php echo esc_attr($newspaperss_mainmenu_position); ?>" data-magellan data-magellan-top-offset="60">
							<?php if (has_nav_menu('primary')) : ?>
								<?php newspaperss_top_nav(); ?>
							<?php else : ?>
								<ul class="horizontal menu  desktop-menu dropdown">
									<li id="add-menu" class="menu-item">
										<a href=" <?php echo esc_url(admin_url('nav-menus.php')); ?>  ">
											<?php echo esc_html__('Add a Primary Menu', 'newspaperss'); ?>
										</a>
									</li>
								</ul>
							<?php endif; ?>
						</div>
						<div class="search-wrap" open-search>
							<?php get_search_form(); ?>
							<span class="eks" close-search></span>
							<i class="fa fa-search"></i>
						</div>
					</div>
					<!--/ #navmenu-->
				</div>
			</div>
			<!-- Start Of bottom Head -->
		</header>
		<div id="main-content-sticky">