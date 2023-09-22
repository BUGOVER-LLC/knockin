<?php

namespace Containers\DashboardSection\User\Actions;

use Containers\DashboardSection\User\Tasks\DeleteUserTask;
use Containers\DashboardSection\User\UI\API\Requests\DeleteUserRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class DeleteUserAction extends ParentAction
{
    /**
     * @param DeleteUserRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteUserRequest $request): int
    {
        return app(DeleteUserTask::class)->run($request->id);
    }
}
