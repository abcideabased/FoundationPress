<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<?php
		/**
		 * Skip Links
		 */
		?>
		<nav id="skip-links" class="skip-links" aria-label="Skip links">
			<a class="screen-reader-text" href="#menu">Skip to navigation</a>
			<a class="screen-reader-text" href="#content">Skip to content</a>
			<a class="screen-reader-text" href="#footer">Skip to footer</a>
		</nav>

		<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
			<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
		<?php endif; ?>

		<?php
		/**
		 * Cookies Notice
		 */
		?>
		<section id="cookies-notice" class="cookies-notice" aria-label="Cookies Notice" data-closable>
		  <header>
		    <h2 class="h5">Cookies</h2>
		  </header>
		  <p>We use cookies and related technologies to personalize and enhance your experience. By using this site you agree to the use of cookies and related tracking technologies.</p>
		  <button id="dismiss-cookies" class="small primary button" data-close>Dismiss</button>
		  <?php if(get_privacy_policy_url()): ?>
		    <a class="small dark button" href="<?php echo get_privacy_policy_url(); ?>">Privacy Policy</a>
		  <?php endif; ?>
		  <button id="dismiss-cookies-close" class="close-button" aria-label="Dismiss alert" data-close>
		    <span aria-hidden="true">&times;</span>
		  </button>
		</section>


		<?php // Front top frame
		if ( is_page_template( 'page-templates/front.php' ) ) {
			echo '<div class="top-frame grid-frame grid-y">';
		}
		?>

		<?php
		/**
		 * Site Header
		 */

		// Vars
		$logo_ID = get_field('logo_ID','option');
		$logo_size = array('',60);
		$logo = get_the_image($logo_ID,$logo_size);
		?>
		<div class="header-sticky-container" data-sticky-container>
			<header id="header" class="site-header sticky" data-sticky data-options="marginTop:0;">

				<?php
				/**
				 * Mobile Menu
				 */
				?>
				<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?> data-hide-for="large">
					<div class="title-bar-left">
						<div class="grid-x grid-padding-x">
							<div class="cell auto">
								<span class="site-mobile-title title-bar-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<span class="show-for-sr">Home: </span>
										<?php if($logo_ID): ?>
											<?php echo $logo; ?>
										<?php else: ?>
											<?php bloginfo( 'name' ); ?>
										<?php endif; ?>
									</a>
								</span>
							</div>
							<?php if(has_nav_menu('mobile-nav')): ?>
								<div class="cell shrink">
									<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<?php
				/**
				 * Desktop/Tablet Menu
				 */
				?>
				<div class="site-navigation top-bar">
					<div class="top-bar-left">
						<div class="site-desktop-title top-bar-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<span class="show-for-sr">Home: </span>
								<?php if($logo_ID): ?>
									<?php echo $logo; ?>
								<?php else: ?>
									<?php bloginfo( 'name' ); ?>
								<?php endif; ?>
							</a>
						</div>
					</div>
					<nav id="menu" class="top-bar-right" aria-label="Main menu" tabindex="-1">
						<?php foundationpress_top_bar_r(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</nav>
				</div>

			</header>
		</div>
