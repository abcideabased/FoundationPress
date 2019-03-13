<?php
/**
 * Disables enumerating author pages
 *
 * This helps with security by preventing potential attackers
 * from searching for login usernames by simply
 * searching ?author=1, ?author=2, etc
 */


if (!is_admin()) {

// default URL format

if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();

add_filter('redirect_canonical', 'author_check_enum', 10, 2);

}

function author_check_enum($redirect, $request) {

// permalink URL format

if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();

else return $redirect;

}
