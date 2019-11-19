<?php
add_action('admin_init', 'remove_admin_editors', 102);

function remove_admin_editors()
{

  // Disable direct access to page with a fail message
  global $pagenow;
  if($pagenow == 'theme-editor.php' || $pagenow == 'plugin-editor.php') {
    wp_die( "This feature has been disable for security reasons." );
  }

  // Remove admin menu items
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'plugins.php','plugin-editor.php' );

}
