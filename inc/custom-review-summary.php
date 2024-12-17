<?php
function custom_review_summary($output, $tag, $attr, $m)
{
	// Убедитесь, что это нужный шорткод
	if ($tag === 'site_reviews_summary') { // Замените на фактический тег шорткода, если отличается
		// Используем DOMDocument для парсинга HTML
		libxml_use_internal_errors(true); // Отключаем вывод ошибок парсинга

		$dom = new DOMDocument();
		$dom->loadHTML(mb_convert_encoding($output, 'HTML-ENTITIES', 'UTF-8'));

		$xpath = new DOMXPath($dom);

		// 1. Удаляем div с классом glsr-summary-rating
		$rating_nodes = $xpath->query("//*[contains(@class, 'glsr-summary-rating')]");
		foreach ($rating_nodes as $node) {
			$node->parentNode->removeChild($node);
		}

		// 2. Заменяем текст внутри div с классом glsr-summary-text/
		$text_nodes = $xpath->query("//*[contains(@class, 'glsr-summary-text')]");
		foreach ($text_nodes as $node) {
			// Динамическая замена текста на основе реальных данных
			// Получаем родительский узел, чтобы извлечь data-rating и data-reviews
			$parent_node = $node->parentNode; // glsr-summary

			// Находим элемент с классом glsr-star-rating внутри родительского узла
			$star_rating_node = $xpath->query(".//*[contains(@class, 'glsr-star-rating')]", $parent_node)->item(0);
			if ($star_rating_node) {
				$rating = $star_rating_node->getAttribute('data-rating'); // Получаем рейтинг
				$reviews = $star_rating_node->getAttribute('data-reviews'); // Получаем количество отзывов
				$node->nodeValue = '(' . esc_html($rating) . ' stars) • ' . esc_html($reviews) . ' reviews';
			} else {
				// Фолбэк на статическую замену, если данные не найдены
				$node->nodeValue = '(4.5 stars) • 10 reviews';
			}
		}

		// Получаем измененный HTML
		$body = $dom->getElementsByTagName('body')->item(0);
		$new_output = '';
		foreach ($body->childNodes as $child) {
			$new_output .= $dom->saveHTML($child);
		}

		return $new_output;
	}

	return $output;
}
// Добавляем фильтр для изменения вывода шорткода
add_filter('do_shortcode_tag', 'custom_review_summary', 10, 4);
