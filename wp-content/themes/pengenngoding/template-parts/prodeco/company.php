<section id="company" data-aos="fade-up">
    <div class="container">
        <h5 data-aos="flip-left" class="mb-0">OUR COMPANIES PARTNER</h5>
        <em>
            <p class="text-center mt-0 text-dark">our products have been used by professional companies with high trust</p>
        </em>
        <div class="row d-flex justify-content-center">
            <?php
            $product = new WP_Query(array(
                'post_type' =>  'companies',
                'post_per_page' =>  -1
            ));

            if ($product->have_posts()) :
                while ($product->have_posts()) : $product->the_post();
            ?>
                    <div class="col-xs-4 col-sm-4 col-md-2 text-center transform-1">
                        <a href="<?= the_field('link_partner') ?>" target="__blank">
                            <img src="<?= the_field('image_logo') ?>" class="img-companie">
                        </a>
                        <p class="text-dark"><?= the_field('slug') ?></p>
                    </div>
            <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
</section>