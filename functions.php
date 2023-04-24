<?php
/**
 * rspl base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rspl_base
 */

if ( ! defined( 'RSPL_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'RSPL_THEME_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rspl_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on rspl base, use a find and replace
		* to change 'rspl_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rspl_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	$editor_stylesheet_path = './assets/css/style-editor.css';
	add_editor_style ( $editor_stylesheet_path );

	// This theme uses wp_nav_menu() in 4 location.
	register_nav_menus(
		array(
			'header'	=> __( 'Header Navigation', 'rspl_theme' ),
			'mobile'	=> __( 'Mobile Navigation', 'rspl_theme' ),
			'social'	=> __( 'Social Links Navigation','rspl_theme' ),
			'footer'	=> __( 'Footer Navigation', 'rspl_theme' ),
		)
	);

}
add_action( 'after_setup_theme', 'rspl_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rspl_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rspl_theme_content_width', 720 );
}
add_action( 'after_setup_theme', 'rspl_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rspl_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rspl_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rspl_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rspl_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rspl_theme_scripts() {
	// wp_enqueue_style( 'rspl_theme-style', get_stylesheet_uri(), array(), RSPL_THEME_VERSION );
	// wp_style_add_data( 'rspl_theme-style', 'rtl', 'replace' );

	// wp_enqueue_script( 'rspl_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), RSPL_THEME_VERSION, true );
	
	// Temp Styles & Scripts for Dev
	wp_enqueue_style( 'rspl_theme-font-inter', get_template_directory_uri() . '/assets/fonts/inter/inter.css', array(), 2 );
	wp_enqueue_style( 'rspl_theme-style-dev', get_template_directory_uri() . '/assets/css/style.css', array('rspl_theme-font-inter'), filemtime(get_template_directory() . '/assets/css/style.css') );

	wp_enqueue_script( 'rspl_theme-navigation-dev', get_template_directory_uri() . '/assets/js/navigation.js', array(), filemtime(get_template_directory() . '/assets/js/navigation.js'), true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Disable global-styles
	if ( get_theme_mod('disable-global-styles') ) {
		wp_dequeue_style( 'global-styles' );
	}
}
add_action( 'wp_enqueue_scripts', 'rspl_theme_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-rspl-svg-icons.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }
