import { navHandler } from './common/navigation';
import { notificationHandler } from './common/notifications'
import { formHandler } from './common/search'

export default {
    init() {
        // Javascript that fires on all pages.
        navHandler();
        notificationHandler();
        formHandler();
    },

    finalize() {
        // Javascript that fires on all pages. after page specific JS is fires.
    }
}
