<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.

// Vars
$page_for_posts = get_option( 'page_for_posts' );

if ( is_home() &&  has_post_thumbnail( $page_for_posts ) ) : ?>

	<header class="featured-hero" data-interchange="[<?php echo get_the_post_thumbnail_url( $page_for_posts, 'small' ); ?>, small], [<?php echo get_the_post_thumbnail_url( $page_for_posts, 'medium' ); ?>, medium], [<?php echo get_the_post_thumbnail_url( $page_for_posts, 'large' ); ?>, large], [<?php echo get_the_post_thumbnail_url( $page_for_posts, 'xlarge' ); ?>, xlarge],[<?php echo get_the_post_thumbnail_url( $page_for_posts, 'medium' ); ?>, small-retina], [<?php echo get_the_post_thumbnail_url( $page_for_posts, 'large' ); ?>, medium-retina], [<?php echo get_the_post_thumbnail_url( $page_for_posts, 'xlarge' ); ?>, large-retina], [<?php echo get_the_post_thumbnail_url( $page_for_posts, 'full' ); ?>, xlarge-retina]">
	</header>

<?php elseif ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="featured-hero" data-interchange="[<?php the_post_thumbnail_url( 'small' ); ?>, small], [<?php the_post_thumbnail_url( 'medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'large' ); ?>, large], [<?php the_post_thumbnail_url( 'xlarge' ); ?>, xlarge],[<?php the_post_thumbnail_url( 'medium' ); ?>, small-retina], [<?php the_post_thumbnail_url( 'large' ); ?>, medium-retina], [<?php the_post_thumbnail_url( 'xlarge' ); ?>, large-retina], [<?php the_post_thumbnail_url( 'full' ); ?>, xlarge-retina]">
	</header>
<?php endif;
