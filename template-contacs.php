<?php
/*
Template Name: Template: Contacts
Template Post Type: page
*/

/**
 * CUSTOM FIELD:
 */
// Header
$contacts_title = get_field('contacts_title');
$contacts_subtitle = get_field('contacts_subtitle');

?>
<?php get_header(); ?>
<main class="page">

	<div class="jumpscroll"></div>

	<section class="contacts-form lg:py-20 md:py-16 py-10">
		<div class="contacts-form__container">
			<div class="contacts-form__content">
				<div class="contacts-form__heading section-heading">
					<h1 class="display-medium text-dark-800 mb-4"> <?= $contacts_title ?> </h1>
					<div class="page-section__header-desc body-large text-dark-700">
						<p>
							<?= $contacts_subtitle ?>
						</p>
					</div>
				</div>
				<div class="contacts-form__body grid lg:grid-cols-2 lg:gap-5 gap-14">
					<div class="contact-form">
						<form action="#" class="form" method="POST">
							<div class="form__row grid sm:grid-cols-2 gap-4">
								<div class="form__col">
									<label class="form-label" for="contactName">Full Name</label>
									<input autocomplete="off" type="text" name="contactName" id="contactName" placeholder="Full Name" class="input">
								</div>
								<div class="form__col">
									<label class="form-label" for="contactCompany">Company</label>
									<input autocomplete="off" type="text" name="contactCompany" id="contactCompany" placeholder="Ex. Google" class="input">
								</div>
							</div>
							<div class="form__row">
								<div class="form__line">
									<label class="form-label" for="contactEmail">Email</label>
									<input autocomplete="off" type="text" name="contactEmail" id="contactEmail" placeholder="Ex. CEO" class="input">
								</div>
							</div>
							<div class="form__row">
								<div class="form__line">
									<label class="form-label" for="contactMessage">Message</label>
									<textarea autocomplete="off" name="contactMessage" placeholder="" id="contactMessage" class="input"></textarea>
								</div>
							</div>
							<div class="form__row">
								<div class="checkbox">
									<input id="c_1" class="checkbox__input" type="checkbox" value="1" name="form[]">
									<label for="c_1" class="checkbox__label">
										<p class="checkbox__text">I accept the <a href="#">Terms and Conditions.</a></p>
									</label>
								</div>
							</div>
							<div class="form__row">
								<button type="submit" class="button button-size-l button-primary w-full justify-center">Submit</button>
							</div>
						</form>
					</div>

					<div class="contact-info grid sm:grid-cols-2 lg:gap-5 sm:gap-4 gap-8">
						<div class="contact-info__column column">
							<div class="column__body">
								<div class="column__icon">
									<svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
										<path d="M3.66667 4.00001L13.8461 11.6871L13.8495 11.6899C14.9797 12.5188 15.5452 12.9335 16.1646 13.0937C16.712 13.2353 17.2875 13.2353 17.835 13.0937C18.4549 12.9334 19.022 12.5175 20.1543 11.6871C20.1543 11.6871 26.6835 6.67658 30.3333 4.00001M2 20.3337V7.667C2 5.80016 2 4.86604 2.36331 4.15301C2.68289 3.5258 3.19245 3.01623 3.81966 2.69666C4.5327 2.33334 5.46682 2.33334 7.33366 2.33334H26.667C28.5338 2.33334 29.466 2.33334 30.179 2.69666C30.8062 3.01623 31.3175 3.5258 31.637 4.15301C32 4.86535 32 5.79833 32 7.66153V20.3393C32 22.2025 32 23.1341 31.637 23.8465C31.3175 24.4737 30.8062 24.9841 30.179 25.3037C29.4667 25.6667 28.535 25.6667 26.6718 25.6667H7.32818C5.46499 25.6667 4.532 25.6667 3.81966 25.3037C3.19245 24.9841 2.68289 24.4737 2.36331 23.8465C2 23.1334 2 22.2005 2 20.3337Z" stroke="#0F161C" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</div>
								<div class="column__list">
									<ul>
										<?php if (have_rows('contact_emails')): ?>

											<?php while (have_rows('contact_emails')) : the_row(); ?>

												<?php
												$email_title = get_sub_field('title');
												$email_text = get_sub_field('value');
												?>
												<li>
													<span><?= $email_title ?></span>
													<a href="mailto:<?= $email_text ?>"><?= $email_text ?></a>
												</li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="contact-info__column column">
							<div class="column__body">
								<div class="column__icon">
									<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
										<path d="M12.8374 4.09536C12.3312 2.82984 11.1055 2 9.74251 2H5.1579C3.41384 2 2 3.4135 2 5.15755C2 19.982 14.018 32 28.8424 32C30.5865 32 32 30.586 32 28.842L32.0008 24.2566C32.0008 22.8936 31.1712 21.6681 29.9056 21.1619L25.5115 19.4049C24.3748 18.9502 23.0805 19.1548 22.1399 19.9386L21.0059 20.8845C19.6814 21.9881 17.7327 21.9004 16.5137 20.6813L13.3204 17.4851C12.1013 16.266 12.0112 14.3189 13.1149 12.9945L14.0605 11.8605C14.8444 10.9199 15.0508 9.62527 14.5961 8.48849L12.8374 4.09536Z" stroke="#0F161C" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</div>
								<div class="column__list">
									<ul>
										<?php if (have_rows('contact_phone_numbers')): ?>

											<?php while (have_rows('contact_phone_numbers')) : the_row(); ?>

												<?php
												$phone_title = get_sub_field('title');
												$phone_text = get_sub_field('value');
												?>
												<li>
													<span><?= $phone_title ?></span>
													<a href="tel:<?= $phone_text ?>"><?= $phone_text ?></a>
												</li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.contacts-form -->
	<section class="map-section lg:py-20 md:py-16 py-10">
		<div class="map-section__container">
			<div class="map-section__content">
				<div class="grid lg:grid-cols-2 gap-4">
					<div class="map-section__map">
						<iframe id="map" src="https://maps.google.com/maps?q=0,0&z=2&output=embed" width="600" style="border:0; width: 100%; border-radius: 10px;" allowfullscreen="" loading="lazy"></iframe>

					</div>
					<div class="map-section__address">
						<div data-spollers data-one-spoller class="spollers card-list-adress">


							<?php if (have_rows('address')): ?>


								<?php while (have_rows('address')) : the_row(); ?>


									<?php
									$map = get_sub_field('map');
									$title = get_sub_field('title');
									$text = get_sub_field('text');
									?>
									<details class="spollers__item card-address" data-address="https://www.google.com/maps/embed/v1/view?key=AIzaSyB7EWRjbOhYVQQgWxqwPWFbGJJ_YZrmrD0&center=<?= $map['lat'] ?>,<?= $map['lng'] ?>&zoom=14">
										<summary class="spollers__title"><?= $title ?></summary>
										<div class="spollers__body">
											<div class="body-medium text-dark-600">
												<p>
													<?= $text ?>
												</p>
											</div>
										</div>
									</details>


								<?php endwhile; ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.map-section -->
	<?php get_template_part('template-parts/cta', 'request-demo') ?>
	<!-- /.cta-section -->
	<?php get_template_part('template-parts/questions') ?>
	<!-- /.faq -->
</main>
<?php get_footer() ?>