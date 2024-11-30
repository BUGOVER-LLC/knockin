<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DataSection\DataContainer\Tasks\GetAllDataContainersTask;
use Containers\DataSection\DataContainer\UI\API\Requests\GetAllDataContainersRequest;
use Ship\Parents\Actions\Action as ParentAction;

class GetAllDataContainersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllDataContainersRequest $request): mixed
    {
        return app(GetAllDataContainersTask::class)->run();
    }
}
