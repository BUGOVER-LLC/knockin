<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DataSection\FileContainer\Models\FileContainer;
use Containers\DataSection\FileContainer\Tasks\CreateFileContainerTask;
use Containers\DataSection\FileContainer\UI\API\Requests\CreateFileContainerRequest;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class CreateFileContainerAction extends ParentAction
{
    /**
     * @param CreateFileContainerRequest $request
     * @return FileContainer
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFileContainerRequest $request): FileContainer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateFileContainerTask::class)->run($data);
    }
}
