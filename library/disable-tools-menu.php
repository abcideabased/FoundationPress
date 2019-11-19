<?php
add_action('admin_init', 'remove_admin_tools', 102);

// Remove tools menu for specific access level
function remove_admin_tools()
{

  // Removes access for Editors and below
  if ( ! current_user_can( 'manage_options' ) ) {

    // Disable direct access to page with a fail message
    global $pagenow;
    if($pagenow == 'tools.php') {
      wp_die( "Sorry, you are not allowed to access this page." );
    }

    // Remove admin menu items
  	remove_menu_page( 'tools.php' );

  }

}
