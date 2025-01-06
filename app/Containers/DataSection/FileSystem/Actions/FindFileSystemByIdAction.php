<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Actions;

use Containers\DataSection\FileSystem\Models\FileSystem;
use Containers\DataSection\FileSystem\Tasks\FindFileSystemByIdTask;
use Containers\DataSection\FileSystem\UI\API\Requests\FindFileSystemByIdRequest;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class FindFileSystemByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindFileSystemByIdRequest $request): FileSystem
    {
        return app(FindFileSystemByIdTask::class)->run($request->id);
    }
}
