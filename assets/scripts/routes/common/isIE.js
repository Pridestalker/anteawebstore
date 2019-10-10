const detectIE = () => {
    let ua = window.navigator.userAgent;
    const { msie, trident } = {
        msie: ua.indexOf('MSIE '),
        trident: ua.indexOf('Trident/')
    };

    return msie > 0 || trident > 0;
}

export default { detectIE }
