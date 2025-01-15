<?php

declare(strict_types=1);

use Containers\PaymentSection\Webhook\UI\API\Controller\CreateWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('webhooks', CreateWebhookController::class)
    ->middleware(['api']);
