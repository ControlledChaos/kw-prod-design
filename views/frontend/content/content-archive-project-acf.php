<?php
/**
 * ACF content for project post type archive
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'ACF content for archived post #', 'kw-prod-design' ),
	get_the_ID()
);
