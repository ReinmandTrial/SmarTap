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
							<?= $logo_img ?>
						</div>
						<div class="footer__email-promotions email-promotions sm:mb-12">
							<div class="email-promotions__label body-large text-dark-700 sm:mb-6 mb-4">
								<p class="">
									<?= $footer_title ?>
								</p>
							</div>
							<form action="files/sendmail/sendmail.php" class="footer__form form" method="POST">
								<div class="form-group sm:flex-row flex-col">
									<div class="flex flex-col gap-2 sm:w-auto w-full">
										<input autocomplete="off" type="text" name="form[]" data-error="Помилка" placeholder="Enter your email" class="input">
										<p class="text-base text-dark-600">By subscribing you agree to with our Privacy Policy.</p>
									</div>
									<button type="submit" class="button button-size-l button-primary sm:w-auto w-full justify-center">
										<span>
											Subscribe
										</span>
									</button>
								</div>

							</form>
						</div>
						<div class="footer__logo footer__logo-pc lg:block hidden">
							<img src="<?= IMAGES_PATH ?>/logo.webp" alt="Logo Main">
						</div>
					</div>
					<div class="top-footer__right">
						<?php if (is_active_sidebar('footer_sidebar')) ?>
						<?php if (is_active_sidebar('footer_sidebar')) : ?>
							<?php dynamic_sidebar('footer_sidebar'); ?>
						<?php endif; ?>
						<div class="footer__menu menu">
							<nav class="menu__body">

								<!-- <p class="text-brand-main title-medium mb-5 uppercase">About Us</p> -->


								<?php
								// wp_nav_menu([
								// 	'theme_location'  => 'about_us_menu',
								// 	'container'       => '',
								// 	'container_class' => '',
								// 	'container_id'    => '',
								// 	'menu_class'      => '',
								// 	'menu_id'         => '',
								// 	'echo'            => true,
								// 	'fallback_cb'     => 'wp_page_menu',
								// 	'before'          => '',
								// 	'after'           => '',
								// 	'link_before'     => '',
								// 	'link_after'      => '',
								// 	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								// 	'depth'           => 0,
								// 	'walker'          => '',
								// ])
								?>
							</nav>
						</div>
						<div class="footer__menu menu">
							<nav class="menu__body">
								<!-- <p class="text-brand-main title-medium mb-5 uppercase">Customer Service</p> -->
								<?php
								// wp_nav_menu([
								// 	'theme_location'  => 'customer_service_menu',
								// 	'container'       => '',
								// 	'container_class' => '',
								// 	'container_id'    => '',
								// 	'menu_class'      => '',
								// 	'menu_id'         => '',
								// 	'echo'            => true,
								// 	'fallback_cb'     => 'wp_page_menu',
								// 	'before'          => '',
								// 	'after'           => '',
								// 	'link_before'     => '',
								// 	'link_after'      => '',
								// 	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								// 	'depth'           => 0,
								// 	'walker'          => '',
								// ])
								?>
							</nav>
						</div>
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