<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Action;

use Containers\AuthSection\Plan\Model\Plan;
use Containers\AuthSection\Plan\Task\FindPlanByIdTask;
use Containers\AuthSection\Plan\UI\API\Requests\FindPlanByIdRequest;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class FindPlanByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindPlanByIdRequest $request): Plan
    {
        return app(FindPlanByIdTask::class)->run($request->id);
    }
}
