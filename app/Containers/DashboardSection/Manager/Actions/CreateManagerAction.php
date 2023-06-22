<?php

namespace App\Containers\DashboardSection\Manager\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use App\Containers\DashboardSection\Manager\Models\Manager;
use App\Containers\DashboardSection\Manager\Tasks\CreateManagerTask;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\CreateManagerRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateManagerAction extends ParentAction
{
    /**
     * @param CreateManagerRequest $request
     * @return Manager
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateManagerRequest $request): Manager
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateManagerTask::class)->run($data);
    }
}
