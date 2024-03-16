<?php


get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Verifica si WooCommerce está activo
        if (class_exists('WooCommerce')) {
            // Verifica si hay un producto válido en la página
            if (have_posts()) {
                // Comienza el loop de WordPress
                while (have_posts()) {
                    the_post();
                    // Muestra el contenido del producto
                    the_content();
                }
            } else {
                // Si no hay productos válidos, muestra un mensaje
                echo '<p>No se encontraron productos.</p>';
            }
        } else {
            // Si WooCommerce no está activo, muestra un mensaje de advertencia
            echo '<p>Por favor, instala y activa WooCommerce para utilizar esta plantilla de página de producto.</p>';
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>