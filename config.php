<?php
/**
 * Plugin configuration
 *
 * The constants defined here do not override any default behavior
 * or default user interfaces. However, the corresponding behavior
 * can be overridden in the system config file (e.g. `wp-config`,
 * `app-config` ).
 *
 * The reason for using constants in the config file rather than
 * in a settings file is to prevent site administrators wrongly
 * or incorrectly configuring the site built by developers.
 *
 * @package    KW_Prod
 * @subpackage Configuration
 * @category   Core
 * @since      1.0.0
 */

namespace KWProd;

// Alias namespaces.
use KWProd\Classes as Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Constant: Minimum PHP version
 *
 * @since 1.0.0
 * @var   string The minimum required PHP version.
 */
define( 'KWPD_MIN_PHP_VERSION', '7.4' );

/**
 * Function: Minimum PHP version
 *
 * Checks the PHP version sunning on the current host
 * against the minimum version required by this plugin.
 *
 * @since  1.0.0
 * @return boolean Returns false if the minimum is not met.
 */
function min_php_version() {

	if ( version_compare( phpversion(), KWPD_MIN_PHP_VERSION, '<' ) ) {
		return false;
	}
	return true;
}

/**
 * Constant: Plugin version
 *
 * Keeping the version at 1.0.0 as this is a starter plugin but
 * you may want to start counting as you develop for your use case.
 *
 * Remember to find and replace the `@version x.x.x` in docblocks.
 *
 * @since 1.0.0
 * @var   string The latest plugin version.
 */
define( 'KWPD_VERSION', '1.0.0' );

/**
 * Plugin name
 *
 * @since 1.0.0
 * @var   string The name of the plugin.
 */
if ( ! defined( 'KWPD_NAME' ) ) {
	define( 'KWPD_NAME', __( 'KW Production Design', 'kw-prod-design' ) );
}

/**
 * Constant: Plugin folder path
 *
 * @since 1.0.0
 * @var   string The filesystem directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
define( 'KWPD_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Constant: Plugin folder URL
 *
 * @since 1.0.0
 * @var   string The URL directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
define( 'KWPD_URL', plugin_dir_url( __FILE__ ) );

/**
 * PHP version check
 *
 * Stop here if the minimum PHP version is not met.
 * The following array definitions wi break sites
 * running older PHP versions.
 *
 * @since  1.0.0
 * @return void
 */
if ( ! min_php_version() ) {
	return;
}

/**
 * Constant: Plugin configuration.
 *
 * @since 1.0.0
 * @var   array Plugin identification, support, settings.
 */
if ( ! defined( 'KWPD_CONFIG' ) ) {

	define( 'KWPD_CONFIG', [

		/**
		 * Plugin name
		 *
		 * Remember to replace in the plugin header.
		 *
		 * @since 1.0.0
		 * @var   string The name of the plugin.
		 */
		'name' => KWPD_NAME,

		/**
		 * Developer name
		 *
		 * @since 1.0.0
		 * @var   string The name of the developer/agency.
		 */
		'dev_name' => __( 'Controlled Chaos', 'kw-prod-design' ),

		/**
		 * Developer URL
		 *
		 * @since 1.0.0
		 * @var   string The URL of the developer/agency.
		 */
		'dev_url' => esc_url( 'https://ccdzine.com/' ),

		/**
		 * Developer email
		 *
		 * @since 1.0.0
		 * @var   string The URL of the developer/agency.
		 */
		'dev_email' => sanitize_email( 'greg@ccdzine.com' ),

		/**
		 * Plugin URL
		 *
		 * @since 1.0.0
		 * @var   string The URL of the plugin.
		 */
		'plugin_url' => esc_url( 'https://github.com/ControlledChaos/kw-prod-design' ),

		/**
		 * Posts content type
		 *
		 * The nature of the default posts (e.g. blog, news).
		 *
		 * @since 1.0.0
		 * @var   string The name of the developer/agency.
		 */
		'posts_content' => 'blog',

		/**
		 * Allow custom dashboard
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow custom dashboard.
		 */
		'dashboard' => false,

		/**
		 * Allow Site Health
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow the Site Health feature.
		 */
		'site_health' => false,

		/**
		 * Allow block widgets
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow block widgets.
		 */
		'block_widgets' => true,

		/**
		 * Allow links manager
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow the links manager feature.
		 */
		'links_manager' => false,

		/**
		 * Allow Customizer
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow the Customizer.
		 */
		'customizer' => true,

		/**
		 * User admin color picker
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow admin color pickers.
		 */
		'color_picker' => true
	] );
}

/**
 * Developer name
 *
 * @since 1.0.0
 * @var   string The name of the developer/agency.
 */
if ( ! defined( 'KWPD_DEV_NAME' ) ) {
	define( 'KWPD_DEV_NAME', KWPD_CONFIG['dev_name'] );
}

/**
 * Developer URL
 *
 * @since 1.0.0
 * @var   string The URL of the developer/agency.
 */
if ( ! defined( 'KWPD_DEV_URL' ) ) {
	define( 'KWPD_DEV_URL', KWPD_CONFIG['dev_url'] );
}

/**
 * Developer email
 *
 * @since 1.0.0
 * @var   string The URL of the developer/agency.
 */
if ( ! defined( 'KWPD_DEV_EMAIL' ) ) {
	define( 'KWPD_DEV_EMAIL', KWPD_CONFIG['dev_email'] );
}

/**
 * Plugin URL
 *
 * @since 1.0.0
 * @var   string The URL of the plugin.
 */
if ( ! defined( 'KWPD_PLUGIN_URL' ) ) {
	define( 'KWPD_PLUGIN_URL', KWPD_CONFIG['plugin_url'] );
}

/**
 * Posts content type
 *
 * @since 1.0.0
 * @var   string The nature of the default posts (e.g. blog, news).
 */
if ( ! defined( 'KWPD_POSTS_CONTENT_TYPE' ) ) {
	define( 'KWPD_POSTS_CONTENT_TYPE', KWPD_CONFIG['posts_content'] );
}

/**
 * Allow custom dashboard
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the custom dashboard.
 */
if ( ! defined( 'KWPD_USE_CUSTOM_DASHBOARD' ) ) {
	define( 'KWPD_USE_CUSTOM_DASHBOARD', KWPD_CONFIG['dashboard'] );
}

/**
 * Allow Site Health
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the Site Health feature.
 */
if ( ! defined( 'KWPD_ALLOW_SITE_HEALTH' ) ) {
	define( 'KWPD_ALLOW_SITE_HEALTH', KWPD_CONFIG['site_health'] );
}

/**
 * Allow block widgets
 *
 * @since 1.0.0
 * @var   boolean Whether to allow block widgets.
 */
if ( ! defined( 'KWPD_ALLOW_BLOCK_WIDGETS' ) ) {
	define( 'KWPD_ALLOW_BLOCK_WIDGETS', KWPD_CONFIG['block_widgets'] );
}

/**
 * Allow links manager
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the links manager feature.
 */
if ( ! defined( 'KWPD_ALLOW_LINKS_MANAGER' ) ) {
	define( 'KWPD_ALLOW_LINKS_MANAGER', KWPD_CONFIG['links_manager'] );
}

/**
 * Allow Customizer
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the Customizer.
 */
if ( ! defined( 'KWPD_ALLOW_CUSTOMIZER' ) ) {
	define( 'KWPD_ALLOW_CUSTOMIZER', KWPD_CONFIG['customizer'] );
}

/**
 * User admin color picker
 *
 * @since 1.0.0
 * @var   boolean Whether to allow admin color pickers.
 */
if ( ! defined( 'KWPD_ALLOW_ADMIN_COLOR_PICKER' ) ) {
	define( 'KWPD_ALLOW_ADMIN_COLOR_PICKER', KWPD_CONFIG['color_picker'] );
}
