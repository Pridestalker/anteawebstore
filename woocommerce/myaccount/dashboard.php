<?php

use Timber\Timber;

defined('ABSPATH') || exit;

$context = Timber::get_context();
$context['user'] = $current_user;
$context['logout_url'] = wc_logout_url();

Timber::render('views/woocommerce/account.html.twig', $context);
