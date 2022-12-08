<?php
/**
 * Register sample taxonomy
 *
 * Copy this file and rename it to reflect
 * its new class name. Add to the autoloader
 * and instantiate where appropriate.
 *
 * @package    KW_Prod
 * @subpackage Classes
 * @category   Core
 * @since      1.0.0
 */

namespace KWProd\Classes\Core;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Register_Project_Type extends Register_Tax {

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$types = [
			'project'
		];

		$labels = [
			'singular'    => __( 'project type', 'kw-prod-design' ),
			'plural'      => __( 'project types', 'kw-prod-design' ),
			'description' => __( 'Organize projects by type.', 'kw-prod-design' ),
			'menu_icon'   => 'dashicons-tag'
		];

		$options = [
			'meta_box_cb' => 'post_tags_meta_box',
		];

		// Run the parent constructor method.
		parent :: __construct(
			'project_type',
			$types,
			$labels,
			$options,
			10
		);

	}

	/**
	 * Metabox callback
	 *
	 * Callback function for metabox markup on edit screens.
	 * False will disable the metabox. Null will use the
	 * core tags callback function, `post_tags_meta_box`.
	 *
	 * This sample uses the categories metabox as a template.
	 *
	 * @todo Categories metabox not working in the WordPress block editor.
	 * Uses the tags metabox.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    mixed The callback function name or false or null.
	 */
	protected function meta_box_cb() {
		return 'post_categories_meta_box';
	}
}
