<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DataSection\FileSystem\Tasks\GetAllFileSystemsTask;
use Containers\DataSection\FileSystem\UI\API\Requests\GetAllFileSystemsRequest;
use Ship\Parent\Action\Action as ParentAction;

class GetAllFileSystemsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllFileSystemsRequest $request): mixed
    {
        return app(GetAllFileSystemsTask::class)->run();
    }
}
