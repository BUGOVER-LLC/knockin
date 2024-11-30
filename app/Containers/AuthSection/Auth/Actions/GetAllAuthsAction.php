<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Auth\Tasks\GetAllAuthsTask;
use Containers\AuthSection\Auth\UI\API\Requests\GetAllAuthsRequest;
use Ship\Parents\Actions\Action as ParentAction;

class GetAllAuthsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllAuthsRequest $request): mixed
    {
        return app(GetAllAuthsTask::class)->run();
    }
}
