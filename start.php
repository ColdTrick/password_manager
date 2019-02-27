<?php
/**
 * Main plugin file
 */

elgg_register_event_handler('init', 'system', 'password_manager_init');

/**
 * Called during system init
 *
 * @return void
 */
function password_manager_init() {
	
	// set min password length
	$min_length = (int) elgg_get_plugin_setting('min_length', 'password_manager');
	if ($min_length > 0) {
		elgg_set_config('min_password_length', $min_length);
	}
	
	elgg_register_plugin_hook_handler('registeruser:validate:password', 'all', '\ColdTrick\PasswordManager\Validate::validatePassword');
	elgg_register_plugin_hook_handler('view_vars', 'forms/account/settings', '\ColdTrick\PasswordManager\Views::processForm');
	elgg_register_plugin_hook_handler('view_vars', 'forms/register', '\ColdTrick\PasswordManager\Views::processForm');
	elgg_register_plugin_hook_handler('view_vars', 'forms/useradd', '\ColdTrick\PasswordManager\Views::processForm');
}
