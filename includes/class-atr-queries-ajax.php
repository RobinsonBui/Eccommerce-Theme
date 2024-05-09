<?php

class ATR_QueriesAjax
{
    function get_product_category_slug()
    {
        $category_slug_product = isset($_POST['product_slug_template']) ? sanitize_text_field($_POST['product_slug_template']) : '';

        $product_data_array = array();
        if ($category_slug_product) {
            $args = array(
                'post_type' => 'product',
                'order' => 'ASC',
                'tab' => $category_slug_product
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $product_id = get_the_ID();
                    $product_data = wc_get_product($product_id);
                    $is_product_variable = $product_data->is_type('variable');
                    $template_slide = '<div class="swiper-slide"><div class="card-product__card">';

                    if ($product_data->get_sale_price() && $category_slug_product !== 'productos-nuevos') {
                        $regular_price = $product_data->get_regular_price();
                        $sale_price = $product_data->get_sale_price();
                        $discount_percentage = (($regular_price - $sale_price) / $regular_price) * 100;
                        $template_slide .= '<span class=" card-product__flag card-product__flag--discount-percentage">' . round($discount_percentage) . '% OFF</span>';
                    }
                    if ($category_slug_product == 'productos-nuevos') {
                        $template_slide .= '
                        <span class="card-product__flag card-product__flag--new">NUEVO</span>';
                    }
                    $template_slide .= '
                    <div class="card-product__thumbnail">
                    <figure class="card-product__figure">
                        ' . get_the_post_thumbnail() . '
                    </figure>
                    <div class="card-product__buttons">
                    ';

                    if ($is_product_variable) {
                        $template_slide .= '
                            <a class="card-product__add-cart" href="' . get_the_permalink() . '" >
                            <button type="submit" name="add-to-cart" class="card-product__add-cart" value="' . esc_attr($product_id) . '">
                                <span class="card-product__tooltip">Ver Producto</span>
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </i>
                            </button>
                            </a>
                            ';
                    } else {
                        $template_slide .= '
                        <a href="/checkout/?add-to-cart=' . esc_attr($product_id) . '">
                        <button class="card-product__add-cart buy-now-button" data-product-id="' . esc_attr($product_id) . '">
                            <span class="card-product__tooltip">Comprar Ahora</span>
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-shopee" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 7l.867 12.143a2 2 0 0 0 2 1.857h10.276a2 2 0 0 0 2 -1.857l.867 -12.143h-16z" />
                                    <path d="M8.5 7c0 -1.653 1.5 -4 3.5 -4s3.5 2.347 3.5 4" />
                                    <path d="M9.5 17c.413 .462 1 1 2.5 1s2.5 -.897 2.5 -2s-1 -1.5 -2.5 -2s-2 -1.47 -2 -2c0 -1.104 1 -2 2 -2s1.5 0 2.5 1" />
                                </svg>
                            </i>
                        </button>
                        </a>
                    <form class="cart" action="' . esc_url(wc_get_cart_url()) . '" method="post" enctype="multipart/form-data">
                    <button type="submit" name="add-to-cart" class="card-product__add-cart" value="' . esc_attr($product_id) . '">
                        <span class="card-product__tooltip">Agregar al carrito</span>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M12.5 17h-6.5v-14h-2" />
                                <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                        </i>
                    </button>
                    </form>
                        ';
                    };
                    $template_slide .=
                        '</div>
                    </div>
                    <div class="card-product__info">
                        <a href="' . get_the_permalink() . '">
                            <h3 class="card-product__h3">' . get_the_title() . '</h3>
                        </a>
                        <span class="card-product__price">' . wc_price($product_data->get_price()) . '</span>';

                    if ($is_product_variable) {
                        $template_slide .= '
                        <a class="card-product__view" href="' . get_the_permalink() . '" >
                            <button class="button-woo button__primary card-product__view card-product__buy-free" value="' . esc_attr($product_id) . '">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </i>
                                Ver producto
                            </button>
                        </a>
                            ';
                    } else {
                        $template_slide .=
                            '<div class="card-product__button-buy-free">
                            <form class="cart" action="' . esc_url(wc_get_cart_url()) . '" method="post" enctype="multipart/form-data">
                                <button type="submit" name="add-to-cart" class="open-checkout button button__primary card-product__buy-free" value="' . esc_attr($product_id) . '">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                        <path d="M3 9l4 0" />
                                        </svg>
                                    </i>
                                    Contraentrega
                                    <div class="loader-points">
                                        <div class="loader">
                                            <div class="circle">
                                                <div class="dot"></div>
                                                <div class="outline"></div>
                                            </div>
                                            <div class="circle">
                                                <div class="dot"></div>
                                                <div class="outline"></div>
                                            </div>
                                            <div class="circle">
                                                <div class="dot"></div>
                                                <div class="outline"></div>
                                            </div>
                                            <div class="circle">
                                                <div class="dot"></div>
                                                <div class="outline"></div>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>';
                    }
                    $template_slide .=
                        '</div>
                    </div>
                </div> ';
                    $product_data_array[] = $template_slide;
                }

                wp_reset_postdata();
            }
        }

        header('Content-Type: application/json');
        echo json_encode(array('success' => true, 'data' => $product_data_array));

        wp_die();
    }
    public function get_filter_data()
    {
        $category_slug = isset($_POST['categorySlug']) ? sanitize_text_field($_POST['categorySlug'])        : '';
        $filters       = isset($_POST['filters'])      ? json_decode(stripslashes($_POST['filters']), true) : '';
        $page          = isset($_POST['page'])         ? intval($_POST['page'])                             : 1;
        $per_page      = isset($_POST['perPage'])      ? intval($_POST['perPage'])                          : 3;

        $offset    = ($page - 1) * $per_page;
        $tax_query = array();


        if (!empty($category_slug)) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_slug,
            );
        }

        if (!empty($filters)) {
            $tax_query['relation'] = 'AND';
            foreach ($filters as $attribute => $terms) {
                $tax_query[] = array(
                    'taxonomy' => $attribute,
                    'field'    => 'slug',
                    'terms'    => $terms,
                );
            }
        }

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $per_page,
            'offset'         => $offset,
            'tax_query'      => $tax_query,
        );

        $products_category = wc_get_products($args);
        $response = array();

        foreach ($products_category as $product) {
            $product_id          = $product->get_id();
            $product_data        = wc_get_product($product_id);
            $is_product_variable = $product_data->is_type('variable');
            $product_title       = get_the_title($product_id);
            $product_price       = wc_price($product->get_price());
            $product_thumbnail   = get_the_post_thumbnail($product_id);
            $wc_action           = esc_url(wc_get_cart_url());
            $product_permalink   = get_the_permalink($product_id);
            $product_info        = array(
                'is_variable'       => $is_product_variable,
                'product_id'        => $product_id,
                'product_title'     => $product_title,
                'product_price'     => $product_price,
                'product_thumbnail' => $product_thumbnail,
                'wc_action'         => $wc_action,
                'product_permalink' => $product_permalink,
            );

            $response[] = $product_info;
        }

        wp_send_json($response);
    }
    
}