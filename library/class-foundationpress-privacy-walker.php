<?php
/**
 * Customize the output of menus for Foundation privacy walker
 */

if ( ! class_exists( 'Foundationpress_Privacy_Walker' ) ) :
	class Foundationpress_Privacy_Walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output  = preg_replace( "/(.*)(\<li.*?class\=\")([^\"]*)(\".*?)$/", "$1$2$3 is-dropdown-submenu-parent$4", $output );
			$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-toggle>\n";
		}
	}
endif;
