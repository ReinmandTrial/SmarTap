<?php
/* CTA section */
$cta_header = get_field('cta_header', 'option');
$cta_title = $cta_header['title'];
$cta_subtitle = $cta_header['subtitle'];

$cta_button_arr = get_field('cta_button', 'option');
$cta_button_title = $cta_button_arr['title'];
$cta_button_url = $cta_button_arr['url'];
$cta_button_target = !empty($cta_button_arr['target'])
	? 'target="' . $cta_button_arr['target'] . '"'
	: '';

// Background img
$cta_img_arr = get_field('cta_image', 'option');
$cta_img_url;
$cta_img_alt;

if (!empty($hero_background_arr)) {
	$cta_img_url = $cta_img_arr['url'];
	$cta_img_alt = $cta_img_arr['alt'];
} else {
	$cta_img_url = IMAGES_PATH . '/cta/image.webp';
	$cta_img_alt = 'Image CTA';
}
?>

<section class="cta-section lg:py-20 md:py-16 py-0">
	<div class="cta-section__container">
		<div class="cta-section__content">
			<div class="cta-section__left left-cta">
				<h2 class="mb-5 headline-large text-light-900">
					<?= $cta_title ?>
				</h2>
				<div class="body-large text-light-900 mb-8">
					<p>
						<?= $cta_subtitle ?>
					</p>
				</div>
				<a href="#<?= $cta_button_url ?>" <?= $cta_button_target ?>class="button button-secondary button-size-l justify-center sm:w-auto w-full">
					<span><?= $cta_button_title ?></span>

				</a>
			</div>
			<div class="cta-section__right right-cta">
				<div class="right-cta__image">
					<img src="<?= $cta_img_url ?>" alt="<?= $cta_img_alt ?>">
				</div>
			</div>
		</div>
	</div>
</section>