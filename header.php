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
	<?php wp_head() ?>
	<!-- After wp_head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php body_class() ?>>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<div class="header__content flex items-center justify-between gap-3">
					<div class="flex items-center sm:gap-8 gap-3">
						<button type="button" class="menu__icon icon-menu"><span></span></button>
						<a href="#" class="header__logo">
							<?php
							if (function_exists('the_custom_logo') & has_custom_logo()) {
								the_custom_logo(); // Выводим кастомное лого
							} else {
								echo '<img src="' . IMAGES_PATH . '/logo.webp" alt="Logo Main">';
							}
							?>
						</a>
						<div class="header__menu menu">

							<nav class="menu__body">
								<?php
								wp_nav_menu([
									'theme_location'  => 'header_menu',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => '',
								])
								?>
							</nav>
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
				<div class="menu">
					<nav class="menu__body">
						<p class="text-brand-main title-medium mb-5 uppercase">About Us</p>
						<ul>
							<li>
								<a href="#">
									About Us




								</a>
							</li>
							<li>
								<a href="#">
									Environmental Policy
								</a>
							</li>
							<li>
								<a href="#">
									ISO-14001 Accreditation
								</a>
							</li>
							<li>
								<a href="#">
									Privacy Policy
								</a>
							</li>
							<li>
								<a href="#">
									Terms &amp; Conditions
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="menu">
					<nav class="menu__body">
						<p class="text-brand-main title-medium mb-5 uppercase">Customer Service</p>
						<ul>
							<li>
								<a href="#">
									Delivery




								</a>
							</li>
							<li>
								<a href="#">
									Returns &amp; Refunds
								</a>
							</li>
							<li>
								<a href="#">
									Customer Service
								</a>
							</li>
							<li>
								<a href="#">
									Contacts
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="header-mob-menu-bottom">
				<h4 class="sm:block hidden mb-4 headline-medium text-dark-800">
					Fill out the form or call us now.
				</h4>
				<div class="header-mob-menu-bottom__actions flex items-center gap-2">

					<a href="#" class="header-mob-bottom-contact button button-size-m button-primary">
						<span>
							Contact Us
						</span>
					</a>
					<div class="phone-block">
						<a href="tel:+44(0)333 700 0078" class="phone-block-icon">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.91872 2.54768C6.66561 1.91492 6.05276 1.5 5.37126 1.5H3.07895C2.20692 1.5 1.5 2.20675 1.5 3.07878C1.5 10.491 7.50898 16.5 14.9212 16.5C15.7933 16.5 16.5 15.793 16.5 14.921L16.5004 12.6283C16.5004 11.9468 16.0856 11.334 15.4528 11.0809L13.2558 10.2024C12.6874 9.97509 12.0402 10.0774 11.57 10.4693L11.0029 10.9422C10.3407 11.4941 9.36636 11.4502 8.75683 10.8407L7.16018 9.24255C6.55065 8.63302 6.50561 7.65945 7.05745 6.99724L7.53027 6.43025C7.92218 5.95996 8.02541 5.31263 7.79805 4.74424L6.91872 2.54768Z" stroke="#0B98DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</a>
					</div>
				</div>

				<div class="header-mob-menu-bottom__socials">
					<ul>
						<li>
							<a href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
									<path d="M29.3337 16.405C29.3337 8.99625 23.3642 2.99023 16.0003 2.99023C8.63653 2.99023 2.66699 8.99625 2.66699 16.405C2.66699 23.1006 7.54278 28.6505 13.917 29.6569V20.2828H10.5316V16.405H13.917V13.4496C13.917 10.0875 15.9077 8.23039 18.9531 8.23039C20.4121 8.23039 21.9378 8.49241 21.9378 8.49241V11.7937H20.2566C18.6003 11.7937 18.0837 12.8279 18.0837 13.8888V16.405H21.7815L21.1905 20.2828H18.0837V29.6569C24.4579 28.6505 29.3337 23.1009 29.3337 16.405Z" fill="currentColor" fill-opacity="0.8"></path>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
									<path d="M22.9015 5.65674H26.5816L18.5415 14.6933L28 26.9901H20.5941L14.7935 19.5322L8.15631 26.9901H4.47392L13.0736 17.3245L4 5.65674H11.5939L16.8372 12.4736L22.9015 5.65674ZM21.6097 24.8239H23.6491L10.4859 7.70911H8.2976L21.6097 24.8239Z" fill="currentColor" fill-opacity="0.8"></path>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M6 4.32373C4.89543 4.32373 4 5.21916 4 6.32373V26.3237C4 27.4283 4.89543 28.3237 6 28.3237H26C27.1045 28.3237 28 27.4283 28 26.3237V6.32373C28 5.21916 27.1045 4.32373 26 4.32373H6ZM11.361 9.66069C11.3685 10.9357 10.4141 11.7213 9.28164 11.7157C8.21476 11.7101 7.28476 10.8607 7.29039 9.66257C7.29601 8.53569 8.18664 7.63006 9.34352 7.65632C10.5173 7.68257 11.3685 8.5432 11.361 9.66069ZM16.3729 13.3394H13.0129H13.0111V24.7525H16.5623V24.4863C16.5623 23.9797 16.5619 23.4731 16.5615 22.9663C16.5604 21.6145 16.5592 20.2613 16.5661 18.91C16.568 18.5819 16.5829 18.2407 16.6673 17.9275C16.9841 16.7575 18.0361 16.0019 19.2099 16.1876C19.9636 16.3056 20.4623 16.7425 20.6723 17.4532C20.8017 17.8975 20.8599 18.3756 20.8655 18.8388C20.8807 20.2356 20.8785 21.6324 20.8764 23.0293C20.8756 23.5224 20.8748 24.0157 20.8748 24.5088V24.7507H24.4373V24.4769C24.4373 23.8743 24.4371 23.2717 24.4367 22.6692C24.436 21.1632 24.4352 19.6572 24.4392 18.1507C24.4411 17.47 24.368 16.7988 24.2011 16.1407C23.9517 15.1619 23.4361 14.3519 22.598 13.7669C22.0036 13.3507 21.3511 13.0825 20.6217 13.0525C20.5387 13.0491 20.4549 13.0446 20.3708 13.04C19.9979 13.0199 19.6188 12.9994 19.2623 13.0713C18.2423 13.2757 17.3461 13.7425 16.6692 14.5656C16.5905 14.66 16.5136 14.7559 16.3988 14.8989L16.3729 14.9313V13.3394ZM7.57552 24.7563H11.1099V13.3468H7.57552V24.7563Z" fill="currentColor" fill-opacity="0.8"></path>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
									<path d="M28.7906 9.60385C28.6388 9.04038 28.342 8.52652 27.9298 8.1134C27.5176 7.70029 27.0044 7.40233 26.4413 7.24918C24.3533 6.67585 16 6.66651 16 6.66651C16 6.66651 7.64795 6.65718 5.55862 7.20518C4.99585 7.36538 4.48371 7.66755 4.07137 8.08269C3.65903 8.49784 3.36033 9.01201 3.20395 9.57585C2.65328 11.6638 2.64795 15.9945 2.64795 15.9945C2.64795 15.9945 2.64262 20.3465 3.18928 22.4132C3.49595 23.5558 4.39595 24.4585 5.53995 24.7665C7.64929 25.3398 15.98 25.3492 15.98 25.3492C15.98 25.3492 24.3333 25.3585 26.4213 24.8118C26.9846 24.659 27.4983 24.3617 27.9115 23.9494C28.3247 23.5371 28.6231 23.0242 28.7773 22.4612C29.3293 20.3745 29.3333 16.0452 29.3333 16.0452C29.3333 16.0452 29.36 11.6918 28.7906 9.60385ZM13.328 20.0065L13.3346 12.0065L20.2773 16.0132L13.328 20.0065Z" fill="currentColor" fill-opacity="0.8"></path>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>