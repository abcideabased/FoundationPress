<?php
function cleanup_default_rewrite_rules( $rules ) {
    foreach ( $rules as $regex => $query ) {
        if ( strpos( $regex, 'attachment' ) || strpos( $query, 'attachment' ) ) {
            unset( $rules[ $regex ] );
        }
    }

    return $rules;
}
add_filter( 'rewrite_rules_array', 'cleanup_default_rewrite_rules' );


function cleanup_attachment_link( $link ) {
    return;
}
add_filter( 'attachment_link', 'cleanup_attachment_link' );
