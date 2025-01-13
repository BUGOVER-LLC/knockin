<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DataSection\FileSystem\Models\FileSystem;
use Containers\DataSection\FileSystem\Tasks\UpdateFileSystemTask;
use Containers\DataSection\FileSystem\UI\API\Requests\UpdateFileSystemRequest;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class UpdateFileSystemAction extends ParentAction
{
    /**
     * @param UpdateFileSystemRequest $request
     * @return FileSystem
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFileSystemRequest $request): FileSystem
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateFileSystemTask::class)->run($data, $request->id);
    }
}
