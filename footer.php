<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 */
?>

<?php
/**
 * Footer
 */
?>
<footer id="footer" class="footer" tabindex="-1">
  <div class="section-spacing">
    <div class="grid-container">
      <div class="grid-x grid-padding-x grid-padding-y align-center-middle">
        <div class="cell medium-shrink medium-order-2">
          <nav aria-label="Privacy menu">
            <?php foundationpress_privacy_nav(); ?>
          </nav>
        </div>
        <div class="cell medium-auto medium-offset-1 text-center medium-order-1">
          &copy; <?php echo date('Y', strtotime("+2 months")); ?> <?php bloginfo('name'); ?> &bull;
          <span class="social-links"><?php get_template_part( 'template-parts/social', 'links' ); ?></span>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
