<?php
/**
 * Complete project archive.
 *
 * @package Christian_Motion
 */

get_header();
?>
<main id="primary" class="site-main archive-main">
	<header class="archive-header shell" data-reveal>
		<p class="section-index">Portfolio / Archiv</p>
		<h1><?php post_type_archive_title(); ?></h1>
		<p>Film, Design, Motion und Sound – gesammelt an einem Ort.</p>
	</header>

	<div class="shell-wide">
		<?php if ( have_posts() ) : ?>
			<div class="project-grid archive-project-grid">
				<?php $project_index = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/project', 'card', array( 'index' => $project_index ) ); ?>
					<?php $project_index++; ?>
				<?php endwhile; ?>
			</div>

			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => __( 'Zurück', 'christian-motion' ),
					'next_text' => __( 'Weiter', 'christian-motion' ),
				)
			);
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
