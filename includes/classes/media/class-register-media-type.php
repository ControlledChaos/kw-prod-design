<?php
/**
 * Register media type taxonomy
 *
 * @package    KW_Prod
 * @subpackage Classes
 * @category   Media
 * @since      1.0.0
 */

namespace KWProd\Classes\Media;

// Alias namespaces.
use KWProd\Classes\Core as Core;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Register_Media_Type extends Core\Register_Tax {

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$types = [
			'attachment'
		];

		$labels = [
			'singular'    => __( 'media type', 'kw-prod-design' ),
			'plural'      => __( 'media types', 'kw-prod-design' ),
			'description' => __( 'Organize the media library by file types.', 'kw-prod-design' ),
			'menu_icon'   => 'dashicons-tag'
		];

		$options = [];

		// Run the parent constructor method.
		parent :: __construct(
			'media_type',
			$types,
			$labels,
			$options,
			10
		);
	}
}
