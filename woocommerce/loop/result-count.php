<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.7.0
 */

defined('ABSPATH') || exit;

use \Timber\Timber;

$context = Timber::get_context();
$context['total'] = $total;
/* @noinspection PhpUndefinedVariableInspection */
$context['per_page'] = $per_page;
$context['current'] = $current;
$context['first'] = ($context['per_page'] * $context['current']) - $context['per_page'] + 1;
$context['last'] = min($context['total'], $context['per_page'] * $context['current']);

Timber::render('partials/woocommerce/loop/result-count.html.twig', $context);
