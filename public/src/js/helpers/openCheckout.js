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
                    // Redirigir a una URL
                    window.location.href = '/checkout';
                }

            }
        }
    });

    const config = { attributes: true };

    buttons.forEach(button => {
        observer.observe(button, config);
    });
}
