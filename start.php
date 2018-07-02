<?php
/**
 * Adds timezone selection in user settings
 * and set user timezone to local time
 *
 * (c) casper 2018
 */

elgg_register_event_handler('init', 'system', 'timezones_init');

function timezones_init() {
	// Register events
	elgg_register_plugin_hook_handler('usersettings:save','user','timezone_save_setting');
	elgg_extend_view('forms/account/settings', 'timezones/user_setting');

	// set user local timezone
	if(elgg_is_logged_in()) {
		$user_timezone = timezone_identifiers_list()[elgg_get_plugin_user_setting('timezone', 0, 'timezones', elgg_get_plugin_setting('user_timezone', 'timezones'))];
		date_default_timezone_set ($user_timezone);
    }
}

function timezone_save_setting($hook, $type, $value, $params) {
   $user_guid = (int)get_input('guid');
   $timezone = get_input('timezone');

	// Fall back to logged in user if no user guid provided
    if ($user_guid) {
        $user = get_user($user_guid);
    } else {
        $user = elgg_get_logged_in_user_entity();
    }

	elgg_set_plugin_user_setting('timezone', $timezone, 0, 'timezones');
}

