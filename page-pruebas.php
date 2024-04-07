<?php
get_header();
$options_page = get_field('menu_principal', 'option'); ?>

<div id="primary" class="content-area">
    <main id="main" class="main-checkout site-main max-width" role="main">
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
                    <div class="header__sub-menu sub-menu">
                        <ul class="sub-menu__menu">
                            <?php foreach ($subcategories as $subcategory) :
                        // Obtenemos la imagen de la categoría
                        $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                        $thumbnail = wp_get_attachment_image_url($thumbnail_id, 'thumbnail');
                    ?>
                            <li>
                                <img src="<?php echo esc_url($thumbnail); ?>"
                                    alt="<?php echo esc_attr($subcategory->name); ?>">
                                <a
                                    href="<?php echo esc_url(get_term_link($subcategory)); ?>"><?php echo esc_html($subcategory->name); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <?php
    }
endforeach;
?>



            </ul>
        </nav>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>