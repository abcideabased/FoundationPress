<?php
/**
 * The template for displaying search results pages.
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">

		<div class="main-breadcrumb-full-width">
		  <?php site_breadcrumbs(); ?>
		</div>

		<main id="content" class="main-content-full-width" tabindex="-1">
			<div id="search-results">

				<header>
					<h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h1>
				</header>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'search' ); ?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				<?php
				if ( function_exists( 'foundationpress_pagination' ) ) :
					foundationpress_pagination();
				elseif ( is_paged() ) :
				?>
					<nav id="post-nav" aria-label="Post navigation">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
					</nav>
				<?php endif; ?>

			</div>

		</main>

	</div>
</div>
<?php get_footer();
