<?php

add_action('wp_ajax_form_review', 'ajax_form_review');
add_action('wp_ajax_nopriv_form_review', 'ajax_form_review');

function ajax_form_review()
{
	// Проверка nonce для безопасности
	check_ajax_referer('ajax_form_review', 'security');

	$current_post_id = isset($_POST['id']) ? $_POST['id'] : false;

	$review_name = isset($_POST['reviewName']) ? $_POST['reviewName'] : 'Anonym';

	$review_company = isset($_POST['reviewCompany']) ? $_POST['reviewCompany'] : false;
	$review_position = isset($_POST['reviewPosition']) ? $_POST['reviewPosition'] : false;

	if (!$review_company and !$review_position) {
		$full_company = '';
	} else if (!$review_company or !$review_position) {
		$full_company = $review_company ? $review_company : $review_position;
	} else {
		$full_company = implode(' | ', [$review_company, $review_position]);
	}

	$review_content = isset($_POST['reviewContent']) ? $_POST['reviewContent'] : '';

	$review_rating = isset($_POST['rating']) ? $_POST['rating'] : false;

	if (!$review_rating) {
		wp_send_json_error('Raring undefined');
	}

	if (!$current_post_id and !get_post($current_post_id)) {
		wp_send_json_error('Product id incorrect');
	}

	$review = glsr_create_review([
		'assigned_posts' => (string)$current_post_id,
		'content' => $review_content,
		'date' => date("Y-m-d"),
		'name' => $review_name,
		'rating' => 5,
		'title' => '',
		'reviews_company_name' => $full_company,
	]);

	if ($review) {
		$is_update_field = update_field('reviews_company_name', $full_company, $review->ID);

		if (!$is_update_field) {
			wp_send_json_error('The company field could not be updated');
		}

		wp_send_json_success([
			'id' => $current_post_id,
			'reviewName' => $review_name,
			'reviewCompany' => $review_company,
			'reviewPosition' => $review_position,
			'fullCompany' => $full_company,
			'reviewContent' => $review_content,
			'rating' => $review_rating,
		]);
	} else {
		wp_send_json_error('Error');
	}



	wp_die();
}
