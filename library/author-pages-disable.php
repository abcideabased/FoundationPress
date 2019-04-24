<?php
/**
 * Disables the author pages
 *
 * This helps with security by preventing potential attackers
 * from searching for login usernames
 */

function disable_author_page() {
	global $wp_query;

	if ( is_author() ) {
		$wp_query->set_404();
		status_header(404);
		// Redirect to homepage
		// wp_redirect(get_option('home'));
	}
}

// Disable access to author page
add_action( 'template_redirect', 'disable_author_page' );
