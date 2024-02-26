<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package newspaperss
 */

?>

<div class="block-content-wrap">
	<article class="grid-x grid-padding-x post-wrap-blog ">
		<div class=" small-12 cell ">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'newspaperss' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'newspaperss' ); ?></p>
				<?php
					get_search_form();

			endif;
			?>
		</div>
		<!-- .page-content -->
	</article>
	<!-- .no-results -->
</div>
