<?php
get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
?>
        <section class="section bg-light">
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-2">
                        <?php get_template_part('template-parts/prodeco/sidebar'); ?>
                    </div>
                    <div class="col bg-white p-3">
                        <h1 class="fw-500 text-tema-dark mb-0"><?php the_title(); ?></h1>
                        <?php
                        $cat = get_the_category();
                        ?>
                        <hr>
                        <p class="mb-4"><?php the_content() ?></p>
                        <hr>
                        <p class="mb-0">Data Display : </p>
                        <small>Created By : <span class="text-primary"><?php the_author() ?></span>, Categorie : <span class="text-primary"><?php echo $cat[0]->cat_name; ?></span></small>
                        <hr>
                        <div class="row">
                            <div class="col p-5">
                                <?php if (is_single()) comments_template(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php
    endwhile; // End of the loop.
endif;
get_footer();
