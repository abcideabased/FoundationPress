<?php
/**
 * Remove type= from <script> and <style>
 *
 * This will remove these HTML5 markup warnings
 */

//* Remove type tag from script and style
add_filter('style_loader_tag', 'remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'remove_type_attr', 10, 2);
add_filter('autoptimize_html_after_minify', 'remove_type_attr', 10, 2);
function remove_type_attr($tag, $handle='')
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
