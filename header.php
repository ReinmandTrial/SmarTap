<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

$header_phone = get_field('smartap_phone_number', 'options');

$header_button_arr = get_field('smartap_button', 'options');
$header_button_title = $header_button_arr['title'];
$header_button_url = $header_button_arr['url'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!-- Before wp_head -->
	<style>
		body {
			opacity: 0;
		}

		.loaded body {
			opacity: 1;
		}
	</style>

	<?php wp_head() ?>
	<!-- After wp_head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php body_class() ?>>
	<div class="wrapper">
		<header class="header" data-scroll="200" data-scroll-show="">
			<div class="header__container">
				<div class="header__content flex items-center justify-between gap-3">
					<div class="flex items-center sm:gap-8 gap-3">
						<button type="button" class="menu__icon icon-menu"><span></span></button>
						<?php
						if (function_exists('the_custom_logo') & has_custom_logo()) {
							the_custom_logo(); // Выводим кастомное лого
						} else {
							echo '<img src="' . IMAGES_PATH . '/logo.webp" alt="Logo Main">';
						}
						?>
						<div class="header__menu menu">
							<?php if (is_active_sidebar('header_sidebar')) : ?>
								<?php dynamic_sidebar('header_sidebar'); ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="flex items-center sm:gap-8 gap-2">
						<div class="header__phone-block phone-block">
							<a href="tel:<?= $header_phone ?>" class="phone-block-tel"><?= $header_phone ?></a>
							<a href="tel:<?= $header_phone ?>" class="phone-block-icon">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.91872 2.54768C6.66561 1.91492 6.05276 1.5 5.37126 1.5H3.07895C2.20692 1.5 1.5 2.20675 1.5 3.07878C1.5 10.491 7.50898 16.5 14.9212 16.5C15.7933 16.5 16.5 15.793 16.5 14.921L16.5004 12.6283C16.5004 11.9468 16.0856 11.334 15.4528 11.0809L13.2558 10.2024C12.6874 9.97509 12.0402 10.0774 11.57 10.4693L11.0029 10.9422C10.3407 11.4941 9.36636 11.4502 8.75683 10.8407L7.16018 9.24255C6.55065 8.63302 6.50561 7.65945 7.05745 6.99724L7.53027 6.43025C7.92218 5.95996 8.02541 5.31263 7.79805 4.74424L6.91872 2.54768Z" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
						</div>

						<div class="header__actions">
							<a href="<?= esc_url($header_button_url) ?>" class="button button-size-m button-primary">
								<span>
									<?= $header_button_title ?>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="header-mob-menu">
			<div class="header-mob-menu-top">
				<?php if (is_active_sidebar('header_mobile_sidebar')) : ?>
					<?php dynamic_sidebar('header_mobile_sidebar'); ?>
				<?php endif; ?>
				<div class="menu">
					<nav class="menu__body">

					</nav>
				</div>
				<div class="menu">
					<nav class="menu__body">

					</nav>
				</div>
			</div>
			<div class="header-mob-menu-bottom">
				<h4 class="sm:block hidden mb-4 headline-medium text-dark-800">
					Fill out the form or call us now.
				</h4>
				<div class="header-mob-menu-bottom__actions flex items-center gap-2">

					<a href="<?= esc_url($header_button_url) ?>" class="header-mob-bottom-contact button button-size-m button-primary">
						<span>
							<?= $header_button_title ?>
						</span>
					</a>
					<div class="phone-block">
						<a href="tel:<?= $header_phone ?>" class="phone-block-icon">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.91872 2.54768C6.66561 1.91492 6.05276 1.5 5.37126 1.5H3.07895C2.20692 1.5 1.5 2.20675 1.5 3.07878C1.5 10.491 7.50898 16.5 14.9212 16.5C15.7933 16.5 16.5 15.793 16.5 14.921L16.5004 12.6283C16.5004 11.9468 16.0856 11.334 15.4528 11.0809L13.2558 10.2024C12.6874 9.97509 12.0402 10.0774 11.57 10.4693L11.0029 10.9422C10.3407 11.4941 9.36636 11.4502 8.75683 10.8407L7.16018 9.24255C6.55065 8.63302 6.50561 7.65945 7.05745 6.99724L7.53027 6.43025C7.92218 5.95996 8.02541 5.31263 7.79805 4.74424L6.91872 2.54768Z" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</a>
					</div>
				</div>

				<div class="header-mob-menu-bottom__socials">
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