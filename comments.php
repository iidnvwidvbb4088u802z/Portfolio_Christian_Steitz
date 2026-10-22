<?php
/**
 * Comments template.
 *
 * @package Christian_Motion
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area shell-narrow">
	<?php if ( have_comments() ) : ?>
		<h2><?php echo esc_html( sprintf( _n( '%s comment', '%s comments', get_comments_number(), 'christian-motion' ), number_format_i18n( get_comments_number() ) ) ); ?></h2>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
