<?php
/**
 * Customize the output of menus for Foundation mobile walker
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/**
 * Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
 */

if ( ! class_exists( 'Foundationpress_Mobile_Walker' ) ) :
	class Foundationpress_Mobile_Walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output  = preg_replace( "/(.*)(\<li.*?class\=\")([^\"]*)(\".*?)$/", "$1$2$3 is-dropdown-submenu-parent$4", $output );
			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
		}
	}
endif;
