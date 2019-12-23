<?php
/*
Template Name: Search
*/

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">

		<div class="main-breadcrumb-full-width">
		  <?php site_breadcrumbs(); ?>
		</div>

		<main id="content" class="main-content-full-width" tabindex="-1">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'search-page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer();
