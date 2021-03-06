<?php
/**
 * Halt the main query in the case of an empty search
 *
 * If someone searches blank, they expect to get a blank page.
 * This helps people with disabilities to follow their intention.
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );
