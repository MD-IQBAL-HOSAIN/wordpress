<?php
/**
 * Actions required
 */

?>
<?php
  $counter = 0;
  $theme = wp_get_theme();
?>
<div id="actions_required" class="newspaperss-tab-pane">
  <h1><?php printf( esc_html__( 'Keep up with %s\'s recommended actions' ,'newspaperss' ), $theme->get( 'Name' ) ); ?></h1>
  <!-- NEWS -->

  <!-- Front page -->
  <?php if ( get_option( 'show_on_front' ) != 'page' ) { ?>
    <h3><?php esc_html_e( 'Switch "Front page displays" to "A static page" ', 'newspaperss' ); ?></h3>
		<div class="two-three"><?php esc_html_e( 'If you want to create unique homepage, create the new page first, set the template "Homepage" and save the page. Then please go to Settings -> Reading and switch "Front page displays" to "A static page" and select the page you created before.', 'newspaperss' ); ?>
      <p><a href="<?php echo wp_customize_url(); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'newspaperss' ); ?></a></p>
    </div>
    <div class="one-three">


    </div>
  <?php
    $counter++;
  } else { ?>
  <?php } ?>
  <?php	if( $counter == '0' ) { ?>
		<p><?php esc_html_e( 'Hooray! There are no recommended actions for you right now.', 'newspaperss' ); ?></p>
	<?php }	?>
  <div id="counter-count" data-counter="<?php echo absint($counter) ?>"></div>
</div>
