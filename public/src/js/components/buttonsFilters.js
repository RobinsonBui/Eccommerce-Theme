if (document.querySelector('.filter__button-movil')) {
    const buttonCategories = document.querySelector('.filter__button-movil--categories '),
        asideCategories = document.querySelector('.filter__filter '),
        buttonFilters = document.querySelector('.filter__button-movil--filter'),
        asideFilters = document.querySelector('.filter__filters'),
        butonsClose = document.querySelectorAll('.filter__button-movil--close');

    butonsClose.forEach(button => {
        button.addEventListener('click', () => {
            asideCategories.classList.remove('open');
            asideFilters.classList.remove('open');
        });
    });
    buttonCategories.addEventListener('click', () => {
        asideCategories.classList.add('open');
    });

    buttonFilters.addEventListener('click', () => {
        asideFilters.classList.add('open');
    });
}