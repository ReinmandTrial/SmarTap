// Функция для добавления метабокса
function custom_site_review_add_meta_box()
{
add_meta_box(
'custom_company_meta_box', // ID метабокса
__('Company', 'your-text-domain'), // Заголовок метабокса
'custom_site_review_company_meta_box_callback', // Callback-функция
'site-review', // Тип записи (замените на фактический post_type)
'normal', // Контекст
'high' // Приоритет
);
}
add_action('add_meta_boxes', 'custom_site_review_add_meta_box');

// Функция для сохранения значения метаполя
function custom_site_review_save_company_meta_box_data($post_id)
{
// Проверяем nonce
if (!isset($_POST['custom_site_review_company_meta_box_nonce'])) {
return;
}
if (!wp_verify_nonce($_POST['custom_site_review_company_meta_box_nonce'], 'custom_site_review_save_company_meta_box')) {
return;
}

// Проверяем автосохранение
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
return;
}

// Проверяем права пользователя
if (isset($_POST['post_type']) && 'site-review' == $_POST['post_type']) { // Замените на фактический post_type
if (!current_user_can('edit_post', $post_id)) {
return;
}
} else {
return;
}

// Проверяем и сохраняем данные
if (!isset($_POST['custom_company_field'])) {
return;
}

$company = sanitize_text_field($_POST['custom_company_field']);
update_post_meta($post_id, '_company', $company);
}
add_action('save_post', 'custom_site_review_save_company_meta_box_data');

// Функция для сохранения значения метаполя
function custom_site_review_save_company_meta_box_data($post_id)
{
// Проверяем nonce
if (!isset($_POST['custom_site_review_company_meta_box_nonce'])) {
return;
}
if (!wp_verify_nonce($_POST['custom_site_review_company_meta_box_nonce'], 'custom_site_review_save_company_meta_box')) {
return;
}

// Проверяем автосохранение
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
return;
}

// Проверяем права пользователя
if (isset($_POST['post_type']) && 'site-review' == $_POST['post_type']) { // Замените на фактический post_type
if (!current_user_can('edit_post', $post_id)) {
return;
}
} else {
return;
}

// Проверяем и сохраняем данные
if (!isset($_POST['custom_company_field'])) {
return;
}

$company = sanitize_text_field($_POST['custom_company_field']);
update_post_meta($post_id, '_company', $company);
}
add_action('save_post', 'custom_site_review_save_company_meta_box_data');