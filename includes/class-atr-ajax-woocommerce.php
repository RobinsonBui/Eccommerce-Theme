<?php
class ATR_AjaxWoocommerce
{
    /**
     * Función para agregar un producto al carrito (hook para administrar peticiones AJAX)
     */
    function add_product_cart($product_id, $quantity = 1)
    {
        global $woocommerce;
        $woocommerce->cart->add_to_cart($product_id, $quantity);
    }
    function add_product_shoping_cart_ajax()
    {
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
        $WC_Cart = new WC_Cart();
        $WC_Cart->add_to_cart($product_id, $quantity);
        wp_send_json($quantity);
    }

    /**
     * Función para agregar un producto al carrito (hook para administrar peticiones AJAX)
     */
    function remove_product_from_cart()
    {
        if (isset($_POST['cart_item_key'])) {
            $requested_cart_item_key = sanitize_text_field($_POST['cart_item_key']); // Renombramos la variable

            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                if ($cart_item['product_id'] == $requested_cart_item_key) {
                    WC()->cart->remove_cart_item($cart_item_key);
                }
            }
        }
    }
}
