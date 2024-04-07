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
    echo stripslashes(get_option('option_body', ''));
    wp_body_open();
    $options_page = get_field('menu_principal', 'option');
    ?>
    <div id="page">
        <header id="masthead" class="site-header header">
            <div class="header__wrapper max-width">
                <?php the_custom_logo() ?>
                <nav class="header__navigation" id="primaryNavigation">
                    <ul class="header__ul">
                        <?php foreach ($options_page['menu'] as $key) :
                            if ($key['tipo_de_entrada'] === 'Single') {
                                $page = $key['page'];
                                echo '<li class="header__li"><a href="' . esc_url(get_permalink($page->ID)) . '" class="header__a">' . esc_html($page->post_title) . '</a></li>';
                            } elseif ($key['tipo_de_entrada'] === 'Category') {
                                $category = $key['categoria'][0]; // Accedemos al objeto WP_Term en el índice 0
                                $subcategories = get_terms(array(
                                    'taxonomy' => $category->taxonomy,
                                    'parent' => $category->term_id,
                                ));
                        ?>
                        <li class="header__li">
                            <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                <?php echo esc_html($category->name); ?></a>
                            <ul class="sub-menu">
                                <?php foreach ($subcategories as $subcategory) :
                                            $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                                            $thumbnail = wp_get_attachment_image_url($thumbnail_id, 'thumbnail');
                                        ?>
                                <li class="sub-menu__li" style="
                                                background-image:url(' <?php echo esc_url($thumbnail); ?>')">
                                    <a
                                        href="<?php echo esc_url(get_term_link($subcategory)); ?>"><?php echo esc_html($subcategory->name); ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php
                            }
                        endforeach;
                        ?>

                    </ul>
                </nav>

                <div class="header__toggle" id="handlerToggle">
                    <label class="burger" for="burger">
                        <input type="checkbox" id="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>

                </div>

                <section class="header__menu-movil" id="innerMenu">
                    <div class="header__menu-movil--content" id="menuMovil">
                        <?php the_custom_logo() ?>
                    </div>

                </section>
            </div>
        </header>