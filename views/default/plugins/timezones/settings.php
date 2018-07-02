<?php
// timezones plugin settings

echo "<div><label>" . elgg_echo('timezones:gmt_time') . "</label><br />";
echo gmdate('d-m-Y, H:i') . '<div><br />';
echo "<div><label>" . elgg_echo('timezones:settings:default_user_timezone') . "</label><br />";
echo elgg_view('input/select', array('name' => 'params[user_timezone]',
									'value' => $vars['entity']->user_timezone,
                                    'options_values' => timezone_identifiers_list()
                              )) . "</div><br />";

