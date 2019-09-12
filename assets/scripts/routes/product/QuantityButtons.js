const QuantityButtonsHandler = () => {
    const addButton = document.querySelector(addSelector());
    const subButton = document.querySelector(subSelector());

    addSubEvent(subButton);
    addAddEvent(addButton);
}

const addSubEvent = (button) => button.addEventListener('click', subEvent);
const addAddEvent = (button) => button.addEventListener('click', addEvent);

const subEvent = (event) => {
    const input = getInput();
    if (input.valueAsNumber > 1) {
        input.value = input.valueAsNumber - 1;
    } else {
        event.target.disabled = true;
    }
}
const addEvent = (event) => {
    const input = getInput();
    input.value = input.valueAsNumber + 1;
    document.querySelector(subSelector()).disabled = false;
}

const inputSelector = () => '#quantity';
const subSelector = () => '.js-btn-sub';
const addSelector = () => '.js-btn-add';

const getInput = () => document.querySelector(inputSelector());

export { QuantityButtonsHandler };
export default QuantityButtonsHandler;
