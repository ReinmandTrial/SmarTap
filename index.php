<?php
/*
Template Name: Template: Home
Template Post Type: page
*/
?>
<?php get_header(); ?>
<main class="page">
	<section class="jumbotron">
		<div class="jumbotron__container">
			<div class="jumbotron__content">
				<div class="jumbotron__top top-jumbotron">
					<div class="flex flex-col gap-12">
						<h1 class="display-large text-light-900">
							<?= get_field('hero_title'); ?>
						</h1>
						<a href="#" class="sm:!flex !hidden jumbotron-button button button-secondary button-size-l justify-center">
							<span>Explore</span>
							<i>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M7 17L17 7M17 7H9M17 7V15" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</i>
						</a>
					</div>
				</div>
				<div class="jumbotron__bottom bottom-jumbotron flex sm:items-end sm:gap-4 gap-3 sm:justify-between sm:flex-row flex-col">
					<div class="jumbotron__desc body-large text-light-900">
						<p>
							<?= get_field('hero_description'); ?>
						</p>
					</div>
					<a href="#" class="sm:!hidden w-full  button button-secondary button-size-l justify-center">
						<span><?= esc_html(get_field('hero_target_button')); ?></span>
						<i>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7 17L17 7M17 7H9M17 7V15" stroke="#0F161C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</i>
					</a>
					<button type="button" data-goto=".jumpscroll" class="sm:block hidden scroll-down-btn body-medium inline-flex items-center gap-1.5 text-light-900">
						<span>
							<?= esc_html(get_field('hero_scroll_button')); ?>
						</span>
						<i>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.51 3.29757L12.4899 3.29757V16.874L18.5711 10.7929L19.9853 12.2071L11.5 20.6924L3.01471 12.2071L4.42893 10.7929L10.51 16.874L10.51 3.29757Z" fill="currentColor" />
							</svg>
						</i>
					</button>
				</div>
			</div>
		</div>
		<div class="jumbotron__background">
			<img src="<?= IMAGES_PATH ?>/jumbotron/hero-bg.webp" alt="IMAGE HERO BG">
		</div>
	</section>
	<!-- /.jumbotron -->
	<div class="jumpscroll"></div>
	<section class="benefits lg:lg:py-20 md:py-16 py-10">
		<div class="benefits__container">
			<div class="benefits__content">
				<div class="benefits__heading section-heading flex items-start gap-4 justify-between">
					<div class="section-heading__left flex flex-col gap-2">
						<span>Benefits</span>
						<h2 class="headline-large">
							Why choose SmarTap?
						</h2>
					</div>
				</div>
				<div class="benefits__body">
					<div class="benefits__list">
						<div class="benefits__item item-benefit">
							<div class="item-benefit__body">
								<div class="item-benefit__header">
									<span class="headline-medium text-dark-600">01</span>
									<div class="item-benefit__icon">
										<img src="<?= IMAGES_PATH ?>/benefits/01.webp" alt="Icon Item Benefit">
									</div>
								</div>
								<div class="item-benefit__content">
									<div class="item-benefit__text">
										<h5 class="headline-medium text-dark-800 mb-4">
											Secure and Certified
										</h5>
										<div class="body-medium text-dark-600">
											<p>
												Showcase flexibility with a list of wearable types (rings, bracelets, key fobs).
											</p>
										</div>
									</div>
									<div class="item-benefit__icon--pc">
										<img src="<?= IMAGES_PATH ?>/benefits/01.webp" alt="Icon Item Benefit">
									</div>
								</div>
							</div>
						</div>
						<div class="benefits__item item-benefit">
							<div class="item-benefit__body">
								<div class="item-benefit__header">
									<span class="headline-medium text-dark-600">02</span>
									<div class="item-benefit__icon">
										<img src="<?= IMAGES_PATH ?>/benefits/02.webp" alt="Icon Item Benefit">
									</div>
								</div>
								<div class="item-benefit__content">
									<div class="item-benefit__text">
										<h5 class="headline-medium text-dark-800 mb-4">
											Versatile Application
										</h5>
										<div class="body-medium text-dark-600">
											<p>
												Showcase flexibility with a list of wearable types (rings, bracelets, key fobs).
											</p>
										</div>
									</div>
									<div class="item-benefit__icon--pc">
										<img src="<?= IMAGES_PATH ?>/benefits/02.webp" alt="Icon Item Benefit">
									</div>
								</div>
							</div>
						</div>
						<div class="benefits__item item-benefit">
							<div class="item-benefit__body">
								<div class="item-benefit__header">
									<span class="headline-medium text-dark-600">03</span>
									<div class="item-benefit__icon">
										<img src="<?= IMAGES_PATH ?>/benefits/03.webp" alt="Icon Item Benefit">
									</div>
								</div>
								<div class="item-benefit__content">
									<div class="item-benefit__text">
										<h5 class="headline-medium text-dark-800 mb-4">
											Ready to Deployment
										</h5>
										<div class="body-medium text-dark-600">
											<p>
												Showcase flexibility with a list of wearable types (rings, bracelets, key fobs).
											</p>
										</div>
									</div>
									<div class="item-benefit__icon--pc">
										<img src="<?= IMAGES_PATH ?>/benefits/03.webp" alt="Icon Item Benefit">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.benefits -->
	<section class="how-it-works lg:lg:py-20 md:py-16 py-10">
		<div class="how-it-works__container">
			<div class="how-it-works__content">
				<div class="how-it-works__heading section-heading flex items-start gap-4 justify-between lg:mb-0">
					<div class="section-heading__left flex flex-col gap-2 sticky top-5">
						<span>How it Works</span>
						<h2 class="headline-large">
							Seamless SmarTap Integration Process
						</h2>
					</div>
				</div>
				<div class="how-it-works__body">
					<div class="how-it-works__steps">
						<div class="how-it-works__step step">
							<div class="step__body">
								<div class="step__num">01</div>
								<div class="step__content">
									<h5 class="headline-medium text-dark-800 mb-3">Select the Wearable</h5>
									<p class="text-dark-600 body-medium">Choose from rings, bracelets, or key fobs to integrate SmarTap’s NFC inlays.</p>
								</div>
							</div>
						</div>
						<div class="how-it-works__step step">
							<div class="step__body">
								<div class="step__num">02</div>
								<div class="step__content">
									<h5 class="headline-medium text-dark-800 mb-3">Embed SmarTap Inlay</h5>
									<p class="text-dark-600 body-medium">Easily embed the flexible, compact SmarTap inlay into your product design.Easily embed the flexible, compact SmarTap inlay into your product design.Easily embed the flexible, compact SmarTap inlay into your product design.</p>
								</div>
							</div>
						</div>
						<div class="how-it-works__step step">
							<div class="step__body">
								<div class="step__num">03</div>
								<div class="step__content">
									<h5 class="headline-medium text-dark-800 mb-3">Technical Specifications</h5>
									<p class="text-dark-600 body-medium">The inlay is MasterCard-certified and provides secure NFC with EMV compatibility.</p>
								</div>
							</div>
						</div>
						<div class="how-it-works__step step">
							<div class="step__body">
								<div class="step__num">04</div>
								<div class="step__content">
									<h5 class="headline-medium text-dark-800 mb-3">Ready for Market</h5>
									<p class="text-dark-600 body-medium">Once integrated, your wearables are market-ready with secure payment and NFC capabilities.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.how-it-works -->

	<section class="promo-video lg:py-20 md:py-16 py-10">
		<div class="promo-video__container">
			<div class="promo-video__content">
				<div class="promo-video__heading section-heading flex items-start gap-4 justify-between flex-wrap">
					<div class="section-heading__left flex flex-col gap-2">
						<span>Use Cases and Solutions</span>
						<h2 class="headline-large">
							Innovative Solutions <br> for Every Industry
						</h2>
					</div>
					<div class="section-heading__right flex flex-col gap-3 items-start">
						<div class="body-large text-dark-700">
							<p>
								SmarTap inlays are designed to seamlessly integrate into wearables, enabling secure NFC functionality across a wide range of industries.
							</p>
						</div>
						<a href="#" class="button button-arrow-right button-size-l button-tinted">
							<span>
								Learn More
							</span>
							<i>
								<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.5 12H19.5M19.5 12L13.5 6M19.5 12L13.5 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</i>
						</a>
					</div>
				</div>
				<div class="promo-video__body">
					<div class="video-container">
						<video class="video-container__video object-cover" id="videoPromoCases">
							<source src="<?= IMAGES_PATH ?>/videos/video-1.mp4" type="video/mp4">

						</video>
						<button class="video-container__control custom-play">
							<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g filter="url(#filter0_b_16534_3296)">
									<rect width="80" height="80" rx="40" fill="white" />
									<path d="M56.25 37.904C57.9167 38.8355 57.9167 41.1645 56.25 42.096L33.75 54.6721C32.0833 55.6037 30 54.4392 30 52.5761L30 27.4239C30 25.5608 32.0833 24.3963 33.75 25.3279L56.25 37.904Z" fill="#0F161C" />
								</g>
								<defs>
									<filter id="filter0_b_16534_3296" x="-16" y="-16" width="112" height="112" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feFlood flood-opacity="0" result="BackgroundImageFix" />
										<feGaussianBlur in="BackgroundImageFix" stdDeviation="8" />
										<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_16534_3296" />
										<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_16534_3296" result="shape" />
									</filter>
								</defs>
							</svg>
						</button>
					</div>


				</div>
			</div>
		</div>
	</section>
	<!-- /.promo-video -->

	<section class="why-us lg:py-20 md:py-16 py-10" id="why-us">
		<div class="why-us__container">
			<div class="why-us__content">
				<div class="why-us__heading section-heading flex items-start gap-4 justify-between flex-wrap">
					<div class="section-heading__left flex flex-col gap-2">
						<span>why smartap</span>
						<h2 class="headline-large">
							Why SmarTap is ideal for OEMs
						</h2>
					</div>
				</div>
				<div class="why-us__body">
					<div data-tabs class="tabs tabs-vertical">
						<nav data-tabs-titles class="tabs__navigation">
							<div class="tabs__title _tab-active">
								<button type="button" class="tabs__title-button">Fast to Market</button>
								<div class="tabs__title-content body-large text-dark-400">
									<p>
										Quickly bring innovative wearables to market with SmarTap’s streamlined integration process, saving time and resources.
									</p>
								</div>
								<div class="tabs__title-image">
									<img src="<?= IMAGES_PATH ?>/why-us/01.webp" alt="Image">
								</div>
							</div>
							<div class="tabs__title">
								<button type="button" class="tabs__title-button">Fully Certified</button>
								<div class="tabs__title-content body-large text-dark-400">
									<p>
										Trust in SmarTap’s industry certifications, including MasterCard compliance, ensuring secure and globally accepted solutions.
									</p>
								</div>
								<div class="tabs__title-image">
									<img src="<?= IMAGES_PATH ?>/why-us/02.webp" alt="Image">
								</div>
							</div>
							<div class="tabs__title">
								<button type="button" class="tabs__title-button">Rigorously Tested</button>
								<div class="tabs__title-content body-large text-dark-400">
									<p>
										Rely on proven quality with inlays that have undergone comprehensive environmental and durability testing to meet real-world demands.
									</p>
								</div>
								<div class="tabs__title-image">
									<img src="<?= IMAGES_PATH ?>/why-us/03.webp" alt="Image">
								</div>
							</div>
						</nav>
						<div data-tabs-body class="tabs__content">
							<div class="tabs__body">
								<div class="why-us-tabs__image">
									<img src="<?= IMAGES_PATH ?>/why-us/01.webp" alt="Image Why US">
								</div>
							</div>
							<div class="tabs__body">
								<div class="why-us-tabs__image">
									<img src="<?= IMAGES_PATH ?>/why-us/02.webp" alt="Image Why US">
								</div>
							</div>
							<div class="tabs__body">
								<div class="why-us-tabs__image">
									<img src="<?= IMAGES_PATH ?>/why-us/03.webp" alt="Image Why US">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.why-us -->


	<section class="partners lg:py-20 md:py-16 py-10">
		<div class="partners__container">
			<div class="partners__content">
				<div class="partners__heading mb-8">
					<h2 class="headline-medium text-center">Our trusted Partners and Clients</h2>
				</div>

			</div>
		</div>
		<div class="partners__body">
			<div class="partners-autoplay__slider swiper">
				<div class="partners-autoplay__wrapper swiper-wrapper">
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/01.svg" alt="Partner Image">
					</div>
					<div class="partners-autoplay__slide swiper-slide">
						<img src="<?= IMAGES_PATH ?>/clients/02.svg" alt="Partner Image">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.partners -->

	<section class="cta-section lg:py-20 md:py-16 py-0">
		<div class="cta-section__container">
			<div class="cta-section__content">
				<div class="cta-section__left left-cta">
					<h2 class="mb-5 headline-large text-light-900">
						Transform Your Products with SmarTap Inlays
					</h2>
					<div class="body-large text-light-900 mb-8">
						<p>
							Explore SmarTap Inlays today and discover how they can revolutionize your product lineup.
						</p>
					</div>
					<a href="#" class="button button-secondary button-size-l justify-center sm:w-auto w-full">
						<span>Explore Now</span>

					</a>
				</div>
				<div class="cta-section__right right-cta">
					<div class="right-cta__image">
						<img src="<?= IMAGES_PATH ?>/cta/image.webp" alt="Image CTA">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.cta-section -->
</main>
<?php get_footer() ?>