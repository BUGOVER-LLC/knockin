<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Actions;

use Containers\DataSection\FileSystem\Tasks\DeleteFileSystemTask;
use Containers\DataSection\FileSystem\UI\API\Requests\DeleteFileSystemRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class DeleteFileSystemAction extends ParentAction
{
    /**
     * @param DeleteFileSystemRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFileSystemRequest $request): int
    {
        return app(DeleteFileSystemTask::class)->run($request->id);
    }
}
