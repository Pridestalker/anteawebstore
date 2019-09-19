<?php

use Timber\Timber;

defined('ABSPATH') || exit;

if (!$order) {
    return;
}

$context = Timber::get_context();
$context['order'] = $order;

Timber::render('views/woocommerce/thankyou.html.twig', $context);
