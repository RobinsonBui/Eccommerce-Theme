<?php get_header(); ?>
<mian class="main main-blog">
    <div class="wpb_wrapper max-width">
        <h1 class="title-h1" style="text-align: center;">Apoyamos la gestión de estilos de vida sostenible para las
            empresas y organizaciones</h1>
    </div>
    <section class="the-blog">
        <div class="the-blog__wrapper max-width">
            <?php
            $args = array(
                'post_type'      => 'post',
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
                'posts_per_page' => 9
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
            ?>
                    <article class="the-blog__article">
                        <a href=" <?php the_permalink(); ?>">
                            <figure class="the-blog__figure">
                                <?php the_post_thumbnail(); ?>
                            </figure>
                        </a>
                        <a href=" <?php the_permalink(); ?>">
                            <h5 class="the-blog__h3"> <?php the_title(); ?></h5>
                        </a>
                        <a class="the-blog__a" href=" <?php the_permalink(); ?>"> leer más</a>
                    </article>
            <?php
                }
                echo '<div class="the-blog__pagination pagination">';
                echo paginate_links(array(
                    'total'   => $query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'prev_text' => __('Anterior'),
                    'next_text' => __('Siguiente'),

                ));
                echo '</div>';
                wp_reset_postdata();
            }; ?>
        </div>
    </section>
</mian>

<?php get_footer(); ?>