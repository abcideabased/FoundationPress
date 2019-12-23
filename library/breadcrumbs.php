<?php

// Add schema.org
function enable_schema() {
  return false; // Switch to true to enable schema.org support (Not needed if using SEO Framework)
}

// Breadcrumbs
function site_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
		$search_pg          = get_field('search_pg' ,'option');

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Activate schema.org if enabled
    if (enable_schema()) {
      $vocab = ' vocab="https://schema.org/"';
      $BreadcrumbList = ' typeof="BreadcrumbList"';
      $itemListElement = ' property="itemListElement"';
      $ListItem = ' typeof="ListItem"';
      $item = ' property="item"';
      $WebPage = ' typeof="WebPage"';
      $propName = ' property="name"';
    } else {
      $vocab = '';
      $BreadcrumbList = '';
      $itemListElement = '';
      $ListItem = '';
      $item = '';
      $WebPage = '';
      $propName = '';
    }

    // Build wrapper
    echo '<nav aria-label="You are here:"' . $vocab . $BreadcrumbList . '>';

    // Build the breadcrumbs
    echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

    // Home page
    echo '<li class="item-home"' . $itemListElement  . $ListItem . '><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '"' . $item . $WebPage . '><span' . $propName . '>' . $home_title . '</span></a></li>';
    //echo '<li class="separator separator-home"> ' . $separator . ' </li>';

    if ( is_archive() && !is_day() && !is_month() && !is_year() && !is_tax() && !is_category() && !is_tag() ) {
        echo '<li class="item-current item-archive"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-archive"><span' . $propName . '>' . post_type_archive_title('', false) . '</span></strong></li>';

    } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

        // If post is a custom post type
        $post_type = get_post_type();

        // If it is a custom post type display name and link
        if($post_type != 'post') {

            $post_type_object = get_post_type_object($post_type);
            $post_type_archive = get_post_type_archive_link($post_type);

            echo '<li class="item-cat item-custom-post-type-' . $post_type . '"' . $itemListElement  . $ListItem . '><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '"' . $item . $WebPage . '><span' . $propName . '>' . $post_type_object->labels->name . '</span></a></li>';
            //echo '<li class="separator"> ' . $separator . ' </li>';

        }

        $custom_tax_name = get_queried_object()->name;
        echo '<li class="item-current item-archive"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-archive"><span' . $propName . '>' . $custom_tax_name . '</span></strong></li>';

    } elseif(is_home() && !get_query_var('paged')) {
      // Get post page ID
      $page_for_posts = get_option( 'page_for_posts' );

      // Get post page object
      $post = get_post($page_for_posts);

      // Standard page
      if( $post->post_parent ){

          // If child page, get parents
          $anc = get_post_ancestors( $post->ID );

          // Get parents in the right order
          $anc = array_reverse($anc);

          // Parent page loop
          if ( !isset( $parents ) ) $parents = null;
          foreach ( $anc as $ancestor ) {
              $parents .= '<li class="item-parent item-parent-' . $ancestor . '"' . $itemListElement  . $ListItem . '><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"' . $item . $WebPage . '><span' . $propName . '>' . get_the_title($ancestor) . '</span></a></li>';
              //$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
          }

          // Display parent pages
          echo $parents;

          // Current page
          echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

      } else {

          // Just display current page if not parents
          echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '"><span' . $propName . '>' . get_the_title() . '</span></strong></li>';

      }
    } else if ( is_single() ) {

        // If post is a custom post type
        $post_type = get_post_type();

        // If it is a custom post type display name and link
        if($post_type != 'post') {

            $post_type_object = get_post_type_object($post_type);
            $post_type_archive = get_post_type_archive_link($post_type);

            echo '<li class="item-cat item-custom-post-type-' . $post_type . '"' . $itemListElement  . $ListItem . '><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '"' . $item . $WebPage . '><span' . $propName . '>' . $post_type_object->labels->name . '</span></a></li>';
            //echo '<li class="separator"> ' . $separator . ' </li>';

        }

        // Get post category info
        $category = get_the_category();

        if(!empty($category)) {

            // Get last category post is in
            $last_category = end($category);

            // Get parent any categories and create array
            $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
            $cat_parents = explode(',',$get_cat_parents);

            // Loop through parent categories and store in variable $cat_display
            $cat_display = '';
            foreach($cat_parents as $parents) {
                $cat_display .= '<li class="item-cat"' . $itemListElement  . $ListItem . '>'.$parents.'</li>';
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
            echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span' . $propName . '>' . get_the_title() . '</span></strong></li>';

        // Else if post is in a custom taxonomy
        } else if(!empty($cat_id)) {

            echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"' . $itemListElement  . $ListItem . '><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '"' . $item . $WebPage . '><span' . $propName . '>' . $cat_name . '</span></a></li>';
            //echo '<li class="separator"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span' . $propName . '>' . get_the_title() . '</span></strong></li>';

        } else {

            echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span' . $propName . '>' . get_the_title() . '</span></strong></li>';

        }

    } else if ( is_category() ) {

        // Category page
        echo '<li class="item-current item-cat"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-cat"><span' . $propName . '>' . single_cat_title('', false) . '</span></strong></li>';

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
                $parents .= '<li class="item-parent item-parent-' . $ancestor . '"' . $itemListElement  . $ListItem . '><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"' . $item . $WebPage . '><span' . $propName . '>' . get_the_title($ancestor) . '</span></a></li>';
                //$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
            }

            // Display parent pages
            echo $parents;

            // Current page
            echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

        } else {

            // Just display current page if not parents
            echo '<li class="item-current item-' . $post->ID . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . $post->ID . '"><span' . $propName . '>' . get_the_title() . '</span></strong></li>';

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
        echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span> <strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '"><span' . $propName . '>' . $get_term_name . '</span></strong></li>';

    } elseif ( is_day() ) {

        // Day archive

        // Year link
        echo '<li class="item-year item-year-' . get_the_time('Y') . '"' . $itemListElement  . $ListItem . '><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"' . $item . $WebPage . '><span' . $propName . '>' . get_the_time('Y') . ' Archives</span></a></li>';
        //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

        // Month link
        echo '<li class="item-month item-month-' . get_the_time('m') . '"' . $itemListElement  . $ListItem . '><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '"' . $item . $WebPage . '><span' . $propName . '>' . get_the_time('F') . '</span></a></li>';
        //echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

        // Day display
        echo '<li class="item-current item-' . get_the_time('j') . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-' . get_the_time('j') . '"><span' . $propName . '>' . get_the_time('jS') . '</span></strong></li>';

    } else if ( is_month() ) {

        // Month Archive

        // Year link
        echo '<li class="item-year item-year-' . get_the_time('Y') . '"' . $itemListElement  . $ListItem . '><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"' . $item . $WebPage . '><span' . $propName . '>' . get_the_time('Y') . ' Archives</span></a></li>';
        //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

        // Month display
        echo '<li class="item-month item-month-' . get_the_time('m') . '"' . $itemListElement  . $ListItem . '><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('F') . '</strong></li>';

    } else if ( is_year() ) {

        // Display year archive
        echo '<li class="item-current item-current-' . get_the_time('Y') . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '"><span' . $propName . '>' . get_the_time('Y') . ' Archives</span></strong></li>';

    } else if ( is_author() ) {

        // Auhor archive

        // Get the author information
        global $author;
        $userdata = get_userdata( $author );

        // Display author name
        echo '<li class="item-current item-current-' . $userdata->user_nicename . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '"><span' . $propName . '>' . 'Author: ' . $userdata->display_name . '</span></strong></li>';

    } else if ( is_home() && get_query_var('paged') ) {

      // Get post page ID
      $page_for_posts = get_option( 'page_for_posts' );

      // Get post page object
      $post = get_post($page_for_posts);

      // Paginated archives
      echo '<li class="item-current item-current-' . get_query_var('paged') . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '"><span' . $propName . '>'.__('Page') . ' ' . get_query_var('paged') . '</span></strong></li>';

    } else if ( get_query_var('paged') ) {

        // Paginated archives
        echo '<li class="item-current item-current-' . get_query_var('paged') . '"' . $itemListElement  . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '"><span' . $propName . '>'.__('Page') . ' ' . get_query_var('paged') . '</span></strong></li>';

    } else if ( is_search() ) {

				if($search_pg) {
					echo '<li class="item-parent item-parent-Search"><a href="'. $search_pg .'" title="Search">Search</a></li>';
				}
        // Search results page
        echo '<li class="item-current item-current-' . get_search_query() . '"' . $itemListElement . $ListItem . '><span class="show-for-sr">Current: </span><strong class="bread-current bread-current-' . get_search_query() . '" title="';
				if(!$search_pg) {
					echo 'Search ';
				}
				echo 'Results For: ' . get_search_query() . '"><span' . $propName . '>';
				if(!$search_pg) {
					echo 'Search ';
				}
				echo 'Results For: ' . get_search_query() . '</span></strong></li>';

    } elseif ( is_404() ) {

        // 404 page
        echo '<li' . $itemListElement  . $ListItem . '><span' . $propName . '>' . 'Error 404' . '</span></li>';
    }

    echo '</ul>';

    echo '</nav>'; // END wrapper

}
