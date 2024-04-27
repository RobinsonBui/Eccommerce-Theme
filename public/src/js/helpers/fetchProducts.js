import { templateProduct } from "./cardProducts";

export async function fetchDataAndRenderProducts(loader, adminAJAX, categorySlug, filters, page, perPage) {
    const url = adminAJAX.ajaxurl;

    try {
        const responseAjax = document.querySelector('#ajaxCategory'),
            pagination = document.querySelector('#pagination');

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'get_filter_data',
                categorySlug: categorySlug,
                filters: JSON.stringify(filters),
                page: page,
                perPage: perPage,
            }),
        });

        if (!response.ok) {
            throw new Error('Failed to fetch products');
        }

        const data = await response.json();

        document.querySelector('#nextPage').classList.toggle('disabled', data.length < perPage);

        const productsWithHTML = data.map(product => ({
            isVariable: product.is_variable,
            id: product.product_id,
            title: product.product_title,
            price: product.product_price,
            thumbnail: product.product_thumbnail,
            action: product.wc_action,
            permalink: product.product_permalink
        }));

        const dataHTML = templateProduct(productsWithHTML);

        // Validar la longitud de la respuesta
        if (data.length > 0) {
            responseAjax.innerHTML = dataHTML;
            pagination.style.display = 'flex';
        } else {
            responseAjax.innerHTML = '<h3>No se encontraron resultados</h3>';
        }
        // Oculta el loader
        loader.classList.add('disable');

        // Devuelve los productos con HTML
        return productsWithHTML;

    } catch (error) {
        console.error('Error fetching or parsing data:', error);
        throw error;
    }
}