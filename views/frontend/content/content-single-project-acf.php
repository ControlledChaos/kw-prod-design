<?php
/**
 * ACF content for singular project post type
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'ACF content for post #', 'kw-prod-design' ),
	get_the_ID()
);
