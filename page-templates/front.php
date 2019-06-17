<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php
/**
 * Hero
 */
?>
<div class="front-hero full-height" aria-labelledby="hero-title">
	<div class="reversed full-height">
		<div class="grid-container full-height">
			<div class="grid-x full-height align-center-middle">
				<div class="cell medium-8 large-6">
					<article class="marketing text-center">
						<header class="tagline">
							<h1 id="hero-title" class="hero-title"><?php the_title(); ?></h1>
							<h2 class="h4"><?php bloginfo( 'description' ); ?></h2>
						</header>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>
<?php // END Hero ?>

<?php // END Top Frame
echo '</div>'; ?>

<main id="content" tabindex="-1">

	<?php
	/**
	 * Intro
	 */

	$image_id = get_field('image');
	$image = get_the_image($image_id,'small', false, array('class' => 'lazy'));
	?>
	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('intro'); ?> id="post-<?php the_ID(); ?>">
		<div class="section-spacing">
			<div class="grid-container">

					<div class="grid-x grid-padding-x grid-padding-y align-center-middle">
						<div class="cell small-3 medium-5 large-4 text-center medium-text-left">


						</div>
						<div class="cell medium-7 large-8 text-center medium-text-left">
							<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
							<header class="show-for-sr">
							<h2 id="intro-title" class="intro-title">Intro</h2>
							</header>
							<div class="intro-content">
								<?php the_content(); ?>
							</div>
							<footer>
								<?php
									wp_link_pages(
										array(
											'before' => '<nav id="page-nav" aria-label="Page navigation"><p>' . __( 'Pages:', 'foundationpress' ),
											'after'  => '</p></nav>',
										)
									);
								?>
								<p><?php the_tags(); ?></p>
							</footer>
							<?php do_action( 'foundationpress_page_before_comments' ); ?>
							<?php comments_template(); ?>
							<?php do_action( 'foundationpress_page_after_comments' ); ?>
						</div>
					</div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php // END Intro ?>


	<?php
	/**
	 * Latest Posts
	 */

	// Vars
	$posts_total = 3;
	?>

	<?php // WP_Query arguments
	$args = array(
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'paged'                  => '1',
		'posts_per_page'         => $posts_total,
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) : ?>
	<section class="latest-posts" aria-labelledby="latest-post-title">
		<div class="section-spacing">
			<div class="grid-container">
				<div class="grid-x grid-padding-x grid-padding-y align-center align-stretch">
					<div class="cell reversed">
						<header>
							<h2 id="latest-post-title" class="latest-post-title text-center">Latest Posts</h2>
						</header>
					</div>

					<?php $i = 1; // Count ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php // The content ?>
					<div class="cell small-8 medium-6 large-4 text-center<?php if($i == $posts_total): ?> hide-for-medium-only<?php endif; ?>">
						<article <?php post_class(''); ?> id="post-<?php the_ID(); ?>" aria-labelledby="post-title-<?php the_ID(); ?>">
							<a class="card card-link full-height" href="<?php the_permalink(); ?>">
								<div class="card-image">
									<?php if ( has_post_thumbnail( $post->ID ) ) :
										echo the_post_thumbnail('small');
									endif; ?>
								</div>
							  <div class="card-section">
									<header>
										<h3 id="post-title-<?php the_ID(); ?>" class="post-title"><?php the_title(); ?></h3>
									</header>
									<?php the_excerpt(); ?>
							  </div>
							</a>
						</article>
					</div>

					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
	<?php // END Latest Posts ?>

	<?php endif; ?>

	<?php // Restore original Post Data
	wp_reset_postdata(); ?>

<?php echo $image; ?>
</main>


<?php get_footer();
