<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DataSection\FileContainer\Models\FileContainer;
use Containers\DataSection\FileContainer\Tasks\UpdateFileContainerTask;
use Containers\DataSection\FileContainer\UI\API\Requests\UpdateFileContainerRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class UpdateFileContainerAction extends ParentAction
{
    /**
     * @param UpdateFileContainerRequest $request
     * @return FileContainer
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFileContainerRequest $request): FileContainer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateFileContainerTask::class)->run($data, $request->id);
    }
}
