<?php
defined('ABSPATH') || exit;

if (!$messages) {
    return;
}

$context = \Timber\Timber::get_context();
$context['messages'] = $messages;

\Timber\Timber::render('partials/notices/error.html.twig', $context);
