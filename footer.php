<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wikpis
 */
$options_fields = get_fields('option');
?>
<section class="checkout-container">
    <button class="checkout-container__close">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
        </svg>
    </button>
    <div class="checkout-container__wrapper max-width" id="checkout-container">

    </div>
</section>
<footer id="colophon" class="footer">
    <div class="footer__decoration"></div>
    <?php $footer = $options_fields['footer']; ?>
    <div class="footer__wrapper max-width">
        <a href="/">
            <figure class="footer__figure">
                <img src="<?php echo $footer['footer_logo']['url']; ?>" alt="<?php echo $footer['footer_logo']['alt']; ?>">
            </figure>
        </a>
        <div class="footer__cols">
            <h4 class="footer__h4"><?php echo $footer['titulo_col_1']; ?></h4>
            <nav class="footer__nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu_primary',
                        'menu_id'        => 'menu_primary',
                    )
                );
                ?>
            </nav>
        </div>
        <div class="footer__cols">
            <h4 class="footer__h4"><?php echo $footer['titulo_col_2']; ?></h4>
            <ul class="footer__ul">
                <?php if ($footer['contacto']) :
                    foreach ($footer['contacto'] as $contact) :
                ?>
                        <li class="footer__li">
                            <a target="blank" href="<?php echo $contact['url']; ?>">
                                <i><?php echo $contact['icono']; ?></i><?php echo $contact['texto']; ?>
                            </a>
                        </li>
                <?php endforeach;
                endif; ?>
            </ul>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>