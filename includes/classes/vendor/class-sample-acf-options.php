<?php
/**
 * Sample ACF options page
 *
 * Copy this file and rename it to reflect
 * its new class name. Add to the autoloader
 * and instantiate where appropriate.
 *
 * @package    KW_Prod
 * @subpackage Classes
 * @category   Vendor
 * @since      1.0.0
 */

namespace KWProd\Classes\Vendor;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Sample_ACF_Options extends Add_ACF_Options {

	/**
	 * Page title
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The text to be displayed in the
	 *                title tags of the page when the
	 *                menu is selected.
	 */
	protected $page_title = 'Sample Options Page';

	/**
	 * Menu title
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The text to be used for the menu.
	 */
	protected $menu_title = 'Sample Options';

	/**
	 * Page slug
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The slug name to refer to the menu by.
	 */
	protected $menu_slug = 'sample-options-page';

	/**
	 * Menu position
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    integer The position in the menu order this item should appear.
	 */
	protected $position = 3;

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {
		parent :: __construct();
	}

	/**
	 * Field groups
	 *
	 * Register field groups for this options page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function field_groups() {
		include_once KWPD_PATH . '/includes/fields/acf-sample-options.php';
	}
}
