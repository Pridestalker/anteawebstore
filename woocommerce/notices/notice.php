<?php

use Timber\Timber;

defined('ABSPATH') || exit;

if (!$messages) {
    return;
}

$context = Timber::get_context();
$context['messages'] = $messages;

Timber::render('partials/notices/info.html.twig', $context);
