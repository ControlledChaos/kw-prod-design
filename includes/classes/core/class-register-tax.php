<?php
/**
 * Base class to register a taxonomy
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

class Register_Tax {

	/**
	 * Taxonomy
	 *
	 * Maximum 20 characters. May only contain lowercase alphanumeric
	 * characters, dashes, and underscores. Dashes discouraged.
	 *
	 * @example 'color'
	 * @example 'vehicle_type'
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string The database name of the taxonomy.
	 */
	public $tax_key = '';

	/**
	 * Associated post types
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    array The array of associated post types.
	 */
	public $post_types = [];

	/**
	 * Taxonomy labels
	 *
	 * Various text for the taxonomy.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var array An array of taxonomy labels.
	 */
	public $tax_labels = [];

	/**
	 * Taxonomy options
	 *
	 * @since  1.0.0
	 * @access public
	 * @var array An array of taxonomy options.
	 */
	public $tax_options = [];

	/**
	 * Register priority
	 *
	 * When to register the taxonomy.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    integer The numeral to set hook priority.
	 */
	public $priority = 10;

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct( $tax_key, $post_types, $tax_labels, $tax_options, $priority ) {

		$types = [];

		$labels = [
			'singular'    => '',
			'plural'      => '',
			'description' => '',
			'menu_icon'   => 'dashicons-category'
		];

		$options = [
			'label'                 => '',
			'labels'                => [],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_quick_edit'    => true,
			'meta_box_cb'           => 'post_categories_meta_box',
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'rewrite'               => [],
			'show_in_rest'          => true,
			'rest_base'             => $this->tax_key . '_rest_api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'query_var'             => $this->tax_key
		];

		$this->tax_key      = $tax_key;
		$this->post_types   = wp_parse_args( $post_types, $types );
		$this->tax_labels   = wp_parse_args( $tax_labels, $labels );
		$this->tax_options  = wp_parse_args( $tax_options, $options );
		$this->priority     = $priority;

		// Register taxonomy.
		add_action( 'init', [ $this, 'register' ] );

		// Rewrite taxonomy labels.
		add_action( 'wp_loaded', [ $this, 'rewrite_labels' ] );

	}

	/**
     * Register taxonomy
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

		register_taxonomy(
			strtolower( $this->tax_key ),
			$this->post_types,
			$this->options()
		);
	}

	/**
	 * Taxonomy options
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of taxonomy options,
	 *               including labels from $this->labels().
	 */
	public function options() {

		$options = [
			'label'                 => __( ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'labels'                => $this->labels(),
			'public'                => $this->tax_options['public'],
			'hierarchical'          => $this->tax_options['hierarchical'],
			'show_ui'               => $this->tax_options['show_ui'],
			'show_admin_column'     => $this->tax_options['show_admin_column'],
			'show_in_quick_edit'    => $this->tax_options['show_in_quick_edit'],
			'meta_box_cb'           => $this->tax_options['meta_box_cb'],
			'show_in_menu'          => $this->tax_options['show_in_menu'],
			'show_in_nav_menus'     => $this->tax_options['show_in_nav_menus'],
			'rewrite'               => $this->rewrite(),
			'show_in_rest'          => $this->tax_options['show_in_rest'],
			'rest_base'             => $this->tax_key . '_rest_api',
			'rest_controller_class' => $this->tax_options['rest_controller_class'],
			'query_var'             => $this->tax_key
		];

		return $options;
	}

	/**
	 * Taxonomy labels
	 *
	 * The `ucwords()` function capitalizes
	 * the string (uppercase words).
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of taxonomy labels.
	 */
	public function labels() {

		$labels = [
			'name'                       => __( ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'singular_name'              => __( ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'menu_name'                  => __( ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'all_items'                  => __( 'All ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'edit_item'                  => __( 'Edit ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'view_item'                  => __( 'View ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'update_item'                => __( 'Update ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'add_new_item'               => __( 'Add New ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'new_item_name'              => __( 'New ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'parent_item'                => __( 'Parent ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'parent_item_colon'          => __( 'Parent ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'popular_items'              => __( 'Popular ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'separate_items_with_commas' => __( 'Separate ' . ucwords( $this->tax_labels['plural'] ) . ' with commas', 'kw-prod-design' ),
			'add_or_remove_items'        => __( 'Add or Remove ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'not_found'                  => __( 'No ' . ucwords( $this->tax_labels['plural'] ) . ' Found', 'kw-prod-design' ),
			'no_terms'                   => __( 'No ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'filter_by_item'             => __( 'Filter by ' . ucwords( $this->tax_labels['singular'] ), 'kw-prod-design' ),
			'items_list_navigation'      => __( ucwords( $this->tax_labels['plural'] ) . ' list navigation', 'kw-prod-design' ),
			'items_list'                 => __( ucwords( $this->tax_labels['plural'] ) . ' List', 'kw-prod-design' ),
			'most_used'                  => __( 'Most Used ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' ),
			'back_to_items'              => __( 'Back to ' . ucwords( $this->tax_labels['plural'] ), 'kw-prod-design' )
		];

		// Filter for child classes to modify this array.
		return $labels;
	}

	/**
	 * Rewrite rules
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of rewrite rules.
	 */
	public function rewrite() {

		$slug    = str_replace( ' ', '-', strtolower( $this->tax_labels['plural'] ) );
		$rewrite = [
			'slug'       => $slug,
			'with_front' => true
		];
		return $rewrite;
	}

	/**
	 * Rewrite taxonomy labels
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed Returns new values for array label keys.
	 */
	public function rewrite_labels() {}
}