<?php
/**
 * Output the user roles checklist
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 *
 * @var $roles array All WordPress roles in name => label pairs.
 * @var $user_roles array An array of role names belonging to the current user.
 */
// $creating       = isset( $_POST['createuser'] );
// $selected_roles = $creating && isset( $_POST['kwpd_multiple_roles'] ) ? wp_unslash( $_POST['kwpd_multiple_roles'] ) : '';

if ( isset( $_POST['createuser'] ) && isset( $_POST['kwpd_multiple_roles'] ) ) {
	$selected_roles = wp_unslash( $_POST['kwpd_multiple_roles'] );
} else {
	$selected_roles = '';
}

?>
<h2><?php _e( 'Permissions', 'kw-prod-design' ); ?></h2>

<table class="form-table">
	<tr>
		<th><?php _e( 'Roles', 'kw-prod-design' ); ?></th>
		<td>
			<?php foreach( $roles as $name => $label ) :
				$input_uniq_id = uniqid(); ?>
				<label for="kwpd-multiple-roles-<?php echo esc_attr( $name ) . '-' . $input_uniq_id; ?>">
					<input
						id="kwpd-multiple-roles-<?php echo esc_attr( $name ) . '-' . $input_uniq_id; ?>"
						type="checkbox"
						name="kwpd_multiple_roles[]"
						value="<?php echo esc_attr( $name ); ?>"
						<?php
						// Edit user page.
						if ( ! is_null( $user_roles ) ) {
							checked( in_array( $name, $user_roles ) );

						// Add new user page.
						} elseif ( ! empty( $selected_roles ) ) {
							checked( in_array( $name, $selected_roles ) );
						}
						?>
					/>
					<?php echo esc_html( translate_user_role( $label ) ); ?>
				</label>
				<br />
			<?php endforeach; ?>
		</td>
	</tr>
</table>
