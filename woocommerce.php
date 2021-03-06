<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">

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
