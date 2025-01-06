<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Action;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Plan\Model\Plan;
use Containers\AuthSection\Plan\Task\CreatePlanTask;
use Containers\AuthSection\Plan\UI\API\Requests\CreatePlanRequest;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class CreatePlanAction extends ParentAction
{
    /**
     * @param CreatePlanRequest $request
     * @return Plan
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreatePlanRequest $request): Plan
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreatePlanTask::class)->run($data);
    }
}
