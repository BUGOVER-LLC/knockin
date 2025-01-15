<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\API\Controllers\GetAllSubscribesController;
use Illuminate\Support\Facades\Route;

Route::get('subscribes', [GetAllSubscribesController::class, 'getAllSubscribes'])
    ->middleware(['auth:api']);
