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
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 bg-white p-5 text-center">
			<img src="<?= get_template_directory_uri() ?>/assets/img/not-found.jpg" class="w-50">
		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
