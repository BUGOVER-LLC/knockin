<?php

namespace Containers\DashboardSection\User\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DashboardSection\User\Tasks\GetAllUsersTask;
use Containers\DashboardSection\User\UI\API\Requests\GetAllUsersRequest;
use Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllUsersRequest $request): mixed
    {
        return app(GetAllUsersTask::class)->run();
    }
}
