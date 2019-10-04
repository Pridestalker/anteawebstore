<?php
use Timber\Timber;

include_once get_stylesheet_directory() . '/vendor/autoload.php';

add_theme_support('custom-logo');
add_theme_support('woocommerce');

$my_update_checker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/Pridestalker/anteawebstore',
    __FILE__,
    'webstore',
    '1'
);

Timber::$locations = [
    get_stylesheet_directory() . '/templates/',
];
