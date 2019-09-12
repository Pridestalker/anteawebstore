import tabular from './product/TabHandler'
import { VariationHandler } from './product/VariationHandler'

export default {
    init() {
        tabular();
        VariationHandler();
    },
    finalize() {}
}
