<?php
/**
 * Search results.
 *
 * @package Christian_Motion
 */

get_header();
?>
<main id="primary" class="site-main archive-main shell">
	<header class="archive-header" data-reveal>
		<p class="kicker">Search</p>
		<h1><?php echo esc_html( sprintf( __( 'Results for “%s”', 'christian-motion' ), get_search_query() ) ); ?></h1>
		<?php get_search_form(); ?>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="journal-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $post_type_object = get_post_type_object( get_post_type() ); ?>
				<article <?php post_class( 'journal-card' ); ?> data-reveal>
					<a href="<?php the_permalink(); ?>">
						<div class="journal-meta"><span><?php echo esc_html( $post_type_object ? $post_type_object->labels->singular_name : __( 'Content', 'christian-motion' ) ); ?></span></div>
						<h2><?php the_title(); ?></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
					</a>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
