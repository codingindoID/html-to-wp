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
                    <div class="col-xs-3 col-sm-3 col-md-3 text-center transform-1">
                        <div style="background-image: url('<?= the_field('image_logo')  ?>');height: 250px; width: 100%;background-repeat: no-repeat;background-size: cover;"></div>
                        <a href="<?= the_field('link_partner') ?>" class="text-dark font-weight-bold" target="__blank">
                            <?= the_field('slug') ?>
                        </a>
                    </div>
            <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
</section>