<?php
/**
 * Large project card used in the Spotlight section.
 *
 * @package Christian_Motion
 */

$card_index = isset( $args['index'] ) ? (int) $args['index'] + 1 : 1;
$terms      = get_the_terms( get_the_ID(), 'discipline' );
$label      = $terms && ! is_wp_error( $terms ) ? implode( ' · ', wp_list_pluck( $terms, 'name' ) ) : __( 'Multimedia-Projekt', 'christian-motion' );
?>
<article <?php post_class( 'spotlight-card' ); ?> data-reveal="clip" style="--reveal-delay: <?php echo esc_attr( (string) ( ( $card_index - 1 ) * 120 ) ); ?>ms">
	<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Projekt ansehen: %s', 'christian-motion' ), get_the_title() ) ); ?>">
		<div class="spotlight-media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'christian-motion-spotlight', array( 'loading' => 'lazy' ) ); ?>
			<?php else : ?>
				<div class="demo-frame demo-frame-<?php echo esc_attr( (string) ( ( $card_index % 2 ) + 1 ) ); ?>" aria-hidden="true">
					<span><?php echo esc_html( str_pad( (string) $card_index, 2, '0', STR_PAD_LEFT ) ); ?></span>
				</div>
			<?php endif; ?>
			<span class="spotlight-number" aria-hidden="true"><?php echo esc_html( str_pad( (string) $card_index, 2, '0', STR_PAD_LEFT ) ); ?></span>
		</div>
		<div class="spotlight-copy">
			<p class="project-meta"><?php echo esc_html( $label ); ?></p>
			<h3><?php the_title(); ?></h3>
			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<span class="spotlight-link"><?php esc_html_e( 'Projekt öffnen', 'christian-motion' ); ?></span>
		</div>
	</a>
</article>
