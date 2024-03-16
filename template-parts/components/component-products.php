<div class="card-product">
    <?php if ($product_data->get_sale_price()) {
        $regular_price = $product_data->get_regular_price();
        $sale_price = $product_data->get_sale_price();
        $discount_percentage = (($regular_price - $sale_price) / $regular_price) * 100;
        echo '<span class=" tabs-products__flag tabs-products__flag--discount-percentage">' . round($discount_percentage) . '% OFF</span>';
    }
    ?>
    <a href="<?php get_the_permalink(); ?>">
        <div class="card-product__thumbnail">
            <figure class="card-product__figure">
                <?php get_the_post_thumbnail(); ?>
            </figure>
            <div class="card-product__buttons"></div>
        </div>
    </a>
    <div class="card-product__info">
        <h3 class="card-product__h3"><?php the_title(); ?></h3>
        <span class="card-product__price"><?php wc_price($product_data->get_price()); ?></span>
    </div>
</div>