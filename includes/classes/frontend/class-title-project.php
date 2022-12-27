<?php
/**
 * Sample post title filter
 *
 * @package    KW_Prod
 * @subpackage Classes
 * @category   Front
 * @since      1.0.0
 */

namespace KWProd\Classes\Front;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Title_Project extends Title_Filter {

	/**
	 * Post types
	 *
	 * Array of the post types to be filtered,
	 * as they are registered.
	 *
	 * @example [ 'post', 'sample_type' ]
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    array Array of the post types to be filtered.
	 */
	private $post_types = [
		'project'
	];

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Run the parent constructor method.
		parent :: __construct();
	}

	/**
	 * Title text
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $title The value of the title field.
	 * @param  integer $id The ID of the post.
	 * @return string Returns the text of the post title.
	 */
	public function the_title( $title, $id ) {

		if ( class_exists( 'acf_pro' ) ) {

			$project_title = wp_strip_all_tags( get_field( 'project_title', $id ) );

			if ( $project_title && ! ctype_space( $project_title ) ) {
				return $project_title;
			}
		}
		return $title;
	}
}
