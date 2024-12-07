<?php
$question_title = get_field('questions_title_section', 'options');
?>
<section class="faq lg:py-20 md:py-16 py-10">
	<div class="faq__container">
		<div class="faq__content grid lg:grid-cols-2 lg:gap-5">
			<div class="faq__heading section-heading">
				<h2 class="text-dark-800 headline-large">
					<?= $question_title ?>
				</h2>
			</div>
			<div class="faq__body">
				<div data-spollers class="faq-spollers spollers">
					<?php
					?>
					<?php if (have_rows('questions', 'options')): ?>

						<?php while (have_rows('questions', 'options')) : the_row(); ?>

							<?php
							$question = get_sub_field('question');
							$answer = get_sub_field('answer');
							?>
							<details class="spollers__item">
								<summary class="spollers__title"><?= $question ?></summary>
								<div class="spollers__body">
									<div class="body-medium text-dark-600">
										<p><?= $answer ?></p>
									</div>
								</div>
							</details>

						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>