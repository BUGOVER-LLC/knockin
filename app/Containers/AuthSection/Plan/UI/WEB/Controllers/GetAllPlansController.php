<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\WEB\Controllers;

use Containers\AuthSection\Plan\Action\GetAllPlansAction;
use Containers\AuthSection\Plan\UI\WEB\Requests\GetAllPlansRequest;
use Ship\Parent\Controller\WebController;

class GetAllPlansController extends WebController
{
    public function index(GetAllPlansRequest $request)
    {
        $plans = app(GetAllPlansAction::class)->run($request);
        // ..
    }
}
