<?php


get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="main-single-product site-main" role="main">
        <section class="single-product max-width">
            <a class="single-product__shop" href="/tienda">Ir a la tienda</a>
            <div class="single-product__wrapper ">
                <div class="single-product__slide">
                    <div class="swiper-single-product">
                        <div class="swiper-wrapper">
                            <?php
                            $product = wc_get_product(get_the_ID());

                            $gallery_image_ids = $product->get_gallery_image_ids();

                            if (!empty($gallery_image_ids)) {
                                foreach ($gallery_image_ids as $image_id) {
                                    $image_url = wp_get_attachment_image_url($image_id, 'full');

                                    if ($image_url) {
                            ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="" />
                                        </div>
                                <?php
                                    }
                                }
                            } else {  ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo the_post_thumbnail_url() ?>" alt="" />
                                </div>
                            <?php }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="single-product__data">
                    <h1 class="single-product__h1"><?php echo $product->get_title(); ?></h1>
                    <div class="single-product__description">
                        <?php echo $product->get_short_description(); ?>
                    </div>
                    <div class="single-product__price">
                        <?php
                        if ($product->is_on_sale()) {
                            echo '<p class="single-product__sale">' . $product->get_price_html() . '</p>';
                        } else {
                            echo '<p>' . $product->get_price_html() . '</p>';
                        }
                        ?>
                    </div>

                    <div class="single-product__quantity">
                        <?php
                        if ($product->is_purchasable()) {
                            woocommerce_quantity_input(array(), $product, false);
                            echo '<div class="single-product__add-to-cart">';
                            woocommerce_template_single_add_to_cart();
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="more-info max-width">
            <h3 class="more-info__h3">Conoce mas...</h3>
            <div class="more-info__content content">
                <?php the_content(); ?>
            </div>
        </section>


        <?php
        $product_categories = get_the_terms(get_the_ID(), 'product_cat');
        if ($product_categories && !is_wp_error($product_categories)) {
            $first_category = reset($product_categories);
            echo  do_shortcode('[slide_replic category="' . $first_category->name . '" bg="white" cl="black" tl="Te podría interesar"]');
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

<!-- < ?php if ($product->is_type('variable')) : ?>
                    <div class="single-product__variations">
                        < ?php foreach ($product->get_available_variations() as $variation) : ?>
                        <div class="single-product__variation">
                            <label>
                                <input type="checkbox" name="variation_id[]"
                                    value="< ?php echo esc_attr($variation['variation_id']); ?>">
                                < ?php
                                        // Obtener solo los valores de los atributos
                                        $attribute_values = array_values($variation['attributes']);
                                        // Imprimir el primer valor del array de atributos
                                        echo esc_html($attribute_values[0]);
                                        ?>
                            </label>
                        </div>
                        < ?php endforeach; ?>

                    </div>
                    < ?php endif; ?> -->