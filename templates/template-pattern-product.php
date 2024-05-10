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

    <section class="pattern-product">
        <?php $product = get_field('producto');?>
        <div class="pattern-product__wrapper max-width">
            <div class="pattern-product__media">
                <?php $product['producto_pautado']; ?>

            </div>

            <div class="pattern-product__data">
                <?php $product['producto_pautado']; ?>

                <h2 class="pattern-product__h2 h3" style="color: <?php echo $colors['secondary']; ?>;">
                    <?php echo $product['titulo_atractivo'];?></h2>
                <div class="pattern-product__stars">
                    <?php for($counter = 0; $counter <= 4; $counter++){
                        echo '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffec00" fill="#ffec00" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                      </svg>';
                    } ?>
                </div>
                <div class="content pattern-product__content"><?php echo $product['descripcion'];?></div>
                <div class="pattern-product__options">
                    <h4 class="pattern-product__h4"></h4>
                    <ul class="pattern-product__ul">
                        <?php foreach($product['opciones_de_compra'] as $options): ?>
                        <li class="pattern-product__li">
                            <a href="#" class="pattern-product__purchase-option" data-quantity="<?php echo $options['cantidad'] ?>"><?php echo $options['titulo_de_compra'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>