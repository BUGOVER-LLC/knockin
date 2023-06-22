<?php

namespace App\Containers\DashboardSection\Manager\Actions;

use App\Containers\DashboardSection\Manager\Tasks\DeleteManagerTask;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\DeleteManagerRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteManagerAction extends ParentAction
{
    /**
     * @param DeleteManagerRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteManagerRequest $request): int
    {
        return app(DeleteManagerTask::class)->run($request->id);
    }
}
