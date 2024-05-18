<?php

/**
 * Template Name: Pattern Product
 */
$colors_fields = get_field('paleta_de_colores');
$colors = array(
    'primary'       => $colors_fields['primario'],
    'secondary'     => $colors_fields['secundario'],
    'complementary' => $colors_fields['complementario']
);

get_header('pattern'); ?>

<main class="main-pattern">
    <section class="pattern-hero">
        <div class="pattern-hero__wrapper max-width">
            <?php $hero = get_field('hero') ?>
            <h1 class="pattern-hero__h1 h2" style="color: <?php echo $colors['primary']; ?>;">
                <?php echo $hero['titulo_persuasivo']; ?></h1>
        </div>
    </section>

    <?php $product = get_field('producto'); ?>
    <section class="pattern-product">
        <div class="pattern-product__wrapper max-width">
            <div class="pattern-product__media">
                <?php $product['producto_pautado']; ?>
                <div class="single-product__slide">
                    <i class="single-product__zoom" id="zoom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-in-area" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 13v4" />
                            <path d="M13 15h4" />
                            <path d="M15 15m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                            <path d="M22 22l-3 -3" />
                            <path d="M6 18h-1a2 2 0 0 1 -2 -2v-1" />
                            <path d="M3 11v-1" />
                            <path d="M3 6v-1a2 2 0 0 1 2 -2h1" />
                            <path d="M10 3h1" />
                            <path d="M15 3h1a2 2 0 0 1 2 2v1" />
                        </svg>
                    </i>
                    <div class="swiper-single-product">
                        <div class="swiper-wrapper">
                            <?php
                            $gallery_image = $product['galeria'];

                            if (!empty($gallery_image)) {
                                foreach ($gallery_image as $image_id) {
                                    $image_url = $image_id['url'];

                                    if ($image_url) {
                            ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="" />
                                        </div>
                                <?php
                                    }
                                }
                            } else {  ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo the_post_thumbnail_url() ?>" alt="" />
                                </div>
                            <?php }
                            ?>
                        </div>
                        <div class="single-product__controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="lightbox" id="lightbox">
                    <span class="lightbox__close" id="close-lightbox">✖</span>
                    <img id="lightbox-img" src="" alt="Ampliación de imagen">
                    <div class="lightbox__nav">
                        <button id="prev-img"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 6l-6 6l6 6" />
                            </svg></button>
                        <button id="next-img"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 6l6 6l-6 6" />
                            </svg></button>
                    </div>
                </div>
            </div>

            <div class="pattern-product__data">
                <h2 class="pattern-product__h2 h3" style="color: <?php echo $colors['secondary']; ?>;">
                    <?php echo $product['titulo_atractivo']; ?></h2>
                <div class="pattern-product__stars">
                    <?php for ($counter = 0; $counter <= 4; $counter++) {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffec00" fill="#ffec00" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                      </svg>';
                    } ?>
                </div>
                <div class="content pattern-product__content"><?php echo $product['descripcion']; ?></div>
                <div class="pattern-product__options">
                    <!-- <h4 class="pattern-product__h4" style="color: < ?php echo $colors['secondary']; ?>;">Compra ahora:
                    </h4> -->
                    <?php $data_product = $product['producto_pautado']; ?>
                    <ul class="pattern-product__ul">
                        <?php foreach ($product['opciones_de_compra'] as $options) : ?>
                            <li class="pattern-product__li" data-id="<?php echo $data_product->ID; ?>" data-base-url="<?php echo esc_url(wc_get_checkout_url()); ?>" data-quantity="<?php echo $options['cantidad'] ?>">
                                <span class="pattern-product__purchase-option">
                                    <?php echo $options['titulo_de_compra']; ?>
                                    <?php if ($options['texto_ahorro']) {
                                        echo '<span class="pattern-product__prom" style="color: ' . $colors['complementary'] . '"> ' . $options['texto_ahorro'] . '</span>';
                                    } ?>
                                </span>
                                <b style=" color: <?php echo $colors['primary']; ?>;">
                                    $<?php echo $options['precio']; ?></b>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php if ($product['img']) : ?>
        <section class="tmp-pattern-gif">
            <div class="tmp-pattern-gif__wrapper max-width">
                <img src="<?php echo $product['img']['url']; ?>" alt="">
            </div>
        </section>
    <?php endif; ?>
    <section class="tmp-pattern-info">
        <div class="tmp-pattern-info__wrapper max-width">
            <?php $info_product = get_field('beneficios'); ?>
            <h2 class="tmp-pattern-info__h2 h2" style="color: <?php echo $colors['primary']; ?>;">
                <?php echo $info_product['titulo']; ?></h2>
            <div class="content tmp-pattern-info__content"><?php echo $info_product['descripcion']; ?></div>
            <div class="tmp-pattern-info__container">
                <ul class="tmp-pattern-info__ul tmp-pattern-info__ul--top">
                    <?php foreach ($info_product['items_top'] as $item) : ?>
                        <li class="tmp-pattern-info__li">
                            <h3 class="tmp-pattern-info__h3"><?php echo $item['titulo']; ?></h3>
                            <p class="p tmp-pattern-info__p"><?php echo $item['descripcion']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="tmp-pattern-info__media">
                    <?php if ($info_product['tipodemedia']['media'] === 'Gif' || $info_product['tipodemedia']['media'] === 'Img') : ?>
                        <figure class="tmp-pattern-info__figure">
                            <img src="<?php if ($info_product['tipodemedia']['media'] === 'Gif') {
                                            echo $info_product['tipodemedia']['gif_url'];
                                        } else {
                                            echo $info_product['tipodemedia']['imagen']['url'];
                                        } ?>" alt="<?php echo $item['titulo']; ?>">
                        </figure>
                    <?php endif; ?>
                </div>
                <ul class="tmp-pattern-info__ul tmp-pattern-info__ul--bottom">
                    <?php foreach ($info_product['items_bottom'] as $item) : ?>
                        <li class="tmp-pattern-info__li">
                            <h3 class="tmp-pattern-info__h3"><?php echo $item['titulo']; ?></h3>
                            <p class="p tmp-pattern-info__p"><?php echo $item['descripcion']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </section>

    <section class="tmp-pattern-components">
        <div class="tmp-pattern-components__wrapper max-width">
            <?php $components =  get_field('componentes'); ?>
            <h2 class="tmp-pattern-components__h2 h2" style="color: <?php echo $colors['primary']; ?>;">
                <?php echo $components['titulo']; ?></h2>
            <div class="content tmp-pattern-components__content"><?php echo $components['descripcion']; ?></div>

            <div class="tmp-pattern-components__slider">
                <div class="swiper-components">
                    <div class="swiper-wrapper">
                        <?php foreach ($components['items'] as $component) : ?>
                            <div class="swiper-slide">
                                <div class="tmp-pattern-components__card">
                                    <?php if ($component['icono']) {
                                        echo '<img src="' . $component['icono']['url'] . '" alt="' . $component['icono']['alt'] . '">';
                                    } ?>
                                    <h3 class="tmp-pattern-components__h3"><?php echo $component['titulo']; ?></h3>
                                    <p class="p tmp-pattern-components__p"><?php echo $component['descripcion']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    </section>

    <section class="tmp-pattern-results">
        <div class="tmp-pattern-results__wrapper max-width">
            <?php $results =  get_field('resultados'); ?>
            <div class="tmp-pattern-results__figure" style="background-image: url('<?php echo $results['imagen_bg']['url']; ?>');">
                <img src="<?php echo $results['imagen_destacada']['url']; ?>" alt="<?php echo $results['imagen_destacada']['alt']; ?>">
            </div>
            <div class="tmp-pattern-results__data">
                <h3 class="tmp-pattern-results__h3 h3" style="color: <?php echo $colors['primary']; ?>;">
                    <?php echo $results['titulo']; ?></h3>
                <div class="tmp-pattern-results__slider">
                    <div class="swiper-results">
                        <div class="swiper-wrapper">
                            <?php foreach ($results['testimonios'] as $testimony) : ?>
                                <div class="swiper-slide">
                                    <div class="tmp-pattern-results__testimony">
                                        <p class="p tmp-pattern-results__p"><?php echo $testimony['testimonio']; ?></p>
                                        <h4 class="tmp-pattern-results__h4"><?php echo $testimony['nombre']; ?></h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="tmp-pattern-results__content content"><?php echo $results['descripcion_final']; ?></div>
            </div>
        </div>
        <figure class="tmp-pattern-results__fig max-width">
            <img src="<?php echo $results['imagen_persuasiva']['url']; ?>" alt="<?php echo $results['imagen_persuasiva']['alt']; ?>">
        </figure>
    </section>

    <section class="tmp-pattern-pqs">
        <div class="tmp-pattern-pqs__wrapper max-width">
            <?php $pqs =  get_field('pqs'); ?>
            <h2 class="h2 tmp-pattern-pqs__h2" style="color: <?php echo $colors['primary']; ?>;">
                <?php echo $pqs['titulo']; ?></h2>
            <div class="tmp-pattern-pqs__accordion">
                <?php foreach ($pqs['preguntas'] as $pq) : ?>
                    <details class="tmp-pattern-pqs__details">
                        <summary class="tmp-pattern-pqs__summary">
                            <h3 class="tmp-pattern-pqs__h3"> <?php echo $pq['pregunta']; ?></h3>
                        </summary>
                        <div class="tmp-pattern-pqs__content content">
                            <?php echo $pq['respuesta']; ?>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
    </section>

</main>

<?php get_footer('pattern'); ?>