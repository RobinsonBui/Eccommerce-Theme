<?php


get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="main-single-product site-main" role="main">
        <section class="single-product max-width">
            <a class="single-product__shop" href="/tienda">Ir a la tienda</a>
            <div class="single-product__wrapper ">
                <div class="single-product__slide">
                    <i class="single-product__zoom" id="zoom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-in-area"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 13v4" />
                            <path d="M13 15h4" />
                            <path d="M15 15m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                            <path d="M22 22l-3 -3" />
                            <path d="M6 18h-1a2 2 0 0 1 -2 -2v-1" />
                            <path d="M3 11v-1" />
                            <path d="M3 6v-1a2 2 0 0 1 2 -2h1" />
                            <path d="M10 3h1" />
                            <path d="M15 3h1a2 2 0 0 1 2 2v1" />
                        </svg>
                    </i>
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
                        <div class="single-product__controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="lightbox" id="lightbox">
                    <span id="close-lightbox"
                        style="color: white; cursor: pointer; position: absolute; top: 10px; right: 10px;">✖</span>
                    <img id="lightbox-img" src="" alt="Ampliación de imagen">
                    <div class="lightbox__nav">
                        <button id="prev-img"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 6l-6 6l6 6" />
                            </svg></button>
                        <button id="next-img"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-chevron-right" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 6l6 6l-6 6" />
                            </svg></button>
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