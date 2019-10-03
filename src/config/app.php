<?php
namespace App;

use App\Providers\CarbonFieldsServiceProvider;
use App\Providers\CheckoutServiceProvider;
use App\Providers\ContentServiceProvider;
use App\Providers\ElementorServiceProvider;
use App\Providers\KirkiServiceProvider;
use App\Providers\MenuServiceProvider;

return [
    'providers'     => [
        MenuServiceProvider::class,
        CarbonFieldsServiceProvider::class,
        ElementorServiceProvider::class,
        KirkiServiceProvider::class,
        CheckoutServiceProvider::class,
        ContentServiceProvider::class,
    ]
];
