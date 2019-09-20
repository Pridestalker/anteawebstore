<?php

use Timber\Timber;

defined('ABSPATH') || exit;

$context = Timber::get_context();
$context['enable_registration'] = 'yes' === get_option('woocommerce_enable_myaccount_registration');
$context['username'] = !empty($_POST['username']) ? $_POST['username'] : '';
$context['email'] = !empty($_POST['email']) ? $_POST['email'] : '';
$context['lost_password_url'] = wp_lostpassword_url();

$context['register'] = [
    'generate_username'     => 'no' === get_option('woocommerce_registration_generate_username'),
    'generate_password'     => 'no' === get_option('woocommerce_registration_generate_password'),
];

Timber::render('views/woocommerce/myaccount/form-login.html.twig', $context);
