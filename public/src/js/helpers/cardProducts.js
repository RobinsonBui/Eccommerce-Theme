export const templateProduct = (products) => {
    return products.map(product => {
        const { isVariable, id, title, price, thumbnail, action, permalink } = product;
        let iconView = '';
        let notIconsVariable = '';
        let buttonIsVariable = '';
        let buttonIsNotVariable = '';
        if (isVariable === true) {
            iconView = `
                <a class="card-product__add-cart" href="${permalink}" >
                    <button type="submit" name="add-to-cart" class="card-product__add-cart" value="${id}">
                        <span class="card-product__tooltip">Ver Producto</span>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        </i>
                    </button>
                </a>
            `;
            buttonIsVariable = `
            <a class="card-product__view" href="${permalink}" >
                <button class="button-woo button__primary card-product__view card-product__buy-free" value="${id}">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                    </i>
                    Ver producto
                </button>
            </a>
            `;
        } else {
            notIconsVariable = `
            <a href="/checkout/?add-to-cart=${id}">
                <button class="card-product__add-cart buy-now-button" data-product-id="${id}">
                    <span class="card-product__tooltip">Comprar Ahora</span>
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-shopee" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 7l.867 12.143a2 2 0 0 0 2 1.857h10.276a2 2 0 0 0 2 -1.857l.867 -12.143h-16z" />
                            <path d="M8.5 7c0 -1.653 1.5 -4 3.5 -4s3.5 2.347 3.5 4" />
                            <path d="M9.5 17c.413 .462 1 1 2.5 1s2.5 -.897 2.5 -2s-1 -1.5 -2.5 -2s-2 -1.47 -2 -2c0 -1.104 1 -2 2 -2s1.5 0 2.5 1" />
                        </svg>
                    </i>
                </button>
            </a>
            <form class="cart" action="${action}" method="post" enctype="multipart/form-data">
                <button type="submit" name="add-to-cart" class="card-product__add-cart" value="${id}">
                    <span class="card-product__tooltip">Agregar al carrito</span>
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M12.5 17h-6.5v-14h-2" />
                            <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg>
                    </i>
                </button>
            </form>
            `;
            buttonIsNotVariable = `
                    <div class="card-product__button-buy-free">
                        <form class="cart" action="${action}" method="post" enctype="multipart/form-data">
                            <button type="submit" name="add-to-cart" class="open-checkout button-woo button__primary card-product__buy-free" value="${id}">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                    <path d="M3 9l4 0" />
                                    </svg>
                                </i>
                                Contraentrega
                                <div class="loader-circle">
                                    <div class="loader">
                                        <div class="circle">
                                            <div class="dot"></div>
                                            <div class="outline"></div>
                                        </div>
                                        <div class="circle">
                                            <div class="dot"></div>
                                            <div class="outline"></div>
                                        </div>
                                        <div class="circle">
                                            <div class="dot"></div>
                                            <div class="outline"></div>
                                        </div>
                                        <div class="circle">
                                            <div class="dot"></div>
                                            <div class="outline"></div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
            `;

        }

        return `
            <div class="card-product__card">
                <div class="card-product__thumbnail">
                    <figure class="card-product__figure">
                        ${thumbnail}
                    </figure>
                    <div class="card-product__buttons">
                        ${isVariable ? iconView : notIconsVariable} 
                        
                    </div>
                </div>
                <div class="card-product__info">
                    <a href="${permalink}">
                        <h3 class="card-product__h3">${title}</h3>
                    </a>
                    <span class="card-product__price">${price}</span>
                    ${isVariable ? buttonIsVariable : buttonIsNotVariable}
                </div>
            </div>
        `;
    }).join('');
}
