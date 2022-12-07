<?php
/**
 * Content settings sample tab
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace KWProd\Views\Admin;
use KWProd\Classes\Admin as Admin;

// Instance of the Manage_Website_Page class.
$page = new Admin\Content_Settings;

?>
<div>
	<p><?php _e( 'Sample tab content.', 'kw-prod-design' ); ?></p>
</div>
