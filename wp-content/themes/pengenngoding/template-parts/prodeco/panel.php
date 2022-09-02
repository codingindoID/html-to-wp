<style>
    .link {
        position: relative;
        border: 1px solid lightgray;
        margin-bottom: 5px;
    }

    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #0000001f;
        overflow: hidden;
        width: auto;
        height: 0;
        transition: .3s ease;
    }

    .link:hover .overlay {
        height: 100%;
    }

    .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>

<section id="produk" class="p-5 text-center">
    <img src="<?= get_template_directory_uri() ?>/assets/img/logo-png.png" style="max-width: 100px ; width:100%">
    <h3 class="text-center m-0 font-weight-bold" data-aos="flip-left">#OTHER INTERIOR PANELS</h3>
    <h6 class="mb-5 text-center">Film on the face is our advance technology, which is fire-proof, water-proof, easy to clean , scratch resistance , but the price is cheaper than HPL.</h6>
    <!-- SLider -->
    <div class="row d-flex justify-content-center">
        <?php
        $product = new WP_Query(array(
            'post_type' =>  'product',
            'post_per_page' =>  -1
        ));

        if ($product->have_posts()) :
            while ($product->have_posts()) : $product->the_post();
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->the_ID()), 'single-post-thumbnail');
        ?>
                <div class="col-md-3 align-middle p-1">
                    <div class="bg-white link">
                        <img src="<?= $image[0] ?>" alt="Avatar" class="image-product">
                        <div class="overlay">
                            <div class="text">
                                <h3 class="text-tema-dark font-weight-bold"><?= the_title() ?></h3>
                                <a class="btn bg-tema-dark text-white" href="<?= get_permalink() ?>">View Detil</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </div>
    <!-- End SLider -->
    <a class="btn btn-outline-dark mt-3" href="<?= site_url('shop') ?>">View All</a>
</section>