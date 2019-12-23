<?php
/**
 * This creates an ACF field to select a search page instead of the default
 * query page. Then overrides the search query permalink.
 */

 if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dfa9d21362b8',
	'title' => 'Search',
	'fields' => array(
		array(
			'key' => 'field_5dfa9d25aebdd',
			'label' => 'Search Page',
			'name' => 'search_pg',
			'type' => 'page_link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => '',
			'taxonomy' => '',
			'allow_null' => 1,
			'allow_archives' => 0,
			'multiple' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'site-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Used on the \'Site Settings\' page to select a custom search page instead of the default search query.',
));

endif;

if (get_field('search_pg','option')){

	function change_search_url() {
	    if ( is_search() && ! empty( $_GET['s'] ) && get_field('search_pg','option') ) {
	        wp_redirect( get_field('search_pg','option') . urlencode( get_query_var( 's' ) ) );
	        exit();
	    }
	}
	add_action( 'template_redirect', 'change_search_url' );

}
