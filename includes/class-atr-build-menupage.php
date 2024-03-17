 <?php
    /**
     * Clase para manejar la creación de menus y submenus del tema
     */
    class ATR_BuildMenuPage
    {
        // Agregar página de opciones de Tag Manager
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