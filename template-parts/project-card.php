<?php
/**
 * Compact project card used by the home page and project archive.
 *
 * @package Christian_Motion
 */

$card_index = isset( $args['index'] ) ? (int) $args['index'] + 1 : 1;
$terms      = get_the_terms( get_the_ID(), 'discipline' );
$label      = $terms && ! is_wp_error( $terms ) ? implode( ' · ', wp_list_pluck( $terms, 'name' ) ) : __( 'Multimedia-Projekt', 'christian-motion' );
?>
<article <?php post_class( 'project-card' ); ?> data-gsap-project>
	<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Projekt ansehen: %s', 'christian-motion' ), get_the_title() ) ); ?>">
		<div class="project-card-media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'christian-motion-grid', array( 'loading' => 'lazy' ) ); ?>
			<?php else : ?>
				<div class="demo-frame demo-frame-<?php echo esc_attr( (string) ( ( ( $card_index - 1 ) % 6 ) + 1 ) ); ?>" aria-hidden="true">
					<span><?php echo esc_html( str_pad( (string) $card_index, 2, '0', STR_PAD_LEFT ) ); ?></span>
				</div>
			<?php endif; ?>
		</div>
		<div class="project-card-overlay">
			<p><?php echo esc_html( $label ); ?></p>
			<h3><?php the_title(); ?></h3>
		</div>
	</a>
</article>
