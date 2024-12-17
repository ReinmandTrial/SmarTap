<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */

$footer_copyright = get_field('footer_copyright', 'options');
$footer_title = get_field('footer_title', 'options');
?>
<footer class="footer ">

	<div class="footer__content">
		<div class="footer__top top-footer lg:py-20 md:py-16 py-10">
			<div class="footer__container">
				<div class="top-footer__content">
					<div class="top-footer__left">
						<div class="footer__logo footer__logo-mob lg:hidden lg:mb-0 md:mb-12 mb-8">
							<?php
							if (function_exists('the_custom_logo') & has_custom_logo()) {
								the_custom_logo(); // Выводим кастомное лого
							} else {
								echo '<img src="' . IMAGES_PATH . '/logo.webp" alt="Logo Main">';
							}
							?>
						</div>
						<div class="footer__email-promotions email-promotions sm:mb-12">
							<div class="email-promotions__label body-large text-dark-700 sm:mb-6 mb-4">
								<p class="">
									<?= $footer_title ?>
								</p>
							</div>
							<?php echo do_shortcode('[contact-form-7 id="03ac6be" title="Footer form"]') ?>
						</div>
						<div class="footer__logo footer__logo-pc lg:block hidden">
							<?php
							if (function_exists('the_custom_logo') & has_custom_logo()) {
								the_custom_logo(); // Выводим кастомное лого
							} else {
								echo '<img src="' . IMAGES_PATH . '/logo.webp" alt="Logo Main">';
							}
							?>
						</div>
					</div>
					<div class="top-footer__right">
						<?php if (is_active_sidebar('footer_sidebar')) : ?>
							<?php dynamic_sidebar('footer_sidebar'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__bottom bottom-footer py-4">
			<div class="footer__container">
				<div class="bottom-footer__content">
					<div class="bottom-footer__copyright text-dark-600 body-small">
						<p>
							<?= $footer_copyright ?>
						</p>
					</div>
					<div class="bottom-footer__socials">
						<ul>
							<?php if (have_rows('socials', 'options')): ?>
								<?php while (have_rows('socials', 'options')) : the_row(); ?>

									<?php
									$icon_data = get_sub_field('social_img');
									if ($icon_data['subtype'] === 'svg+xml') {
										$social_img = file_get_contents($icon_data['url']);
									} else {
										$social_img = '<img src="' . $icon_data['url'] . '"></img>';
									}
									$social_link = get_sub_field('link');
									?>
									<li>
										<a href="<?= $social_link ?>">
											<?= $social_img ?>
										</a>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>
</div>
<?php wp_footer() ?>
</body>

</html>