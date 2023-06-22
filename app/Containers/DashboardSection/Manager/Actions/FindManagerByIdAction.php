<?php

namespace App\Containers\DashboardSection\Manager\Actions;

use App\Containers\DashboardSection\Manager\Models\Manager;
use App\Containers\DashboardSection\Manager\Tasks\FindManagerByIdTask;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\FindManagerByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindManagerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindManagerByIdRequest $request): Manager
    {
        return app(FindManagerByIdTask::class)->run($request->id);
    }
}
