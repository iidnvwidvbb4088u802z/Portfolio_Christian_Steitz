<?php
/**
 * Search form.
 *
 * @package Christian_Motion
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Type a keyword…" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="submit">Search</button>
</form>
