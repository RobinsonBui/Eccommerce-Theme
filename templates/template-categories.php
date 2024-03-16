 <?php
    /**
     * Template Name: Category
     */
    get_header(); ?>

 <main class="main main-categories">
     <section class="hero-categories">

     </section>

     <section class="filter-shop">
         <div class="filter-shop__wrapper max-width">
             <div class="filter-shop__filter">
                 <aside class="filter-shop__aside">
                     <?php
                        $categorias = get_terms('product_cat');

                        foreach ($categorias as $categoria) {
                            echo '<li><a href="' . get_term_link($categoria) . '">' . $categoria->name . '</a></li>';
                        }; ?>
                 </aside>
             </div>
         </div>
     </section>
 </main>

 <?php get_footer();
