<?php

namespace App\Containers\DashboardSection\Manager\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use App\Containers\DashboardSection\Manager\Tasks\GetAllManagersTask;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\GetAllManagersRequest;
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
