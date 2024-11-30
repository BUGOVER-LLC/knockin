<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DataSection\FileContainer\Tasks\GetAllFileContainersTask;
use Containers\DataSection\FileContainer\UI\API\Requests\GetAllFileContainersRequest;
use Ship\Parents\Actions\Action as ParentAction;

class GetAllFileContainersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllFileContainersRequest $request): mixed
    {
        return app(GetAllFileContainersTask::class)->run();
    }
}
