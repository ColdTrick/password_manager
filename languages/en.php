<?php

return [
	// plugin settings
	'password_manager:settings:min_length' => "Minimal password length",
	'password_manager:settings:min_length:help' => "How many characters should the password contain at least",
	'password_manager:settings:min_lower' => "Minimal number of lower case characters",
	'password_manager:settings:min_lower:help' => "Lower case characters are a-z",
	'password_manager:settings:min_upper' => "Minimal number of upper case characters",
	'password_manager:settings:min_upper:help' => "Upper case characters are A-Z",
	'password_manager:settings:min_number' => "Minimal number of number characters",
	'password_manager:settings:min_number:help' => "Number characters are 0-9",
	'password_manager:settings:min_special' => "Minimal number of special characters",
	'password_manager:settings:min_special:help' => "Special characters are all other characters besides a-zA-Z0-9",
	'password_manager:settings:regex' => "Custom regex for validation",
	'password_manager:settings:regex:help' => "Replaces the config values above, with the given regex",
	'password_manager:settings:password_help' => "Custom help text",
	'password_manager:settings:password_help:help' => "Configure a custom help text to show with a password field",
	'password_manager:settings:error_msg' => "Custom error message",
	'password_manager:settings:error_msg:help' => "Configure a custom error message in case the password doesn't meet the requirements",
	
	// input
	'password_manager:input:password:help' => "",
	'password_manager:validate:password:error' => "Your password doesn't meet the minimal requirements",
];
