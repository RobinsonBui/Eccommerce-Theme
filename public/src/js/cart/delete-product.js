import { renderToLocalStorage } from './render-shoping-cart';
export function deleteProduct(idProduct) {
    deleteProductWoo(idProduct);

    deleteProductToLocalStorage(idProduct);

    renderToLocalStorage();
}

function deleteProductWoo(cartItemKey) {
    console.log(cartItemKey)
    fetch(adminAJAX.ajaxurl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'action': 'remove_product_from_cart',
            'cart_item_key': cartItemKey
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.data.message);
                console.log(data.data.product);
                // Aquí puedes actualizar el DOM para reflejar la eliminación del producto
            } else {
                console.error(data.data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function deleteProductToLocalStorage(idProducto) {
    let productsInLocalStorage = JSON.parse(localStorage.getItem('productos')) || [];
    idProducto = parseInt(idProducto);

    const nuevosProductos = productsInLocalStorage.filter(producto => producto.id !== idProducto);

    localStorage.setItem('productos', JSON.stringify(nuevosProductos));
}


