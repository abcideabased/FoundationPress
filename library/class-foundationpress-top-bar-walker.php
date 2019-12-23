<?php
/**
 * Customize the output of menus for Foundation top bar
 */

if ( ! class_exists( 'Foundationpress_Top_Bar_Walker' ) ) :
	class Foundationpress_Top_Bar_Walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output  = preg_replace( "/(.*)(\<li.*?class\=\")([^\"]*)(\".*?)$/", "$1$2$3$4", $output );
			$output .= "\n$indent<ul class=\"menu vertical nested\" data-toggle>\n";
		}
	}
endif;
