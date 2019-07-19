<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar, off-canvas, and privacy */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );
require_once( 'library/class-foundationpress-privacy-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Gutenberg editor support */
require_once( 'library/gutenberg.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

/** Override WooCommerce image sizes */
require_once( 'library/woocommerce-image-sizes.php' );

/** Declare WooCommerce support */
require_once( 'library/woocommerce-support.php' );

/** TinyMCE style changes **/
require_once( 'library/tinymce-styles.php' );

/** Add ACF options pages */
require_once( 'library/acf-options.php' );

/** Remove type= from <script> and <style> */
require_once( 'library/remove-type.php' );

/** Disables enumerating author redirects to improve security */
require_once( 'library/author-enumeration-disable.php' );

/** Disables the author pages to improve security */
require_once( 'library/author-pages-disable.php' );

/** Disables the comments RSS feed */
require_once( 'library/feed-comments-disable.php' );

/** Show 'Nothing Found' for an empty search instead of all posts/pages */
require_once( 'library/search-empty.php' );

/** Gravity forms in ACF */
require_once( 'library/acf-gravity-forms.php' );

/** Remove attachment pages and don't allow attachments in content to link */
require_once( 'library/attachment-pages-remove.php' );

/** Format phone numbers */
require_once( 'library/phone-format.php' );

/** Enable Excerpts on Pages */
add_post_type_support( 'page', 'excerpt' );

/** Functions to inline SVGs and enable lazy loading */
require_once( 'library/attachment-functions.php' );

/** Add schema.org markup in JSON-LD format using ACF */
require_once( 'library/schema.php' );

/** Add breadcrumbs */
require_once( 'library/breadcrumbs.php' );

/** Change dashboard widgets */
require_once( 'library/dashboard-widgets.php' );

/** Remove comments */
//require_once( 'library/comments-remove.php' );

/** Remove post content type */
//require_once( 'library/post-remove.php' );
