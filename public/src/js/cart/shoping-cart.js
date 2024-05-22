if (document.querySelector('.shoping-cart')) {
    const openCart = document.querySelector('.button__cart'),
        closeCart = document.querySelector('.shoping-cart__close'),
        fullCart = document.querySelector('.shoping-cart');

    openCart.addEventListener('click', () => {
        fullCart.classList.add('open')
    });

    closeCart.addEventListener('click', () => {
        fullCart.classList.remove('open');
    });



}