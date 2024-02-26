<?php

/**
 * Welcome Screen Class
 */
class newspaperss_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {
		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'newspaperss_welcome_register_menu' ) );
		/* activation notice */
		add_action( 'admin_enqueue_scripts', array( $this, 'newspaperss_welcome_style_and_scripts' ) );

		/* load welcome screen */
		add_action( 'newspaperss_welcome', array( $this, 'newspaperss_welcome_getting_started' ), 10 );
		add_action( 'newspaperss_welcome', array( $this, 'newspaperss_welcome_actions_required' ), 20 );
		add_action( 'newspaperss_welcome', array( $this, 'newspaperss_welcome_support' ), 40 );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'newspaperss_activation_admin_notice' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function newspaperss_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET[ 'activated' ] ) ) {
			add_action( 'admin_notices', array( $this, 'newspaperss_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function newspaperss_welcome_admin_notice() {
		// Get Theme Details from style.css
		$theme = wp_get_theme();
		?>
		<div class="updated notice is-dismissible">
			<p><?php printf( esc_html( 'Welcome! Thank you for choosing %1s! To fully take advantage of the best our theme can offer please make sure you visit our %2s.', 'newspaperss' ), $theme->get( 'Name' ), '<a href="' . esc_url( admin_url( 'themes.php?page=newspaperss-welcome' ) ) . '">' . esc_html( 'welcome page', 'newspaperss' ) . '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=newspaperss-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php printf( esc_html( 'Get started with %1s', 'newspaperss' ), $theme->get( 'Name' ) ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 */
	public function newspaperss_welcome_register_menu() {
		// Get Theme Details from style.css
		$theme = wp_get_theme();
		add_theme_page( 'About newspaperss', sprintf( __( 'About %s', 'newspaperss' ), $theme->get( 'Name' ) ), 'activate_plugins', 'newspaperss-welcome', array( $this, 'newspaperss_welcome_screen' ) );
	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function newspaperss_welcome_style_and_scripts( $hook_suffix ) {
		if ( 'appearance_page_newspaperss-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'newspaperss-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );
			wp_enqueue_script( 'newspaperss-welcome-screen-js', get_template_directory_uri() . '/inc/welcome/js/welcome.js', array( 'jquery' ) );
		}
	}

	/**
	 * Welcome screen content
	 */
	public function newspaperss_welcome_screen() {
		?>

		<ul class="newspaperss-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started', 'newspaperss' ); ?></a></li>
			<li role="presentation" class="newspaperss-tab newspaperss-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions recommended', 'newspaperss' ); ?></a></li>
			<li role="presentation"><a href="#support" aria-controls="support" role="tab" data-toggle="tab"><?php esc_html_e( 'Support Us', 'newspaperss' ); ?></a></li>
		</ul>

		<div class="newspaperss-tab-content">

		<?php do_action( 'newspaperss_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 */
	public function newspaperss_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/welcome/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 */
	public function newspaperss_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/welcome/sections/actions-required.php' );
	}

	/**
	 * Contribute
	 */


	/**
	 * Support
	 */
	public function newspaperss_welcome_support() {
		require_once( get_template_directory() . '/inc/welcome/sections/support.php' );
	}

}

$GLOBALS[ 'newspaperss_Welcome' ] = new newspaperss_Welcome();
