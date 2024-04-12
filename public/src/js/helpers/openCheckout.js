export function handlerCheckout(buttons) {
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const loader = button.querySelector('.loader-points');
            loader.classList.add('visible');
        });
    });
    const observer = new MutationObserver((mutationsList, observer) => {
        for (let mutation of mutationsList) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                const button = mutation.target;
                if (button.classList.contains('added')) {
                    const loader = button.querySelector('.loader-points');
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
                }
            }
        }
    });

    const config = { attributes: true };

    buttons.forEach(button => {
        observer.observe(button, config);
    });
}
