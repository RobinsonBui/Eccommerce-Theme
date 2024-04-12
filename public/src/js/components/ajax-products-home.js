import { handlerCheckout } from "../helpers/openCheckout";

if (document.querySelector('#ajax-response')) {
    const tabsLi = document.querySelectorAll('.tabs-products__li'),
        responseSlides = document.querySelector('#ajax-response'),
        initialSlug = tabsLi[1].querySelector('button').getAttribute('data-product-slug'),
        loader = document.querySelector('.tabs-products__loader');

    tabsLi[1].classList.add('active');

    loadProducts(initialSlug);

    tabsLi.forEach(tab => {
        tab.addEventListener('click', () => {
            const tabProductsSlug = tab.querySelector('button').getAttribute('data-product-slug');
            loader.style.display = 'grid';
            tabsLi.forEach(e => {
                if (e.classList.contains('active')) {
                    e.classList.remove('active');
                }
            });
            tab.classList.add('active');
            responseSlides.innerHTML = '';
            loadProducts(tabProductsSlug);
        })
    })
    function loadProducts(productSlug) {
        fetch(adminAJAX.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            },
            body: new URLSearchParams({
                action: 'get_product_category_slug',
                product_slug_template: productSlug
            }),
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    let buttons = document.querySelectorAll('#ajax-response .buy-now-button');
                    var productDataArray = data.data;
                    loader.style.display = 'none';
                    responseSlides.innerHTML = productDataArray.join('');
                    const openCheckoutButtons = responseSlides.querySelectorAll('.open-checkout');

                    handlerCheckout(openCheckoutButtons);

                } else {
                    console.error('Error en la respuesta JSON:', data.error);
                }
            })
            .catch(error => {
                console.error('Error en la solicitud Fetch:', error);
            });
    }
}

