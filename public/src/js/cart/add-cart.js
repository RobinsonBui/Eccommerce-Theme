import { renderToLocalStorage } from "./render-shoping-cart";

if (document.querySelector('.main-pattern')) {
    const addCartButtons = document.querySelectorAll('.pattern-product__li');

    addCartButtons.forEach(button => {
        button.addEventListener('click', function (e) {

            let productId = this.getAttribute('data-id');
            let quantity = this.getAttribute('data-quantity');
            productId = parseInt(productId);
            quantity = parseInt(quantity)
            fetch(adminAJAX.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'action': 'add_product_shoping_cart',
                    'product_id': productId,
                    'quantity': quantity
                }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.location.href = '/checkout';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
}


