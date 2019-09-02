const formHandler = () => {
    const form = document.querySelector('.js-search-form');

    if (!form) {
        return;
    }
    preventDefault(form);
}

const preventDefault = (el) => {
    el.addEventListener('submit', function (e) {
        e.target.preventDefault();
        e.preventDefault();
    })
}

export { formHandler };
