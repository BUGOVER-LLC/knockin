<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\WEB\Controllers;

use Containers\AuthSection\Plan\Action\DeletePlanAction;
use Containers\AuthSection\Plan\UI\WEB\Requests\DeletePlanRequest;
use Ship\Parent\Controller\WebController;

class DeletePlanController extends WebController
{
    public function destroy(DeletePlanRequest $request)
    {
         $result = app(DeletePlanAction::class)->run($request);
         // ..
    }
}
