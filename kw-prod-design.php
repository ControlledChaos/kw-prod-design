<?php
/**
 * KW Production Design plugin
 *
 * Site-specific plugin for the Korey Washington production design website.
 *
 * @package  KW_Prod
 * @category Core
 * @since    1.0.0
 * @link     https://github.com/ControlledChaos/kw-prod-design
 *
 * Plugin Name:  KW Production Design
 * Plugin URI:   https://github.com/ControlledChaos/kw-prod-design
 * Description:  Site-specific plugin for the Korey Washington production design website.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   https://ccdzine.com/
 * Text Domain:  kw-prod-design
 * Domain Path:  /languages
 * Requires PHP  5.4
 */

namespace KWProd;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Constant: Plugin base name
 *
 * @since 1.0.0
 * @var   string The base name of this plugin file.
 */
define( 'KWPD_BASENAME', plugin_basename( __FILE__ ) );

// Get plugin configuration file.
require plugin_dir_path( __FILE__ ) . 'config.php';

/**
 * Activation & deactivation
 *
 * The activation & deactivation methods run here before the check
 * for PHP version which otherwise disables the functionality of
 * the plugin.
 */
include_once KWPD_PATH . 'includes/activate/activate.php';
include_once KWPD_PATH . 'includes/activate/deactivate.php';

/**
 * Register the activation & deactivation hooks
 *
 * The namspace of this file must remain escaped by use of the
 * backslash (`\`) prepending the activation hooks and corresponding
 * functions.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
\register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
\register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );

/**
 * Run activation class
 *
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function activate_plugin() {

	// Update options.
	Activate\options();
}

/**
 * Run deactivation class
 *
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function deactivate_plugin() {

	// Update options.
	Deactivate\options();
}

/**
 * Disable plugin for PHP version
 *
 * Stop here if the minimum PHP version is not met.
 * Prevents breaking sites running older PHP versions.
 *
 * A notice is added to the plugin row on the Plugins
 * screen as a more elegant and more informative way
 * of disabling the plugin than putting the PHP minimum
 * in the plugin header, which activates a die() message.
 * However, the Requires PHP tag is included in the
 * plugin header with a minimum of version 5.4
 * because of the namespaces.
 *
 * @since  1.0.0
 * @return void
 */
if ( ! min_php_version() ) {

	// First add a notice to the plugin row.
	Activate\get_row_notice();

	// Stop here.
	return;
}

// Get the plugin initialization file.
require_once KWPD_PATH . 'init.php';
