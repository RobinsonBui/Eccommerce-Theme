<?php
class ATR_Admin
{
    private $theme_name;
    private $version;
    private $build_menupage;
    public function __construct($theme_name, $version)
    {
        $this->theme_name = $theme_name;
        $this->version = $version;
        $this->build_menupage = new ATR_BuildMenuPage();
    }
    public function enqueue_styles()
    {
        wp_enqueue_style(
            'admin-css',
            ATR_DIR_URI . 'admin/css/admin-styles.css',
            array(),
            $this->version,
            'all'
        );
    }

    public function enqueue_scripts()
    {

        wp_enqueue_script(
            'admin-js',
            ATR_DIR_URI . 'admin/js/admin-app.js',
            ['jquery'],
            $this->version,
            true
        );

        wp_localize_script(
            'admin-js',
            'adminAJAX',
            [
                'ajaxurl' => admin_url('admin-ajax.php'),
                "nonce" => wp_create_nonce('wkdata_seg')
            ]
        );
    }
    // Agregar páginas de opciones de ACF
    public function add_acf_options_pages()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title'    => 'Theme General Settings',
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));
            acf_add_options_sub_page(array(
                'page_title'    => 'Header Settings',
                'menu_title'    => 'Header',
                'parent_slug'   => 'theme-general-settings',
            ));
            acf_add_options_sub_page(array(
                'page_title'    => 'Footer Settings',
                'menu_title'    => 'Footer',
                'parent_slug'   => 'theme-general-settings',
            ));
        }
    }

    public function tag_manager_init()
    {
        add_options_page(
            'Registrar Tag Manager',
            'Tag Manager',
            'manage_options',
            'tag_manager',
            array($this, 'tag_manager_render')
        );
    }

    // Renderizar la página de opciones de Tag Manager
    public function tag_manager_render()
    {
        require_once ATR_DIR_PATH . 'admin/partials/admin-display-analitycs.php';
    }
}
