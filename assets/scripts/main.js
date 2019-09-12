import jQuery from 'jquery';

import Router from './tools/Router';
import common from './routes/common';
import home from './routes/home';
import singleProduct from './routes/singleProduct';


const routes = new Router({
    common,
    home,
    singleProduct
});

window.routes = routes;

jQuery(document).ready(() => routes.loadEvents());
