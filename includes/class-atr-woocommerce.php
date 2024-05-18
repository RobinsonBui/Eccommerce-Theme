<?php

class ATR_Woocommerce
{
    public function __construct()
    {
        $this->add_theme_support();
        $this->register_ajax_actions();
    }

    public function add_theme_support()
    {
        add_action('after_setup_theme', array($this, 'mytheme_add_woocommerce_support'));
    }

    public function mytheme_add_woocommerce_support()
    {
        add_theme_support('woocommerce');
    }

    public function register_ajax_actions()
    {
        add_action('wp_ajax_get_cart_info', array($this, 'get_cart_info'));
        add_action('wp_ajax_nopriv_get_cart_info', array($this, 'get_cart_info'));
    }
}