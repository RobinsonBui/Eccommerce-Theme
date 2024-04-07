 <?php
   get_header();
   $current_category = get_queried_object();
   $thumbnail = get_term_meta($current_category->term_id, 'thumbnail_id', true);
   $description = $current_category->description;
   ?>

 <main class="main main-categories main-product-cat">
    <section class="breadcrumbs">
       <div class="breadcrumbs__wrapper max-width">
          <a href="/">Inicio</a>
          <i>
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 6l6 6l-6 6" />
             </svg>
          </i>
          <a href="/tienda">Tienda</a>
          <i>
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 6l6 6l-6 6" />
             </svg>
          </i>
          <a class="breadcrumbs__third" href="#"> <?php echo $current_category->name; ?></a>
       </div>
    </section>
    <section class="hero-category">
       <div class="hero-category__wrapper max-width" <?php
                                                      if ($thumbnail) {
                                                         $thumbnail_url = wp_get_attachment_image_url($thumbnail, 'full');
                                                         echo 'style="background-image: url(' . esc_url($thumbnail_url) . ')"';
                                                      }; ?>>
          <?php if ($description) {
               echo '<div class="hero-category__texts">
               <h1 class="hero-category__h1">' .  $current_category->name . '</h1>
                  <p class="hero-category__p" id="previewCategory">' . esc_html($description) . '</p> 
                  <a href="#description">Leer mas</a>
               </div>';
            }; ?>
       </div>
    </section>

    <?php get_template_part('template-parts/components/component', 'filter'); ?>

    <?php $acf_taxonomy = get_field('descripcion', $current_category);
      if ($acf_taxonomy) {
         echo ' <section class="content product-cat__content" id="description">
                        <div class="product-cat__wrapper max-width"> ' .
            $acf_taxonomy . ' 
                        </div>
                     </section>';
      } ?>

 </main>

 <?php get_footer(); ?>