<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DataSection\DataContainer\Models\DataContainer;
use Containers\DataSection\DataContainer\Tasks\CreateDataContainerTask;
use Containers\DataSection\DataContainer\UI\API\Requests\CreateDataContainerRequest;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class CreateDataContainerAction extends ParentAction
{
    /**
     * @param CreateDataContainerRequest $request
     * @return DataContainer
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateDataContainerRequest $request): DataContainer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateDataContainerTask::class)->run($data);
    }
}
