<?php
/**
 * Cricket Tournament Theme Page
 *
 * @package Cricket Tournament
 */

function cricket_tournament_admin_scripts() {
	wp_dequeue_script('cricket-tournament-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'cricket_tournament_admin_scripts' );

if ( ! defined( 'CRICKET_TOURNAMENT_FREE_THEME_URL' ) ) {
	define( 'CRICKET_TOURNAMENT_FREE_THEME_URL', 'https://www.themespride.com/themes/free-cricket-wordpress-theme/' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_PRO_THEME_URL' ) ) {
	define( 'CRICKET_TOURNAMENT_PRO_THEME_URL', 'https://www.themespride.com/themes/tournament-wordpress-theme/' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_DEMO_THEME_URL' ) ) {
	define( 'CRICKET_TOURNAMENT_DEMO_THEME_URL', 'https://www.themespride.com/cricket-tournament-pro/' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_DOCS_THEME_URL' ) ) {
    define( 'CRICKET_TOURNAMENT_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/cricket-tournament/' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_DOCS_URL' ) ) {
    define( 'CRICKET_TOURNAMENT_DOCS_URL', 'https://www.themespride.com/demo/docs/cricket-tournament/' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_RATE_THEME_URL' ) ) {
    define( 'CRICKET_TOURNAMENT_RATE_THEME_URL', 'https://wordpress.org/support/theme/cricket-tournament/reviews/#new-post' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_CHANGELOG_THEME_URL' ) ) {
    define( 'CRICKET_TOURNAMENT_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'CRICKET_TOURNAMENT_SUPPORT_THEME_URL' ) ) {
    define( 'CRICKET_TOURNAMENT_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/cricket-tournament/' );
}

/**
 * Add theme page
 */
function cricket_tournament_menu() {
	add_theme_page( esc_html__( 'About Theme', 'cricket-tournament' ), esc_html__( 'About Theme', 'cricket-tournament' ), 'edit_theme_options', 'cricket-tournament-about', 'cricket_tournament_about_display' );
}
add_action( 'admin_menu', 'cricket_tournament_menu' );

/**
 * Display About page
 */
function cricket_tournament_about_display() {
	$cricket_tournament_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $cricket_tournament_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$cricket_tournament_description = explode( '. ', $cricket_tournament_theme->get( 'Description' ) );

					array_pop( $cricket_tournament_description );

					$cricket_tournament_description = implode( '. ', $cricket_tournament_description );

					echo esc_html( $cricket_tournament_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( CRICKET_TOURNAMENT_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'cricket-tournament' ); ?></a>

					<a href="<?php echo esc_url( CRICKET_TOURNAMENT_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'cricket-tournament' ); ?></a>

					<a href="<?php echo esc_url( CRICKET_TOURNAMENT_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'cricket-tournament' ); ?></a>

					<a href="<?php echo esc_url( CRICKET_TOURNAMENT_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'cricket-tournament' ); ?></a>

					<a href="<?php echo esc_url( CRICKET_TOURNAMENT_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'cricket-tournament' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $cricket_tournament_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'cricket-tournament' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'cricket-tournament-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'cricket-tournament-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'cricket-tournament' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'cricket-tournament-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'cricket-tournament' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'cricket-tournament-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'cricket-tournament' ); ?></a>
		</nav>

		<?php
			cricket_tournament_main_screen();

			cricket_tournament_changelog_screen();

			cricket_tournament_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'cricket-tournament' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'cricket-tournament' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'cricket-tournament' ) : esc_html_e( 'Go to Dashboard', 'cricket-tournament' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function cricket_tournament_main_screen() {
	if ( isset( $_GET['page'] ) && 'cricket-tournament-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'cricket-tournament' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'cricket-tournament' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'cricket-tournament' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'cricket-tournament' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'cricket-tournament' ) ?></p>
				<p><a href="<?php echo esc_url( CRICKET_TOURNAMENT_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'cricket-tournament' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'cricket-tournament' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'cricket-tournament' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="cricket_tournament_text_copyied()"><?php esc_html_e( 'GETPro20', 'cricket-tournament' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function cricket_tournament_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'cricket-tournament' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'cricket_tournament_changelog_file', CRICKET_TOURNAMENT_CHANGELOG_THEME_URL );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = cricket_tournament_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function cricket_tournament_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function cricket_tournament_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'cricket-tournament' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'cricket-tournament' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'cricket-tournament' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'cricket-tournament' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'cricket-tournament' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a href="<?php echo esc_url( CRICKET_TOURNAMENT_PRO_THEME_URL ); ?>" class="sidebar-button single-btn" target="_blank"><?php esc_html_e( 'Go For Premium', 'cricket-tournament' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
