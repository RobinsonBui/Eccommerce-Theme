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

<style>
    .banner-container {
  overflow: hidden;
  background-color: #333;
  color: #fff;
}

.banner-content {
  display: inline-block;
  white-space: nowrap;
  animation: marquee 10s linear infinite;
}

.banner-content p {
  display: inline-block;
  margin-right: 40px; 
}

@keyframes marquee {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-100%);
  }
}

</style>
<div class="banner-container">
  <div class="banner-content">
    <p>Discover our latest products and services. Explore now!</p>
    <p>Discover our latest products and services. Explore now!</p>
    <p>Discover our latest products and services. Explore now!</p>
  </div>
</div>