<?php
/* template name:blog */
get_header();
?>

<div class="container-fluid bg-light p-3">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<?php get_template_part('template-parts/prodeco/sidebar'); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<?php if (have_posts()) : ?>
				<div class="card card-header mb-1 text-center bg-tema-dark">
					<h1 class="page-title mb-0"><i class="icofont-newspaper"></i> UPDATE ARTICLE</h5>
						<small class="fs-10">PT.PRODECO INDONESIA</small>
				</div>
				<div class="row mb-2">


				<?php
				if (have_posts()) :
					while (have_posts()) :
						the_post();
						get_template_part('template-parts/content', get_post_type("single"));
					endwhile;
				else :
					get_template_part('template-parts/content', 'none');
				endif;
			endif;
				?>
				</div>
		</div>
		<hr>
		<div class="row d-flex justify-content-center">
			<?php the_posts_pagination(array(
				'mid_size'  => 2,
			)); ?>
		</div>

	</div>
</div>
<?php
get_sidebar();
get_footer();
