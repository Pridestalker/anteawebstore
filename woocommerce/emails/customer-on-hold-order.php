<?php
/**
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 *
 * @var $email_heading
 * @var $email
 * @var $sent_to_admin
 * @var $plain_text
 * @var $additional_content
 */

defined('ABSPATH') || exit;

$context = [];
$context['email_heading'] = $email_heading;
$context['email'] = $email;
$context['order'] = $order;
$context['plain_text'] = $plain_text;
$context['additional_content'] = $additional_content;

\Timber\Timber::render('emails/woocommerce/customer-processing-order.html.twig', $context);
