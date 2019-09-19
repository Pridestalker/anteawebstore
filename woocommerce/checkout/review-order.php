<?php
defined('ABSPATH') || exit;

use Timber\Timber;

$context = Timber::get_context();

$context['cart'] = WC()->cart;
$context['cart_items'] = $context['cart']->get_cart();

Timber::render('partials/woocommerce/checkout/review-order.html.twig', $context);
