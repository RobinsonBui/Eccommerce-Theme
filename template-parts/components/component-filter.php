<?php $current_category = get_queried_object();
$category_name = $current_category->name;
?>

<section class="filter">
    <div class="filter__wrapper max-width">
        <div class="filter__filter ">
            <aside class="filter__aside">
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
                <span class="filter__filters--span">
                    Filtrar
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="12"
                            height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
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

            </div>
            <div class="filter__response">
                <div class="filter__response--ajax" id="ajaxCategory">

                </div>
                <div class="filter__response--loader">
                    <?php get_template_part('template-parts/components/component', 'loader'); ?>
                </div>

            </div>

        </div>


    </div>
</section>