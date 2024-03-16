let windowWidth = window.innerWidth;
if (document.querySelector('.blog-home')) {
    const extraBlogs = document.querySelector('.blog-home__content-2'),
        innerExtraBlogs = document.querySelector('.blog-home__inner-blogs');
    if (windowWidth >= 768) {
        innerExtraBlogs.appendChild(extraBlogs);
    }

    let dates = document.querySelectorAll('.blog-home__date');

    dates.forEach(function (fechaElement) {
        let date = fechaElement.textContent;
        let day = date.match(/\d{1,2}/);

        if (day) {
            let dayElement = fechaElement.parentElement.querySelector('.blog-home__day');
            dayElement.textContent = day[0];

            let monthElement = fechaElement.parentElement.querySelector('.blog-home__month');
            let restante = date.slice(2);

            monthElement.textContent = restante;
        }
    });
}
const titlesBlog = document.querySelectorAll('.blog-home__article--h2');

titlesBlog.forEach((title) => {
    let titleText = title.textContent;

    if (titleText.length > 30) {
        const limitTitle = titleText.substring(0, 30) + '...';
        title.textContent = limitTitle;
    }
});