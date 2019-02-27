<?php

namespace ColdTrick\PasswordManager;

class Views {
	
	/**
	 * Apply password requirements to supported forms
	 *
	 * @param string $hook         'view_vars'
	 * @param string $type         supported form view
	 * @param array  $return_value current return value
	 * @param array  $params       supplied params
	 *
	 * @return void
	 */
	public static function processForm($hook, $type, $return_value, $params) {
		elgg_register_plugin_hook_handler('view', $type, self::class . '::postFormCleanup');
		elgg_register_plugin_hook_handler('view_vars', 'input/password', self::class . '::passwordInput');
		elgg_register_plugin_hook_handler('view_vars', 'elements/forms/help', self::class . '::passwordHelp');
	}
	
	/**
	 * Hook cleanup after supported form is done
	 *
	 * @param string $hook         'view'
	 * @param string $type         supported form view
	 * @param array  $return_value current return value
	 * @param array  $params       supplied params
	 *
	 * @return void
	 */
	public static function postFormCleanup($hook, $type, $return_value, $params) {
		elgg_unregister_plugin_hook_handler('view', $type, self::class . '::postFormCleanup');
		elgg_unregister_plugin_hook_handler('view_vars', 'input/password', self::class . '::passwordInput');
		elgg_unregister_plugin_hook_handler('view_vars', 'elements/forms/help', self::class . '::passwordHelp');
	}
	
	/**
	 * Apply password regex to input/password
	 *
	 * @param string $hook         'view_vars'
	 * @param string $type         'input/password'
	 * @param array  $return_value current return value
	 * @param array  $params       supplied params
	 *
	 * @return array
	 */
	public static function passwordInput($hook, $type, $vars, $params) {
		
		elgg_require_js('password_manager/validate');
		$vars['pattern'] = trim(Validate::getRegex(), '/');
		$vars['data-custom-error'] = Validate::getErrorMessage();
		
		return $vars;
	}
	
	/**
	 * Add help text to password fields
	 *
	 * @param string $hook         'view_vars'
	 * @param string $type         'elements/forms/help'
	 * @param array  $return_value current return value
	 * @param array  $params       supplied params
	 *
	 * @return void|array
	 */
	public static function passwordHelp($hook, $type, $vars, $params) {
		
		if (elgg_extract('input_type', $vars) !== 'password') {
			return;
		}
		
		$help = elgg_extract('help', $vars, '');
		
		$custom_help = elgg_get_plugin_setting('password_help', 'password_manager');
		if (!empty($custom_help)) {
			$help .= ' ' . $custom_help;
			$vars['help'] = trim($help);
			return $vars;
		}
		
		$default_help = elgg_echo('password_manager:input:password:help');
		if (empty($default_help)) {
			return;
		}
		
		$help .= ' ' . $default_help;
		$vars['help'] = trim($help);
		return $vars;
	}
}
