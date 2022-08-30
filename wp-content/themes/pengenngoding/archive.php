<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pengenNgoding
 */

get_header();
?>

<div class="container-fluid bg-light p-3">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<?php get_template_part('template-parts/prodeco/sidebar'); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="card card-header mb-1" style="background-color: #a07465;color: white;">
				<?php
				the_archive_title('<h1 class="page-title mb-0  text-center">', '</h1>'); ?>
				<small class="text-center">PT.PRODECO INDONESIA</small>
			</div>
			<div class="row mb-2">
				<?php
				if (have_posts()) :
					/* Start the Loop */
					while (have_posts()) :
						the_post();
						get_template_part('template-parts/content', get_post_type());

					endwhile;
				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>
			<hr>
			<div class="row d-flex justify-content-center">
				<?php the_posts_pagination(array(
					'mid_size'  => 2,
				)); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
