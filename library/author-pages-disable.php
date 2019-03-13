<?php
/**
 * Disables the author pages
 *
 * This helps with security by preventing potential attackers
 * from searching for login usernames
 */

// Disable access to author page
add_action('template_redirect', 'disable_author_page');

function disable_author_page() {
	global $wp_query;

	if ( is_author() ) {
		$wp_query->set_404();
		status_header(404);
		// Redirect to homepage
		// wp_redirect(get_option('home'));
	}
}

add_action( 'template_redirect', 'remove_author_pages_page' );
