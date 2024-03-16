<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="main-checkout site-main max-width" role="main">

        <?php
        // Definir la categoría y los atributos con sus términos
        $category_slug = 'productos-nuevos'; // Slug de la categoría
        $attributes_terms = array(
            'pa_color' => array('verde', 'rojo'),
        );

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND', // Relación AND para combinar la categoría y los atributos
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category_slug,
                ),
            ),
        );

        // Agregar cada atributo y sus términos a la consulta
        foreach ($attributes_terms as $attribute => $terms) {
            $tax_query = array(
                'taxonomy' => $attribute,
                'field' => 'slug',
                'terms' => $terms,
            );
            $args['tax_query'][] = $tax_query;
        }

        $products = new WP_Query($args);

        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                // Aquí puedes acceder a la información del producto, por ejemplo:
                $product_id = get_the_ID();
                $product_title = get_the_title();
                $product_price = wc_price(get_post_meta($product_id, '_price', true));
                $product_thumbnail = get_the_post_thumbnail($product_id);
                $product_permalink = get_permalink($product_id);

                // Luego puedes usar esta información como necesites
                echo '<div>';
                echo '<h2>' . $product_title . '</h2>';
                echo '<p>' . $product_price . '</p>';
                echo '<a href="' . $product_permalink . '">' . $product_thumbnail . '</a>';
                echo '</div>';
            }
            wp_reset_postdata(); // Restaurar datos originales de la consulta de WordPress
        } else {
            echo 'No se encontraron productos que coincidan con los criterios de búsqueda.';
        }

        ?>


    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>