// if (document.querySelector('.main-pattern')) {
//     const buyPatternItems = document.querySelectorAll('.pattern-product__li');

//     buyPatternItems.forEach(item => {
//         const productId = item.getAttribute('data-id');
//         const baseUrl = item.getAttribute('data-base-url');
//         const quantity = item.querySelector('.pattern-product__purchase-option').getAttribute('data-quantity');
//         const checkoutUrl = `${baseUrl}?add-to-cart=${productId}&quantity=${quantity}`;
//         item.addEventListener('click', (e) => {
//             window.location.href = checkoutUrl;
//         })
//     });
// }
