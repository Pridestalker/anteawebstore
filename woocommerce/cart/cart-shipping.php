<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 *
 * @var array $package
 * @var $formatted_destination
 * @var $has_calculated_shipping
 * @var $show_shipping_calculator
 * @var array $available_methods
 * @var string $package_name
 */

defined('ABSPATH') || exit;
$formatted_destination    = $formatted_destination ??
                            WC()->countries->get_formatted_address($package[ 'destination' ], ', ');
$calculator_text          = '';

$context = \Timber\Timber::get_context();

$context['cart'] = WC()->cart;
$context['available_methods'] = $available_methods;
$context['package_name'] = $package_name;
$context['has_calculated_shipping'] = ! empty($has_calculated_shipping);
$context['show_shipping_calculator'] = ! empty($show_shipping_calculator);
$context['formatted_destination'] = $formatted_destination;
$context['chosen_method'] = $chosen_method;

\Timber\Timber::render('partials/woocommerce/cart/shipping.html.twig', $context);
