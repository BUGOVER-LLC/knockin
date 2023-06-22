<?php

namespace Containers\DashboardSection\Managing\Actions;

use Containers\DashboardSection\Managing\Models\Manager;
use Containers\DashboardSection\Managing\Tasks\FindManagerByIdTask;
use Containers\DashboardSection\Managing\UI\WEB\Requests\FindManagerByIdRequest;
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
