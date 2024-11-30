<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Actions;

use Containers\AuthSection\Auth\Tasks\DeleteAuthTask;
use Containers\AuthSection\Auth\UI\API\Requests\DeleteAuthRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class DeleteAuthAction extends ParentAction
{
    /**
     * @param DeleteAuthRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAuthRequest $request): int
    {
        return app(DeleteAuthTask::class)->run($request->id);
    }
}
