<?php

/**
 * Getting started template
 */

?>
<?php $theme = wp_get_theme(); ?>

<div id="getting_started" class="newspaperss-tab-pane active">

	<div class="newspaperss-tab-pane-center">

		<h1 class="newspaperss-welcome-title"><?php printf(esc_html__('Welcome to %s!', 'newspaperss'), $theme->get('Name')); ?></h1>

	</div>

	<hr />
	<div class="newspaperss-tab-pane-half">
		<h1><?php esc_html_e('Need more details?', 'newspaperss'); ?></h1>

		<p><?php printf(esc_html__('Please check our full documentation for detailed information on how to use %s.', 'newspaperss'), 'newspaperss'); ?></p>

		<p>
			<a target="_blank" href="<?php echo esc_url('https://silkthemes.com/newspaperss-demo/documentation/'); ?>" class="button button-primary"><?php printf(esc_html__('%s documentation', 'newspaperss'), 'Newspaperss'); ?></a>
		</p>
	</div>

	<div class="newspaperss-tab-pane-half">
		<h1><?php esc_html_e('Go to the Customizer', 'newspaperss'); ?></h1>

		<p><?php echo esc_html__('Using the WordPress Customizer you can easily customize every aspect of the theme.', 'newspaperss'); ?></p>

		<p>
			<a href="<?php echo esc_url(wp_customize_url()); ?>" class="button button-primary"><?php printf(esc_html__('Start Customizing %s', 'newspaperss'), 'Newspaperss'); ?></a>
		</p>
	</div>

	<div class="newspaperss-tab-pane-center upgradenews">
		<h1><?php esc_html_e('Newspaperss Pro', 'newspaperss'); ?></h1>
		<p>
			<a target="_blank" href="<?php echo esc_url('https://silkthemes.com/newspaperss-pro/?utm_source=Upgrade+To+Pro&utm_medium=Theme+Dashboard&utm_campaign=Upgrade+To+Pro&utm_id=upgradetopro#xs_pricing_6'); ?>" class="button-error  button-upsell"><?php printf(esc_html__('Upgrade To Pro', 'newspaperss')); ?></a>
		</p>
	</div>

	<div class="newspaperss-clear"></div>

</div>