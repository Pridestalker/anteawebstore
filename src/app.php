<?php
namespace App;

use App\Providers\AppServiceProvider;
use DusanKasan\Knapsack\Collection;
use function DusanKasan\Knapsack\append;

new AppServiceProvider();

add_action('elementor/theme/register_locations', static function ($elementor_theme_manager) {
    
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
});

add_action('init', static function () {
    add_post_type_support('product', 'revisions');
});


if (is_checkout()) {
    add_filter('woocommerce_enqueue_styles', '__return_empty_array');
}

add_filter('woocommerce_coupon_error', static function ($err, $code, $obj) {
    return __('Ongeldige kortingscode', 'agws');
}, 15, 3);

add_filter('woocommerce_get_order_item_totals', static function ($total_rows, $obj, $tax_display) {
    $rows = Collection::from($total_rows);
    
    $rows = $rows->map(static function ($item, $key) {
        if ($key === 'belasting-1') {
            $item ['label'] = 'BTW:';
        }
        
        return $item;
    });
    
    $rows = $rows->toArray();
    
    $payment = $rows['payment_method'];
    
    unset($rows['payment_method']);
    
    $rows ['payment_method'] = $payment;
    
    return $rows;
}, 10, 3);
