<?php
/**
 * Standard page template.
 *
 * @package Christian_Motion
 */

get_header();
?>
<main id="primary" class="site-main editorial-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<header class="editorial-header shell-narrow" data-reveal>
				<p class="kicker">Page</p>
				<h1><?php the_title(); ?></h1>
			</header>
			<div class="entry-content shell-narrow" data-reveal>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
