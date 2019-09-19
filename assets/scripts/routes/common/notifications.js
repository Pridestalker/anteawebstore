const notificationHandler = () => {
    const notifications = document.querySelectorAll('.js-notification');

    if (!notifications) {
        return;
    }

    for ( let i = 0; i < notifications.length; i++ ) {
        const el = notifications[i];

        addCloseClicker(el);
    }
}

const addCloseClicker = (el) => {
    document.body.addEventListener('click', (event) => {
        if (event.target.contains(el) || event.target === el) {
            return;
        }

        el.parentNode.removeChild(el);
    })
}

export { notificationHandler }
