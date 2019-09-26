<?php
use App\Models\Post;
use Timber\Timber;

$templates = [
    'views/woocommerce/single-product.html.twig',
    'views/page.twig'
];

$context = Timber::get_context();

$context[ 'post' ] = new Post();

$context[ 'product' ] = wc_get_product($context[ 'post' ]->ID);

$related_limit                 = 3;
$related_ids                   = wc_get_related_products($context[ 'product' ]->get_id(), $related_limit);
$context[ 'related_products' ] = Timber::get_posts($related_ids, \App\Models\Post::class);
wp_reset_postdata();

if ($context['product'] instanceof WC_Product_Variable) {
    $context['available_variations'] = $context['product']->get_available_variations();
    $context['attributes'] = $context['product']->get_variation_attributes();
    $context['selected_attributes'] = $context['product']->get_default_attributes();
    array_unshift($templates, 'views/woocommerce/single-product-variation.html.twig');
}

Timber::render($templates, $context);
