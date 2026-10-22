<?php
/**
 * Not found template.
 *
 * @package Christian_Motion
 */

get_header();
?>
<main id="primary" class="site-main error-main shell">
	<div class="error-code" aria-hidden="true">404</div>
	<div class="error-copy" data-reveal>
		<p class="kicker">Lost signal</p>
		<h1>This frame doesn’t exist.</h1>
		<p>The page may have moved, or the link was cut a little too early.</p>
		<a class="pill-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home</a>
	</div>
</main>
<?php get_footer(); ?>
