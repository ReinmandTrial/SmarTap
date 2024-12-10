<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smarTap
 */
get_header();

$catalog_title = get_field('catalog_products_title', 'options');
$catalog_subtitle = get_field('catalog_products_subtitle', 'options');

?>
<main class="page">
	<section class="page-section lg:py-20 md:py-16 py-10">
		<div class="page-section__container">
			<div class="page-section__content">
				<div class="page-section__header section-heading">
					<h1 class="display-medium text-dark-800 mb-4">
						<?php
						if (!empty($catalog_title)) {
							echo $catalog_title;
						}
						?>
					</h1>
					<div class="page-section__header-desc body-large text-dark-700">
						<p>
							<?php
							if (!empty($catalog_subtitle)) {
								echo $catalog_subtitle;
							}
							?>
						</p>
					</div>
				</div>
				<div class="page-section__body">
					<div class="page-section__catalog grid sm:grid-cols-2 gap-4">
						<?php
						$args = array(
							'post_type'      => 'products',
							'orderby'				 => 'date',
							'order'					 => 'ASC'
						);
						$the_query = new WP_Query($args);

						if ($the_query->have_posts()) :
							while ($the_query->have_posts()) : $the_query->the_post();
								$product_img_data = get_field('product_images');
								$product_img_url = $product_img_data[0]['url'];
								$product_img_alt = $product_img_data[0]['alt'];
						?>
								<div class="product-item">
									<div class="product-item__body">
										<div class="product-item__header">
											<div class="section-heading">
												<div class="section-heading__left">

													<span class="mb-2 inline-block">
														RW-I-GENUS
													</span>
													<a href="#" class="block headline-medium text-dark-800">
														<?php
														if (!empty(get_the_title())) {
															the_title();
														}
														?>
													</a>

												</div>

											</div>
										</div>
										<div class="product-item__content">
											<a href="<?= the_permalink() ?>" class="product-item__image">
												<img src="<?= $product_img_url ?>" alt="<?= $product_img_alt ?>">
											</a>
										</div>
										<div class="product-item__footer">
											<div class="flex items-center justify-between gap-4">
												<a href="#" class="button button-size-l button-tinted">
													<span>
														Compare
													</span>
												</a>
												<a href="#" class="button button-size-l button-primary">
													<span>
														Contact Us
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
						<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.page-section -->
	<div class="jumpscroll"></div>

	<section class="section-compare lg:py-20 md:py-16 py-10">
		<div class="section-compare__container">
			<div class="section-compare__content">
				<div class="section-compare__heading section-heading flex items-center gap-4 flex-wrap justify-between">
					<div class="section-heading__left">
						<h2 class="headline-large text-dark-800">
							Compare our Products
						</h2>
					</div>
					<div class="section-heading__right">
						<a href="#" class="button button-size-l button-primary">
							<span>
								Request a Demo Kit
							</span>
						</a>
					</div>
				</div>
				<div class="section-compare__body">
					<div class="section-compare-table">
						<table>
							<thead>
								<tr>
									<th scope="col">
										<div class="section-compare-table-product product-in-table">
											<div class="product-in-table__body">
												<div class="product-in-table__content">
													<h5 class="headline-small text-dark-800">Products</h5>
												</div>
											</div>
										</div>
									</th>
									<th scope="col">
										<div class="section-compare-table-product product-in-table">
											<div class="product-in-table__body">
												<div class="product-in-table__header">
													<img src="img/products/02.webp" alt="Image">
													<button type="button" class="button-close">
														<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
															<path d="M11 11L6.00001 6.00001M6.00001 6.00001L1 1M6.00001 6.00001L11 1M6.00001 6.00001L1 11" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</button>
												</div>
												<div class="product-in-table__content">
													<h5 class="headline-small text-dark-800">Genus Inlay</h5>
												</div>
											</div>
										</div>
									</th>
									<th scope="col">
										<div class="section-compare-table-product product-in-table">
											<div class="product-in-table__body">
												<div class="product-in-table__header">
													<img src="img/products/01.webp" alt="Image">
													<button type="button" class="button-close">
														<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
															<path d="M11 11L6.00001 6.00001M6.00001 6.00001L1 1M6.00001 6.00001L11 1M6.00001 6.00001L1 11" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</button>
												</div>
												<div class="product-in-table__content">
													<h5 class="headline-small text-dark-800">Alpha Inlay</h5>
												</div>
											</div>
										</div>
									</th>
									<th scope="col">
										<div class="section-compare-table-product product-in-table">
											<div class="product-in-table__body">
												<div class="product-in-table__header">
													<img src="img/products/03.webp" alt="Image">
													<button type="button" class="button-close">
														<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
															<path d="M11 11L6.00001 6.00001M6.00001 6.00001L1 1M6.00001 6.00001L11 1M6.00001 6.00001L1 11" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</button>
												</div>
												<div class="product-in-table__content">
													<h5 class="headline-small text-dark-800">Halo Inlay</h5>
												</div>
											</div>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td data-label="Products">
										<strong>Part Number</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Dimensions</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Lorem ipsum dolor sit amet.</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Max Thickness</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Weight</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, consequuntur! A quae officiis omnis quos?</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Operating Temperature</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Storage Temperature</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Storage Duration</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Interface</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Environmental Compliance</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Compatible with</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
								<tr>
									<td data-label="Products">
										<strong>Mastercard Certification</strong>
									</td>
									<td data-label="Genus Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Alpha Inlay">
										<p>Cell content</p>
									</td>
									<td data-label="Halo Inlay">
										<p>Cell content</p>
									</td>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.section-compare -->
	<?php get_template_part('template-parts/cta') ?>
	<!-- /.cta-section -->
</main>
<?php
get_footer();
?>