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

						<div class="header__actions flex items-center sm:gap-3 gap-1.5">
							<a href="<?= esc_url($header_button_url) ?>" class="button button-size-m button-primary">
								<span>
									<?= $header_button_title ?>
								</span>
							</a>
								<!-- <a href="<?= esc_url(home_url('/products/#section-compare')) ?>" class="compare-header-button button button-size-m button-tinted relative" hidden>
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m509.857 312.555-86.261-143.779 77.415-21.504c7.983-2.217 12.655-10.485 10.439-18.467-2.218-7.982-10.488-12.656-18.468-10.438l-96.231 26.73-.021.006L271 180.027V15.004c0-8.284-6.716-15-15-15s-15 6.716-15 15V188.36l-133.443 37.066-.021.005-96.547 26.818C3.006 254.466-1.666 262.734.55 270.716c1.845 6.639 7.874 10.989 14.444 10.989a15.01 15.01 0 0 0 4.023-.551l60.186-16.718-77.06 128.449a15.007 15.007 0 0 0-2.138 7.717c0 61.423 49.973 111.394 111.397 111.394 61.426 0 111.398-49.971 111.398-111.394 0-2.718-.739-5.386-2.138-7.717L134.4 249.105l233.997-64.997-77.06 128.447a15.007 15.007 0 0 0-2.138 7.717c0 61.424 49.973 111.395 111.397 111.395 29.755 0 57.729-11.587 78.771-32.628 21.041-21.041 32.628-49.014 32.626-78.769a14.97 14.97 0 0 0-2.136-7.715zM111.402 481.997c-39.757 0-72.933-28.658-79.996-66.396h159.992c-7.062 37.738-40.238 66.396-79.996 66.396zm69.908-96.396H41.496l69.906-116.52 69.908 116.52zm219.286-196.849 69.909 116.519H330.689l69.907-116.519zm.002 212.916c-39.757 0-72.934-28.658-79.998-66.396h159.995c-7.064 37.738-40.239 66.396-79.997 66.396z" fill="currentColor" opacity="1" data-original="#000000" class=""></path></g></svg>
								</span>
								<span class="count">
								    1
								</span>
							</a> -->

              <a href="<?= esc_url(home_url('/products/#compare')) ?>" class="compare-header-button button button-size-m button-tinted relative" hidden>
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m509.857 312.555-86.261-143.779 77.415-21.504c7.983-2.217 12.655-10.485 10.439-18.467-2.218-7.982-10.488-12.656-18.468-10.438l-96.231 26.73-.021.006L271 180.027V15.004c0-8.284-6.716-15-15-15s-15 6.716-15 15V188.36l-133.443 37.066-.021.005-96.547 26.818C3.006 254.466-1.666 262.734.55 270.716c1.845 6.639 7.874 10.989 14.444 10.989a15.01 15.01 0 0 0 4.023-.551l60.186-16.718-77.06 128.449a15.007 15.007 0 0 0-2.138 7.717c0 61.423 49.973 111.394 111.397 111.394 61.426 0 111.398-49.971 111.398-111.394 0-2.718-.739-5.386-2.138-7.717L134.4 249.105l233.997-64.997-77.06 128.447a15.007 15.007 0 0 0-2.138 7.717c0 61.424 49.973 111.395 111.397 111.395 29.755 0 57.729-11.587 78.771-32.628 21.041-21.041 32.628-49.014 32.626-78.769a14.97 14.97 0 0 0-2.136-7.715zM111.402 481.997c-39.757 0-72.933-28.658-79.996-66.396h159.992c-7.062 37.738-40.238 66.396-79.996 66.396zm69.908-96.396H41.496l69.906-116.52 69.908 116.52zm219.286-196.849 69.909 116.519H330.689l69.907-116.519zm.002 212.916c-39.757 0-72.934-28.658-79.998-66.396h159.995c-7.064 37.738-40.239 66.396-79.997 66.396z" fill="currentColor" opacity="1" data-original="#000000" class=""></path></g></svg>
								</span>
								<span class="count">
								    1
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