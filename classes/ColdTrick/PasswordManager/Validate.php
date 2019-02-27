<?php

namespace ColdTrick\PasswordManager;

class Validate {
	
	/**
	 * Validate a password
	 *
	 * @param string $hook         'registeruser:validate:password'
	 * @param string $type         'all'
	 * @param bool   $return_value current return value
	 * @param array  $params       supplied params
	 *
	 * @return void
	 * @throws \RegistrationException
	 */
	public static function validatePassword($hook, $type, $return_value, $params) {
		
		if (!$return_value) {
			// already failed
			return;
		}
		
		$password = elgg_extract('password', $params);
		if (!preg_match(self::getRegex(), $password)) {
			throw new \RegistrationException(self::getErrorMessage());
		}
	}
	
	/**
	 * Returns the regex to validate the password with
	 *
	 * @return string
	 */
	public static function getRegex() {
		
		$plugin = elgg_get_plugin_from_id('password_manager');
		$custom = $plugin->regex;
		if (!empty($custom)) {
			return '/' . trim($custom, '/') . '/';
		}
		
		$regex = '/^';
		
		$lower = (int) $plugin->min_lower;
		$upper = (int) $plugin->min_upper;
		$number = (int) $plugin->min_number;
		$special = (int) $plugin->min_special;
		
		if ($lower > 0) {
			$regex .= '(?=' . str_repeat('.*[a-z]', $lower) . ')';
		}
		if ($upper > 0) {
			$regex .= '(?=' . str_repeat('.*[A-Z]', $upper) . ')';
		}
		if ($number> 0) {
			$regex .= '(?=' . str_repeat('.*[0-9]', $number) . ')';
		}
		if ($special> 0) {
			$regex .= '(?=' . str_repeat('.*[!@#$%^&*()+*<>,.~`=_|:;{}[\-\\\/\]]', $special) . ')';
		}
		
		$length = (int) $plugin->min_length;
		if ($length < 1) {
			$length = (int) elgg_get_config('min_password_length');
			if ($length < 1) {
				// core default
				$length = 6;
			}
		}
		
		$regex .= '.{' . $length . ',}$/';
		
		return $regex;
	}
	
	/**
	 * Get the error message when password is incorrect
	 *
	 * @return string
	 */
	public static function getErrorMessage() {
		
		$error = elgg_get_plugin_setting('error_msg', 'password_manager');
		if (!empty($error)) {
			return $error;
		}
		
		return elgg_echo('password_manager:validate:password:error');
	}
}
