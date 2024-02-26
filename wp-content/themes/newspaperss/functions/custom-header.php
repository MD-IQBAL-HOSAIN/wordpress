<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage newspaperss
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newspaperss_header_style()
 */
function newspaperss_custom_header_setup() {

	/**
	 * Filter Newspaperssn custom-header support arguments.
	 *
	 * @since Newspaperss 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height            Flex support for height of header.
	 * }
	 */
	add_theme_support(
		'custom-header', apply_filters(
			'newspaperss_custom_header_args', array(
				'width'            => 2000,
				'height'           => 400,
				'flex-height'      => true,
				'wp-head-callback' => 'newspaperss_header_style',
			)
		)
	);

}
add_action( 'after_setup_theme', 'newspaperss_custom_header_setup' );

if ( ! function_exists( 'newspaperss_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see newspaperss_custom_header_setup().
	 */
	function newspaperss_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail.
		// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style id="newspaperss-custom-header-styles" type="text/css">
		<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		#site-title h1.site-title a,
		#site-title p.site-description,
		.site-title a,
		.logo.title-bar-title p
 	{
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
	}
endif; // End of newspaperss_header_style.
