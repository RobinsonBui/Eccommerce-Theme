import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiperBanner = new Swiper('.swiper-banner', {
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
        },
        960: {
            slidesPerView: 4,
            grid: {
                fill: 'row',
                rows: 2
            },
        },
    },
});