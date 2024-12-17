<?php
// Group
$cta_request_group = get_field('cta_request_group', 'options');
// Header
$cta_request_title = $cta_request_group['header']['title'];
$cta_request_subtitle = $cta_request_group['header']['subtitle'];

// Buttons
$cta_request_buttons = $cta_request_group['button'];

// Image
$cta_request_image = $cta_request_group['image']
?>

<section class="cta-section lg:py-20 md:py-16 py-0">
	<div class="cta-section__container">
		<div class="cta-section__content">
			<div class="cta-section__left left-cta">
				<h2 class="mb-5 headline-large text-light-900">
					<?= $cta_request_title ?>
				</h2>
				<div class="body-large text-light-900 mb-8">
					<p>
						<?= $cta_request_subtitle ?>
					</p>
				</div>
				<div class="flex items-center gap-4 sm:flex-row flex-col">
					<?php
					if (!empty($cta_request_buttons)) {
						$i = 1;
						$button_class = ($i === 1) ? 'button-secondary' : 'button-border';
						foreach ($cta_request_buttons as $button) {
							$button_class = ($i === 1) ? 'button-secondary' : 'button-border';
							$i++;
					?>
							<a href="#<?= $button['url'] ?>" <?= $button['target'] ?>class="button <?= $button_class ?> button-size-l justify-center sm:w-auto w-full">
								<span><?= $button['title'] ?></span>
							</a>
					<?php
						}
					}
					?>
				</div>


			</div>
			<div class="cta-section__right right-cta">
				<div class="right-cta__image">
					<img src="<?= $cta_request_image['url'] ?>" alt="<?= $cta_request_image['alt'] ?>">
				</div>
			</div>
		</div>
	</div>
</section>