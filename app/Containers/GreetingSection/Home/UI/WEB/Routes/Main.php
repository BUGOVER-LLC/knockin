<?php

declare(strict_types=1);

use App\Containers\GreetingSection\Home\UI\WEB\Controller\ContactController;
use App\Containers\GreetingSection\Home\UI\WEB\Controller\PricingController;
use Containers\GreetingSection\Home\UI\WEB\Controller\CreateHomeController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['guest']],
    static fn() => [
        Route::get('/', CreateHomeController::class),
        Route::get('contact', ContactController::class),
        Route::get('pricing', PricingController::class),
    ]
);
