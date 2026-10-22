<?php
/**
 * Single journal entry.
 *
 * @package Christian_Motion
 */

get_header();
?>
<main id="primary" class="site-main editorial-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<header class="editorial-header shell-narrow" data-reveal>
				<p class="kicker"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p>
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?><p class="editorial-deck"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="editorial-image shell-wide" data-reveal><?php the_post_thumbnail( 'full' ); ?></figure>
			<?php endif; ?>

			<div class="entry-content shell-narrow" data-reveal>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</article>

		<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
