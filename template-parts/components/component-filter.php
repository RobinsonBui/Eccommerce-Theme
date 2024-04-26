<?php $current_category = get_queried_object();
$category_name = $current_category->name;
?>
<button class="filter__button-movil filter__button-movil--filter">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-search" width="12" height="12"
        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
            d="M11.36 20.213l-2.36 .787v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414" />
        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
        <path d="M20.2 20.2l1.8 1.8" />
    </svg>
</button>
<button class="filter__button-movil filter__button-movil--categories">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-horizontal" width="12"
        height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        <path d="M4 6l8 0" />
        <path d="M16 6l4 0" />
        <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        <path d="M4 12l2 0" />
        <path d="M10 12l10 0" />
        <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        <path d="M4 18l11 0" />
        <path d="M19 18l1 0" />
    </svg>
</button>
<section class="filter">
    <div class="filter__wrapper max-width">
        <div class="filter__filter ">
            <aside class="filter__aside">
                <button class="filter__button-movil filter__button-movil--close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="16"
                        height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="h2 filter__h2">Categorias</h2>
                <?php
                $categorys = get_terms('product_cat');

                foreach ($categorys as $category) {
                    $class_active = ($category_name === $category->name) ? 'active' : '';
                    echo '<button class="filter__button ' . $class_active . '"><a href="' . get_term_link($category) . '">' . $category->name . '</a></button>';
                }
                ?>

            </aside>
        </div>
        <div class="filter__content">

            <div class="filter__filters">
                <aside class="filter__filters--aside">

                    <button class="filter__button-movil filter__button-movil--close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="16"
                            height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                    </button>

                    <span class="filter__filters--span">
                        Filtrar
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter"
                                width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                            </svg>
                        </i>
                    </span>
                    <?php
                    $attributes = wc_get_attribute_taxonomies();
                    foreach ($attributes as $attribute) {
                        $terms = get_terms(array(
                            'taxonomy' => 'pa_' . $attribute->attribute_name,
                            'hide_empty' => false,
                        ));

                        echo '
                    <div class="filter__filters--attribute">';
                        echo '<button class="filter__filters--button" >' . $attribute->attribute_label . '
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </i> 
                            </button>';

                        if (!empty($terms) && !is_wp_error($terms)) {
                            echo '<div class="filter__filters--terms">';
                            foreach ($terms as $term) {
                                echo '<span class="filter__filters--term">
                            <input
                                type="checkbox"
                                id="' . $term->name . '"
                                name="' . $term->name . '"
                                value="pa_' . $attribute->attribute_name . '" />
                                <label for="' . $term->name . '">' . $term->name . '</label>
                                </span>
                            ';
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                    ?>
                </aside>

            </div>
            <div class="filter__response">
                <div class="filter__response--ajax" id="ajaxCategory">

                </div>
                <div class="filter__response--loader">
                    <?php get_template_part('template-parts/components/component', 'loader'); ?>
                </div>
                <div class="filter__pagination" id="pagination">
                    <button class="filter__pagination--button" id="prevPage">Anterior</button>
                    <button class="filter__pagination--button" id="nextPage">Siguiente</button>
                </div>
            </div>
        </div>
    </div>
</section>