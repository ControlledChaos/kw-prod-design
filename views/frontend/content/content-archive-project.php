<?php
/**
 * Content for project post type archive
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'Filtered content for archived post #', 'kw-prod-design' ),
	get_the_ID()
);

// Or use...
// echo get_the_excerpt( get_the_ID() );
// echo get_the_content( get_the_ID() );
