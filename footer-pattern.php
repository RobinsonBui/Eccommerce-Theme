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
<footer id="colophon" class="footer footer-ptrn">
    <div class="footer__wrapper footer-ptrn__wrapper max-width">
        <?php the_custom_logo(); ?>
        <img src="<?php echo get_template_directory_uri(); ?>/public/src/img/pagos-sellos.png" alt="">
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>