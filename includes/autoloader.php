<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    KW_Prod
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace KWProd;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directories and file prefixes.
 *
 * @since 1.0.0
 * @var   array Defines an array of class file paths.
 */
define( 'KWPD_CLASS', [
	'core'     => KWPD_PATH . 'includes/classes/core/class-',
	'settings' => KWPD_PATH . 'includes/classes/settings/class-',
	'tools'    => KWPD_PATH . 'includes/classes/tools/class-',
	'media'    => KWPD_PATH . 'includes/classes/media/class-',
	'users'    => KWPD_PATH . 'includes/classes/users/class-',
	'vendor'   => KWPD_PATH . 'includes/classes/vendor/class-',
	'admin'    => KWPD_PATH . 'includes/classes/backend/class-',
	'front'    => KWPD_PATH . 'includes/classes/frontend/class-',
	'widgets'  => KWPD_PATH . 'includes/classes/widgets/class-',
	'general'  => KWPD_PATH . 'includes/classes/class-',
] );

/**
 * Classes namespace
 *
 * @since 1.0.0
 * @var   string Defines the namespace of class files.
 */
define( 'KWPD_CLASS_NS', __NAMESPACE__ . '\Classes' );

/**
 * Array of classes to register
 *
 * When you add new classes to your version of this plugin you may
 * add them to the following array rather than requiring the file
 * elsewhere. Be sure to include the precise namespace.
 *
 * SAMPLES: Uncomment sample classes to load them.
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'KWPD_CLASSES', [

	// Core classes.
	KWPD_CLASS_NS . '\Core\Editor_Options'        => KWPD_CLASS['core'] . 'editor-options.php',
	KWPD_CLASS_NS . '\Core\Register_Type'         => KWPD_CLASS['core'] . 'register-type.php',
	KWPD_CLASS_NS . '\Core\Register_Project'      => KWPD_CLASS['core'] . 'register-project.php',
	KWPD_CLASS_NS . '\Core\Register_Admin'        => KWPD_CLASS['core'] . 'register-admin.php',
	KWPD_CLASS_NS . '\Core\Register_Site_Help'    => KWPD_CLASS['core'] . 'register-site-help.php',
	KWPD_CLASS_NS . '\Core\Register_Tax'          => KWPD_CLASS['core'] . 'register-tax.php',
	KWPD_CLASS_NS . '\Core\Register_Project_Type' => KWPD_CLASS['core'] . 'register-project-type.php',
	KWPD_CLASS_NS . '\Core\Types_Taxes_Order'     => KWPD_CLASS['core'] . 'types-taxes-order.php',
	KWPD_CLASS_NS . '\Core\Remove_Blog'           => KWPD_CLASS['core'] . 'remove-blog.php',
	KWPD_CLASS_NS . '\Core\Remove_Customizer'     => KWPD_CLASS['core'] . 'remove-customizer.php',

	// Settings classes.
	KWPD_CLASS_NS . '\Settings\Settings' => KWPD_CLASS['settings'] . 'settings.php',

	// Tools classes.
	KWPD_CLASS_NS . '\Tools\Customizer_Reset' => KWPD_CLASS['tools'] . 'customizer-reset.php',

	// Media classes.
	KWPD_CLASS_NS . '\Media\Register_Media_Type' => KWPD_CLASS['media'] . 'register-media-type.php',

	// Users classes.
	KWPD_CLASS_NS . '\Users\User_Avatars'    => KWPD_CLASS['users'] . 'user-avatars.php',

	// Vendor classes.
	KWPD_CLASS_NS . '\Vendor\Plugin'        => KWPD_CLASS['vendor'] . 'plugin.php',
	KWPD_CLASS_NS . '\Vendor\Plugin_Sample' => KWPD_CLASS['vendor'] . 'plugin-sample.php',
	KWPD_CLASS_NS . '\Vendor\Plugin_ACF'    => KWPD_CLASS['vendor'] . 'plugin-acf.php',
	KWPD_CLASS_NS . '\Vendor\Plugin_ACFE'   => KWPD_CLASS['vendor'] . 'plugin-acfe.php',
	KWPD_CLASS_NS . '\Vendor\ACF_Columns'   => KWPD_CLASS['vendor'] . 'acf-columns.php',
	KWPD_CLASS_NS . '\Vendor\Add_ACF_Options'    => KWPD_CLASS['vendor'] . 'add-acf-options.php',
	KWPD_CLASS_NS . '\Vendor\Add_ACF_Suboptions' => KWPD_CLASS['vendor'] . 'add-acf-suboptions.php',
	KWPD_CLASS_NS . '\Vendor\ACF_Manage_Site'    => KWPD_CLASS['vendor'] . 'acf-manage-site.php',
	KWPD_CLASS_NS . '\Vendor\Sample_ACF_Options'    => KWPD_CLASS['vendor'] . 'sample-acf-options.php',
	KWPD_CLASS_NS . '\Vendor\Sample_ACF_Suboptions' => KWPD_CLASS['vendor'] . 'sample-acf-suboptions.php',

	// Backend/admin classes,
	KWPD_CLASS_NS . '\Admin\Add_Page'                => KWPD_CLASS['admin'] . 'add-page.php',
	KWPD_CLASS_NS . '\Admin\Sample_Page'             => KWPD_CLASS['admin'] . 'sample-page.php',
	KWPD_CLASS_NS . '\Admin\Sample_Subpage'          => KWPD_CLASS['admin'] . 'sample-subpage.php',
	KWPD_CLASS_NS . '\Admin\Admin_Settings_Page'     => KWPD_CLASS['admin'] . 'admin-settings-page.php',
	KWPD_CLASS_NS . '\Admin\Admin_ACF_Settings_Page' => KWPD_CLASS['admin'] . 'admin-acf-settings-page.php',
	KWPD_CLASS_NS . '\Admin\Content_Settings'        => KWPD_CLASS['admin'] . 'content-settings.php',
	KWPD_CLASS_NS . '\Admin\Manage_Website_Page'     => KWPD_CLASS['admin'] . 'manage-website-page.php',

	// Frontend classes.
	KWPD_CLASS_NS . '\Front\Title_Filter'     => KWPD_CLASS['front'] . 'title-filter.php',
	KWPD_CLASS_NS . '\Front\Content_Filter'   => KWPD_CLASS['front'] . 'content-filter.php',
	KWPD_CLASS_NS . '\Front\Content_Sample'   => KWPD_CLASS['front'] . 'content-sample.php',

	// Widget classes.
	KWPD_CLASS_NS . '\Widgets\Add_Widget'    => KWPD_CLASS['widgets'] . 'add-widget.php',
	KWPD_CLASS_NS . '\Widgets\Sample_Widget' => KWPD_CLASS['widgets'] . 'sample-widget.php'


	// General/miscellaneous classes.

] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( KWPD_CLASSES[ $class ] ) ) {
			require KWPD_CLASSES[ $class ];
		}
	}
);
