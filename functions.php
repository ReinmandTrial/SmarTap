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
		'nonce'   => wp_create_nonce('compare_nonce') // Генерация уникального ключа
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


function smartap_register_post_type()
{
	// BENEFITS
	register_post_type('benefits', [
		'label'  => 'benefits',
		'labels' => [
			'name'               => 'Benefits', // основное название для типа записи
			'singular_name'      => 'Benefit', // название для одной записи этого типа
			'add_new'            => 'add benefit', // для добавления новой записи
			'add_new_item'       => 'Add benefit', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit benefit', // для редактирования типа записи
			'new_item'           => 'new benefit', // текст новой записи
			'view_item'          => 'view benefit', // для просмотра записи этого типа.
			'search_items'       => 'search benefit', // для поиска по этим типам записи
			'not_found'          => 'Тot found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Тot found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Benefits', // название меню
		],
		'description'            => 'Posts that are displayed in the benefits section',
		'public'                 => true,
		'exclude_from_search' => true, // зависит от public
		'show_in_nav_menus'   => false, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-star-filled',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// HOW IT WORKS
	register_post_type('how_it_works', [
		'label'  => 'How it works',
		'labels' => [
			'name'               => 'How it works', // основное название для типа записи
			'singular_name'      => 'How it work', // название для одной записи этого типа
			'add_new'            => 'add how it works', // для добавления новой записи
			'add_new_item'       => 'Add "how it work"', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit how it work', // для редактирования типа записи
			'new_item'           => 'new how it work', // текст новой записи
			'view_item'          => 'view how it work', // для просмотра записи этого типа.
			'search_items'       => 'search how it work', // для поиска по этим типам записи
			'not_found'          => 'Тot found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Тot found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'How it works', // название меню
		],
		'description'            => 'Posts that are displayed in the "how it work" section',
		'public'                 => true,
		'exclude_from_search' => true, // зависит от public
		'show_in_nav_menus'   => false, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-admin-generic',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// WHY SMARTAP
	register_post_type('why_smartap', [
		'label'  => 'Why smartap',
		'labels' => [
			'name'               => 'Why smartap', // основное название для типа записи
			'singular_name'      => 'Why smartap', // название для одной записи этого типа
			'add_new'            => 'add "why smartap"', // для добавления новой записи
			'add_new_item'       => 'Add "why smartap"', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit "why smartap"', // для редактирования типа записи
			'new_item'           => 'new "why smartap"', // текст новой записи
			'view_item'          => 'view "why smartap"', // для просмотра записи этого типа.
			'search_items'       => 'search "why smartap"', // для поиска по этим типам записи
			'not_found'          => 'Тot found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Тot found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Why smartap', // название меню
		],
		'description'            => 'Posts that are displayed in the "Why smartap" section',
		'public'                 => true,
		'exclude_from_search' => true, // зависит от public
		'show_in_nav_menus'   => false, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-groups',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// WHY SMARTAP
	register_post_type('products', [
		'label'  => 'Products',
		'labels' => [
			'name'               => 'Products', // основное название для типа записи
			'singular_name'      => 'Product', // название для одной записи этого типа
			'add_new'            => 'add product', // для добавления новой записи
			'add_new_item'       => 'Add product', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit "why smartap"', // для редактирования типа записи
			'new_item'           => 'new product', // текст новой записи
			'view_item'          => 'view product', // для просмотра записи этого типа.
			'search_items'       => 'search product', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Products', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => true, // $post_type. C WP 4.7
		'menu_position'       => 2,
		'menu_icon'           => 'dashicons-cart',
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => 'products',
		'rewrite'             => ['slug' => 'product'],
		'query_var'           => true,
	]);
	$child = acf_add_options_page(array(
		'page_title'  => 'Settings for the catalog',
		'menu_title'  => 'Settings catalog',
		'parent_slug' => 'edit.php?post_type=products',
	));
}

add_action('init', 'smartap_register_post_type');


function smartap_widgets_init()
{
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer_sidebar',
		'description' => 'This sidebar is displayed in footer',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="footer__menu menu">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="text-brand-main title-medium mb-5 uppercase">',
		'after_title'   => '</p>',
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	));
}
add_action('widgets_init', 'smartap_widgets_init');



// Method 2: Setting.
function my_acf_init()
{
	acf_update_setting('google_api_key', 'AIzaSyB7EWRjbOhYVQQgWxqwPWFbGJJ_YZrmrD0');
}
add_action('acf/init', 'my_acf_init');



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
// if (defined('JETPACK__VERSION')) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Add parent.
		$parent = acf_add_options_page(array(
			'page_title'  => ('Custom Fields'),
			'menu_title'  => ('Custom Fields'),
			'redirect'    => true,
		));

		// Add sub page.
		$child = acf_add_options_page(array(
			'page_title'  => ('Header and Footer'),
			'menu_title'  => ('Header and Footer'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_page(array(
			'page_title'  => ('CTA'),
			'menu_title'  => ('CTA'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_page(array(
			'page_title'  => ('Questions'),
			'menu_title'  => ('Questions'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_page(array(
			'page_title'  => ('Socials'),
			'menu_title'  => ('Socials'),
			'parent_slug' => $parent['menu_slug'],
		));
	}
}

add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {

		// разрешим
		if (current_user_can('manage_options')) {

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}

	return $data;
}

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
