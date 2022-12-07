<?php
/**
 * Output of the Administration Settings page
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Admin
 * @since      1.0.0
 */

$page = get_plugin_page_hook( KWPD_BASENAME, $this->parent_slug );

?>
<div class="wrap admin-settings">

	<?php
	printf(
		'<h1>%s</h1>',
		__( $this->heading(), 'kw-prod-design' )
	);

	printf(
		'<p class="description">%s</p>',
		__( $this->description(), 'kw-prod-design' )
	);

	?>
	<form method="post" action="options.php">

		<?php echo do_action( 'render_screen_tabs_' . $page ); ?>

		<p class="submit"><?php submit_button( __( 'Save Settings', 'kw-prod-design' ), 'button-primary', '', false, [] ); ?></p>
	</form>
</div>
