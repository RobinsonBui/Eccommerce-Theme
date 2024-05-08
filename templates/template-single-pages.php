 <?php
    /**
     * Template Name: Single pages
     */
    get_header(); ?>

 <main class="main main-single-page max-width">
     <section class="hero-tm-single ">
         <h1 class="h1 hero-tm-single__h1"><?php the_title(); ?></h1>
     </section>
     <section class="tm-single-content content">
         <?php the_content(); ?>
     </section>
 </main>

 <?php get_footer();
