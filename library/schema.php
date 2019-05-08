<?php
if( class_exists('acf') ) {
  if(get_field('schema_type', 'options')) {
    add_action('wp_footer', function() {

      $schema['@context'] = "http://schema.org";
      $schema['@type'] = get_field('schema_type', 'options');
      $schema['name'] = get_bloginfo('name');
      $schema['url'] = get_home_url();
      if(get_field('schema_type', 'option') != 'Person') {
        $schema['slogan'] = get_bloginfo('description');
      }

      // Address
      if(get_field('address_street', 'option')) {
        $schema['address'] = array(
          '@type'           => 'PostalAddress',
          'streetAddress'   => get_field('address_street', 'option'),
          'postalCode'      => get_field('address_postal', 'option'),
          'addressLocality' => get_field('address_locality', 'option'),
          'addressRegion'   => get_field('address_region', 'option'),
          'addressCountry'  => get_field('address_country', 'option')
        );
      }

      // Geo Location
      if(get_field('schema_type', 'option') != 'Organization' && get_field('schema_type', 'option') != 'Person') {
        if(get_field('address_lat', 'option')
          || get_field('address_lng', 'option')) {
          $schema['geo'] = array(
            '@type'      => 'GeoCoordinates',
            'latitude'   => get_field('address_lat', 'option'),
            'longitude'  => get_field('address_lng', 'option')
          );
        }
      }

      // Email
      if (get_field('company_email', 'option')) {
        $schema['email'] = get_field('company_email', 'options');
      }

      // Main Phone
      if (get_field('company_phone', 'option')) {
          $schema['telephone'] = '+1' . get_field('company_phone', 'option');
      }

      // Main Fax
      if (get_field('company_fax', 'option')) {
          $schema['faxNumber'] = '+1' . get_field('company_fax', 'option');
      }

      // Logo
      if(get_field('schema_type', 'option') != 'Person') {
        if (get_field('company_logo_ID', 'option')) {
            $schema['logo'] = wp_get_attachment_image_url(get_field('company_logo_ID', 'option'), 'xlarge');
        }
      }

      // Image
      if (get_field('company_image_ID', 'option')) {
          $schema['image'] = wp_get_attachment_image_url(get_field('company_image_ID', 'option'), 'xlarge');
      }

      // Price Range
      if(get_field('schema_type', 'option') != 'Organization' && get_field('schema_type', 'option') != 'Person') {
        if (get_field('price_range', 'option')) {
          $schema['priceRange'] = get_field('price_range', 'option');
        }
      }

      // Cuisine
      if(get_field('schema_type', 'option') == 'Restaurant') {
          $schema['servesCuisine'] = array();
          while (have_rows('cuisines', 'options')) : the_row();
          array_push($schema['servesCuisine'], get_sub_field('type'));
          endwhile;
      }

      // Social Media
      if(
        get_field('fb_url', 'option') ||
        get_field('tw_url', 'option') ||
        get_field('li_url', 'option') ||
        get_field('yt', 'option')['url'] ||
        get_field('ig_url', 'option') ||
        get_field('sc_url', 'option')) {
        $schema['sameAs'] = array(); // Start array

        // Facebook
        if(get_field('fb_url', 'option')) {
          array_push($schema['sameAs'], get_field('fb_url', 'option'));
        }

        // Twitter
        if(get_field('tw_url', 'option')) {
          array_push($schema['sameAs'], get_field('tw_url', 'option'));
        }

        // LinkedIn
        if(get_field('li_url', 'option')) {
          array_push($schema['sameAs'], get_field('li_url', 'option'));
        }

        // YouTube
        if(get_field('yt', 'option')['sub']){ $yt_sub = '?sub_confirmation=1'; }
        if(get_field('yt', 'option')['url']) {
          array_push($schema['sameAs'], get_field('yt', 'option')['url'] . $yt_sub);
        }

        // Instagram
        if(get_field('ig_url', 'option')) {
          array_push($schema['sameAs'], get_field('ig_url', 'option'));
        }

        // Snapchat
        if(get_field('sc_url', 'option')) {
          array_push($schema['sameAs'], get_field('sc_url', 'option'));
        }
      } // endif, social media

      // Opening Hours
      if(get_field('schema_type', 'option') != 'Organization' && get_field('schema_type', 'option') != 'Person') {
        if (have_rows('opening_hours', 'option')) {
            $schema['openingHoursSpecification'] = array();
            while (have_rows('opening_hours', 'option')) : the_row();
                $closed = get_sub_field('closed');
                $from   = $closed ? '00:00' : get_sub_field('from');
                $to     = $closed ? '00:00' : get_sub_field('to');
                $openings = array(
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => get_sub_field('days'),
                    'opens'     => $from,
                    'closes'    => $to
                );
                array_push($schema['openingHoursSpecification'], $openings);
            endwhile;
            /// VACATIONS / HOLIDAYS
            if (have_rows('special_days', 'option')) {
                while (have_rows('special_days', 'option')) : the_row();
                    $closed    = get_sub_field('closed');
                    $date_from = get_sub_field('date_from');
                    $date_to   = get_sub_field('date_to');
                    $time_from = $closed ? '00:00' : get_sub_field('time_from');
                    $time_to   = $closed ? '00:00' : get_sub_field('time_to');
                    $special_days = array(
                        '@type'        => 'OpeningHoursSpecification',
                        'validFrom'    => $date_from,
                        'validThrough' => $date_to,
                        'opens'        => $time_from,
                        'closes'       => $time_to
                    );
                    array_push($schema['openingHoursSpecification'], $special_days);
                endwhile;
            }
        }
      }

      // Contact Points
      if (get_field('contact', 'options')) {
          $schema['contactPoint'] = array();
          while (have_rows('contact', 'options')) : the_row();
              $contacts = array(
                  '@type'       => 'ContactPoint',
                  'contactType' => get_sub_field('type'),
                  'telephone'   => '+1' . get_sub_field('phone')
              );
              if (get_sub_field('option')) {
                  $contacts['contactOption'] = get_sub_field('option');
              }
              array_push($schema['contactPoint'], $contacts);
          endwhile;
      }
      echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    });
  }
}
