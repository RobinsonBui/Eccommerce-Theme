export function openCheckout(buttons) {
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const loader = button.querySelector('.loader-circle');
            loader.classList.add('visible');
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
                    loader.classList.remove('visible');
                    const checkoutWrapper = document.querySelector('.checkout-container');
                    const checkoutContent = document.getElementById('checkout-container');
                    const closeButton = document.querySelector('.checkout-container__close');
                    checkoutWrapper.classList.add('open');
                    checkoutContent.innerHTML = data;

                    closeButton.addEventListener('click', () => {
                        checkoutWrapper.classList.remove('open');
                    });
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        });
    });
}
