<?php
class ATR_AjaxWoocommerce
{
    function load_checkout_content()
    {

        echo do_shortcode('[woocommerce_checkout]');

        die();
    }
}