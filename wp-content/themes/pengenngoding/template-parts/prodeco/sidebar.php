<div class="bg-white mb-1 p-3">
    <h6 class="pointer" data-target="#body-archive" data-toggle="collapse"><i class="icofont-search-folder text-tema-dark"></i> Archives Post</h6>
    <div id="body-archive" class="collapse">
        <ul id="list-archive" class="list-group">
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>
</div>
<div class="bg-white mb-1 p-3">
    <ul id="list-categories" class="list-group">
        <?php wp_list_categories(); ?>
    </ul>
</div>
<div class="bg-white mb-1 p-3">
    <h6 class="pointer mb-0" data-target="#body-post" data-toggle="collapse"><i class="icofont-badge text-tema-dark pointer"></i> Related Post</h6>
    <div class="collapse mt-0" id="body-post">
        <?php
        $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID)));
        if ($related) foreach ($related as $post) {
            setup_postdata($post); ?>
            <ul class="list-group p-0 mt-0">
                <li style="list-style: none;" class="list-item-group">
                    <a class="text-tema" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </li>
            </ul>
        <?php }
        wp_reset_postdata(); ?>
    </div>
</div>