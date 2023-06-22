<?php

namespace App\Containers\DashboardSection\Manager\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use App\Containers\DashboardSection\Manager\Models\Manager;
use App\Containers\DashboardSection\Manager\Tasks\UpdateManagerTask;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\UpdateManagerRequest;
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
