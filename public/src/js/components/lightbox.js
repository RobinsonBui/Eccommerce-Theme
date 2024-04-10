if (document.getElementById('lightbox')) {
    const zoomIcon = document.getElementById('zoom-icon');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeLightbox = document.getElementById('close-lightbox');
    const prevImgBtn = document.getElementById('prev-img');
    const nextImgBtn = document.getElementById('next-img');
    let currentImageIndex = 0;

    zoomIcon.addEventListener('click', function () {
        const imageSrc = document.querySelector('.swiper-slide img').src;
        lightboxImg.src = imageSrc;
        lightbox.classList.add('open');
    });
    closeLightbox.addEventListener('click', function () {
        lightbox.classList.remove('open');
    });

    prevImgBtn.addEventListener('click', function () {
        showImage(-1);
    });

    nextImgBtn.addEventListener('click', function () {
        showImage(1);
    });

    function showImage(direction) {
        const slides = document.querySelectorAll('.swiper-slide img');
        currentImageIndex += direction;
        if (currentImageIndex >= slides.length) {
            currentImageIndex = 0;
        } else if (currentImageIndex < 0) {
            currentImageIndex = slides.length - 1;
        }
        lightboxImg.src = slides[currentImageIndex].src;
    }
}