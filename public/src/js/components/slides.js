import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiperBanner = new Swiper('.swiper-hero-front', {
    slidesPerView: 1,
    speed: 1000,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
});

const swiperTabsProducts = new Swiper('.swiper-tabs-products', {
    slidesPerView: 1,
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        800: {
            slidesPerView: 2,
        },
        1040: {
            slidesPerView: 3,
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const swiperProducts = new Swiper('.swiper-ajax-product', {
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 10000,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        940: {
            slidesPerView: 3,
        },
        1240: {
            slidesPerView: 4,
        }
    },

});
const swiperComponents = new Swiper('.swiper-components', {
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 2000,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        940: {
            slidesPerView: 3,
        },
        1240: {
            slidesPerView: 4,
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },

});
const swiperResults = new Swiper('.swiper-results', {
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 2000,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        940: {
            slidesPerView: 1,
        },
        1240: {
            slidesPerView: 2,
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },

});
const swiperReplic = new Swiper('.swiper-product-replic', {
    spaceBetween: 20,
    autoplay: {
        delay: 5000,
    },

    loopAddBlankSlides: true,
    breakpoints: {
        320: {
            slidesPerView: 1,
            grid: {
                fill: 'row',
                rows: 4
            },
        },
        640: {
            slidesPerView: 2,
            grid: {
                fill: 'row',
                rows: 3
            },
        },
        1040: {
            slidesPerView: 3,
            grid: {
                fill: 'row',
                rows: 2
            },
        },
        1240: {
            slidesPerView: 4,
            grid: {
                fill: 'row',
                rows: 2
            },
        },
    },
});

const swiperSingleProduct = new Swiper('.swiper-single-product', {
    slidesPerView: 1,
    speed: 1000,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});