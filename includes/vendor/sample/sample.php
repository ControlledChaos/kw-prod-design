<?php
/**
 * Sample plugin
 *
 * Included for demonstration of bundling a plugin in the KW Production Design plugin.
 *
 * @package  KW_Prod
 * @category Core
 * @since    1.0.0
 *
 * Plugin Name:  Sample Plugin
 * Description:  Included for demonstration of bundling a plugin in the KW Production Design plugin.
 * Version:      0.0.1
 * Text Domain:  sample
 */

function kwpd_sample_plugin_admin_notice() {

	?>
		<div id="sample-plugin-notice" class="notice notice-error">
			<?php echo sprintf(
				'<p><icon class="dashicons dashicons-warning" style="color: #dc3232;"></icon> %s</p>',
				__( 'The bundled sample plugin is loaded!', 'sample' )
			); ?>
		</div>
	<?php
}
add_action( 'admin_notices', 'kwpd_sample_plugin_admin_notice' );
