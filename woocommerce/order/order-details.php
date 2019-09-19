<?php
defined('ABSPATH') || exit;

/** @noinspection PhpUndefinedVariableInspection @var \WC_Order $order */
$order = wc_get_order($order_id);

if (!$order) {
    return;
}

$context = \Timber\Timber::get_context();

$context['order'] = $order;
$context['order_items'] = $context['order']->get_items(
    apply_filters('woocommerce_purchase_order_item_types', 'line_item')
);

$context['show_purchase_note'] = $context['order']->has_status(
    apply_filters(
        'woocommerce_purchase_note_order_statuses',
        [ 'completed', 'processing' ]
    )
);

$context['show_customer_details'] = is_user_logged_in() && $context['order']->get_user_id() === get_current_user_id();
$context['downloads'] = $context['order']->get_downloadable_items();
$context['show_downloads'] = $context['order']->has_downloadable_item() && $context['order']->is_download_permitted();


if ($context['show_downloads']) {
    return;
}

\Timber\Timber::render('views/woocommerce/order/details.html.twig', $context);
