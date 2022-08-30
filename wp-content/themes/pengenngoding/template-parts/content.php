<?php
if (is_singular()) :
	$data = null;
	$title = '<h1 class="entry-title mb-0 font-weight-bold text-center">';
	$title2 = '</h1>';
else :
	$data = 1;
	$title = '<h1 class="fs-20 entry-title mb-0 font-weight-bold"><i class="icofont-checked"></i> <a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
	$title2 =  '</a></h1>';
endif;
?>


<div class="card card-body position-relative mx-3 mb-2" data-aos="zoom-in">
	<?php
	the_title($title, $title2);
	if ('post' === get_post_type()) :
	?>
		<div class="entry-meta mt-0">
			<small class="fs-12">
				<?php
				pengenngoding_posted_on();
				pengenngoding_posted_by();
				?>
			</small>
		</div><!-- .entry-meta -->
		<hr class="mt-0">
	<?php endif; ?>
	<!-- </header> -->
	<!-- .entry-header -->

	<?php pengenngoding_post_thumbnail(); ?>

	<?php
	if ($data) {
		$text = '<a class="text-tema-orange" href="' . get_permalink() . '"> [ ..Read More]</a>';
		echo wp_trim_words(get_the_content(), 20, $text);
	} else {
		the_content(
			sprintf(
				wp_kses(
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pengenngoding'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);
	}

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'pengenngoding'),
			'after'  => '</div>',
		)
	);
	?>

</div>