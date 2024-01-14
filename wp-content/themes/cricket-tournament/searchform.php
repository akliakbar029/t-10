<?php
/**
 * Template for displaying search forms in Cricket Tournament
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

?>

<?php $cricket_tournament_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $cricket_tournament_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'cricket-tournament' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'cricket-tournament' ); ?></button>
</form>