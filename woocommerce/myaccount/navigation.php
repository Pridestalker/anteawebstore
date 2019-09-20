<?php

use Timber\Timber;

defined('ABSPATH') || exit;

$context = Timber::get_context();
$context['acc_menu_items'] = wc_get_account_menu_items();

Timber::render('partials/woocommerce/myaccount/navigation.html.twig', $context);
