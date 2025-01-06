<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Action;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Plan\Model\Plan;
use Containers\AuthSection\Plan\Task\UpdatePlanTask;
use Containers\AuthSection\Plan\UI\API\Requests\UpdatePlanRequest;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class UpdatePlanAction extends ParentAction
{
    /**
     * @param UpdatePlanRequest $request
     * @return Plan
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePlanRequest $request): Plan
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdatePlanTask::class)->run($data, $request->id);
    }
}
