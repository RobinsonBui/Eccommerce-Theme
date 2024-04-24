<?php

/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page of your WordPress site.
 * You can use this template to customize the layout and content of your front page.
 */

get_header(); ?>

<main class="main main-front-page">
    <section class="hero-front">
        <div class="swiper-hero-front">
            <div class="swiper-wrapper">
                <?php
                $banners = get_field('banners');
                if ($banners) {
                    foreach ($banners as $banner) :
                        $background_image = $banner['background']['url'];
                        $texts = $banner['textos'];
                        $button_banner = $texts['boton'];
                ?>
                <div class="swiper-slide" style="background-image: url(<?php echo esc_url($background_image); ?>);">
                    <?php if ($banner['llevara_texto'] === true) : ?>
                    <div class="hero-front__wrapper max-width">
                        <div class="hero-front__content">
                            <div class="hero-front__texts <?php
                                                                        if ($texts['orientacion_del_texto'] == 'Derecha') {
                                                                            echo   'hero-front__texts--left';
                                                                        } elseif ($texts['orientacion_del_texto'] == 'Izquierda') {
                                                                            echo 'hero-front__texts--right';
                                                                        }; ?>">
                                <h2 class="hero-front__h2"><?php echo esc_html($texts['titulo']); ?></h2>
                                <p class="p hero-front__p"><?php echo esc_html($texts['descripcion']); ?></p>
                                <?php if ($button_banner) : ?>
                                <a href="<?php echo $button_banner['url_'];  ?>">
                                    <button
                                        class="hero-front__button button button__primary"><?php echo esc_html($button_banner['texto_btn']); ?></button>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php
                    endforeach;
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="hero-front__content-controls max-width">
                <div class="hero-front__controls">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="tabs-products">
        <div class="tabs-products__wrapper">
            <div class="tabs-products__slide-tab max-width">
                <div class="swiper-tabs-products tabs-products__nav">
                    <?php
                    $categories = get_field('tabs_home');
                    if (!empty($categories)) {
                        echo '<div class="swiper-wrapper">';
                        foreach ($categories as $category) {
                            echo '<div class="swiper-slide tabs-products__li"><button class="tabs-products__button" data-product-slug="' . $category['taxonomy']->slug . '">' . $category['taxonomy']->name;
                            if (!empty($category['icono'])) {
                                echo $category['icono'];
                            }
                            echo '</button></div>';
                        }
                        echo '</div>';
                    }
                    ?>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="tabs-products__tabs">
            <nav class="tabs-products__nav">

            </nav>
        </div>
        <section class="card-product tabs-products__sliders max-width">
            <div class="card-product__wrapper swiper-ajax-product ">
                <?php get_template_part('template-parts/components/component', 'loader'); ?>
                <div class="swiper-wrapper" id="ajax-response">
                </div>
            </div>
        </section>
    </section>

    <?php $parallax =  get_field('parallax');
    $parallax_images_desktop = $parallax['imagen_parallax'];
    $parallax_images_movil = $parallax['imagen_parallax_movil']
    ?>
    <section class="parallax parallax-section"
        style="background-image: url('<?php echo esc_url($parallax_images_desktop['url']); ?>');"
        data-mobile-image="<?php echo esc_url($parallax_images_movil['url']); ?>">
        <div class="parallax__wrapper max-width">
            <div class="parallax__texts">
                <h2 class="parallax__h2"><?php echo $parallax['titulo_parallax']; ?></h2>
                <p class="parallax__p"><?php echo $parallax['descripcion_parallax']; ?></p>
                <a href="<?php echo $parallax['url_del_boton']; ?>">
                    <button
                        class="parallax__button button button__primary"><?php echo $parallax['texto_boton']; ?></button>
                </a>
            </div>
        </div>
        <div class="parallax__background">

        </div>
    </section>

    <?php echo do_shortcode($parallax['shortcode_grid']) ?>

    <section class="blog-home">
        <h2 class="h2 blog-home__h2">BLOG</h2>

        <div class="blog-home__wrapper max-width">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
            );

            $query = new WP_Query($args);

            $counter = 1;

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    if ($counter === 1) :
            ?>
            <article class="blog-home__article-one">
                <div class="blog-home__figure"
                    style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
                </div>
                <div class="blog-home__component">
                    <div class="blog-home__tittle">
                        <div class="blog-home__content-date">
                            <span class="blog-home__date"><?php echo esc_html(get_the_date()); ?></span>
                            <span class="blog-home__month"></span>
                            <span class="blog-home__day"></span>
                        </div>
                        <h2 class="blog-home__h2 blog-home__h2--blog"><?php the_title(); ?></h2>
                    </div>
                    <div class="blog-home__excerpt"><?php the_excerpt(); ?></div>
                    <a class="blog-home__a" href="<?php the_permalink(); ?>">Ver más...
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12"
                                fill="none">
                                <path
                                    d="M2.29167 1.8751L2.29166 10.1251C2.29193 10.2086 2.31496 10.2905 2.3583 10.3619C2.40163 10.4333 2.46362 10.4916 2.53758 10.5304C2.61155 10.5692 2.6947 10.587 2.77809 10.5821C2.86147 10.5772 2.94192 10.5496 3.01079 10.5023L8.96912 6.37731C9.21616 6.20635 9.21616 5.79477 8.96912 5.62335L3.01079 1.49835C2.94207 1.4506 2.86157 1.4226 2.77805 1.41739C2.69453 1.41218 2.61118 1.42996 2.53705 1.46879C2.46293 1.50763 2.40086 1.56603 2.3576 1.63767C2.31434 1.7093 2.29153 1.79142 2.29167 1.8751Z"
                                    fill="#89759A" />
                            </svg>
                        </i>
                    </a>

                    <div class="blog-home__inner-blogs"></div>
                </div>
            </article>
            <div class="blog-home__content-2">
                <?php
                    else :
                        ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="blog-home__article">
                        <figure class="blog-home__article--figure">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                        </figure>
                        <div class="blog-home__article--tittle">
                            <div class="blog-home__content-date">
                                <span class="blog-home__date"><?php echo esc_html(get_the_date('d M')); ?></span>
                                <span class="blog-home__month blog-home__month--two"></span>
                                <span class="blog-home__day blog-home__day--two"></span>
                            </div>
                            <h2 class="blog-home__h2 blog-home__article--h2"><?php the_title(); ?></h2>
                        </div>
                    </article>
                </a>

                <?php
                    endif;
                    $counter++;
                endwhile;
                wp_reset_postdata();
            endif;
                ?>
            </div>
        </div>
    </section>

    <?php
    if (get_field('shortcode')) {
        echo do_shortcode(get_field('shortcode'));
    }
    ?>

</main>

<?php get_footer();