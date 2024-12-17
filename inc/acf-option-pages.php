<?php
add_action('acf/init', 'acf_option_pages');
function acf_option_pages()
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
