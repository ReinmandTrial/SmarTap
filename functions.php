<?php

/**
 * smarTap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package smarTap
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
if (! defined('IMAGES_PATH')) {
	// Replace the version number of the theme on each release.
	define('IMAGES_PATH', get_stylesheet_directory_uri() . '/img');
}
if (! defined('SCRIPT_PATH')) {
	// Replace the version number of the theme on each release.
	define('SCRIPT_PATH', get_stylesheet_directory_uri() . '/js');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function smartap_setup()
{
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
			'header_menu' => 'Header Menu',
			'about_us_menu' => 'About us menu',
			'customer_service_menu' => 'Customer service menu',
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
			'height'      => 60,
			'width'       => 180,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'smartap_setup');


/**
 * Customizes the HTML output of the WordPress custom logo.
 *
 * This function is hooked into the 'get_custom_logo' filter, which allows
 * modifying the default HTML structure of the custom logo. In this case,
 * it replaces the default class "custom-logo-link" with a custom class 
 * "header__logo" to allow for custom styling and structure.
 *
 * @param string $html The HTML output of the custom logo.
 * @return string Modified HTML with the updated class.
 */
function smartap_custom_logo_markup($html)
{
	$html = str_replace('class="custom-logo-link"', 'class="header__logo"', $html);
	return $html;
}

add_filter('get_custom_logo', 'smartap_custom_logo_markup');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function smartap_enqueue_styles()
{
	// Enqueue main style
	wp_enqueue_style(
		'smartap-style',
		get_stylesheet_uri(),
		array(),
		// _S_VERSION
	);
	// Enqueue main style
	wp_enqueue_style(
		'smartap-custom',
		get_template_directory_uri() . '/css/custom.css',
		array('smartap-style'),
		// _S_VERSION
	);

	// Enqueue main script
	wp_enqueue_script(
		'smartap-app',
		SCRIPT_PATH . '/app.js',
		array(),
		'',
		true
	);

	// Enqueue main script
	wp_enqueue_script(
		'smartap-compare',
		SCRIPT_PATH . '/compare.js',
		array(),
		'',
		true
	);
	// Передаем данные в скрипт
	wp_localize_script('smartap-compare', 'ajaxData', [
		'ajaxUrl' => admin_url('admin-ajax.php'), // WordPress AJAX URL
		'nonce'   => wp_create_nonce('compare_nonce'), // Генерация уникального ключа
		'nonceReview'   => wp_create_nonce('load_reviews_nonce'), // Генерация уникального ключа
		'nonceReviewForm'   => wp_create_nonce('ajax_form_review') // Генерация уникального ключа
	]);

	// Enqueue google maps api
	wp_enqueue_script(
		'smartap-map-api',
		'https://maps.googleapis.com/maps/api/js?key=AIzaSyDPIlQsbeMX0GZc_kLkyXFTqGl8JDRxwEo&callback=initMap&_v=20241205151347',
		array('smartap-app'),
		null,
		[
			'in_footer' => true,
			'strategy'  => 'defer',
		]
	);
}
add_action('wp_enqueue_scripts', 'smartap_enqueue_styles');

// Add custom styles to WordPress admin area and customizer preview
define('CUSTOM_ADMIN_CSS', '/* Fix style widget */
    .wp-block-legacy-widget__edit-preview-iframe {
        height: auto !important;
    }
		.block-editor-block-list__block.wp-block.wp-block-legacy-widget {
			outline: 1px solid black;
		}	
');

function smartap_add_custom_styles()
{
	echo '<style>' . CUSTOM_ADMIN_CSS . '</style>';
}

add_action('admin_head', 'smartap_add_custom_styles');
add_action('customize_controls_print_styles', 'smartap_add_custom_styles');

require_once('inc/smartap-register-post-type.php');

require_once('inc/smartap-widgets-init.php');

require_once('inc/acf-option-pages.php');

require_once('inc/fix-svg-mine-type.php');

require_once('inc/contact-form-custom.php');

require_once('inc/custom-review-summary.php');

require_once('inc/review-ajax.php');

require_once('inc/ajax-form-review.php');
