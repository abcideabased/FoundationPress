<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">

		<?php // If breadcrumbs are unused hide visually rather than removing it ?>
		<div class="main-breadcrumb">
		  <?php site_breadcrumbs(); ?>
		</div>

		<main id="content" class="main-content" tabindex="-1">
			<?php woocommerce_content(); ?>
		</main>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
