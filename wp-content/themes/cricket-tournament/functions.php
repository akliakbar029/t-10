<?php
/**
 * Cricket Tournament functions and definitions
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

function cricket_tournament_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'cricket-tournament-featured-image', 2000, 1200, true );
	add_image_size( 'cricket-tournament-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'cricket-tournament' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', cricket_tournament_fonts_url() ) );
}
add_action( 'after_setup_theme', 'cricket_tournament_setup' );

/**
 * Register custom fonts.
 */
function cricket_tournament_fonts_url(){
	$cricket_tournament_font_url = '';
	$cricket_tournament_font_family = array();
	$cricket_tournament_font_family[] = 'Inter:wght@100;200;300;400;500;600;700;800;900';
	$cricket_tournament_font_family[] = 'Lexend:wght@100;200;300;400;500;600;700;800;900';

	$cricket_tournament_query_args = array(
		'family'	=> rawurlencode(implode('|',$cricket_tournament_font_family)),
	);
	$cricket_tournament_font_url = add_query_arg($cricket_tournament_query_args,'//fonts.googleapis.com/css');
	return $cricket_tournament_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $cricket_tournament_font_url ) );
}

/**
 * Register widget area.
 */
function cricket_tournament_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'cricket-tournament' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'cricket-tournament' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'cricket-tournament' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'cricket-tournament' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'cricket-tournament' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'cricket-tournament' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'cricket-tournament' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cricket-tournament' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'cricket_tournament_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cricket_tournament_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'cricket-tournament-fonts', cricket_tournament_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'cricket-tournament-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'cricket-tournament-style',$cricket_tournament_tp_theme_css );
	wp_enqueue_style( 'cricket-tournament-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'cricket-tournament-style',$cricket_tournament_tp_theme_css );
	wp_style_add_data('cricket-tournament-style', 'rtl', 'replace');
	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'cricket-tournament-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	wp_enqueue_style( 'cricket-tournament-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'cricket-tournament-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'cricket-tournament-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'cricket-tournament-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cricket_tournament_scripts' );

//Admin Enqueue for Admin
function cricket_tournament_admin_enqueue_scripts(){
	wp_enqueue_style('cricket-tournament-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'cricket-tournament-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'cricket_tournament_admin_enqueue_scripts' );

function cricket_tournament_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="cricket-tournament-getting-started-notice clearfix">
            <div class="cricket-tournament-theme-notice-content">
                <h2 class="cricket-tournament-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'cricket-tournament' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'cricket-tournament')) ?></p>

                <a class="cricket-tournament-btn-get-started button button-primary button-hero cricket-tournament-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=cricket-tournament-about' )); ?>" ><?php esc_html_e( 'Get started', 'cricket-tournament' ) ?></a><span class="cricket-tournament-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'cricket_tournament_activation_notice' );

define('CRICKET_TOURNAMENT_CREDIT',__('https://www.themespride.com/themes/free-cricket-wordpress-theme/','cricket-tournament') );
if ( ! function_exists( 'cricket_tournament_credit' ) ) {
	function cricket_tournament_credit(){
		echo "<a href=".esc_url(CRICKET_TOURNAMENT_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('cricket_tournament_footer_text',__('Cricket Tournament WordPress Theme','cricket-tournament')))."</a>";
	}
}

// Category count 
function display_post_category_count() {
    $category = get_the_category();
    $category_count = ($category) ? count($category) : 0;
    $category_text = ($category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $category_count . ' ' . $category_text;
}

//Post Tag
function custom_tags_filter($tag_list) {
    // Replace the comma (,) with an empty string
    $tag_list = str_replace(', ', '', $tag_list);

    return $tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $tags = get_the_tags();

    if ($tags) {
        $tags_output = '<div class="post_tag">Tags: ';

        $first_tag = reset($tags);

        foreach ($tags as $tag) {
            $tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $first_tag) {
                $tags_output .= ' ';
            }
        }

        $tags_output .= '</div>';

        echo $tags_output;
    }
}
/*radio button sanitization*/
function cricket_tournament_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


function cricket_tournament_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'cricket_tournament_loop_columns');
if (!function_exists('cricket_tournament_loop_columns')) {
	function cricket_tournament_loop_columns() {
		$columns = get_theme_mod( 'cricket_tournament_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'cricket_tournament_per_page', 20 );
function cricket_tournament_per_page( $cols ) {
  	$cols = get_theme_mod( 'cricket_tournament_product_per_page', 9 );
	return $cols;
}

function cricket_tournament_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function cricket_tournament_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Sanitize Sortable control.
function cricket_tournament_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}
function cricket_tournament_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function cricket_tournament_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'cricket_tournament_front_page_template' );

/**
 * Logo Custamization.
 */

function cricket_tournament_logo_width(){

	$cricket_tournament_logo_width   = get_theme_mod( 'cricket_tournament_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $cricket_tournament_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'cricket_tournament_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

/**
 * TGM Recommendation
 */
require get_parent_theme_file_path( '/inc/TGM/tgm.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );
