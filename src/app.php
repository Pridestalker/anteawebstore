<?php
namespace App;

use App\Providers\AppServiceProvider;

new AppServiceProvider();

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
