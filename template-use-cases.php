<?php
/*
Template Name: Template: Use Cases
Template Post Type: page
*/
?>
<?php
$use_cases_title = get_field('page_use_cases_title');
$use_cases_subtitle = get_field('page_use_cases_subtitle');
?>
<?php get_header() ?>
<main class="page-section">

	<div class="jumpscroll"></div>

	<section class="benefits-cases lg:py-20 md:py-16 py-10">
		<div class="benefits-cases__container">
			<div class="benefits-cases__content">
				<div class="benefits-cases__heading section-heading">
					<h1 class="display-medium text-dark-800 mb-4"><?= $use_cases_title ?></h1>
					<div class="page-section__header-desc body-large text-dark-700">
						<p><?= $use_cases_subtitle ?></p>
					</div>
				</div>
				<div class="benefits-cases__body">
					<div class="benefits-cases__list">
						<?php
						function is_big_item($i, $count_items)
						{
							$is_first_item_big = ($count_items % 3 === 0 or $count_items % 3 == 2)
								? false
								: true;

							if ($is_first_item_big) {
								if ($i % 3 === 1) {
									return 'item-big';
								} else if ($is_first_item_big and $i === 1) {
									return 'item-big';
								} else {
									return '';
								}
							} else if ($i % 3 === 0) {
								return 'item-big';
							} else {
								return '';
							}
						}
						$items_arr = get_field('use_cases_grid');
						if ($items_arr) {
							$count_items = count($items_arr);
							$i = 0;

							foreach ($items_arr as $item) {
								$i++;
								$use_cases_grid_image = $item['image'];
								$use_cases_grid_title = $item['title'];
								$use_cases_grid_subtitle = $item['subtitle'];
						?>
								<article class="benefits-cases__item item <?= is_big_item($i, $count_items) ?>">
									<div class="item__body">
										<div class="item__image">
											<img src="<?= $use_cases_grid_image['url'] ?>" alt="<?= $use_cases_grid_image['alt'] ?>">
										</div>
										<div class="item__content">
											<h5 class="headline-medium text-dark-800 mb-3"><?= $use_cases_grid_title ?></h5>
											<div class="body-medium text-dark-600">
												<p><?= $use_cases_grid_subtitle ?></p>
											</div>
										</div>
									</div>
								</article>
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.benefits-cases -->
	<section class="partners lg:py-20 md:py-16 py-10">
		<div class="partners__container">
			<div class="partners__content">
				<div class="partners__heading section-heading flex items-center gap-4 flex-wrap justify-between mb-8">
					<div class="section-heading__left">
						<h2 class="headline-large">Our trusted Partners and Clients</h2>
					</div>
					<div class="section-heading__right">
						<div class="slider-navigation sm:flex hidden">
							<button type="button" class="swiper-button-prev slider-button-one">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
									<path d="M15 7.5H1M1 7.5L7 13.5M1 7.5L7 1.5" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</button>
							<button type="button" class="swiper-button-next slider-button-one">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
									<path d="M1 7.5H15M15 7.5L9 1.5M15 7.5L9 13.5" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</button>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="partners__body">
			<div class="partners-reviews">
				<div class="partners-reviews__container">
					<div class="partners-reviews__slider swiper">
						<div class="partners-reviews__wrapper swiper-wrapper">
							<?php
							// Параметры для первой загрузки отзывов согласно новому формату
							$args = array(
								'status'        => 'approved',
								'orderby'       => 'date',
								'order'         => 'DESC',
								// Добавьте дополнительные параметры при необходимости
							);

							// Получение отзывов
							if (function_exists('glsr_get_reviews')) {
								$reviews = glsr_get_reviews($args);
								$total_pages = $reviews->max_num_pages;
							}

							$next_page = ($page + 1 > $total_pages) ? 1 : $page + 1;
							$prev_page = ($page - 1 <= 0) ? $total_pages : $page - 1;

							if (!empty($reviews)) :
								foreach ($reviews as $review) {

									$review_id      = $review->ID;
									$rating         = isset($review->rating) ? intval($review->rating) : 0;
									$author_name    = !empty($review->author) ? $review->author : 'Anonym';
									$company        = get_field('reviews_company_name', $review_id) ?: '';
									$client					= get_field('clients', $review_id);
									$client_thumbnail = $client ? get_the_post_thumbnail_url($client->ID) : false;
									$avatar_url     = !empty($review->avatar) ? $review->avatar : IMAGES_PATH . '/product-info/avatar-image-base.png';
									$review_content = !empty($review->content) ? $review->content : '';
							?>
									<div class="partners-reviews__slide swiper-slide slide-review">
										<div class="slide-review__content">
											<div class="slide-review__header">
												<div class="slide-review__profile profile-review">
													<div class="profile-review__body flex items-center gap-3">
														<div class="profile-review__avatar">
															<img src="<?= esc_url($avatar_url) ?>" alt="Image">
														</div>
														<div class="profile-review__desc">
															<h6 class="label-medium text-dark-800"><?= esc_html($author_name) ?></h6>
															<p class="text-dark-700 body-small">
																<?= esc_html($company) ?>
															</p>
														</div>
													</div>
												</div>
												<?php if (!empty($client_thumbnail)) : ?>
													<div class="slide-review__image-partner">
														<img src="<?= esc_html($client_thumbnail) ?>">
													</div>
												<?php endif; ?>
											</div>
											<div class="slide-review__body">
												<div class="slide-review__text sm:line-clamp-4 line-clamp-6 body-large text-dark-800">
													<p>
														<?= esc_html($review_content) ?>
													</p>
												</div>
												<div class="slide-review__review">
													<?php echo glsr_star_rating($rating); ?>
												</div>
											</div>
										</div>
									</div>
							<?php
								}
							endif;
							?>
						</div>

					</div>
				</div>
			</div>
			<?php get_template_part('template-parts/partners-slider') ?>
		</div>
	</section>
	<!-- /.partners -->
	<?php get_template_part('template-parts/questions') ?>
	<!-- /.faq -->
</main>
<?php get_footer() ?>