<?php
/*
Template Name: Template: Home
Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php
/* Custom fields hero section */
// Title
$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');

// Target button
$hero_target_button_arr = get_field('hero_target_button');
$hero_target_button_title = $hero_target_button_arr['title'];
$hero_target_button_url = $hero_target_button_arr['url'];
$hero_target_button_target = !empty($hero_target_button_arr['target'])
	? 'target="' . $hero_target_button_arr['target'] . '"'
	: '';

// Scroll button
$hero_scroll_button_group = get_field('hero_button_scroll_group');
if ((count(array_filter($hero_scroll_button_group))) !== 0) {
	$hero_scroll_button_text = $hero_scroll_button_group['text'];
	$hero_scroll_button_link = $hero_scroll_button_group['link'];
} else {
	$hero_scroll_button_group = false;
}
// Background img
$hero_background_arr = get_field('hero_background_image');
$hero_background_url;
$hero_background_alt;

if (!empty($hero_background_arr)) {
	$hero_background_url = $hero_background_arr['url'];
	$hero_background_alt = $hero_background_arr['alt'];
} else {
	$hero_background_url = IMAGES_PATH . '/jumbotron/hero-bg.webp';
	$hero_background_alt = 'IMAGE HERO BG';
}

/* Use cases and solution section */
// Header
$use_cases_header = get_field('use_cases_header');
$use_cases_title = $use_cases_header['title'];
$use_cases_subtitle = $use_cases_header['subtitle'];

// To the right of the header
$use_cases_description = get_field('use_cases_description');
// Button
$use_cases_button_arr = get_field('use_cases_button');
$use_cases_button_title = $use_cases_button_arr['title'];
$use_cases_button_url = $use_cases_button_arr['url'];
$use_cases_button_target = !empty($use_cases_button_arr['target'])
	? 'target="' . $use_cases_button_arr['target'] . '"'
	: '';


// Video
$use_cases_video_url = get_field('use_cases_video')['url'];
if (empty($use_cases_video_url)) {
	$use_cases_video_url = IMAGES_PATH . '/videos/video-1.mp4';
}



// BENIFEST
$benefits_header = get_field('benefits_header');
$benefits_title = $benefits_header['title'];
$benefits_subtitle = $benefits_header['subtitle'];

// HOW IT WORKS
$how_it_works_header = get_field('how_it_works_header');
$how_it_works_title = $how_it_works_header['title'];
$how_it_works_subtitle = $how_it_works_header['subtitle'];

// WHY SMARTAP
$why_smartap_header = get_field('why_smartap_header');
$why_smartap_title = $why_smartap_header['title'];
$why_smartap_subtitle = $why_smartap_header['subtitle'];
?>
<main class="page">
	<section class="jumbotron">
		<div class="jumbotron__container">
			<div class="jumbotron__content">
				<div class="jumbotron__top top-jumbotron">
					<div class="flex flex-col gap-12">
						<h1 class="display-large text-light-900">
							<?= $hero_title; ?>
						</h1>
						<a href="<?= $hero_target_button_url; ?>" <?= $hero_target_button_target; ?> class="sm:!flex !hidden jumbotron-button button button-secondary button-size-l justify-center">
							<span><?= $hero_target_button_title; ?></span>
							<i>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M7 17L17 7M17 7H9M17 7V15" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</i>
						</a>
					</div>
				</div>
				<div class="jumbotron__bottom bottom-jumbotron flex sm:items-end sm:gap-4 gap-3 sm:justify-between sm:flex-row flex-col">
					<div class="jumbotron__desc body-large text-light-900">
						<p>
							<?= $hero_description; ?>
						</p>
					</div>
					<a href="<?= $hero_target_button_url; ?>" <?= $hero_target_button_target; ?> class="sm:!hidden w-full  button button-secondary button-size-l justify-center">
						<span><?= $hero_target_button_title; ?></span>
						<i>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7 17L17 7M17 7H9M17 7V15" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</i>
					</a>
					<?php if ($hero_scroll_button_group): ?>
						<button type="button" data-goto="<?= $hero_scroll_button_link ?>" class="sm:block hidden scroll-down-btn body-medium inline-flex items-center gap-1.5 text-light-900">
							<span>
								<?= $hero_scroll_button_text ?>
							</span>
							<i>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.51 3.29757L12.4899 3.29757V16.874L18.5711 10.7929L19.9853 12.2071L11.5 20.6924L3.01471 12.2071L4.42893 10.7929L10.51 16.874L10.51 3.29757Z" fill="currentColor" />
								</svg>
							</i>
						</button>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="jumbotron__background">
			<img src="<?= $hero_background_url ?>" alt="<?= $hero_background_alt ?>">
		</div>
	</section>
	<!-- /.jumbotron -->
	<div class="jumpscroll"></div>
	<section class="benefits lg:lg:py-20 md:py-16 py-10">
		<div class="benefits__container">
			<div class="benefits__content">
				<div class="benefits__heading section-heading flex items-start gap-4 justify-between">
					<div class="section-heading__left flex flex-col gap-2">
						<span><?= $benefits_subtitle ?></span>
						<h2 class="headline-large">
							<?= $benefits_title ?>
						</h2>
					</div>
				</div>
				<div class="benefits__body">
					<div class="benefits__list">
						<?php
						global $post;

						$benefits_posts = new WP_Query([
							'post_type' => 'benefits',
							'orderby'   => 'date',
							'order'     => 'ASC'
						]);

						if ($benefits_posts->have_posts()) {
							$i = 0;
							while ($benefits_posts->have_posts()) {
								$i++;
								$benefits_posts->the_post();

								// Variables
								$content = strip_tags(get_the_content());

								$thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Получаем ID миниатюры
								$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Получаем атрибут alt
								$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Получаем атрибут alt

						?>
								<div class="benefits__item item-benefit">
									<div class="item-benefit__body">
										<div class="item-benefit__header">
											<span class="headline-medium text-dark-600"><?= sprintf('%02d', $i) ?></span>
											<div class="item-benefit__icon">
												<img src="<?= esc_url($thumbnail_url) ?>" alt="<?= esc_attr($thumbnail_alt) ?>">
											</div>
										</div>
										<div class="item-benefit__content">
											<div class="item-benefit__text">
												<h5 class="headline-medium text-dark-800 mb-4">
													<?php the_title() ?>
												</h5>
												<div class="body-medium text-dark-600">
													<p>
														<?= $content ?>
													</p>
												</div>
											</div>
											<div class="item-benefit__icon--pc">
												<img src="<?= esc_url($thumbnail_url) ?>" alt="<?= esc_attr($thumbnail_alt) ?>">
											</div>
										</div>
									</div>
								</div>
						<?php
							}
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.benefits -->
	<section class="how-it-works lg:lg:py-20 md:py-16 py-10">
		<div class="how-it-works__container">
			<div class="how-it-works__content">
				<div class="how-it-works__heading section-heading flex items-start gap-4 justify-between lg:mb-0">
					<div class="section-heading__left flex flex-col gap-2 sticky top-5">
						<span><?= $how_it_works_subtitle ?></span>
						<h2 class="headline-large">
							<?= $how_it_works_title ?>
						</h2>
					</div>
				</div>
				<div class="how-it-works__body">
					<?php
					global $post;

					$why_smartap_posts = new WP_Query([
						'post_type' => 'how_it_works',
						'orderby'   => 'date',
						'order'     => 'ASC'
					]);

					if ($why_smartap_posts->have_posts()) {
						$i = 0;
						while ($why_smartap_posts->have_posts()) {
							$i++;
							$why_smartap_posts->the_post();

							// Variables
							$content = strip_tags(get_the_content());

							$thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Получаем ID миниатюры
							$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Получаем атрибут alt
							$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Получаем атрибут alt

					?>
							<div class="how-it-works__step step">
								<div class="step__body">
									<div class="step__num"><?= sprintf('%02d', $i) ?></div>
									<div class="step__content">
										<h5 class="headline-medium text-dark-800 mb-3"><?php the_title() ?></h5>
										<p class="text-dark-600 body-medium"><?= $content ?></p>
									</div>
								</div>
							</div>
					<?php
						}
					}
					wp_reset_postdata(); // Сбрасываем $post
					?>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- /.how-it-works -->

	<section class="promo-video lg:py-20 md:py-16 py-10">
		<div class="promo-video__container">
			<div class="promo-video__content">
				<div class="promo-video__heading section-heading flex items-start gap-4 justify-between flex-wrap">
					<div class="section-heading__left flex flex-col gap-2">
						<span><?= $use_cases_subtitle ?></span>
						<h2 class="headline-large">
							<?= $use_cases_title ?>
						</h2>
					</div>
					<div class="section-heading__right flex flex-col gap-3 items-start">
						<div class="body-large text-dark-700">
							<p><?= $use_cases_description ?></p>
						</div>
						<a href="<?= $use_cases_button_url ?>" class="button button-arrow-right button-size-l button-tinted" <?= $use_cases_button_target ?>>
							<span>
								<?= $use_cases_button_title ?>
							</span>
							<i>
								<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.5 12H19.5M19.5 12L13.5 6M19.5 12L13.5 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</i>
						</a>
					</div>
				</div>
				<div class="promo-video__body">
					<div class="video-container">
						<video class="video-container__video object-cover" id="videoPromoCases">
							<source src="<?= $use_cases_video_url ?>" type="video/mp4">

						</video>
						<button class="video-container__control custom-play">
							<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g filter="url(#filter0_b_16534_3296)">
									<rect width="80" height="80" rx="40" fill="white" />
									<path d="M56.25 37.904C57.9167 38.8355 57.9167 41.1645 56.25 42.096L33.75 54.6721C32.0833 55.6037 30 54.4392 30 52.5761L30 27.4239C30 25.5608 32.0833 24.3963 33.75 25.3279L56.25 37.904Z" fill="#0F161C" />
								</g>
								<defs>
									<filter id="filter0_b_16534_3296" x="-16" y="-16" width="112" height="112" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feFlood flood-opacity="0" result="BackgroundImageFix" />
										<feGaussianBlur in="BackgroundImageFix" stdDeviation="8" />
										<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_16534_3296" />
										<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_16534_3296" result="shape" />
									</filter>
								</defs>
							</svg>
						</button>
					</div>


				</div>
			</div>
		</div>
	</section>
	<!-- /.promo-video -->

	<section class="why-us lg:py-20 md:py-16 py-10" id="why-us">
		<div class="why-us__container">
			<div class="why-us__content">
				<div class="why-us__heading section-heading flex items-start gap-4 justify-between flex-wrap">
					<div class="section-heading__left flex flex-col gap-2">
						<span><?= $why_smartap_subtitle ?></span>
						<h2 class="headline-large">
							<?= $why_smartap_title ?>
						</h2>
					</div>
				</div>
				<div class="why-us__body">
					<div data-tabs class="tabs tabs-vertical">
						<nav data-tabs-titles class="tabs__navigation">
							<?php
							global $post;

							$why_smartap = new WP_Query([
								'post_type' => 'why_smartap',
								'orderby'   => 'date',
								'order'     => 'ASC'
							]);
							$arr_why_thumbnail = [];

							if ($why_smartap->have_posts()) {
								$i = 0;


								while ($why_smartap->have_posts()) {
									$i++;
									$why_smartap->the_post();

									// Variables
									$content = strip_tags(get_the_content());

									$thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Получаем ID миниатюры
									$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Получаем атрибут alt
									$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Получаем атрибут alt
									array_push($arr_why_thumbnail, [
										'alt' => $thumbnail_alt,
										'url' => $thumbnail_url,
									])

							?>
									<div class="tabs__title <? if ($i === 1) {
																						echo '_tab-active';
																					} ?>">
										<button type="button" class="tabs__title-button"><?php the_title() ?></button>
										<div class="tabs__title-content body-large text-dark-400">
											<p>
												<?= $content ?>
											</p>
										</div>
										<div class="tabs__title-image">
											<img src="<?= esc_url($thumbnail_url) ?>" alt="<?= esc_attr($thumbnail_alt) ?>">
										</div>
									</div>
							<?php
								}
							}
							wp_reset_postdata(); // Сбрасываем $post
							?>
						</nav>
						<div data-tabs-body class="tabs__content">
							<?php foreach ($arr_why_thumbnail as $thumbnail) { ?>
								<div class="tabs__body">
									<div class="why-us-tabs__image">
										<img src="<?= esc_url($thumbnail['url']) ?>" alt="<?= esc_attr($thumbnail['alt']) ?>">
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.why-us -->


	<section class="partners lg:py-20 md:py-16 py-10">
		<div class="partners__container">
			<div class="partners__content">
				<div class="partners__heading mb-8">
					<h2 class="headline-medium text-center">Our trusted Partners and Clients</h2>
				</div>

			</div>
		</div>
		<div class="partners__body">
			<div class="partners-autoplay__slider swiper">
				<div class="partners-autoplay__wrapper swiper-wrapper">
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.partners -->

	<?php get_template_part('template-parts/cta') ?>
	<!-- /.cta-section -->
</main>
<?php get_footer() ?>