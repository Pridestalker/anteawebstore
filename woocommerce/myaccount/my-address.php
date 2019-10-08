<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

use Timber\Timber;

defined('ABSPATH') || exit;
$customer_id = get_current_user_id();

$context = Timber::get_context();
$context['customer'] = get_current_user();
$context['customer_id'] = $customer_id;

$context['addresses'] = (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) ?
    apply_filters(
        'woocommerce_my_account_get_addresses',
        ['billing'  => __('Billing address', 'woocommerce'), 'shipping' => __('Shipping address', 'woocommerce')],
        $customer_id
    ) :
    apply_filters(
        'woocommerce_my_account_get_addresses',
        ['billing' => __('Billing address', 'woocommerce')],
        $customer_id
    );

$context['description'] = apply_filters(
    'woocommerce_my_account_my_address_description',
    esc_html__(
        'The following addresses will be used on the checkout page by default.',
        'woocommerce'
    )
);

Timber::render('views/woocommerce/myaccount/my-address.html.twig', $context);
