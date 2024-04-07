let cards = document.querySelectorAll('.card-product__card');
if (cards) {
    let buyNowButton = document.querySelectorAll('.card-product__add-cart');
    buyNowButton.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            console.log(button)
            const productId = this.dataset.productId;
            let addToCartButton = document.querySelector('.cart [type="submit"]');
            addToCartButton.click();

            setTimeout(function () {
                window.location.href = `http://ecoommerce.local/checkout/?add-to-cart=${productId}`;
            }, 500);
        });
    });
} 