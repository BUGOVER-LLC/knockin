<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Actions;

use Containers\DataSection\DataContainer\Tasks\DeleteDataContainerTask;
use Containers\DataSection\DataContainer\UI\API\Requests\DeleteDataContainerRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class DeleteDataContainerAction extends ParentAction
{
    /**
     * @param DeleteDataContainerRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteDataContainerRequest $request): int
    {
        return app(DeleteDataContainerTask::class)->run($request->id);
    }
}
