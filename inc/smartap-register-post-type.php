<?php
function smartap_register_post_type()
{
	// PRODUCTS
	register_post_type('products', [
		'label' => 'Products',
		'labels' => [
			'name' => 'Products', // основное название для типа записи
			'singular_name' => 'Product', // название для одной записи этого типа
			'add_new' => 'add product', // для добавления новой записи
			'add_new_item' => 'Add product', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item' => 'Edit "why smartap"', // для редактирования типа записи
			'new_item' => 'new product', // текст новой записи
			'view_item' => 'view product', // для просмотра записи этого типа.
			'search_items' => 'search product', // для поиска по этим типам записи
			'not_found' => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon' => '', // для родителей (у древовидных типов)
			'menu_name' => 'Products', // название меню
		],
		'description' => '',
		'public' => true,
		'show_in_menu' => true, // показывать ли в меню админки
		'show_in_rest' => true, // добавить в REST API. C WP 4.7
		'rest_base' => true, // $post_type. C WP 4.7
		'menu_position' => 2,
		'menu_icon' => 'dashicons-cart',
		'hierarchical' => false,
		'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies' => [],
		'has_archive' => 'products',
		'rewrite' => ['slug' => 'product'],
		'query_var' => true,
	]);
	$child = acf_add_options_page(array(
		'page_title' => 'Settings for the catalog',
		'menu_title' => 'Settings catalog',
		'parent_slug' => 'edit.php?post_type=products',
	));
	// Clients
	// PRODUCTS
	register_post_type('clients', [
		'label' => 'Clients',
		'labels' => [
			'name' => 'Clients', // основное название для типа записи
			'singular_name' => 'Client', // название для одной записи этого типа
			'add_new' => 'add Client', // для добавления новой записи
			'add_new_item' => 'Add Client', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item' => 'Edit Client', // для редактирования типа записи
			'new_item' => 'new Client', // текст новой записи
			'view_item' => 'view Client', // для просмотра записи этого типа.
			'search_items' => 'search Client', // для поиска по этим типам записи
			'not_found' => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon' => '', // для родителей (у древовидных типов)
			'menu_name' => 'Clients', // название меню
		],
		'description' => '',
		'public' => true,
		'show_in_menu' => true, // показывать ли в меню админки
		'show_in_rest' => true, // добавить в REST API. C WP 4.7
		'rest_base' => true, // $post_type. C WP 4.7
		'menu_position' => 2,
		'menu_icon' => 'dashicons-cart',
		'hierarchical' => false,
		'supports' => ['title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies' => [],
		'query_var' => true,
	]);
}

add_action('init', 'smartap_register_post_type');
