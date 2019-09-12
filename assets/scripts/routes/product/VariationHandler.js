const VariationHandler = () => {
    const form = document.querySelector(formSelector());
    const selects = form.querySelectorAll(switchSelector());

    for ( let i = 0; i < selects.length; i++ ) {
        const el = selects[i];

        el.addEventListener('input', (ev) => {
            const attribute = el.dataset.attribute_name;
            const value = ev.target.value;

            urlSwitcher(attribute, value);
        });
    }
}

const urlSwitcher = (attr, val) => {
    const qp = new URLSearchParams(window.location.search);

    if (qp.get(attr) === val) {
        return;
    }

    qp.set(attr, val);

    window.location.search = qp.toString();
}

const switchSelector = () => '[data-attribute_name]';

const formSelector = () => '.product-add-to-cart-form';

export { VariationHandler }
