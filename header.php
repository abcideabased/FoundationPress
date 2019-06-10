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
		 * Cookie Consent Popup
		 */
		?>
		<section id="privacy-consent" class="privacy-consent" aria-label="Privacy Consent Popup" style="position: fixed; bottom: 0; left: 0; right: 0; z-index: 999; width: calc(100% - 6rem); margin-bottom: 1rem; margin-left: auto; margin-right: auto;">
			<div class="callout" style="box-shadow: 0 0 30px rgba(0,0,0,.2); border-radius: 6px; border: 0;">
				<div class="grid-container full">
					<div class="grid-x grid-padding-x grid-padding-y align-center-middle">
						<div class="cell medium-auto text-center medium-text-left">
							We use cookies and other tracking technologies to improve your browsing experience on our website, to show you personalized content and targeted ads, to analyze our website traffic, and to understand where our visitors are coming from. By browsing our website, you consent to our use of cookies and other tracking technologies.
						</div>
						<div class="cell medium-shrink text-center">
							<button class="button secondary" data-open="privacy-popup" style="margin-bottom: 0;">Change My Preferences</button> <button class="button" style="margin-bottom: 0;">I agree</button>
						</div>
					</div>
				</div>
			</div>

			<div class="reveal privacy-popup large" id="privacy-popup" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
				<div class="grid-x grid-padding-x grid-padding-y">
					<div class="cell">
						<h2>Privacy Settings</h2>
					</div>
					<div class="cell large-3">
			      <ul class="vertical tabs" data-responsive-accordion-tabs="tabs medium-accordion large-tabs" id="privacy-tabs">
			        <li class="tabs-title is-active"><a href="#information-panel" aria-selected="true">Information</a></li>
			        <li class="tabs-title"><a href="#necessary-panel">Strictly Necessary Cookies</a></li>
			        <li class="tabs-title"><a href="#functionality-panel">Functionality Cookies</a></li>
			        <li class="tabs-title"><a href="#tracking-panel">Tracking &amp; Performance Cookies</a></li>
			        <li class="tabs-title"><a href="#advertising-panel">Targeting &amp; Advertising Cookies</a></li>
			      </ul>
			    </div>
					<div class="cell large-9 show-for-large">
			      <div class="tabs-content" data-tabs-content="privacy-tabs">
							<div class="tabs-panel is-active" id="information-panel">
								<div>
									<h3>Your privacy is important to us</h3>

									<p>Cookies are very small text files that are stored on your computer when you visit a website. We use cookies for a variety of purposes and to enhance your online experience on our website (for example, to remember your account login details).</p>

									<p>You can change your preferences and decline certain types of cookies to be stored on your computer while browsing our website. You can also remove any cookies already stored on your computer, but keep in mind that deleting cookies may prevent you from using parts of our website.</p>
								</div>
							</div>

							<div class="tabs-panel" id="necessary-panel">
								<h3>Strictly Necessary Cookies</h3>
								<p>These cookies are essential to provide you with services available through our website and to enable you to use certain features of our website.</p>
								<p>Without these cookies, we cannot provide you certain services on our website.</p>
								<div class="switch">
									<input class="switch-input disabled" id="necessary-yes-no" type="checkbox" name="necessarySwitch" checked disabled>
								  <label class="switch-paddle" for="necessary-yes-no">
								    <span class="show-for-sr">Allow strictly necessary cookies?</span>
								    <span class="switch-active" aria-hidden="true">Yes</span>
								    <span class="switch-inactive" aria-hidden="true">No</span>
								  </label>
								</div>
							</div>

			        <div class="tabs-panel" id="functionality-panel">
			          <h3>Functionality Cookies</h3>
			          <p>These cookies are used to provide you with a more personalized experience on our website and to remember choices you make when you use our website.</p>
								<p>For example, we may use functionality cookies to remember your language preferences or remember your login details.</p>
								<div class="switch">
									<input class="switch-input" id="functionality-yes-no" type="checkbox" name="functionalitySwitch" checked>
								  <label class="switch-paddle" for="functionality-yes-no">
								    <span class="show-for-sr">Allow functionality cookies?</span>
								    <span class="switch-active" aria-hidden="true">Yes</span>
								    <span class="switch-inactive" aria-hidden="true">No</span>
								  </label>
								</div>
			        </div>

							<div class="tabs-panel" id="tracking-panel">
			          <h3>Tracking &amp; Performance Cookies</h3>
			          <p>These cookies are used to collect information to analyze the traffic traffic to our website and how visitors are using our website.</p>
								<p>For example, these cookies may track things such as how long you spend on the website or the pages you visit which helps us to understand how we can improve our website site for you.</p>
								<p>The information collected through these tracking and performance cookies do not identify any individual visitor.</p>
								<div class="switch">
									<input class="switch-input" id="tracking-yes-no" type="checkbox" name="trackingSwitch" checked>
								  <label class="switch-paddle" for="tracking-yes-no">
								    <span class="show-for-sr">Allow tracking &amp; performance cookies?</span>
								    <span class="switch-active" aria-hidden="true">Yes</span>
								    <span class="switch-inactive" aria-hidden="true">No</span>
								  </label>
								</div>
			        </div>

			        <div class="tabs-panel" id="advertising-panel">
			          <h3>Targeting &amp; Advertising Cookies</h3>
			          <p>These cookies are used to show advertising that is likely to be of interest to you based on your browsing habits.</p>
								<p>These cookies, as served by our content and/or advertising providers, may combine information they collected from our website with other information they have independently collected relating to your web browser's activities across their network of websites.</p>
								<p>If you choose to remove or disable these targeting or advertising cookies, you will still see adverts but they may not be relevant to you.</p>
								<div class="switch">
									<input class="switch-input" id="advertising-yes-no" type="checkbox" name="advertisingSwitch" checked>
								  <label class="switch-paddle" for="advertising-yes-no">
								    <span class="show-for-sr">Allow targeting &amp; advertising cookies?</span>
								    <span class="switch-active" aria-hidden="true">Yes</span>
								    <span class="switch-inactive" aria-hidden="true">No</span>
								  </label>
								</div>
			        </div>

			      </div>
			    </div>
					<div class="cell text-center large-text-right">
						<input class="button" type="submit" value="Save Preferences" />
					</div>
				</div>
				<button class="close-button" data-close aria-label="Close modal" type="button">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>

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
							<div class="cell shrink">
								<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
							</div>
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
