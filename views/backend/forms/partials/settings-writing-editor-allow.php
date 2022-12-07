<?php
/**
 * Form fields for allow user editor option
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

// Alias namespaces.
use KWProd\Classes\Core as Core;

// Editor settings.
$settings = Core\Editor_Options :: get_settings( 'refresh' );

?>
<div class="tinymce-editor-options">
	<p>
		<input type="radio" name="editor-options-allow-users" id="editor-options-allow" value="allow"<?php if ( $settings['allow-users'] ) echo ' checked'; ?> />
		<label for="editor-options-allow"><?php _e( 'Yes', 'kw-prod-design' ); ?></label>
	</p>
	<p>
		<input type="radio" name="editor-options-allow-users" id="editor-options-disallow" value="disallow"<?php if ( ! $settings['allow-users'] ) echo ' checked'; ?> />
		<label for="editor-options-disallow"><?php _e( 'No', 'kw-prod-design' ); ?></label>
	</p>
</div>
