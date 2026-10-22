<?php
/**
 * Blog and fallback template.
 *
 * @package Christian_Motion
 */

get_header();
$journal_title = single_post_title( '', false );
?>
<main id="primary" class="site-main archive-main shell">
	<header class="archive-header" data-reveal>
		<p class="kicker">Notes, process &amp; references</p>
		<h1><?php echo esc_html( $journal_title ? $journal_title : __( 'Journal', 'christian-motion' ) ); ?></h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="journal-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'journal-card' ); ?> data-reveal>
					<a href="<?php the_permalink(); ?>">
						<div class="journal-meta">
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
							<span><?php echo esc_html( wp_strip_all_tags( get_the_category_list( ', ' ) ) ); ?></span>
						</div>
						<h2><?php the_title(); ?></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
					</a>
				</article>
			<?php endwhile; ?>
		</div>

		<?php
		the_posts_pagination(
			array(
				'mid_size'  => 1,
				'prev_text' => __( 'Newer', 'christian-motion' ),
				'next_text' => __( 'Older', 'christian-motion' ),
			)
		);
		?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
