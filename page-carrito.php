<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main main-cart max-width" role="main">

        <?php
        // Verifica si WooCommerce está activo
        if (class_exists('WooCommerce')) {
            // Muestra el contenido del carrito de WooCommerce
            echo do_shortcode('[woocommerce_cart]');
        } else {
            // Si WooCommerce no está activo, muestra un mensaje de advertencia
            echo '<p>Por favor, instala y activa WooCommerce para utilizar esta página de carrito.</p>';
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>