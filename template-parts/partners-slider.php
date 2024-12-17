<?php
$clients = new WP_Query([
	'post_type' => 'clients',
]);
if ($clients->have_posts()):
?>
	<div class="partners-autoplay__slider swiper">
		<div class="partners-autoplay__wrapper swiper-wrapper">
			<?php
			while ($clients->have_posts()) {
				$clients->the_post();
			?>
				<div class="partners-autoplay__slide swiper-slide">
					<img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="Partner Image">
				</div>
			<?php
			}
			?>
		</div>
	</div>
	<?php wp_reset_postdata() ?>
<?php endif; ?>