<?php
function smartap_widgets_init()
{
	register_sidebar(array(
		'name' => 'Footer menu',
		'id' => 'footer_sidebar',
		'description' => 'This sidebar is displayed in footer',
		'description' => '',
		'class' => '',
		'before_widget' => '<div class="footer__menu menu">',
		'after_widget' => '</div>',
		'before_title' => '<p class="text-brand-main title-medium mb-5 uppercase">',
		'after_title' => '</p>',
		'before_sidebar' => '', // WP 5.6
		'after_sidebar' => '', // WP 5.6
	));
	register_sidebar(array(
		'name' => 'Header menu',
		'id' => 'header_sidebar',
		'description' => 'This sidebar is displayed in header',
		'description' => '',
		'class' => '',
		'before_widget' => '<nav class="menu__body">',
		'after_widget' => '</nav>',
		'before_title' => '',
		'after_title' => '',
		'before_sidebar' => '', // WP 5.6
		'after_sidebar' => '', // WP 5.6
	));
	register_sidebar(array(
		'name' => 'Header mobile menu',
		'id' => 'header_mobile_sidebar',
		'description' => 'This sidebar is displayed in mobile header',
		'description' => '',
		'class' => '',
		'before_widget' => '<nav class="menu__body">',
		'after_widget' => '</nav>',
		'before_title' => '<p class="text-brand-main title-medium mb-5 uppercase">',
		'after_title' => '</p>',
		'before_sidebar' => '', // WP 5.6
		'after_sidebar' => '', // WP 5.6
	));
}
add_action('widgets_init', 'smartap_widgets_init');
