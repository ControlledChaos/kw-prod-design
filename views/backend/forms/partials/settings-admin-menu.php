<?php
/**
 * Form fields for admin settings menu tab
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace KWProd\Views\Admin;
use KWProd\Classes\Admin as Admin;


settings_fields( 'kwpd-site-admin-menu' );
do_settings_sections( 'kwpd-site-admin-menu' );

