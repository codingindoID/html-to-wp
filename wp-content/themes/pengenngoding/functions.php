<?php

/**
 * pengenNgoding functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pengenNgoding
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pengenngoding_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on pengenNgoding, use a find and replace
		* to change 'pengenngoding' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('pengenngoding', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'pengenngoding'),
		)
	);

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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pengenngoding_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'pengenngoding_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pengenngoding_content_width()
{
	$GLOBALS['content_width'] = apply_filters('pengenngoding_content_width', 640);
}
add_action('after_setup_theme', 'pengenngoding_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pengenngoding_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'pengenngoding'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'pengenngoding'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'pengenngoding_widgets_init');

/**
 * Enqueue scripts and styles.
 */
// function pengenngoding_scripts()
// {
// 	wp_enqueue_style('pengenngoding-style', get_stylesheet_uri(), array(), _S_VERSION);
// 	wp_style_add_data('pengenngoding-style', 'rtl', 'replace');

// 	wp_enqueue_script('pengenngoding-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

// 	if (is_singular() && comments_open() && get_option('thread_comments')) {
// 		wp_enqueue_script('comment-reply');
// 	}
// }
// add_action('wp_enqueue_scripts', 'pengenngoding_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if (defined('JETPACK__VERSION')) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

function add_css()
{
	wp_register_style('ICOFONT', get_template_directory_uri() . '/assets/icofont/icofont.min.css', false, '1.1', 'all');
	wp_register_style('BS', get_template_directory_uri() . '/assets/bootstrap.min.css', false, '1.1', 'all');
	wp_register_style('AOS', get_template_directory_uri() . '/assets/aos.css', false, '1.1', 'all');
	wp_register_style('CUSTOM', get_template_directory_uri() . '/assets/custom.css', false, '1.1', 'all');
	wp_register_style('MG', get_template_directory_uri() . '/assets/magnific/magnific-popup.css', false, '1.1', 'all');
	wp_register_style('WP', get_template_directory_uri() . '/assets/wp_css.css', false, '1.1', 'all');

	wp_enqueue_style('ICOFONT');
	wp_enqueue_style('BS');
	wp_enqueue_style('AOS');
	wp_enqueue_style('CUSTOM');
	wp_enqueue_style('MG');
	wp_enqueue_style('WP');
}

add_action('wp_enqueue_scripts', 'add_css');
function add_script()
{
	wp_register_script('jq', get_template_directory_uri() . '/assets/jquery-3.6.0.min.js', array('jquery'), 1.1, true);
	wp_register_script('aos', get_template_directory_uri() . '/assets/aos.js', array('jquery'), 3.6, true);
	wp_register_script('bs', get_template_directory_uri() . '/assets/bootstrap.bundle.min.js', array('jquery'), 3.6, true);
	wp_register_script('mg', get_template_directory_uri() . '/assets/magnific/magnific.min.js', array('jquery'), 3.6, true);
	wp_register_script('myjs', get_template_directory_uri() . '/assets/custom.js', array('jquery'), 3.6, true);

	wp_enqueue_script('jq');
	wp_enqueue_script('aos');
	wp_enqueue_script('bs');
	wp_enqueue_script('mg');
	wp_enqueue_script('myjs');
}
add_action('wp_enqueue_scripts', 'add_script');

register_nav_menus(array('top_menu' => __('Top Menu', 'theme')));

function add_class_li($classes, $item, $args)
{
	if (isset($args->li_class)) {
		$classes[]  =  $args->li_class;
	}
	if (isset($args->active_class) && in_array('current-menu-item', $classes)) {
		$classes[]  =  $args->active_class;
	}
	return $classes;
}

add_filter('nav_menu_css_class', 'add_class_li', 10, 3);

function add_anchor_class($attr, $item, $args)
{
	if (isset($args->a_class)) {
		$attr['class']  =  $args->a_class;
	}
	return $attr;
}
add_filter('nav_menu_link_attributes', 'add_anchor_class', 10, 3);

// custom logo
add_theme_support('custom-logo', array(
	'height'      => 400,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array('site-title', 'site-description'),
));
function theme_prefix_setup()
{
	add_theme_support('custom-logo', array(
		'height'      => 50,
		'width'       => 50,
		'flex-width' => true,
	));
}
add_action('after_setup_theme', 'theme_prefix_setup');

add_filter('woocommerce_admin_disabled', '__return_true');
add_filter('woocommerce_admin_features', function ($features) {
	return array_values(
		array_filter($features, function ($feature) {
			return $feature !== 'marketing';
		})
	);
});
add_action('woocommerce_after_shop_loop_item', 'woo_show_excerpt_shop_page', 5);
function woo_show_excerpt_shop_page()
{
	global $product;
	$product->post->post_excerpt;
	echo wp_trim_words($product->post->post_excerpt, 15, ".....");
}



/* Recruitment */
function custom_menu_recruitment()
{
	register_post_type(
		'recruitments',
		array(
			'labels'      => array(
				'name'          => 'Recruitments',
				'singular_name' => 'Recruitment',
				'add_new_item'	=> 'Add New Reqruitment Post'
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'		=> 'dashicons-businessperson',
			'supports'		=> array('title', 'editor', 'thumbnail'),
			'rewrite'     => array('slug' => 'recruitment'),
		)
	);
}
add_action('init', 'custom_menu_recruitment');

function recruitment_taxonomy()
{
	$args = array(
		'public'      => true,
		'hierarchical' => true,
		'labels'      => array(
			'name'          => 'Recruitments',
			'singular_name' => 'Recruitment',
		),
	);
	register_taxonomy('departements', array('recruitments'), $args);
}
add_action('init', 'recruitment_taxonomy');

function company_post_type()
{
	register_post_type(
		'companies',
		array(
			'labels'      => array(
				'name'          => 'Companies',
				'singular_name' => 'Companie',
				'add_new_item'	=> 'Add New Companie partner'
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'		=> 'dashicons-admin-site',
			'supports'		=> array('title', 'thumbnail'),
			'rewrite'     => array('slug' => 'Companie Partner'),
		)
	);
}
add_action('init', 'company_post_type');

function weplugins_modify_big_image_size_threshold_defaults($threshold, $imagesize, $file, $attachment_id)
{
	// Update the $threshold variable according to your website requirements and return this variable.
	return $threshold;
}
// add the filter
add_filter('big_image_size_threshold', 'weplugins_modify_big_image_size_threshold_defaults', 10, 4);

// add_filter('woocommerce_enqueue_styles', '__return_empty_array');
