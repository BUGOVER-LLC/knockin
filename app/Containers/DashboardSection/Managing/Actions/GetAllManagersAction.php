<?php

namespace Containers\DashboardSection\Managing\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DashboardSection\Managing\Tasks\GetAllManagersTask;
use Containers\DashboardSection\Managing\UI\WEB\Requests\GetAllManagersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllManagersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllManagersRequest $request): mixed
    {
        return app(GetAllManagersTask::class)->run();
    }
}
