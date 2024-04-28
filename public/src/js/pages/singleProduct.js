if (document.querySelector('.main-single-product')) {
    const buttonBuyNow = document.querySelector('#buyNowProduct');
    const quantity = document.querySelector('.single-product__add-to-cart .qty');

    const handleQuantityChange = () => {
        const productId = buttonBuyNow.getAttribute('data-id');
        const selectedQuantity = quantity.value;
        const baseUrl = buttonBuyNow.getAttribute('data-base-url');
        const checkoutUrl = `${baseUrl}?add-to-cart=${productId}&quantity=${selectedQuantity}`;

        buttonBuyNow.addEventListener('click', () => {
            window.location.href = checkoutUrl;
        });
    };

    quantity.addEventListener('change', handleQuantityChange);

    handleQuantityChange();
}
