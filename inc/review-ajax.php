<?php
// Регистрация AJAX-обработчика для авторизованных пользователей
add_action('wp_ajax_load_reviews', 'reviews_ajax');

// Регистрация AJAX-обработчика для неавторизованных пользователей
add_action('wp_ajax_nopriv_load_reviews', 'reviews_ajax');

function reviews_ajax()
{
	// Проверка nonce для безопасности
	check_ajax_referer('load_reviews_nonce', 'security');

	// Получение ID текущего поста
	$current_post_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

	// Получение номера страницы
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$reviews_per_page = 3; // Количество отзывов на страницу

	// Параметры для получения отзывов согласно новому формату
	$args = array(
		'post__in'      => array($current_post_id), // Связываем отзывы с текущим постом
		'per_page'      => $reviews_per_page,       // Количество отзывов на страницу
		'page'          => $page,                   // Номер страницы
		'status'        => 'approved',              // Статус отзывов
		'orderby'       => 'date',                  // Сортировка по дате
		'order'         => 'DESC',                  // Порядок сортировки
		'pagination'    => true,                    // Включаем пагинацию
		// Добавьте дополнительные параметры при необходимости
	);

	// Получение отзывов
	if (function_exists('glsr_get_reviews')) {
		$reviews_data = glsr_get_reviews($args);

		// Предполагается, что glsr_get_reviews возвращает объект с отзывами и информацией о пагинации
		if (!empty($reviews_data->reviews)) {
			$reviews = $reviews_data->reviews;
			$total_pages = $reviews_data->max_num_pages;

			ob_start();
			// Получение отзывов
			if (function_exists('glsr_get_reviews')) {
				$reviews = glsr_get_reviews($args);
				$total_pages = $reviews->max_num_pages;
			}

			$next_page = ($page + 1 > $total_pages) ? 1 : $page + 1;
			$prev_page = ($page - 1 <= 0) ? $total_pages : $page - 1;

			if (!empty($reviews)) :
?>
				<div id="reviews-container" data-product-id="<?= $current_post_id ?>" class="reviews-products mb-5">
					<?php foreach ($reviews as $review) : ?>
						<?php
						// Получение данных отзыва
						$review_id      = $review->ID;
						$rating         = isset($review->rating) ? intval($review->rating) : 0;
						$author_name    = !empty($review->author) ? $review->author : 'Anonym';
						$company        = get_field('reviews_company_name', $review_id) ?: '';
						$avatar_url     = !empty($review->avatar) ? $review->avatar : IMAGES_PATH . '/product-info/avatar-image-base.png';
						$review_content = !empty($review->content) ? $review->content : '';
						?>
						<div class="review">
							<div class="review__body">
								<div class="review__rate">
									<?php echo glsr_star_rating($rating); ?>
								</div>
								<div class="review__text body-medium text-dark-700">
									<p><?php echo esc_html($review_content); ?></p>
								</div>
								<div class="review__profile profile-review">
									<div class="profile-review__avatar">
										<img src="<?php echo esc_url($avatar_url); ?>" alt="Avatar">
									</div>
									<div class="profile-review__content">
										<h6 class="label-medium text-dark-800"><?php echo esc_html($author_name); ?></h6>
										<div class="text-dark-700 body-small">
											<span><?php echo esc_html($company); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="flex items-center justify-between mt-8 gap-4 flex-wrap">
						<a href="#" data-popup="#popupReview" class="button button-size-m button-primary">
							<span>Write a Review</span>
						</a>

						<div class="reviews-pagination">
							<a href="#" class="reviews-pagination-btn--prev" data-page="<?= $prev_page ?>">
								<!-- SVG для кнопки "Назад" -->
								<svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
									<path d="M8 15L1 8L8 1" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
							<span id="current-page" class="label-medium text-dark-700">Page <?= $page ?> of <?php echo $total_pages; ?></span>
							<a href="#" class="reviews-pagination-btn--next" data-page="<?= $next_page ?>">
								<!-- SVG для кнопки "Вперед" -->
								<svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
									<path d="M1 1L8 8L1 15" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
						</div>
					</div>
				</div>
<?php
			else :
				echo '<p>Пока нет отзывов. Будьте первым!</p>';
			endif;
			$reviews_html = ob_get_clean();

			// Возвращаем данные в формате JSON
			wp_send_json_success(array(
				'reviews'      => $reviews_html,
				'page' => $page,
				'total_pages'  => $total_pages,
			));
		} else {
			wp_send_json_error('No reviews found.');
		}
	} else {
		wp_send_json_error('Review function not available.');
	}

	// Завершение AJAX-запроса
	wp_die();
}
