import { navHandler } from './common/navigation';
import { notificationHandler } from './common/notifications';
import { formHandler } from './common/search';
import { detectIE } from './common/isIE';

export default {
    init() {
        // Javascript that fires on all pages.
        navHandler();
        notificationHandler();
        formHandler();
    },

    finalize() {
        // Javascript that fires on all pages. after page specific JS is fires.
        showBannerOnIE();
    }
}

const showBannerOnIE = () => {
    if (detectIE()) {
        const banner = document.querySelector('.js-ie-only-banner')

        if (banner) {
            banner.style.display = 'block';
        }
    }
}
