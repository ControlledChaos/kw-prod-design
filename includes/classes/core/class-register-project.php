<?php
/**
 * Sample class to register a post type
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

class Register_Project extends Register_Type {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$labels = [
			'singular'    => __( 'project', 'kw-prod-design' ),
			'plural'      => __( 'projects', 'kw-prod-design' ),
			'description' => '',
			'menu_icon'   => 'dashicons-art'
		];

		$options = [
			'menu_position' => 3,
			'supports'      => [
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'page-attributes'
			],
			'taxonomies'    => [
				'project_type'
			]
		];

		parent :: __construct(
			'project',
			$labels,
			$options,
			10,
			false
		);
	}

	/**
	 * Rewrite rules
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of rewrite rules.
	 */
	public function rewrite() {

		$rewrite = [
			'slug'       => 'projects',
			'with_front' => true,
			'feeds'      => true,
			'pages'      => true
		];

		return $rewrite;
	}

	/**
	 * New post type options
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Array of arguments for registering a post type.
	 * @param  string $post_type Post type key.
	 * @return array Returns an array of new option arguments.
	 */
	public function post_type_options( $args, $post_type ) {

		// Only modify this post type.
		if ( $this->type_key != $post_type ) {
			return $args;
		}

		// Sample option.
		// $args['menu_position'] = 3;

		return $args;
	}

	/**
	 * Rewrite post type labels
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed Returns new values for array label keys.
	 */
	public function rewrite_labels() {

		// Post type.
		$post_type = $this->type_key;
		$type_obj  = get_post_type_object( $post_type );

		// New post type labels.
		$type_obj->labels->menu_name = __( 'Projects', 'kw-prod-design' );
		$type_obj->labels->all_items = __( 'All Projects', 'kw-prod-design' );
		$type_obj->labels->add_new   = __( 'New Project', 'kw-prod-design' );
	}

	/**
	 * Template
	 *
	 * Array of blocks to use as the default initial state for an editor session.
	 * Each item should be an array containing block name and optional attributes.
	 *
	 * Only used by WordPress 5.0.0 and greater.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return array Returns the array of blocks in the template.
	 */
	protected function template() {

		$template = [
			[
				'core/heading',
				[
					'level'       => 2,
					'placeholder' => __( 'Sample Heading', 'kw-prod-design' )
				]
			],
			[
				'core/paragraph',
				[
					'placeholder' => __( 'This is a sample paragraph included by the template() method in the class that registers this post type.', 'kw-prod-design' )
				]
			],
		];
		return $template;
	}
}
