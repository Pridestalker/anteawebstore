<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
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
