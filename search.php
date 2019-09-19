<?php

use Timber\PostQuery;
use Timber\Timber;

$context = Timber::get_context();
$context['search_query'] = get_search_query();
$context['posts'] = new PostQuery();

Timber::render('views/search.html.twig', $context);
