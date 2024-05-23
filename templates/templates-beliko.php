<?php
/**
 * Template Name: beliko
 */
get_header(); ?>

        <!-- Slider main container -->
    <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?php
            $banner = get_field('banners');
        ?>
        <!-- Slides -->
        <div class="swiper-slide" style="background-image: url(<?php echo esc_url('background'); ?>);"></div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        ...
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
    </div>



 <?php get_footer();
