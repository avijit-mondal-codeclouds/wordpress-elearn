<?php
/*
In WordPress, the functions.php file, often referred to as the theme's functions file, is a crucial part of theme development. It allows developers to add custom PHP code and functionality to their WordPress sites. Here are some key reasons why functions.php is used:

1. Adding Custom Functions
Custom Features: You can define custom functions that extend or modify the default WordPress behavior. This includes adding new features like custom post types, taxonomies, or shortcodes.
Theme-Specific Logic: It allows for theme-specific customizations without altering the core WordPress files, ensuring that updates to WordPress don't overwrite your customizations.
2. Enqueuing Styles and Scripts
Proper Loading: It provides a way to properly enqueue stylesheets and JavaScript files to ensure they are loaded correctly on your site.
Dependencies: You can specify dependencies, versions, and conditions under which certain scripts and styles should be loaded, improving the site's performance and avoiding conflicts.
3. Modifying Default WordPress Behavior
Hooks and Filters: You can use action hooks and filters to modify the default behavior of WordPress core, themes, and plugins without directly editing their files. This is crucial for maintaining updates and compatibility.
Customizing Backend: You can customize the WordPress admin area, such as adding custom widgets, changing login screen styles, or modifying admin menus.
4. Theme Support
Enabling Features: You can enable various theme features like custom headers, backgrounds, post thumbnails, and navigation menus using add_theme_support().
5. Localization
Translation Ready: You can load the theme's text domain for translations, making your theme ready for internationalization.
6. Security Enhancements
Custom Validations: You can add custom validation rules and security checks to improve the security of your WordPress site.
7. Integrations
Third-Party Services: You can integrate with third-party services, APIs, and external platforms to extend the functionality of your site.

*/

/**
 * custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package custom
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
// function custom_setup() {
// 	/*
// 		* Make theme available for translation.
// 		* Translations can be filed in the /languages/ directory.
// 		* If you're building a theme based on custom, use a find and replace
// 		* to change 'custom' to the name of your theme in all the template files.
// 		*/
// 	load_theme_textdomain( 'custom', get_template_directory() . '/languages' );

// $args = array(
// 	'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
// 	'default-text-color' => '000',
// 	'width'              => 1000,
// 	'height'             => 250,
// 	'flex-width'         => true,
// 	'flex-height'        => true,
// );
// add_theme_support( 'custom-header', $args ); 
/*
we can pass the array in custom-header ^^
*/
/*
Custom headers allow site owners to upload their own “title” image to their site, which can be placed at the top of certain pages.
*/
add_theme_support( 'custom-header', [] );

// 	// Add default posts and comments RSS feed links to head.
// 	add_theme_support( 'automatic-feed-links' );

// 	/*
// 		* Let WordPress manage the document title.
// 		* By adding theme support, we declare that this theme does not use a
// 		* hard-coded <title> tag in the document head, and expect WordPress to
// 		* provide it for us.
// 		*/
// 	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	/*
	The register_nav_menus() function in WordPress is used to register multiple navigation 
	menus for a theme. This allows theme developers to define areas in the theme where users 
	can assign custom menus from the WordPress admin area.
	*/

	function add_additional_class_on_li($classes, $item, $args) {
		if (isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

	register_nav_menus(
		array(
			// 'menu-1' => esc_html__( 'Primary', 'custom' ),
			'Primary-menu' => 'Top Menu'
		)
	);

// 	/*
// 		* Switch default core markup for search form, comment form, and comments
// 		* to output valid HTML5.
// 		*/
// 	add_theme_support(
// 		'html5',
// 		array(
// 			'search-form',
// 			'comment-form',
// 			'comment-list',
// 			'gallery',
// 			'caption',
// 			'style',
// 			'script',
// 		)
// 	);

	// Set up the WordPress core custom background feature.
	//enable feature image option on admin panel
	add_theme_support(
		'custom-background',
		// apply_filters(
		// 	'custom_custom_background_args',
		// 	array(
		// 		'default-color' => 'ffffff',
		// 		'default-image' => '',
		// 	)
		// )
	);

// 	// Add theme support for selective refresh for widgets.
// 	add_theme_support( 'customize-selective-refresh-widgets' );

// 	/**
// 	 * Add support for core custom logo.
// 	 *
// 	 * @link https://codex.wordpress.org/Theme_Logo
// 	 */
// 	add_theme_support(
// 		'custom-logo',
// 		array(
// 			'height'      => 250,
// 			'width'       => 250,
// 			'flex-width'  => true,
// 			'flex-height' => true,
// 		)
// 	);
// }
// add_action( 'after_setup_theme', 'custom_setup' );

// /**
//  * Set the content width in pixels, based on the theme's design and stylesheet.
//  *
//  * Priority 0 to make it available to lower priority callbacks.
//  *
//  * @global int $content_width
//  */
// function custom_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'custom_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
register_sidebar(
	array(
		'name'          => 'custom side',
		'id'            => 'sidebar',
	)
);
// function custom_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'custom' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'custom' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'custom_widgets_init' );

// /**
//  * Enqueue scripts and styles.
//  */
// function custom_scripts() {
// 	wp_enqueue_style( 'custom-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'custom-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// /**
//  * Implement the Custom Header feature.
//  */
// require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Custom template tags for this theme.
//  */
// require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Functions which enhance the theme by hooking into WordPress.
//  */
// require get_template_directory() . '/inc/template-functions.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

// function enable_excerpt_field() {
//     add_post_type_support('post', 'excerpt');
// }
// add_action('init', 'enable_excerpt_field');

add_post_type_support('page', 'excerpt');
// add_post_type_support('page', 'excerpt');

