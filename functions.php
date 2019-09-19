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


function anws_register_elementor_locations($elementor_theme_manager)
{
    
    $elementor_theme_manager->register_location(
        'footer-column-2',
        [
            'label' => __('Footer 2nd column'),
            'multiple' => true,
            'edit_in_content' => false,
        ]
    );
    
    $elementor_theme_manager->register_location(
        'footer-column-mailchimp',
        [
            'label' => __('Footer mailchimp column'),
            'multiple' => true,
            'edit_in_content' => false,
        ]
    );
    
    $elementor_theme_manager->register_location(
        'footer-column-logo',
        [
            'label' => __('Footer logo column'),
            'multiple' => true,
            'edit_in_content' => false,
        ]
    );
}
add_action('elementor/theme/register_locations', 'anws_register_elementor_locations');
