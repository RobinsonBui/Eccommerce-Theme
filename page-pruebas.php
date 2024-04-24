<?php
get_header();
$options_page = get_field('menu_principal', 'option'); ?>

<div id="primary" class="content-area">
    <main id="main" class="main-checkout site-main max-width" role="main">
        <button class="button button__primary open-checkout" id="openCheck"> checkout</button>


        <script>
            // Agregar evento de clic al botón
            document.getElementById('openCheck').addEventListener('click', function() {
                // Realizar solicitud Fetch
                fetch(adminAJAX.ajaxurl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            action: 'load_checkout_content',
                        }),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        // Colocar el contenido en el contenedor deseado
                        document.getElementById('checkout-container').innerHTML = data;
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            });
        </script>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>