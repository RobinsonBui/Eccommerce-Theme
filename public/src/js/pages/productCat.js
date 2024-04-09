import { buyNowHandler } from "../helpers/buyNow";
import { templateProduct } from "../helpers/cardProducts";

const mainProductCat = document.querySelector('.main-product-cat');
if (mainProductCat) {
    let urlCategory = window.location.href,
        segments = urlCategory.split('/'),
        categorySlug = segments[4],
        termsFilter = document.querySelectorAll('.filter__filters--term input[type="checkbox"]');
    const descriptionCategory = mainProductCat.querySelector('.hero-category__p'),
        responseAjax = document.querySelector('#ajaxCategory'),
        categoryLoader = document.querySelector('.filter__response--loader'),
        filters = {};

    if (descriptionCategory) {
        let description = descriptionCategory.textContent.trim();
        if (description.length > 130) {
            description = description.slice(0, 130) + '...';
        }
        descriptionCategory.textContent = description;
    }

    fetchDataAndRenderProducts(adminAJAX, categorySlug, filters)
        .then(productsWithHTML => {
            categoryLoader.classList.add('disable');
            const dataHTML = templateProduct(productsWithHTML);
            responseAjax.innerHTML = dataHTML;
        })
        .catch(error => {
            console.log('Error al cargar productos:', error);
        });

    termsFilter.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            categoryLoader.classList.remove('disable');
            termsFilter.forEach(checkbox => {
                if (checkbox.checked) {
                    const term = checkbox.name;
                    const attribute = checkbox.value;
                    if (!filters[attribute]) {
                        filters[attribute] = [];
                    }
                    if (!filters[attribute].includes(term)) {
                        filters[attribute].push(term);
                    }
                } else {
                    const term = checkbox.name;
                    const attribute = checkbox.value;
                    if (filters[attribute]) {
                        const index = filters[attribute].indexOf(term);
                        if (index !== -1) {
                            filters[attribute].splice(index, 1);
                        }
                    }
                }
            });

            fetchDataAndRenderProducts(adminAJAX, categorySlug, filters)
                .then(productsWithHTML => {
                    categoryLoader.classList.add('disable');
                    const dataHTML = templateProduct(productsWithHTML);
                    responseAjax.innerHTML = dataHTML;
                })
                .catch(error => {
                    console.log('Error al cargar productos:', error);
                });
        });
    });
}

async function fetchDataAndRenderProducts(adminAJAX, categorySlug, filters) {
    const url = adminAJAX.ajaxurl;

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'get_filter_data',
                categorySlug: categorySlug,
                filters: JSON.stringify(filters),
            }),
        });

        if (!response.ok) {
            throw new Error('Failed to fetch products');
        }

        const data = await response.json();
        const productsWithHTML = data.map(product => ({
            id: product.product_id,
            title: product.product_title,
            price: product.product_price,
            thumbnail: product.product_thumbnail,
            action: product.wc_action,
            permalink: product.product_permalink
        }));

        return productsWithHTML;
    } catch (error) {
        console.error('Error fetching or parsing data:', error);
        throw error;
    }
}
