import tabular from './product/TabHandler'
import { VariationHandler } from './product/VariationHandler'
import QuantityButtonsHandler from './product/QuantityButtons'

export default {
    init() {
        tabular();
        VariationHandler();
        QuantityButtonsHandler();
    },
    finalize() {}
}
