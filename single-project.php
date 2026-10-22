<?php
/**
 * Complete case-study page for one portfolio project.
 *
 * Everything inside the project content comes from the Gutenberg editor, so
 * images, galleries, text and YouTube/Vimeo embeds can be mixed freely.
 *
 * @package Christian_Motion
 */

get_header();
?>
<main id="primary" class="site-main project-single">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<header class="project-hero shell">
				<div class="project-hero-meta" data-reveal>
					<p>Case Study / <?php echo esc_html( get_the_date( 'Y' ) ); ?></p>
					<?php
					$terms = get_the_terms( get_the_ID(), 'discipline' );
					if ( $terms && ! is_wp_error( $terms ) ) :
						?>
						<p><?php echo esc_html( implode( ' · ', wp_list_pluck( $terms, 'name' ) ) ); ?></p>
					<?php endif; ?>
				</div>

				<h1 data-reveal><?php the_title(); ?></h1>

				<?php if ( has_excerpt() ) : ?>
					<p class="project-deck" data-reveal><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="project-featured shell-wide" data-reveal>
					<?php the_post_thumbnail( 'full' ); ?>
				</figure>
			<?php endif; ?>

			<div class="project-story shell-narrow" data-reveal>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</article>

		<nav class="project-navigation shell" aria-label="<?php esc_attr_e( 'Weitere Projekte', 'christian-motion' ); ?>">
			<div class="project-nav-side project-nav-prev">
				<p><?php esc_html_e( 'Vorheriges Projekt', 'christian-motion' ); ?></p>
				<?php previous_post_link( '%link', '%title', false, '', 'discipline' ); ?>
			</div>
			<a class="project-nav-all" href="<?php echo esc_url( home_url( '/#projects' ) ); ?>"><?php esc_html_e( 'Alle Projekte', 'christian-motion' ); ?></a>
			<div class="project-nav-side project-nav-next">
				<p><?php esc_html_e( 'Nächstes Projekt', 'christian-motion' ); ?></p>
				<?php next_post_link( '%link', '%title', false, '', 'discipline' ); ?>
			</div>
		</nav>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
