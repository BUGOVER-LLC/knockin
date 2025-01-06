<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\WEB\Controllers;

use Containers\AuthSection\Plan\Action\CreatePlanAction;
use Containers\AuthSection\Plan\UI\WEB\Requests\CreatePlanRequest;
use Containers\AuthSection\Plan\UI\WEB\Requests\StorePlanRequest;
use Ship\Parent\Controller\WebController;

class CreatePlanController extends WebController
{
    public function create(CreatePlanRequest $request)
    {
        // ..
    }

    public function store(StorePlanRequest $request)
    {
        $plan = app(CreatePlanAction::class)->run($request);
        // ..
    }
}
