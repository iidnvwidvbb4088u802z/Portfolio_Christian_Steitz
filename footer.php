<?php
/**
 * Site footer.
 *
 * @package Christian_Motion
 */
?>
<footer id="contact" class="site-footer">
	<div class="shell footer-top">
		<div class="footer-statement">
			<p class="footer-kicker">Open for ideas / <?php echo esc_html( wp_date( 'Y' ) ); ?></p>
			<h2>Let’s make<br>something move.</h2>
		</div>
		<div class="footer-contact">
			<p>Kontakt</p>
			<a href="mailto:christian.steitz@outlook.com">christian.steitz@outlook.com</a>
		</div>
	</div>

	<div class="shell footer-grid">
		<div class="footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Christian Steitz – Startseite', 'christian-motion' ); ?>">
				<img class="footer-logo-image" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cs-logo-cropped.png' ); ?>" alt="Christian Steitz">
			</a>
		</div>

		<div class="footer-column">
			<p class="footer-label">Bereiche</p>
			<a href="<?php echo esc_url( home_url( '/#discipline-design' ) ); ?>" data-discipline-link="design">Design</a>
			<a href="<?php echo esc_url( home_url( '/#discipline-motion' ) ); ?>" data-discipline-link="motion">Motion</a>
			<a href="<?php echo esc_url( home_url( '/#discipline-sound' ) ); ?>" data-discipline-link="sound">Sound</a>
		</div>

		<div class="footer-column">
			<p class="footer-label">Navigation</p>
			<a href="<?php echo esc_url( home_url( '/#spotlight' ) ); ?>">Spotlight</a>
			<a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">Über mich</a>
			<a href="<?php echo esc_url( home_url( '/#profile' ) ); ?>">Was ich mache</a>
			<a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>">Projekte</a>
			<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Kontakt</a>
		</div>

		<div class="footer-column">
			<p class="footer-label">Standort</p>
			<span>Schweiz</span>
			<span>Available worldwide</span>
		</div>
	</div>

	<div class="shell footer-bottom">
		<p>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Christian Steitz</p>
		<p>Eigenes WordPress Theme</p>
		<a href="#page">Nach oben</a>
	</div>
</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
