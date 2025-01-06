<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DataSection\FileSystem\Models\FileSystem;
use Containers\DataSection\FileSystem\Tasks\CreateFileSystemTask;
use Containers\DataSection\FileSystem\UI\API\Requests\CreateFileSystemRequest;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class CreateFileSystemAction extends ParentAction
{
    /**
     * @param CreateFileSystemRequest $request
     * @return FileSystem
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFileSystemRequest $request): FileSystem
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateFileSystemTask::class)->run($data);
    }
}
