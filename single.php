<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package smarTap
 */
get_header();

require_once('inc/get-permalink-by-slug.php');
// Header 
$product_category = get_field('product_category');
$product_title = get_the_title();
$product_description = get_field('product_description');

// Images
$product_images_arr = get_field('product_images');
$product_specifications = get_field('product_specifications_group');
// Specification
$product_specification = get_field('product_specifications_group');
$product_file = get_field('product_pdf_file');
function print_specification($specification_arr)
{
	$more_specification = $specification_arr['more'];



	$main_specification = $specification_arr;
	unset($main_specification['more']);


	function specification_loop($specifications)
	{
		if (!empty($specifications)) {
			foreach ($specifications as $specification) {
				if (empty($specification['value'])) continue;


				echo '<li>';
				echo 	'<p>' . $specification['label'] . '</p>';
				echo 	'<span>' . $specification['value'] . '</span>';
				echo '</li>';
			}
		}
	}

	if (!empty($more_specification)) {
		specification_loop($main_specification);;
	}

	if (!empty($more_specification)) {
		foreach ($more_specification as &$item) {
			if (isset($item['group'])) {
				$item = $item['group']; // Заменяем элемент содержимым ключа group
			}
		}
		specification_loop($more_specification);
	}
}


function formatBytes($bytes)
{
	if ($bytes >= 1048576) { // 1 мегабайт в байтах = 1024 * 1024 = 1048576
		return number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) { // 1 килобайт в байтах = 1024
		return number_format($bytes / 1024, 2) . ' KB';
	} else {
		return $bytes . ' B';
	}
}

?>
<main class="page">
	<section class="product-info pt-8 lg:pb-20 md:pb-16 pb-8">
		<div class="product-info__container">
			<div class="product-info__content">
				<div class="flex mb-5">
					<a href="<?= get_post_type_archive_link('products') ?>" class="button button-arrow-left button-size-l button-tinted">
						<span>
							Back to All Products
						</span>
						<i>
							<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
								<path d="M12.8333 6H1.16663M1.16663 6L6.16663 11M1.16663 6L6.16663 1" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</i>
					</a>
				</div>
				<div class="product-info__body">
					<div class="lg:grid lg:grid-cols-2 gap-4">
						<div class="product-info__images lg:mb-0 mb-4">
							<div class="product-info__slider swiper sm:mb-2 mb-1">
								<div class="product-info__wrapper swiper-wrapper">
									<?php
									if (!empty($product_images_arr)) {
										foreach ($product_images_arr as $image) {
									?>
											<div class="product-info__slide swiper-slide slide-image">
												<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
											</div>
									<?php
										}
									}
									?>
								</div>
								<div class="slider-navigation">
									<button type="button" class="swiper-button-prev slider-button-two">
										<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
											<path d="M15 7H1M1 7L7 13M1 7L7 1" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</button>
									<button type="button" class="swiper-button-next slider-button-two">
										<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
											<path d="M1 7H15M15 7L9 1M15 7L9 13" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</button>
								</div>
							</div>
							<div class="product-info-thumb__slider swiper">
								<div class="product-info-thumb__wrapper swiper-wrapper">
									<?php
									if (!empty($product_images_arr)) {
										foreach ($product_images_arr as $image) {
									?>
											<div class="product-info-thumb__slide swiper-slide slide">
												<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
											</div>
									<?php
										}
									}
									?>
								</div>
							</div>
						</div>

						<div class="product-info__text info-text">
							<div class="relative sm:mb-8 mb-5">
								<div class="flex flex-col gap-2 mb-4">
									<span class="sm:text-base text-sm font-semibold text-brand-main inline-block"><?= $product_category ?></span>
									<h1 class="headline-large text-dark-800"><?= $product_title ?></h1>
									<div class="body-medium text-dark-700">
										<p><?= $product_description ?></p>
									</div>
								</div>

								<div class="info-text-reviews mb-4">
									<?php echo do_shortcode('[site_reviews_summary hide="bars,if_empty,rating"]') ?>
								</div>

								<div class="info-text-actions flex items-center gap-2 justify-between">
									<a href="<?= get_permalink_by_slug('contacts') ?>" class="button button-size-l button-primary flex-1">
										<span>
											Contact Us for price
										</span>
									</a>
									<a href="#" class="button button-size-l button-tinted flex-1">
										<span>
											Add to Comparison list
										</span>
									</a>
								</div>



							</div>

							<div data-tabs class="info-text-tabs tabs-type-two">
								<nav data-tabs-titles class="info-text-tabs__navigation tabs__navigation">
									<button type="button" class="info-text-tabs__title tabs__title _tab-active">
										<i>
											<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
												<path d="M5 15H11M5 12H11M9.00038 1.00087C8.90484 1 8.79738 1 8.67471 1H4.2002C3.08009 1 2.51962 1 2.0918 1.21799C1.71547 1.40973 1.40973 1.71547 1.21799 2.0918C1 2.51962 1 3.08009 1 4.2002V15.8002C1 16.9203 1 17.4801 1.21799 17.9079C1.40973 18.2842 1.71547 18.5905 2.0918 18.7822C2.51921 19 3.079 19 4.19694 19L11.8031 19C12.921 19 13.48 19 13.9074 18.7822C14.2837 18.5905 14.5905 18.2842 14.7822 17.9079C15 17.4805 15 16.9215 15 15.8036V7.32568C15 7.20302 14.9999 7.09553 14.999 7M9.00038 1.00087C9.28583 1.00348 9.46572 1.01407 9.63818 1.05547C9.84225 1.10446 10.0379 1.18526 10.2168 1.29492C10.4186 1.41857 10.5918 1.59181 10.9375 1.9375L14.063 5.06298C14.4089 5.40889 14.5809 5.58136 14.7046 5.78319C14.8142 5.96214 14.8953 6.15726 14.9443 6.36133C14.9857 6.53379 14.9964 6.71454 14.999 7M9.00038 1.00087L9 3.80021C9 4.92031 9 5.48015 9.21799 5.90797C9.40973 6.2843 9.71547 6.59048 10.0918 6.78223C10.5192 7 11.079 7 12.1969 7H14.999" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</i>
										<span>Specifications</span>
									</button>
									<button type="button" class="info-text-tabs__title tabs__title">
										<i>
											<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
												<path d="M1.33496 9.33677C1.02171 9.04709 1.19187 8.52339 1.61557 8.47316L7.61914 7.76107C7.79182 7.74059 7.94181 7.63215 8.01465 7.47425L10.5469 1.98446C10.7256 1.59703 11.2764 1.59695 11.4551 1.98439L13.9873 7.47413C14.0601 7.63204 14.2092 7.74077 14.3818 7.76124L20.3857 8.47316C20.8094 8.52339 20.9791 9.04724 20.6659 9.33693L16.2278 13.4419C16.1001 13.56 16.0433 13.7357 16.0771 13.9063L17.255 19.8359C17.3382 20.2544 16.8928 20.5787 16.5205 20.3703L11.2451 17.4166C11.0934 17.3317 10.9091 17.3321 10.7573 17.417L5.48144 20.3695C5.10913 20.5779 4.66294 20.2544 4.74609 19.8359L5.92414 13.9066C5.95803 13.7361 5.90134 13.5599 5.77367 13.4419L1.33496 9.33677Z" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</i>
										<span>Reviews</span>
									</button>

								</nav>
								<div data-tabs-body class="info-text-tabs__content tabs__content">
									<div class="info-text-tabs__body tabs__body">
										<div class="flex flex-col gap-5">
											<div class="list-characteristics">
												<ul>
													<?php print_specification($product_specification) ?>
												</ul>
											</div>

											<?php if (!empty($product_file)): ?>
												<div class="files-downloads">
													<div class="file-download">
														<div class="file-download__left">
															<div class="flex items-center gap-3">
																<div>
																	<img src="<?= IMAGES_PATH ?>/icons/icon-pdf.webp" alt="Image">
																</div>
																<div class="flex flex-col gap-1">
																	<p class="text-dark-800 label-large line-clamp-2"><?= $product_file['title'] ?></p>
																	<span class="text-dark-600 body-small"><?= formatBytes($product_file['filesize']) ?></span>
																</div>
															</div>
														</div>
														<div class="file-download__right">
															<a href="<?= $product_file['url'] ?>">
																<span>Download</span>
																<i>
																	<svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
																		<path d="M1 19H13M7 1V15M7 15L12 10M7 15L2 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</i>
															</a>
														</div>
													</div>
												</div>
											<?php endif ?>

										</div>
										<!-- /.flies-download -->
									</div>
									<div class="info-text-tabs__body tabs__body">
										<?php echo do_shortcode('[site_reviews hide="title,date"]') ?>

										<div class="reviews-products mb-5">

										</div>

										<div class="flex items-center gap-4 flex-wrap">
											<a href="#" class="button button-size-m button-primary">
												<span>
													Write a Review
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>



						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.product-info -->

	<?php
	// Get the current post ID
	$current_post_id = get_the_ID();

	// WP_Query arguments to exclude the current post
	$other_products = new WP_Query([
		'post_type'      => 'products', // Change 'product' to your custom post type if necessary
		'orderby'				 => 'date',
		'order'					 => 'ASC',
		'post__not_in'   => [$current_post_id], // Exclude the current post
	]);
	if ($other_products->have_posts()):
	?>
		<section class="other-products lg:py-20 md:py-16 py-10">
			<div class="other-products__container">
				<div class="other-products__content">
					<div class="other-products__heading section-heading flex items-center gap-4 flex-wrap justify-between">
						<div class="section-heading__left">
							<h2 class="headline-large text-dark-800">
								Explore other products
							</h2>
						</div>
						<div class="section-heading__right">
							<div class="slider-navigation sm:flex hidden">
								<button type="button" class="swiper-button-prev slider-button-one">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
										<path d="M15 7.5H1M1 7.5L7 13.5M1 7.5L7 1.5" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</button>
								<button type="button" class="swiper-button-next slider-button-one">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
										<path d="M1 7.5H15M15 7.5L9 1.5M15 7.5L9 13.5" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="other-products__body">
						<div class="other-products__slider swiper">
							<div class="other-products__wrapper swiper-wrapper">
								<?php
								while ($other_products->have_posts()) : $other_products->the_post();
									$other_product_category = get_field('product_category');

									$other_product_img_data = get_field('product_images');
									$other_product_img_url = $other_product_img_data[0]['url'];
									$other_product_img_alt = $other_product_img_data[0]['alt'];
								?>
									<div class="other-products__slide swiper-slide">
										<div class="product-item">
											<div class="product-item__body">
												<div class="product-item__header">
													<div class="section-heading">
														<div class="section-heading__left">

															<span class="mb-2 inline-block">
																<?= $other_product_category ?>
															</span>
															<a href="<?= the_permalink() ?>" class="block headline-medium text-dark-800">
																<?php the_title() ?>
															</a>
														</div>

													</div>
												</div>
												<div class="product-item__content">
													<a href="<?= the_permalink() ?>" class="product-item__image">
														<img src="<?= $other_product_img_url ?>" alt="<?= $other_product_img_alt ?>">
													</a>
												</div>
											</div>
										</div>
									</div>
								<?php
								endwhile;
								wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- /.other-products -->
	<?php get_template_part('template-parts/cta') ?>
	<!-- /.cta-section -->
</main>
<?php
get_footer();
?>