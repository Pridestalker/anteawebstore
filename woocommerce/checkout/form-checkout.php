<?php

defined('ABSPATH') || exit;

use Timber\Timber;

$context = Timber::get_context();
/** @noinspection PhpUndefinedVariableInspection */
$context['checkout'] = $checkout;

Timber::render('views/woocommerce/checkout.html.twig', $context);
