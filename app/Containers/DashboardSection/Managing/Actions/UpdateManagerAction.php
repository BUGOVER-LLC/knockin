<?php

namespace Containers\DashboardSection\Managing\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DashboardSection\Managing\Models\Manager;
use Containers\DashboardSection\Managing\Tasks\UpdateManagerTask;
use Containers\DashboardSection\Managing\UI\WEB\Requests\UpdateManagerRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateManagerAction extends ParentAction
{
    /**
     * @param UpdateManagerRequest $request
     * @return Manager
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateManagerRequest $request): Manager
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateManagerTask::class)->run($data, $request->id);
    }
}
