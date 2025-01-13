<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\GetAllSubscribesController;
use Illuminate\Support\Facades\Route;

Route::get('subscribes', [GetAllSubscribesController::class, 'index'])
    ->middleware(['auth:web']);
