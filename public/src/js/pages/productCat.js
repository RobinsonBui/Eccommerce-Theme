import { fetchDataAndRenderProducts } from "../helpers/fetchProducts";

const mainProductCat = document.querySelector('.main-product-cat');
if (mainProductCat) {
    let urlCategory = window.location.href,
        segments = urlCategory.split('/'),
        categorySlug = segments[4],
        termsFilter = document.querySelectorAll('.filter__filters--term input[type="checkbox"]'),
        page = 1,
        perPage = 8;
    const descriptionCategory = mainProductCat.querySelector('.hero-category__p'),
        categoryLoader = document.querySelector('.filter__response--loader'),
        filters = {},
        prevPage = document.querySelector('#prevPage'),
        nextPage = document.querySelector('#nextPage');

    if (descriptionCategory) {
        let description = descriptionCategory.textContent.trim();
        if (description.length > 130) {
            description = description.slice(0, 130) + '...';
        }
        descriptionCategory.textContent = description;
    }
    fetchDataAndRenderProducts(categoryLoader, adminAJAX, categorySlug, filters, page, perPage);

    prevPage.addEventListener('click', () => {
        page--;
        categoryLoader.classList.remove('disable');
        fetchDataAndRenderProducts(categoryLoader, adminAJAX, categorySlug, filters, page, perPage)
    });

    nextPage.addEventListener('click', () => {
        page++;
        categoryLoader.classList.remove('disable');
        fetchDataAndRenderProducts(categoryLoader, adminAJAX, categorySlug, filters, page, perPage);
    });

    termsFilter.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            categoryLoader.classList.remove('disable');
            termsFilter.forEach(checkbox => {
                if (checkbox.checked) {
                    const term = checkbox.name;
                    const attribute = checkbox.value;
                    if (!filters[attribute]) {
                        filters[attribute] = [];
                    }
                    if (!filters[attribute].includes(term)) {
                        filters[attribute].push(term);
                    }
                } else {
                    const term = checkbox.name;
                    const attribute = checkbox.value;
                    if (filters[attribute]) {
                        const index = filters[attribute].indexOf(term);
                        if (index !== -1) {
                            filters[attribute].splice(index, 1);
                        }
                    }
                }
            });

            fetchDataAndRenderProducts(categoryLoader, adminAJAX, categorySlug, filters, page, perPage);

        });
    });
}