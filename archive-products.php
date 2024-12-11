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

require_once('inc/get-permalink-by-slug.php')

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
								$product_category = get_field('product_category');
								$product_id = get_the_ID();

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
														<?= $product_category ?>
													</span>
													<a href="<?= the_permalink() ?>" class="block headline-medium text-dark-800">
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
												<a href="#compare" id='send-request' data-id-product='<?= $product_id ?>' data-request-html='true' data-target-section='.section-compare' class="button button-size-l button-tinted">
													<span>
														Compare
													</span>
												</a>
												<a href="<?= get_permalink_by_slug('contacts') ?>" class="button button-size-l button-primary">
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

	<?php get_template_part('template-parts/compare',) ?>
	<!-- /.section-compare -->
	<?php get_template_part('template-parts/cta',) ?>
	<!-- /.cta-section -->
</main>
<?php
get_footer();
?>