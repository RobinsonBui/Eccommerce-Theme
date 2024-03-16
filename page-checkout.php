<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="main-checkout site-main max-width" role="main">

        <?php
        if (class_exists('WooCommerce')) {
            if (WC()->cart->get_cart_contents_count() > 0) {
                echo do_shortcode('[woocommerce_checkout]');
            } else {
                echo '<p>No hay productos en tu carrito.</p>';
            }
        } else {
            echo '<p>Por favor, instala y activa WooCommerce para utilizar esta página de checkout.</p>';
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>