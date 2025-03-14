<div class="bg-white mb-1 p-3">
    <h6 class="pointer" data-target="#body-archive" data-toggle="collapse"><i class="icofont-search-folder text-tema-dark"></i> Archives Post</h6>
    <div id="body-archive" class="collapse">
        <ul id="list-archive" class="list-group">
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>
</div>
<?php
class Walker_Category_Custom extends Walker_Category
{
    function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
    {
        $output .= '<li class="list-group-item">';
        $output .= '<a class="text-tema" href="' . get_category_link($category->term_id) . '">' . $category->name;

        if ($args['show_count']) {
            $output .= ' (' . $category->count . ')';
        }

        $output .= '</a></li>';
    }
} ?>
<div class="bg-white mb-1 p-3">
    <h6 class="pointer mb-0"><i class="icofont-badge text-tema-dark"></i> Last Update</h6>
    <ul id="list-categories" class="list-group">
        <?php
        wp_list_categories(array(
            'title_li'    => '',  // Menghilangkan judul default
            'show_count'  => true, // Menampilkan jumlah post dalam setiap kategori
            'hide_empty'  => false, // Menampilkan kategori meskipun kosong
            'taxonomy'    => 'category', // Menampilkan kategori post (default)
            'walker'      => new Walker_Category_Custom(), // Menggunakan walker untuk menyesuaikan output
        ));
        ?>
    </ul>
</div>

<div class="bg-white mb-1 p-3">
    <h6 class="pointer mb-0"><i class="icofont-badge text-tema-dark"></i> Product Category</h6>
    <ul class="list-group p-0 mt-2">
        <?php
        $categories = get_terms(array(
            'taxonomy'   => 'product_cat', // Mengambil kategori produk WooCommerce
            'hide_empty' => false, // Menampilkan semua kategori, termasuk yang kosong
        ));

        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                echo '<li class="list-group-item d-flex justify-content-between align-items-center"> 
                        <a class="text-tema-dark text-decoration-none" href="' . get_term_link($category) . '">' . $category->name . '</a>';

                if ($category->count > 0) {
                    echo '<span class="badge bg-secondary rounded-pill">' . $category->count . '</span>';
                }

                echo '</li>';
            }
        }
        ?>
    </ul>
</div>