<?php
/* CTA section */
$cta_group = get_field('cta_group', 'option');

if ($cta_group):

	// Header 
	$cta_header = $cta_group['cta_header']['title'] ? $cta_group['cta_header']['title'] : false;
	$cta_subtitle = $cta_group['cta_header']['subtitle'] ? $cta_group['cta_header']['subtitle'] : false;

	// Button
	$cta_button_text = $cta_group['cta_button']['title'] ? $cta_group['cta_button']['title'] : false;
	$cta_button_link = $cta_group['cta_button']['url'] ? $cta_group['cta_button']['url'] : false;
	$cta_button_target = $cta_group['cta_button']['target'] ? $cta_group['cta_button']['target'] : false;

	$cta_image_url = $cta_group['cta_image']['url'] ? $cta_group['cta_image']['url'] : false;
	$cta_image_alt = $cta_group['cta_image']['alt'] ? $cta_group['cta_image']['alt'] : false;
?>
	<section class="cta-section lg:py-20 md:py-16 py-0">
		<div class="cta-section__container">
			<div class="cta-section__content">
				<div class="cta-section__left left-cta">
					<h2 class="mb-5 headline-large text-light-900">
						<?= $cta_header ?>
					</h2>
					<div class="body-large text-light-900 mb-8">
						<p>
							<?= $cta_subtitle ?>
						</p>
					</div>
					<a href="<?= $cta_button_link ?>" target="<?= $cta_button_target ?>" class="button button-secondary button-size-l justify-center sm:w-auto w-full">
						<span><?= $cta_button_text ?></span>

					</a>
				</div>
				<div class="cta-section__right right-cta">
					<div class="right-cta__image">
						<img src="<?= $cta_image_url ?>" alt="<?= $cta_image_alt ?>">
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>