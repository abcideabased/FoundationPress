<?php
/**
 * Disable comments RSS feed
 */

 function disable_comment_feed() {
 wp_die( __('No feed available, please visit our <a href="'. get_bloginfo('url') . '">homepage</a>!') );
 }

 //add_action('do_feed', 'disable_comment_feed', 1);
 //add_action('do_feed_rdf', 'disable_comment_feed', 1);
 //add_action('do_feed_rss', 'disable_comment_feed', 1);
 add_action('do_feed_rss2', 'disable_comment_feed', 1);
 //add_action('do_feed_atom', 'disable_comment_feed', 1);
 add_action('do_feed_rss2_comments', 'disable_comment_feed', 1);
 add_action('do_feed_atom_comments', 'disable_comment_feed', 1);
