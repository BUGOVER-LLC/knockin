<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Action;

use Containers\AuthSection\Plan\Task\DeletePlanTask;
use Containers\AuthSection\Plan\UI\API\Requests\DeletePlanRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class DeletePlanAction extends ParentAction
{
    /**
     * @param DeletePlanRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeletePlanRequest $request): int
    {
        return app(DeletePlanTask::class)->run($request->id);
    }
}
