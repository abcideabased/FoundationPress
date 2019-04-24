<?php
// Breadcrumbs
function site_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build wrapper
        echo '<nav aria-label="You are here:" vocab="https://schema.org/" typeof="BreadcrumbList">';

        // Build the breadcrumbs
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home" property="itemListElement" typeof="ListItem"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '" property="item" typeof="WebPage"><span property="name">' . $home_title . '</span></a></li>';
        //echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-archive"><span property="name">' . post_type_archive_title($prefix, false) . '</span></strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '" property="itemListElement" typeof="ListItem"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '" property="item" typeof="WebPage"><span property="name">' . $post_type_object->labels->name . '</span></a></li>';
                //echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-archive"><span property="name">' . $custom_tax_name . '</span></strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '" property="itemListElement" typeof="ListItem"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '" property="item" typeof="WebPage"><span property="name">' . $post_type_object->labels->name . '</span></a></li>';
                //echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat" property="itemListElement" typeof="ListItem">'.$parents.'</li>';
                    //$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span property="name">' . get_the_title() . '</span></strong></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '" property="itemListElement" typeof="ListItem"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '" property="item" typeof="WebPage"><span property="name">' . $cat_name . '</span></a></li>';
                //echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span property="name">' . get_the_title() . '</span></strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span property="name">' . get_the_title() . '</span></strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-cat"><span property="name">' . single_cat_title('', false) . '</span></strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '" property="itemListElement" typeof="ListItem"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '" property="item" typeof="WebPage"><span property="name">' . get_the_title($ancestor) . '</span></a></li>';
                    //$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '"><span property="name">' . get_the_title() . '</span></strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span> <strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '"><span property="name">' . $get_term_name . '</span></strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '" property="itemListElement" typeof="ListItem"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '" property="item" typeof="WebPage"><span property="name">' . get_the_time('Y') . ' Archives</span></a></li>';
            //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '" property="itemListElement" typeof="ListItem"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '" property="item" typeof="WebPage"><span property="name">' . get_the_time('M') . ' Archives</span></a></li>';
            //echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . get_the_time('j') . '"><span property="name">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '" property="itemListElement" typeof="ListItem"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '" property="item" typeof="WebPage"><span property="name">' . get_the_time('Y') . ' Archives</span></a></li>';
            //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '" property="itemListElement" typeof="ListItem"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '"><span property="name">' . get_the_time('Y') . ' Archives</span></strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '"><span property="name">' . 'Author: ' . $userdata->display_name . '</span></strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '"><span property="name">'.__('Page') . ' ' . get_query_var('paged') . '</span></strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '" property="itemListElement" typeof="ListItem"><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '"><span property="name">Search results for: ' . get_search_query() . '</span></strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li property="itemListElement" typeof="ListItem"><span property="name">' . 'Error 404' . '</span></li>';
        }

        echo '</ul>';

        echo '</nav>'; // END wrapper

    }

}
