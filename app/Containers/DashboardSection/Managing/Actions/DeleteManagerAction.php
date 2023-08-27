<?php

namespace Containers\DashboardSection\Managing\Actions;

use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Containers\DashboardSection\Managing\Tasks\DeleteManagerTask;
use Containers\DashboardSection\Managing\UI\WEB\Requests\DeleteManagerRequest;

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
