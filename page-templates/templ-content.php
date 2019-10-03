<?php
/**
 * Template Name: Content with title
 * Template Post Type: page
 */

$context = \Timber\Timber::get_context();

$context['post'] = new Timber\Post();

return \Timber\Timber::render(
    [
        'views/pages/content.html.twig',
    ],
    $context
);
