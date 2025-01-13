<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Action;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Plan\Task\GetAllPlansTask;
use Containers\AuthSection\Plan\UI\API\Requests\GetAllPlansRequest;
use Ship\Parent\Action\Action as ParentAction;

class GetAllPlansAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllPlansRequest $request): mixed
    {
        return app(GetAllPlansTask::class)->run();
    }
}
