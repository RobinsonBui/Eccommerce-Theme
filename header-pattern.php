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
  ?>
  <div id="page">
    <header class="header header-ptrn">
      <div class="header-ptrn__wrapper max-width">
        <?php the_custom_logo(); ?>
      </div>
    </header>
    <div class="banner-ptrn">
      <div class="banner-ptrn__content">
        <p>Compra sin preocupaciones: ¡Seguridad y calidad en cada entrega!</p>
        <p>Compra con confianza: Paga al recibir tus productos.</p>
        <p>¡Calidad garantizada! Descubre nuestra selección premium.</p>
        <p>Envío rápido y seguro en cada compra. ¡Explora ahora!</p>
      </div>
    </div>