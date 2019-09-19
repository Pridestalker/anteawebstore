const formHandler = () => {
    const form = document.querySelector('.js-search-form');
    const input = form.querySelector('#s');

    if (!form || !input) {
        return;
    }
    preventActions(form, input);
}

const preventActions = (el, input) => {
    el.addEventListener('submit', (e) => {
        if (!input.classList.contains('active')) {
            e.preventDefault();
            input.classList.add('active');
        }
    })
}

export { formHandler };
