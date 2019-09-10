<?php

use App\Controllers\Elementor\Widgets\BannerWidget;
use App\Controllers\Elementor\Widgets\SingleProductWidget;

return [
    'controls'  => [],
    'widgets'   => [
        SingleProductWidget::class,
        BannerWidget::class,
    ]
];
