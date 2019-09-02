<?php
namespace App;

use App\Providers\CarbonFieldsServiceProvider;
use App\Providers\KirkiServiceProvider;
use App\Providers\MenuServiceProvider;

return [
	'providers'     => [
		MenuServiceProvider::class,
		CarbonFieldsServiceProvider::class,
		KirkiServiceProvider::class
	]
];
