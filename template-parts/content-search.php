<?php
/**
 * The default template for displaying the search
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php if(is_single()): ?> aria-labelledby="entry-title"<?php else: ?> aria-labelledby="entry-title-<?php the_ID(); ?>"<?php endif; ?>>
	<header>
		<h2 id="entry-title-<?php the_ID(); ?>" class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content">
		<?php if( !empty(get_the_excerpt())) {
			the_excerpt();
		} else {
			echo '<p><em>No description available.</em></p>';
		}
		?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
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
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>
