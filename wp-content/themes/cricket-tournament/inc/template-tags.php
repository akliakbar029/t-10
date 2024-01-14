<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cricket_tournament_categorized_blog() {
	$cricket_tournament_category_count = get_transient( 'cricket_tournament_categories' );

	if ( false === $cricket_tournament_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$cricket_tournament_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$cricket_tournament_category_count = count( $cricket_tournament_categories );

		set_transient( 'cricket_tournament_categories', $cricket_tournament_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $cricket_tournament_category_count > 1;
}

if ( ! function_exists( 'cricket_tournament_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Cricket Tournament
 */
function cricket_tournament_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in cricket_tournament_categorized_blog.
 */
function cricket_tournament_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cricket_tournament_categories' );
}
add_action( 'edit_category', 'cricket_tournament_category_transient_flusher' );
add_action( 'save_post',     'cricket_tournament_category_transient_flusher' );
