import { handlerCheckout } from "../helpers/openCheckout";

if (document.querySelector('.swiper-product-replic')) {
    const openCheckoutButtons = document.querySelectorAll('.open-checkout');

    handlerCheckout(openCheckoutButtons);
} 