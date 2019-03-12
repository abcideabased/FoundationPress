<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="featured-hero" data-interchange="[<?php the_post_thumbnail_url( 'small' ); ?>, small], [<?php the_post_thumbnail_url( 'medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'large' ); ?>, large], [<?php the_post_thumbnail_url( 'xlarge' ); ?>, xlarge],[<?php the_post_thumbnail_url( 'medium' ); ?>, small-retina], [<?php the_post_thumbnail_url( 'large' ); ?>, medium-retina], [<?php the_post_thumbnail_url( 'xlarge' ); ?>, large-retina], [<?php the_post_thumbnail_url( 'full' ); ?>, xlarge-retina]">
	</header>
<?php endif;
