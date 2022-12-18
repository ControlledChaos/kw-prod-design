<?php
/**
 * Register project role taxonomy
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

class Register_Project_Role extends Register_Tax {

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
			'singular'    => __( 'project role', 'sitecore' ),
			'plural'      => __( 'project roles', 'sitecore' ),
			'description' => __( 'Projects by role in the project.', 'sitecore' ),
			'menu_icon'   => 'dashicons-clipboard'
		];

		$options = [
			'meta_box_cb' => 'post_tags_meta_box',
		];

		// Run the parent constructor method.
		parent :: __construct(
			'project_role',
			$types,
			$labels,
			$options,
			10
		);
	}
}
