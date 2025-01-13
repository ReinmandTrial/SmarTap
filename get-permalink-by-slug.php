<?php
function get_permalink_by_slug($slug)
{
	$page = get_page_by_path($slug);

	if ($page) {
		$page_url = get_permalink($page->ID);

		return $page_url;
	} else {
		return false;
	}
}
