<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid sidebar-left">

		<div class="main-breadcrumb">
		  <?php site_breadcrumbs(); ?>
		</div>

		<main id="content" class="main-content" tabindex="-1">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
