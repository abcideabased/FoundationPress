<?php
/**
 * Hide default post type from WordPress Dashboard
 *
 * To re-enable, remove this code
 */

// Remove from side menu
add_action( 'admin_menu', 'remove_default_post_type' );
function remove_default_post_type() {
   remove_menu_page( 'edit.php' );
}

// Remove from "+ New" menu
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );
function remove_default_post_type_menu_bar( $wp_admin_bar ) {

  //Get a reference to the new-content node to modify.
  $new_content_node = $wp_admin_bar->get_node('new-content');

  //Change href to page
  $new_content_node->href = 'post-new.php?post_type=page';

  //Update Node.
  $wp_admin_bar->add_node($new_content_node);

  // Remove 'Post'
  $wp_admin_bar->remove_node( 'new-post' );

}

// Disable add new post
add_action( 'load-post-new.php', 'disable_new_post' );
function disable_new_post() {
if ( get_current_screen()->post_type == 'post' )
    wp_die( "Invalid post type." );
}

// Disable viewing posts
add_action( 'load-edit.php', 'disable_new_post' );

// Remove post quick draft dashboard widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );
function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
