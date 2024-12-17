<?php

// Contact form 
add_filter('wpcf7_form_class_attr', function ($class) {
	// Добавляем нужные классы к <form>
	$class .= ' footer__form form';
	return $class;
});


// Изменяем вывод элементов формы
add_filter('wpcf7_form_elements', function ($content) {
	// Извлечём скрытые поля CF7 для корректной работы формы
	preg_match_all('/<input type="hidden".*?>/i', $content, $hidden_fields);
	$hidden = implode("\n", $hidden_fields[0]);

	// Убираем обёртки <span class="wpcf7-form-control-wrap">
	$content = preg_replace('/<span class="wpcf7-form-control-wrap[^>]*>(.*?)<\/span>/is', '$1', $content);

	// Удаляем обертку <p> вокруг input
	$content = preg_replace('/<p[^>]*>\s*(<input[^>]*>)\s*<\/p>/i', '$1', $content);

	// Удаляем обертку <p> вокруг кнопки (submit)
	$content = preg_replace('/<p[^>]*>\s*(<button[^>]*>.*?<\/button>)\s*<\/p>/is', '$1', $content);

	// Удаляем атрибут size из всех тегов <input>
	// Это регулярное выражение удаляет size="40", size='40' или size=40
	$content = preg_replace('/\s*size=(["\'])?\d+\1/i', '', $content);

	// Извлекаем спиннер
	preg_match('/<span class="wpcf7-spinner"><\/span>/', $content, $sp_match);
	$spinner = isset($sp_match[0]) ? $sp_match[0] : '';
	// Удаляем спиннер из текущего места
	$content = str_replace($spinner, '', $content);

	// Преобразуем <input type="submit"> в <button> с сохранением классов и value
	$content = preg_replace_callback('/<input[^>]*type=["\']submit["\'][^>]*>/i', function ($match) {
		$tag = $match[0];

		// Извлекаем value
		preg_match('/value=["\']([^"\']+)["\']/i', $tag, $val);
		$value = isset($val[1]) ? $val[1] : 'Submit';

		// Извлекаем классы
		preg_match('/class=["\']([^"\']+)["\']/i', $tag, $cls);
		$class = isset($cls[1]) ? $cls[1] : '';

		// Заменяем префиксы sm_, md_, lg_ и т.д. на sm:, md:, lg:
		$class = preg_replace_callback('/\b(sm|md|lg|xl|2xl)_(\w[\w-]*)\b/', function ($matches) {
			return $matches[1] . ':' . $matches[2];
		}, $class);

		// Возвращаем кнопку с теми же классами и value
		return '<button type="submit" class="' . esc_attr($class) . '"><span>' . esc_html($value) . '</span></button>';
	}, $content);

	// Добавляем скрытые поля и спиннер в начало содержимого формы
	// Таким образом спиннер будет выше форм-группы
	$pattern_hidden_div = '/(<div[^>]*style=["\']display:\s*none;["\'][^>]*>.*?<\/div>)/is';
	if (preg_match($pattern_hidden_div, $content, $matches)) {
		$hidden_div = $matches[1];
		// Удаляем скрытые поля из текущего контента
		$content = str_replace($hidden_div, '', $content);
		// Вставляем скрытые поля и спиннер
		$content = $hidden_div . "\n" . $spinner . "\n" . $content;
	} else {
		// Если скрытые поля не найдены, вставляем спиннер в начало формы
		$content = $spinner . "\n" . $content;
	}

	return $content;
});
