<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pengenNgoding
 */

get_header();
?>

<div class="container-fluid px-3 py-2">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<?php get_template_part('template-parts/prodeco/sidebar') ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 bg-white p-4">
			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content');

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'pengenngoding') . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'pengenngoding') . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
