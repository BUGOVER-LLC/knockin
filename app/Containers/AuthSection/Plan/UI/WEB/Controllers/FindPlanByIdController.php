<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\WEB\Controllers;

use Containers\AuthSection\Plan\Action\FindPlanByIdAction;
use Containers\AuthSection\Plan\UI\WEB\Requests\FindPlanByIdRequest;
use Ship\Parent\Controller\WebController;

class FindPlanByIdController extends WebController
{
    public function show(FindPlanByIdRequest $request)
    {
        $plan = app(FindPlanByIdAction::class)->run($request);
        // ..
    }
}
