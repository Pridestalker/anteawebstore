<?php

use Timber\Post;
use \Timber\Timber;

$context = Timber::get_context();

$context['post'] = new Post();
$context['cart'] = WC()->cart;
$context['cart_items'] = $context['cart']->get_cart();
$context['cart_url'] = esc_url(wc_get_cart_url());

Timber::render('views/woocommerce/cart.html.twig', $context);
