<?php
/**
 * @global WC_Payment_Gateways $available_gateways
 */

use Timber\Timber;

defined('ABSPATH') || exit;

if (!is_ajax()) {
    do_action('woocommerce_review_order_before_payment');
}

$context = Timber::get_context();
$context['cart'] = WC()->cart;
$context['available_gateways'] = $available_gateways;
$context['order_button_text'] = __('Bestelling voltooien', 'agws');

Timber::render('partials/woocommerce/checkout/payment.html.twig', $context);

if (!is_ajax()) {
    do_action('woocommerce_review_order_after_payment');
}
