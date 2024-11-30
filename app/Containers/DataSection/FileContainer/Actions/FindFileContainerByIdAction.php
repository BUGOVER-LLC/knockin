<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Actions;

use Containers\DataSection\FileContainer\Models\FileContainer;
use Containers\DataSection\FileContainer\Tasks\FindFileContainerByIdTask;
use Containers\DataSection\FileContainer\UI\API\Requests\FindFileContainerByIdRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class FindFileContainerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindFileContainerByIdRequest $request): FileContainer
    {
        return app(FindFileContainerByIdTask::class)->run($request->id);
    }
}
