<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->

	<?php wp_head(); ?>
</head>

<body class="mb-0" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
		<div class="container">
			<a class="navbar-brand" href="<?= site_url() ?>">
				<?php $custom_logo_id = get_theme_mod('custom_logo');
				$image = wp_get_attachment_image_src($custom_logo_id); ?>
				<img src="<?= $image[0] ?>" alt="">
			</a>
			<!-- <a class="navbar-brand" href="<?= site_url() ?>"><?php bloginfo('name') ?></a> -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php
				wp_nav_menu(array(
					'menu' => 'top-menu',
					'container' => '',
					'menu_class'        => 'navbar-nav ml-auto',
					'li_class'          => 'nav-item',
					'a_class'           => 'nav-link',
					'active_class'      => 'active'
				));
				?>
			</div>
		</div>
	</nav>