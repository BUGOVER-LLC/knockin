<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Actions;

use Containers\DataSection\DataContainer\Models\DataContainer;
use Containers\DataSection\DataContainer\Tasks\FindDataContainerByIdTask;
use Containers\DataSection\DataContainer\UI\API\Requests\FindDataContainerByIdRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class FindDataContainerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindDataContainerByIdRequest $request): DataContainer
    {
        return app(FindDataContainerByIdTask::class)->run($request->id);
    }
}
