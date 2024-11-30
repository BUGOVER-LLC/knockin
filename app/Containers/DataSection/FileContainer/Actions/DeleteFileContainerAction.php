<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Actions;

use Containers\DataSection\FileContainer\Tasks\DeleteFileContainerTask;
use Containers\DataSection\FileContainer\UI\API\Requests\DeleteFileContainerRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class DeleteFileContainerAction extends ParentAction
{
    /**
     * @param DeleteFileContainerRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFileContainerRequest $request): int
    {
        return app(DeleteFileContainerTask::class)->run($request->id);
    }
}
