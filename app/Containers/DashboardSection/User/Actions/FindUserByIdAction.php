<?php

namespace Containers\DashboardSection\User\Actions;

use Containers\DashboardSection\User\Models\User;
use Containers\DashboardSection\User\Tasks\FindUserByIdTask;
use Containers\DashboardSection\User\UI\API\Requests\FindUserByIdRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class FindUserByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindUserByIdRequest $request): User
    {
        return app(FindUserByIdTask::class)->run($request->id);
    }
}
