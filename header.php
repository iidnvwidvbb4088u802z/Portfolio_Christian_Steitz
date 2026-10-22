<?php
/**
 * Site header.
 *
 * On the front page it sits directly over the hero video. On project and
 * standard pages it becomes a solid navigation bar.
 *
 * @package Christian_Motion
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>document.documentElement.classList.add('js');</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Zum Inhalt springen', 'christian-motion' ); ?></a>

<div id="page" class="site">
<header class="site-header" data-site-header>
	<div class="shell header-inner">
		<div class="site-branding">
			<a class="brand-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php esc_attr_e( 'Christian Steitz – Startseite', 'christian-motion' ); ?>">
				<img class="brand-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cs-logo-cropped.png' ); ?>" alt="Christian Steitz">
			</a>
		</div>

		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
			<span class="menu-toggle-label" data-menu-label><?php esc_html_e( 'Menü', 'christian-motion' ); ?></span>
			<span class="menu-toggle-icon" aria-hidden="true"><i></i><i></i></span>
		</button>

		<nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Hauptnavigation', 'christian-motion' ); ?>">
			<span class="nav-index" aria-hidden="true">Navigation / 01—03</span>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'fallback_cb'    => 'christian_motion_menu_fallback',
				)
			);
			?>
			<a class="header-contact" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">
				<?php esc_html_e( 'Kontakt', 'christian-motion' ); ?>
			</a>
		</nav>
	</div>
</header>
