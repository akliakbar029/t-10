<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function cricket_tournament_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'SportsPress', 'cricket-tournament' ),
			'slug'             => 'sportspress',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),

		array(
			'name'             => __( 'SportsPress for Cricket', 'cricket-tournament' ),
			'slug'             => 'sportspress-for-cricket',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cricket_tournament_register_recommended_plugins' );
