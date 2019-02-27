<?php
/**
 * Plugin settings
 */

/* @var $plugin \ElggPlugin */
$plugin = elgg_extract('entity', $vars);

$min_length = (int) $plugin->min_length;
if ($min_length < 1) {
	$min_length = (int) elgg_get_config('min_password_length');
	if ($min_length < 1) {
		// core default length
		$min_length = 6;
	}
}

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo('password_manager:settings:min_length'),
	'#help' => elgg_echo('password_manager:settings:min_length:help'),
	'name' => 'params[min_length]',
	'value' => $min_length,
	'min' => 0,
]);

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo('password_manager:settings:min_lower'),
	'#help' => elgg_echo('password_manager:settings:min_lower:help'),
	'name' => 'params[min_lower]',
	'value' => $plugin->min_lower,
	'min' => 0,
]);

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo('password_manager:settings:min_upper'),
	'#help' => elgg_echo('password_manager:settings:min_upper:help'),
	'name' => 'params[min_upper]',
	'value' =>  $plugin->min_upper,
	'min' => 0,
]);

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo('password_manager:settings:min_number'),
	'#help' => elgg_echo('password_manager:settings:min_number:help'),
	'name' => 'params[min_number]',
	'value' =>  $plugin->min_number,
	'min' => 0,
]);

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo('password_manager:settings:min_special'),
	'#help' => elgg_echo('password_manager:settings:min_special:help'),
	'name' => 'params[min_special]',
	'value' =>  $plugin->min_special,
	'min' => 0,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('password_manager:settings:regex'),
	'#help' => elgg_echo('password_manager:settings:regex:help'),
	'name' => 'params[regex]',
	'value' =>  $plugin->regex,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('password_manager:settings:password_help'),
	'#help' => elgg_echo('password_manager:settings:password_help:help'),
	'name' => 'params[password_help]',
	'value' =>  $plugin->password_help,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('password_manager:settings:error_msg'),
	'#help' => elgg_echo('password_manager:settings:error_msg:help'),
	'name' => 'params[error_msg]',
	'value' =>  $plugin->error_msg,
]);
