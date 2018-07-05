<?php
/**
 * Provide a way of setting your time zone prefs
 *
 * @package Elgg
 * @subpackage Core
 *
 * Add time zone selection in user settings by extending core view
 *
 * (c) casper 2018
 *
 */

$user = elgg_get_page_owner_entity();
if (!$user_timezone = $user->timezone)
	$user_timezone = elgg_get_plugin_user_setting('timezone', 0, 'timezones', $user_timezone = elgg_get_plugin_setting('user_timezone','timezones'));

if ($user) {
	$title = elgg_echo('timezones:user:set:timezone');
	$content = '<div><label>' . elgg_echo('timezones:user:current_time') . '</label> ' . date("d M Y, G:i") . '<br /><div><br />';
	$content .= '<div><label>' . elgg_echo('timezones:user:timezone:label') . ':</label> ';
	$content .= elgg_view("input/select", array(
		'name' => 'timezone',
		'value' => $user_timezone,
		'options_values' => timezone_identifiers_list(),
	)) . '</div><br />';
	echo elgg_view_module('info', $title, $content);
}

