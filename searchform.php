<?php
/**
 * The template for displaying search form
 */

// Assigns unique IDs when multiple search forms are used
global $search_form_counter;
if ( ! isset( $search_form_counter ) ) $search_form_counter = 0;
$form_id = $search_form_counter ? '' : ' id="searchform"';
$text_id = $search_form_counter ? 's_' . $search_form_counter : 's';
$submit_id = $search_form_counter ? '' : ' id="searchsubmit"';
$search_form_counter++;

?>

<form role="search" method="get"<?php echo $form_id; ?> class="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="text" class="input-group-field" value="" name="s" id="<?php echo $text_id; ?>" aria-label="Search" placeholder="<?php
		esc_attr_e( 'Search', 'foundationpress' ); ?>">
		<div class="input-group-button">
			<input type="submit"<?php echo $submit_id; ?> class="searchsubmit button" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>">
		</div>
	</div>
</form>
