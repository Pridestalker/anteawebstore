const tabular = () => {
    const tabs = getAllTabs();
    const contents = getAllContents();

    for ( let i = 0; i < tabs.length; i++ ) {
        tabs[i].addEventListener('click', () => {
            resetAll(tabs);
            resetContents(contents);

            setClass(tabs[i]);
            toggleContent(tabs[i]);
        })
    }
}

const resetAll = (tabs) => {
    for ( let i = 0; i < tabs.length; i++ ) {
        tabs[i].classList.remove(activeClass())
    }
}

const setClass = (tab) => {
    tab.classList.add(activeClass());
}

const toggleContent = (tab) => {
    const target = document.querySelector(tab.dataset.target);

    target.classList.add(contentActive());
}

const resetContents = (contents) => {
    for ( let i = 0; i < contents.length; i++ ) {
        contents[i].classList.remove(contentActive())
    }
}

const getAllTabs = () => {
    return document.querySelectorAll(tabSelector());
}

const getAllContents = () => {
    return document.querySelectorAll(contentSelector());
}

const contentSelector = () => '.product-content';

const contentActive = () => 'product-content--active';

const tabSelector = () => '.js-product-tab';

const activeClass = () => 'product-tabs--active';

export { tabular };
export default tabular;
