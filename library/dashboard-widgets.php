<?php
// Add custom taxonomies and custom post types counts to dashboard
    add_action( 'dashboard_glance_items', 'cpt_to_at_a_glance' );
function cpt_to_at_a_glance() {
        // Custom post types counts
        $post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects' );
        foreach ( $post_types as $post_type ) {
            $num_posts = wp_count_posts( $post_type->name );
            $num = number_format_i18n( $num_posts->publish );
            $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = '<li class="post-count"><a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a></li>';
            }
            echo $num;
        }
    }

// Remove Dashboard widgets
function remove_dashboard_widgets () {

  //remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
  remove_meta_box('dashboard_primary','dashboard','side'); // WordPress.com Blog
  remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
  //remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
  remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
  remove_action('welcome_panel','wp_welcome_panel'); // Welcome panel

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
