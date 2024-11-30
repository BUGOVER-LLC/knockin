<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DataSection\DataContainer\Models\DataContainer;
use Containers\DataSection\DataContainer\Tasks\UpdateDataContainerTask;
use Containers\DataSection\DataContainer\UI\API\Requests\UpdateDataContainerRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class UpdateDataContainerAction extends ParentAction
{
    /**
     * @param UpdateDataContainerRequest $request
     * @return DataContainer
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateDataContainerRequest $request): DataContainer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateDataContainerTask::class)->run($data, $request->id);
    }
}
