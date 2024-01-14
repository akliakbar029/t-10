<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses cricket_tournament_header_style()
 */
function cricket_tournament_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cricket_tournament_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'  			 => true,
		'flex-height'  			 => true,
		'wp-head-callback'       => 'cricket_tournament_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'cricket_tournament_custom_header_setup' );

if ( ! function_exists( 'cricket_tournament_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see cricket_tournament_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'cricket_tournament_header_style' );
function cricket_tournament_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$cricket_tournament_custom_css = "
        .headerbox,.header-img{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
			background-size: cover !important;
		}";
	   	wp_add_inline_style( 'cricket-tournament-style', $cricket_tournament_custom_css );
	endif;
}
endif;
