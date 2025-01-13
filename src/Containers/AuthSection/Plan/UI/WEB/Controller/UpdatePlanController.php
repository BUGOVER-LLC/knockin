<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\WEB\Controller;

use Containers\AuthSection\Plan\Action\FindPlanByIdAction;
use Containers\AuthSection\Plan\Action\UpdatePlanAction;
use Containers\AuthSection\Plan\UI\WEB\Requests\EditPlanRequest;
use Containers\AuthSection\Plan\UI\WEB\Requests\UpdatePlanRequest;
use Ship\Parent\Controller\WebController;

class UpdatePlanController extends WebController
{
    public function edit(EditPlanRequest $request)
    {
        $plan = app(FindPlanByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdatePlanRequest $request)
    {
        $plan = app(UpdatePlanAction::class)->run($request);
        // ..
    }
}
