<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php echo stripslashes(get_option('option_head', '')); ?>
    <meta <?php bloginfo('charset'); ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php bloginfo('name'); ?><?php if (wp_title('', false)) {
                                        echo " | ";
                                    } ?><?php wp_title('') ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    wp_body_open();
    echo stripslashes(get_option('field_body', ''));
    // $options_fields =  get_fields('option');
    ?>
    <div id="page">
        <header id="masthead" class="site-header header">
            <div class="header__wrapper max-width">
                <!-- <a href="/">
                    <figure class="header__branding">
                        < ?php
                        if (function_exists('the_custom_logo')) {
                            $custom_logo_id = get_theme_mod('custom_logo');
                            if ($custom_logo_id) {
                                $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                                echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . wp_title('') . '">';
                            }
                        }
                        ?>
                    </figure>
                </a> -->
                <?php the_custom_logo() ?>
                <nav class="header__navigation" id="primaryNavigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu_primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'header__menu'
                        )
                    );
                    ?>
                </nav>

                <div class="header__toggle" id="handlerToggle">

                </div>

                <section class="header__menu-movil" id="innerMenu">

                </section>
            </div>
        </header>